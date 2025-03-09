{{-- <x-app-layout>
    <div class="px-6 py-16 mx-auto space-y-12 max-w-7xl md:px-12">
        <!-- Page Header -->
        <header class="text-center">
            <h1 class="text-5xl font-bold text-primary">Prediction History</h1>
            <p class="max-w-3xl mx-auto mt-4 text-lg text-gray-700">
                Review your previous predictions and see detailed results for each.
            </p>
        </header>

        @if ($predictions->isEmpty())
            <div class="text-center text-gray-600">
                <p>You have not made any predictions yet.</p>
            </div>
        @else
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($predictions as $prediction)
                    <div class="p-6 transition transform bg-white shadow-xl rounded-xl hover:scale-105 hover:shadow-2xl">
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-primary">
                                {{ ucfirst($prediction->type) }} Prediction
                            </span>
                            <span class="text-sm text-gray-500">
                                {{ $prediction->created_at->format('M d, Y') }}
                            </span>
                        </div>

                        <p class="mt-4 text-lg text-darkNeutral">
                            Result: <span class="font-semibold">{{ $prediction->result_summary }}</span>
                        </p>

                        @if ($prediction->type === 'image' && $prediction->image_path)
                            <div class="mt-4">
                                <img src="{{ asset('storage/' . $prediction->image_path) }}" alt="Prediction Image"
                                    class="object-cover w-full h-40 rounded">
                            </div>
                        @endif

                        @if ($prediction->predictionResults->count())
                            <div class="mt-4 space-y-2">
                                <h3 class="text-lg font-bold text-primary">Model Details:</h3>
                                @foreach ($prediction->predictionResults as $result)
                                    <div class="flex items-center justify-between text-sm">
                                        <span class="font-medium">{{ $result->model_name }}</span>
                                        <span class="text-gray-600">{{ $result->result_detail }}</span>
                                        @if ($result->confidence)
                                            <span class="text-gray-500">{{ round($result->confidence * 100) }}%</span>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <div class="mt-6 text-right">
                            <a href="{{ route('predict.history.show', $prediction->id) }}"
                                class="inline-flex items-center px-4 py-2 text-white transition rounded-lg shadow bg-secondary hover:bg-primary">
                                <i class="mx-1 fas fa-info-circle"></i>

                                    View Details

                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout> --}}
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
                    <a href="{{ route('predict.history.show', $prediction->id) }}"
                        class="block p-6 transition transform bg-white shadow-xl rounded-xl hover:scale-105 hover:shadow-2xl">
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-primary">
                                {{ ucfirst($prediction->type) }} Prediction
                            </span>
                            <span class="text-sm text-gray-500">
                                {{ $prediction->created_at->format('M d, Y') }}
                            </span>
                        </div>
                        <p class="mt-4 text-lg text-darkNeutral">
                            Result: <span class="font-semibold">{{ $prediction->result_summary }}</span>
                        </p>
                        @if ($prediction->type === 'image' && $prediction->image_path)
                            <div class="mt-4">
                                <img src="{{ asset('storage/' . $prediction->image_path) }}" alt="Prediction Image"
                                    class="object-cover w-full h-40 rounded">
                            </div>
                        @endif
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
