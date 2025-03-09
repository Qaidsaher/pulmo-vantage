<x-app-layout>
    <div class="max-w-5xl px-6 py-16 mx-auto space-y-8 md:px-12">
      <!-- Page Header -->
      <header class="text-center">
        <h1 class="text-5xl font-bold text-primary">Predict Lung Cancer (Manual Input)</h1>
        <p class="mt-4 text-lg text-gray-700">
          Enter your details to receive an AI-powered prediction.
        </p>
      </header>

      <!-- Display Prediction Result -->
      @if(session('result'))
        <div class="p-4 text-center bg-green-100 border border-green-300 rounded">
          <p class="text-lg text-green-700">
            Prediction Result: <span class="font-bold">{{ session('result') }}</span>
          </p>
        </div>
      @endif

      <!-- Manual Input Form -->
      <div class="p-8 bg-white shadow-lg rounded-xl">
        <form action="{{ route('predict.manual') }}" method="POST">
          @csrf
          <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
              <label for="name" class="block text-lg font-semibold text-darkNeutral">Name</label>
              <input type="text" name="name" id="name" placeholder="Enter your name" class="w-full p-3 mt-2 border border-gray-300 rounded-lg" required>
              @error('name')
                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
              @enderror
            </div>
            <div>
              <label for="surname" class="block text-lg font-semibold text-darkNeutral">Surname</label>
              <input type="text" name="surname" id="surname" placeholder="Enter your surname" class="w-full p-3 mt-2 border border-gray-300 rounded-lg" required>
              @error('surname')
                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
              @enderror
            </div>
            <div>
              <label for="age" class="block text-lg font-semibold text-darkNeutral">Age</label>
              <input type="number" name="age" id="age" placeholder="Enter your age" class="w-full p-3 mt-2 border border-gray-300 rounded-lg" required>
              @error('age')
                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
              @enderror
            </div>
            <div>
              <label for="smokes" class="block text-lg font-semibold text-darkNeutral">Smokes</label>
              <select name="smokes" id="smokes" class="w-full p-3 mt-2 border border-gray-300 rounded-lg" required>
                <option value="">Select</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
              </select>
              @error('smokes')
                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
              @enderror
            </div>
            <div>
              <label for="areaq" class="block text-lg font-semibold text-darkNeutral">AreaQ</label>
              <input type="text" name="areaq" id="areaq" placeholder="Enter area value" class="w-full p-3 mt-2 border border-gray-300 rounded-lg" required>
              @error('areaq')
                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
              @enderror
            </div>
            <div>
              <label for="alkhol" class="block text-lg font-semibold text-darkNeutral">Alkhol</label>
              <input type="text" name="alkhol" id="alkhol" placeholder="Enter alcohol consumption" class="w-full p-3 mt-2 border border-gray-300 rounded-lg" required>
              @error('alkhol')
                <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <button type="submit" class="w-full px-6 py-3 mt-6 font-semibold text-white transition duration-300 rounded-lg shadow bg-primary hover:bg-secondary">
            Predict
          </button>
        </form>
      </div>
    </div>
  </x-app-layout>
