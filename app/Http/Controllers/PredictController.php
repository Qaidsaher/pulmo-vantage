<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prediction;
use App\Models\PredictionResult;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class PredictController extends Controller
{
    /**
     * Handles image prediction requests.
     *
     * Expects an 'image' file in the request, sends it to the FastAPI server,
     * and saves the results in the predictions and prediction_results tables,
     * including saving the Grad-CAM overlay images to disk.
     */
    public function predictImage(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'image' => 'required|image|max:2048', // max size 2MB
        ]);

        // Get the uploaded image file
        $file = $request->file('image');

        // Store the original image locally (e.g., in storage/app/public/predictions)
        $path = $file->store('predictions', 'public');

        // Get the FastAPI URL from the .env (default to localhost if not set)
        $apiUrl = env('FASTAPI_URL', 'https://lungs-cancer-predictions-jjl1.onrender.com/predict');

        // Call the FastAPI endpoint using Laravel's HTTP client
        $response = Http::attach(
            'file',
            file_get_contents($file->getRealPath()),
            $file->getClientOriginalName()
        )->post($apiUrl);

        if (!$response->successful()) {
            return response()->json(['error' => 'API call failed'], 500);
        }

        // Parse the JSON response from FastAPI.
        // Expected format (for each model key like "vgg16", "vgg19", "mobilenet"):
        // {
        //     "predicted_class": 0,
        //     "label": "Benign",
        //     "confidence": 0.92,
        //     "gradcam_image": "base64EncodedPNG..."
        // }
        $resultData = $response->json();

        // Create a new Prediction record
        $prediction = Prediction::create([
            'user_id'         => Auth::id() ?? 1, // use authenticated user id or default to 1
            'api_config_id'   => null,
            'type'            => 'image',
            'result_summary'  => 'Predicted by multiple models',
            'image_path'      => $path,
        ]);

        // For each model's result, decode and store the Grad-CAM overlay image
        foreach ($resultData as $modelName => $modelResult) {
            // If the API returned an error for this model, store the error only.
            if (isset($modelResult['error'])) {
                PredictionResult::create([
                    'prediction_id' => $prediction->id,
                    'model_name'    => $modelName,
                    'result_detail' => $modelResult['error'],
                    'confidence'    => null,
                    'image_path'    => null,
                ]);
                continue;
            }

            // Get the base64 encoded gradcam image from the API response
            $gradcamBase64 = $modelResult['gradcam_image'];
            // Create a unique filename for the gradcam image
            $filename = 'gradcam_' . $modelName . '_' . time() . '.png';
            $gradcamImageData = base64_decode($gradcamBase64);
            // Save the gradcam image to the public disk (e.g., in storage/app/public/gradcam_results)
            $gradcamPath = 'gradcam_results/' . $filename;
            Storage::disk('public')->put($gradcamPath, $gradcamImageData);

            // Create a PredictionResult record with the saved image path
            PredictionResult::create([
                'prediction_id' => $prediction->id,
                'model_name'    => $modelName,
                'result_detail' => $modelResult['label'] ?? 'N/A',
                'confidence'    => $modelResult['confidence'] ?? null,
                'image_path'    => $gradcamPath,
            ]);
        }


        // return response()->json([
        //     'message'    => 'Prediction successful',
        //     'prediction' => $prediction,
        //     'results'    => $resultData,
        //     'redirect'   => route('predict.history'), // Add the route URL here
        // ]);
        return redirect()->back()->with('result', 'Prediction successful');
    }

    /**
     * Handle prediction based on manual inputs.
     */
    public function predictManual(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'age'     => 'required|integer|min:0',
            'smokes'  => 'required|in:yes,no',
            'areaq'   => 'required|string|max:255',
            'alkhol'  => 'required|string|max:255',
        ]);

        // Simulate a prediction result for manual inputs.
        $results = ['Low Risk', 'Moderate Risk', 'High Risk'];
        $resultSummary = $results[array_rand($results)];

        // Create a new prediction record.
        $prediction = Prediction::create([
            'user_id'      => Auth::id(),
            'api_config_id' => null,
            'type'         => 'manual',
            'result_summary' => $resultSummary,
            // Image fields are null for manual predictions.
            'manual_name'      => $request->input('name'),
            'manual_surname'   => $request->input('surname'),
            'manual_age'       => $request->input('age'),
            'manual_smokes'    => $request->input('smokes'),
            'manual_areaq'     => $request->input('areaq'),
            'manual_alkhol'    => $request->input('alkhol'),
        ]);

        // Create sample prediction results for two models.
        $models = ['reset50', 'mobilenet'];
        foreach ($models as $model) {
            PredictionResult::create([
                'prediction_id' => $prediction->id,
                'model_name'    => $model,
                'result_detail' => $resultSummary,
                'confidence'    => rand(70, 99) / 100,
            ]);
        }

        return redirect()->back()->with('result', $resultSummary);
    }

    /**
     * Display the authenticated user's prediction history.
     */
    public function history(Request $request)
    {
        $predictions = $request->user()
            ->predictions()
            ->with('predictionResults')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('predicts.history', compact('predictions'));
    }
    /**
     * Display the detailed view for a single prediction.
     */
    public function show(Request $request, $id)
    {
        $prediction = $request->user()
            ->predictions()
            ->with('predictionResults')
            ->findOrFail($id);

        return view('predicts.show', compact('prediction'));
    }
    /**
     * Delete a prediction along with its associated images.
     */
    public function destroy(Request $request, $id)
    {
        $prediction = $request->user()->predictions()->with('predictionResults')->findOrFail($id);

        // Delete Grad-CAM images from prediction results if they exist.
        foreach ($prediction->predictionResults as $result) {
            if ($result->image_path) {
                Storage::disk('public')->delete($result->image_path);
            }
            // Optional: Delete the result record if not set to cascade.
            $result->delete();
        }

        // Delete the original prediction image if it exists.
        if ($prediction->image_path) {
            Storage::disk('public')->delete($prediction->image_path);
        }

        $prediction->delete();

        return redirect()->route('predict.history')->with('result', 'Prediction deleted successfully');
    }
}
