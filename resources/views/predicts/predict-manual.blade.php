<x-app-layout>
    <div class="min-h-screen bg-gradient-to-b from-gray-100 to-white text-darkNeutral">
      <!-- Hero Section -->
      <section class="relative h-[60vh] flex items-center justify-center bg-cover" style="background-image: url('https://source.unsplash.com/1600x900/?health,technology');">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative z-10 text-center">
          <h1 class="text-6xl font-extrabold text-white drop-shadow-lg">Manual Prediction</h1>
          <p class="mt-4 text-2xl text-gray-200 drop-shadow-md">
            Enter your details for an AI-powered prediction.
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

        <!-- Manual Input Form Card -->
        <div class="p-10 transition transform bg-white shadow-2xl bg-opacity-70 backdrop-filter backdrop-blur-lg rounded-xl hover:scale-105">
          <form action="{{ route('predict.manual') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
              <div>
                <label for="name" class="block text-xl font-semibold text-darkNeutral">Name</label>
                <input type="text" name="name" id="name" placeholder="Enter your name"
                       class="w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary" required>
              </div>
              <div>
                <label for="surname" class="block text-xl font-semibold text-darkNeutral">Surname</label>
                <input type="text" name="surname" id="surname" placeholder="Enter your surname"
                       class="w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary" required>
              </div>
              <div>
                <label for="age" class="block text-xl font-semibold text-darkNeutral">Age</label>
                <input type="number" name="age" id="age" placeholder="Enter your age"
                       class="w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary" required>
              </div>
              <div>
                <label for="smokes" class="block text-xl font-semibold text-darkNeutral">Smokes</label>
                <select name="smokes" id="smokes"
                        class="w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary" required>
                  <option value="">Select</option>
                  <option value="yes">Yes</option>
                  <option value="no">No</option>
                </select>
              </div>
              <div>
                <label for="areaq" class="block text-xl font-semibold text-darkNeutral">AreaQ</label>
                <input type="text" name="areaq" id="areaq" placeholder="Enter area value"
                       class="w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary" required>
              </div>
              <div>
                <label for="alkhol" class="block text-xl font-semibold text-darkNeutral">Alkhol</label>
                <input type="text" name="alkhol" id="alkhol" placeholder="Enter alcohol consumption"
                       class="w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary" required>
              </div>
            </div>
            <button type="submit" class="flex items-center justify-center w-full px-8 py-4 mt-6 font-semibold text-white transition duration-300 rounded-lg shadow-lg bg-primary hover:bg-secondary">
              <i class="mr-3 fas fa-paper-plane"></i> Predict
            </button>
          </form>
        </div>
      </div>
    </div>
  </x-app-layout>
