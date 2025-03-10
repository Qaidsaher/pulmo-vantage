<x-app-layout>
    <div class="px-6 py-16 mx-auto space-y-12 max-w-7xl md:px-12">
        <!-- Page Header -->
        <header class="text-center">
            <h1 class="text-5xl font-bold text-primary">Prediction History</h1>
            <p class="max-w-3xl mx-auto mt-4 text-lg text-gray-700">
                Review your previous predictions and view detailed results for each request.
            </p>
        </header>

        <!-- Action Buttons -->
        <div class="flex flex-col items-center justify-center gap-4 sm:flex-row">
            <a href="{{ route('predict.image.show') }}"
               class="inline-flex items-center px-6 py-3 font-semibold text-white transition duration-300 rounded-lg shadow bg-primary hover:bg-secondary">
                <i class="mr-2 fas fa-image"></i>
                New Image Prediction
            </a>
            <a href="{{ route('predict.manual.show') }}"
               class="inline-flex items-center px-6 py-3 font-semibold text-white transition duration-300 rounded-lg shadow bg-primary hover:bg-secondary">
                <i class="mr-2 fas fa-keyboard"></i>
                New Manual Prediction
            </a>
        </div>

        <!-- Prediction History Grid -->
        @if ($predictions->isEmpty())
            <div class="text-center text-gray-600">
                <p>You have not made any predictions yet.</p>
            </div>
        @else
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($predictions as $prediction)
                    <div class="p-4 transition duration-300 bg-white rounded-md shadow-md hover:shadow-xl">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-xl font-bold text-primary">
                                    {{ ucfirst($prediction->type) }} Prediction
                                </h2>
                                <p class="text-sm text-gray-500">
                                    {{ $prediction->created_at->format('M d, Y') }}
                                </p>
                            </div>
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('predict.history.show', $prediction->id) }}"
                                   class="text-secondary hover:text-primary" title="View Details">
                                    <i class="text-xl fas fa-info-circle"></i>
                                </a>

                                <form action="{{ route('predict.destroy', $prediction->id) }}" method="POST"
                                      onsubmit="return confirm('Delete this prediction?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-600" title="Delete Prediction">
                                        <i class="text-xl fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <p class="mt-4 text-lg text-darkNeutral">
                            Result: <span class="font-semibold">{{ $prediction->result_summary }}</span>
                        </p>

                        @if ($prediction->type === 'image' && $prediction->image_path)
                            <div class="mt-4">
                                <a href="{{ asset('storage/' . $prediction->image_path) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $prediction->image_path) }}" alt="Prediction Image"
                                         class="object-cover w-full h-40 transition duration-300 rounded hover:opacity-90">
                                </a>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
