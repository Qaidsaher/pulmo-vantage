<div class="p-8 transition-all duration-300 shadow-2xl bg-opacity-80 rounded-2xl backdrop-blur-lg">
    <!-- Upload Section -->
    <div class="w-full">
        <label for="dropzone-file"
            class="relative flex flex-col items-center justify-center w-full h-64 transition-all duration-200 border-2 border-gray-300 border-dashed cursor-pointer rounded-xl bg-gray-50 hover:bg-gray-100">

            @if ($previewUrl)
                <img src="{{ $previewUrl }}" alt="Preview" class="object-contain w-full h-full rounded-xl" />
            @else
                <div class="flex flex-col items-center justify-center text-gray-500">
                    <svg class="w-10 h-10 mb-3" fill="none" viewBox="0 0 20 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5
                               5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0
                               0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                    </svg>
                    <p class="text-sm font-medium">Click to upload or drag & drop</p>
                    <p class="text-xs text-gray-400">JPG, PNG — Max 2MB</p>
                </div>
            @endif

            <input id="dropzone-file" type="file" wire:model="image" class="hidden" />
        </label>
    </div>

    @error('image')
        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
    @enderror

    <!-- Submit Button -->
    <div class="mt-6">
        <button wire:click="predict"
            class="flex items-center justify-center w-full gap-3 px-6 py-3 font-semibold text-white transition duration-300 rounded-md shadow-md bg-primary hover:bg-secondary"
            wire:loading.attr="disabled">

            <div wire:loading wire:target="predict">
                <div class="w-6 h-6 border-4 border-teal-600 rounded-full border-t-transparent animate-spin"></div>
            </div>

            <i class="fas fa-paper-plane"></i>
            <span wire:loading.remove wire:target="predict">Predict</span>
        </button>
    </div>

    <!-- Prediction Results -->
    @if ($result)
        <div class="mt-8">
            <h3 class="mb-4 text-xl font-bold text-gray-700">Prediction Results</h3>
            @foreach ($result as $model => $data)
                <div class="p-4 mb-4 border border-gray-200 shadow-sm rounded-xl bg-gray-50">
                    <h4 class="text-lg font-semibold">{{ ucfirst($model) }}</h4>
                    <p class="text-sm text-gray-700">Label: <span class="font-medium">{{ $data['label'] ?? 'N/A' }}</span></p>
                    <p class="text-sm text-gray-700">Confidence: <span class="font-medium">{{ round($data['confidence'] * 100, 2) ?? 'N/A' }}%</span></p>

                    @if (isset($data['gradcam_image']))
                        <img class="w-full mt-3 rounded-lg shadow-md" src="data:image/png;base64,{{ $data['gradcam_image'] }}" alt="Grad-CAM">
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</div>
