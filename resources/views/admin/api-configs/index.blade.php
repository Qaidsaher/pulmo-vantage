<x-app-layout>
    <div class="px-6 py-16 mx-auto space-y-8 max-w-7xl md:px-12">
      <!-- Page Header -->
      <header class="flex flex-col items-center justify-between md:flex-row">
        <h1 class="text-5xl font-bold text-primary">API Configurations</h1>
        <a href="{{ route('admin.api-configs.create') }}" class="inline-flex items-center px-6 py-3 mt-4 font-semibold text-white transition duration-300 rounded-lg shadow md:mt-0 bg-primary hover:bg-secondary">
          <i class="mr-2 fas fa-plus"></i>
          Create New API
        </a>
      </header>

      @if(session('success'))
        <div class="p-4 text-green-700 bg-green-100 border border-green-300 rounded shadow">
          {{ session('success') }}
        </div>
      @endif

      @if($apiConfigs->isEmpty())
        <div class="text-center text-gray-600">
          <p>No API configurations found.</p>
        </div>
      @else
        <div class="overflow-x-auto">
          <table class="min-w-full bg-white shadow-lg rounded-xl">
            <thead>
              <tr class="text-white bg-primary">
                <th class="px-6 py-3 text-left">Name</th>
                <th class="px-6 py-3 text-left">Endpoint</th>
                <th class="px-6 py-3 text-left">Description</th>
                <th class="px-6 py-3 text-right">Actions</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              @foreach($apiConfigs as $config)
                <tr>
                  <td class="px-6 py-4">{{ $config->name }}</td>
                  <td class="px-6 py-4">
                    <a href="{{ $config->endpoint }}" target="_blank" class="text-secondary hover:underline">
                      {{ $config->endpoint }}
                    </a>
                  </td>
                  <td class="px-6 py-4">{{ $config->description }}</td>
                  <td class="px-6 py-4 space-x-2 text-right">
                    <a href="{{ route('admin.api-configs.edit', $config->id) }}" class="inline-flex items-center px-3 py-1 text-white transition duration-300 rounded bg-secondary hover:bg-primary">
                      <i class="mr-1 fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('admin.api-configs.destroy', $config->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this API configuration?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="inline-flex items-center px-3 py-1 text-white transition duration-300 bg-red-500 rounded hover:bg-red-600">
                        <i class="mr-1 fas fa-trash-alt"></i> Delete
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif
    </div>
  </x-app-layout>
