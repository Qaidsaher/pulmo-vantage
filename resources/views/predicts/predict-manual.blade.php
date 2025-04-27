<x-app-layout>
    <div class="min-h-screen bg-gradient-to-b from-gray-50 to-white text-darkNeutral">

      <!-- Hero Section -->
      <section class="relative h-[60vh] md:h-[70vh] bg-cover bg-center"
               style="background-image: url('{{ asset('images/manual-prediction-bg.png') }}');">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="relative z-10 flex flex-col items-center justify-center h-full px-6 text-center">
          <h1 class="mb-4 text-5xl font-extrabold text-white md:text-7xl drop-shadow-lg">
            Manual Prediction
          </h1>
          <p class="text-lg text-gray-200 md:text-2xl drop-shadow-md">
            Provide your details below for an AI-powered lung health forecast.
          </p>
        </div>
      </section>

      <!-- Content Container -->
      <div class="container px-6 py-12 mx-auto space-y-8 md:px-12">

        <!-- Result Alert -->
        @if(session('result'))
          <div class="max-w-2xl p-6 mx-auto text-green-800 bg-green-100 border border-green-300 shadow-lg rounded-2xl">
            <div class="flex items-center gap-3">
              <i class="text-2xl fas fa-check-circle"></i>
              <p class="text-xl font-medium">
                Prediction Result: <span class="font-bold">{{ session('result') }}</span>
              </p>
            </div>
          </div>
        @endif

        <!-- Form Card -->
        <div class="max-w-3xl p-10 mx-auto transition-transform transform bg-white shadow-2xl bg-opacity-70 backdrop-blur-lg rounded-3xl hover:-translate-y-2">
          <form action="{{ route('predict.manual') }}" method="POST" class="space-y-6">
            @csrf
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
              <div>
                <label for="name" class="block text-lg font-semibold">Name</label>
                <input id="name" name="name" type="text" required
                       class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary" placeholder="John" />
              </div>
              <div>
                <label for="surname" class="block text-lg font-semibold">Surname</label>
                <input id="surname" name="surname" type="text" required
                       class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Doe" />
              </div>
              <div>
                <label for="age" class="block text-lg font-semibold">Age</label>
                <input id="age" name="age" type="number" required
                       class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary" placeholder="45" />
              </div>
              <div>
                <label for="smokes" class="block text-lg font-semibold">Smokes</label>
                <select id="smokes" name="smokes" required
                        class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary">
                  <option value="">Select</option>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
              </div>
              <div>
                <label for="areaq" class="block text-lg font-semibold">AreaQ</label>
                <input id="areaq" name="areaq" type="text" required
                       class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Enter area value" />
              </div>
              <div>
                <label for="alkhol" class="block text-lg font-semibold">Alcohol</label>
                <input id="alkhol" name="alkhol" type="text" required
                       class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Units per week" />
              </div>
            </div>

            <button type="submit" class="flex items-center justify-center w-full gap-3 px-8 py-4 text-lg font-semibold text-white transition rounded-full shadow-lg bg-primary hover:bg-secondary">
              <i class="fas fa-paper-plane"></i>
              Predict
            </button>
          </form>
        </div>

      </div>
    </div>
  </x-app-layout>
