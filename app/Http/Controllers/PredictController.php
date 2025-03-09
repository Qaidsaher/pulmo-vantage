<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prediction;
use App\Models\PredictionResult;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PredictController extends Controller
{
    /**
     * Handle prediction based on image upload.
     */
    public function predictImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);

        // Store the uploaded image in the "predictions" folder on the public disk.
        $imagePath = $request->file('image')->store('predictions', 'public');

        // Simulate a prediction result for demonstration.
        $results = ['Positive', 'Negative', 'Inconclusive'];
        $resultSummary = $results[array_rand($results)];

        // Create a new prediction record.
        $prediction = Prediction::create([
            'user_id'     => Auth::id(),
            'api_config_id' => null, // Or assign a default API config ID if needed.
            'type'        => 'image',
            'result_summary' => $resultSummary,
            'image_path'  => $imagePath,
            // Manual fields remain null.
        ]);

        // Create sample prediction results for two models.
        $models = ['reset50', 'mobilenet'];
        foreach ($models as $model) {
            PredictionResult::create([
                'prediction_id' => $prediction->id,
                'model_name'    => $model,
                'result_detail' => $resultSummary, // Using same summary for demo.
                'confidence'    => rand(70, 99) / 100, // Random confidence between 0.70 and 0.99.
            ]);
        }

        return redirect()->back()->with('result', $resultSummary);
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
}
