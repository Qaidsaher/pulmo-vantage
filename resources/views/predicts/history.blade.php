<x-app-layout>
    <div class="px-6 py-16 mx-auto space-y-12 max-w-7xl md:px-12">
       {{-- Page Header --}}
    <header class="space-y-4 text-center">
        <h1 class="font-extrabold text-7xl text-primary">Prediction History</h1>
        <p class="max-w-2xl mx-auto text-lg text-gray-600">
          Review your previous predictions and view detailed results for each request.
        </p>
      </header>

      {{-- Action Buttons --}}
      <div class="flex flex-col items-center justify-center gap-4 sm:flex-row">
        <a href="{{ route('predict.image.show') }}"
           class="inline-flex items-center gap-2 px-8 py-3 font-semibold text-white transition rounded-full shadow-lg bg-gradient-to-r from-primary to-secondary hover:from-secondary hover:to-primary">
          <i class="fas fa-image"></i>
          New Image Prediction
        </a>
        <a href="{{ route('predict.manual.show') }}"
           class="inline-flex items-center gap-2 px-8 py-3 font-semibold text-white transition rounded-full shadow-lg bg-gradient-to-r from-primary to-secondary hover:from-secondary hover:to-primary">
          <i class="fas fa-keyboard"></i>
          New Manual Prediction
        </a>
      </div>

      {{-- Prediction Grid --}}
      @if ($predictions->isEmpty())
        <div class="mt-16 text-center text-gray-500">
          <p>No predictions found. Start by creating a new prediction above.</p>
        </div>
      @else
        <div class="grid grid-cols-1 gap-8 mt-8 sm:grid-cols-2 lg:grid-cols-3">
          @foreach ($predictions as $prediction)
            <div class="flex flex-col justify-between p-6 transition transform bg-white shadow-lg rounded-2xl hover:shadow-2xl hover:-translate-y-1">

              {{-- Header --}}
              <div class="flex items-start justify-between">
                <div>
                  <span class="inline-block px-3 py-1 text-xs font-medium text-white uppercase rounded-full bg-primary">
                    {{ ucfirst($prediction->type) }}
                  </span>
                  <p class="mt-2 text-sm text-gray-400">{{ $prediction->created_at->format('M d, Y') }}</p>
                </div>
                <div class="flex items-center space-x-2">
                  <a href="{{ route('predict.history.show', $prediction->id) }}"
                     class="text-secondary hover:text-primary" title="View Details">
                    <i class="text-lg fas fa-info-circle"></i>
                  </a>
                  <form action="{{ route('predict.destroy', $prediction->id) }}" method="POST" onsubmit="return confirm('Delete this prediction?');">
                    @csrf @method('DELETE')
                    <button type="submit" class="text-red-500 hover:text-red-600" title="Delete Prediction">
                      <i class="text-lg fas fa-trash-alt"></i>
                    </button>
                  </form>
                </div>
              </div>

              {{-- Result Summary --}}
              <div class="mt-6">
                <h3 class="text-xl font-semibold text-gray-800">Result</h3>
                <p class="mt-1 text-lg text-gray-700">{{ $prediction->result_summary }}</p>
              </div>

              {{-- Image Preview --}}
              @if ($prediction->type === 'image' && $prediction->image_path)
                <a href="{{ asset('storage/' . $prediction->image_path) }}" target="_blank" class="block mt-6 overflow-hidden rounded-xl">
                  <img src="{{ asset('storage/' . $prediction->image_path) }}" alt="Prediction Image" class="object-cover w-full h-40 transition hover:opacity-90">
                </a>
              @endif

            </div>
          @endforeach
        </div>
      @endif
    </div>
</x-app-layout>
