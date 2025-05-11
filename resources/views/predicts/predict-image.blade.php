<x-app-layout>
    <div class="min-h-screen bg-gradient-to-b from-gray-100 to-white text-darkNeutral">










        <!-- Hero Section -->
      <section class="relative h-[40vh] flex items-center justify-center">
        <div class="relative z-10 text-center">
          <h1 class="text-6xl font-extrabold text-primary drop-shadow-lg">Predict Lung Cancer</h1>
          <p class="mt-4 text-2xl text-secondary drop-shadow-md">
            Upload a high-quality lung scan and receive an AI-powered prediction.
          </p>
        </div>
      </section>

      <!-- Main Content -->
      <div class="max-w-4xl px-6 py-4 mx-auto space-y-8 md:px-12">
        <!-- Prediction Result Alert -->




        @livewire('lung-predictor')
      </div>
    </div>
  </x-app-layout>
