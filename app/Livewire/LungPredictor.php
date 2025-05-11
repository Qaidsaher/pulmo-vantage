<?php

namespace App\Livewire;

// app/Http/Livewire/LungPredictor.php

use App\Models\Prediction;
use App\Models\PredictionResult;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class LungPredictor extends Component
{
    use WithFileUploads;

    public $image;
    public $previewUrl;
    public $loading = false;
    public $result;

    public function updatedImage()
    {
        $this->reset('result');
        $this->previewUrl = $this->image->temporaryUrl();
    }

    public function predict()
    {
        $this->validate([
            'image' => 'required|image|max:2048',
        ]);

        $this->loading = true;

        $response = Http::attach(
            'file',
            file_get_contents($this->image->getRealPath()),
            $this->image->getClientOriginalName()
            )->post(env('FASTAPI_URL', 'https://lungs-cancer-predictions.onrender.com/predict'));
        $path = $this->image->store('predictions', 'public');

        if ($response->successful()) {
            $this->result = $response->json();
        } else {
            $this->addError('image', 'Prediction failed. Please try again.');
        }
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

        $this->loading = false;
    }

    public function render()
    {
        return view('livewire.lung-predictor');
    }
}
