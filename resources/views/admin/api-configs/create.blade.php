<x-app-layout>
    <div class="max-w-4xl px-6 py-16 mx-auto space-y-8 md:px-12">
      <header class="text-center">
        <h1 class="text-5xl font-bold text-primary">Create New API Configuration</h1>
      </header>

      <div class="p-8 bg-white shadow-lg rounded-xl">
        <form action="{{ route('admin.api-configs.store') }}" method="POST">
          @csrf
          <div class="mb-6">
            <label for="name" class="block text-xl font-semibold text-darkNeutral">Name</label>
            <input type="text" name="name" id="name" placeholder="Enter API name" class="w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary" required>
            @error('name')
              <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-6">
            <label for="endpoint" class="block text-xl font-semibold text-darkNeutral">Endpoint URL</label>
            <input type="url" name="endpoint" id="endpoint" placeholder="https://api.example.com" class="w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary" required>
            @error('endpoint')
              <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-6">
            <label for="description" class="block text-xl font-semibold text-darkNeutral">Description</label>
            <textarea name="description" id="description" rows="4" placeholder="Enter a brief description" class="w-full p-4 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary"></textarea>
            @error('description')
              <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>
          <div class="flex items-center justify-between">
            <a href="{{ route('admin.api-configs.index') }}" class="text-secondary hover:underline">
              Cancel
            </a>
            <button type="submit" class="px-6 py-3 font-semibold text-white transition duration-300 rounded-lg shadow bg-primary hover:bg-secondary">
              Create API Configuration
            </button>
          </div>
        </form>
      </div>
    </div>
  </x-app-layout>
