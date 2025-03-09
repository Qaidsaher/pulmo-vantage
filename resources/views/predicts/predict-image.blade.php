<x-app-layout>
    <div class="min-h-screen bg-gradient-to-b from-gray-100 to-white text-darkNeutral">
      <!-- Hero Section -->
      <section class="relative h-[60vh] flex items-center justify-center">
        <img src="https://source.unsplash.com/1600x900/?lung,scan" alt="Lung Scan" class="absolute inset-0 object-cover w-full h-full opacity-60">
        <div class="relative z-10 text-center">
          <h1 class="text-6xl font-extrabold text-white drop-shadow-lg">Predict Lung Cancer</h1>
          <p class="mt-4 text-2xl text-gray-200 drop-shadow-md">
            Upload a high-quality lung scan and receive an AI-powered prediction.
          </p>
        </div>
      </section>

      <!-- Main Content -->
      <div class="max-w-4xl px-6 py-12 mx-auto space-y-8 md:px-12">
        <!-- Prediction Result Alert -->
        @if(session('result'))
          <div class="p-6 text-center bg-green-100 border border-green-300 shadow-xl rounded-xl">
            <p class="text-2xl text-green-700">
              <i class="mr-2 fas fa-check-circle"></i>
              Prediction Result: <span class="font-bold">{{ session('result') }}</span>
            </p>
          </div>
        @endif

        <!-- Image Upload Form Card -->
        <div class="p-10 transition transform bg-white shadow-2xl bg-opacity-70 backdrop-filter backdrop-blur-lg rounded-xl hover:scale-105">
          <form action="{{ route('predict.image') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-8">
              <label for="image" class="flex items-center text-xl font-semibold text-darkNeutral">
                <i class="mr-3 fas fa-upload text-secondary"></i>
                Upload Lung Scan Image
              </label>
              <input type="file" name="image" id="image"
                     class="w-full p-4 mt-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary"
                     required>
              @error('image')
                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
              @enderror
            </div>
            <button type="submit" class="flex items-center justify-center w-full px-8 py-4 font-semibold text-white transition duration-300 rounded-lg shadow-lg bg-primary hover:bg-secondary">
              <i class="mr-3 fas fa-paper-plane"></i> Predict
            </button>
          </form>
        </div>
      </div>
    </div>
  </x-app-layout>
