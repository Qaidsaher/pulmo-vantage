<x-app-layout>
    <div class="max-w-5xl px-6 py-16 mx-auto space-y-10 md:px-12">
      <!-- Page Header with Icon -->
      <header class="text-center">
        <div class="flex items-center justify-center">
          <i class="mr-4 fas fa-file-medical text-7xl text-accent"></i>
          <h1 class="text-5xl font-bold text-primary">Predict Lung Cancer (Image Upload)</h1>
        </div>
        <p class="max-w-3xl mx-auto mt-4 text-lg text-gray-700">
          Upload a high-quality lung scan image and let our advanced AI-powered tool analyze and predict lung cancer risk.
        </p>
      </header>

      <!-- Display Prediction Result -->
      @if(session('result'))
        <div class="p-6 text-center bg-green-100 border border-green-300 shadow-md rounded-xl">
          <p class="text-xl text-green-700">
            <i class="mr-2 fas fa-check-circle"></i>
            Prediction Result: <span class="font-bold">{{ session('result') }}</span>
          </p>
        </div>
      @endif

      <!-- Image Upload Form Card -->
      <div class="p-10 bg-white shadow-xl rounded-xl">
        <form action="{{ route('predict.image') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-6">
            <label for="image" class="flex items-center text-lg font-semibold text-darkNeutral">
              <i class="mr-2 fas fa-upload text-secondary"></i>
              Upload Lung Scan Image
            </label>
            <input
              type="file"
              name="image"
              id="image"
              class="w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary"
              required>
            @error('image')
              <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>
          <button type="submit" class="flex items-center justify-center w-full px-6 py-3 font-semibold text-white transition duration-300 rounded-lg shadow bg-primary hover:bg-secondary">
            <i class="mr-2 fas fa-paper-plane"></i> Predict
          </button>
        </form>
      </div>
    </div>
  </x-app-layout>
