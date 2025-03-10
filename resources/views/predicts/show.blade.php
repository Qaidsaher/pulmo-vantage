<x-app-layout>
    <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <div class="mb-8">
            <a href="{{ route('predict.history') }}"
               class="flex items-center transition duration-300 text-primary hover:text-secondary">
                <i class="mr-2 fas fa-arrow-left"></i> Back to History
            </a>
        </div>

        <!-- Prediction Detail Card -->
        <div class="p-8 bg-white rounded-lg shadow-xl">
            <h1 class="mb-4 text-4xl font-bold text-primary">
                {{ ucfirst($prediction->type) }} Prediction Details
            </h1>
            <div class="mb-6 text-sm text-gray-600">
                <span>Predicted on {{ $prediction->created_at->format('M d, Y') }}</span>
                &mdash;
                <span>Summary: <strong class="text-gray-800">{{ $prediction->result_summary }}</strong></span>
            </div>

            @if ($prediction->type === 'image' && $prediction->image_path)
                <div class="mb-6">
                    <a href="{{ asset('storage/' . $prediction->image_path) }}" target="_blank">
                        <img src="{{ asset('storage/' . $prediction->image_path) }}" alt="Prediction Image"
                             class="object-cover w-full transition duration-300 rounded-md h-80 hover:opacity-90">
                    </a>
                </div>
            @endif

            @if ($prediction->type === 'manual')
                <div class="mb-6">
                    <h2 class="mb-3 text-2xl font-semibold text-primary">Input Details</h2>
                    <ul class="space-y-1 text-gray-700 list-disc list-inside">
                        <li><span class="font-medium">Name:</span> {{ $prediction->manual_name }}</li>
                        <li><span class="font-medium">Surname:</span> {{ $prediction->manual_surname }}</li>
                        <li><span class="font-medium">Age:</span> {{ $prediction->manual_age }}</li>
                        <li><span class="font-medium">Smokes:</span> {{ ucfirst($prediction->manual_smokes) }}</li>
                        <li><span class="font-medium">AreaQ:</span> {{ $prediction->manual_areaq }}</li>
                        <li><span class="font-medium">Alcohol:</span> {{ $prediction->manual_alkhol }}</li>
                    </ul>
                </div>
            @endif

            @if ($prediction->predictionResults->count())
                <div class="mt-8">
                    <h2 class="mb-4 text-2xl font-semibold text-primary">Detailed Model Results</h2>
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        @foreach ($prediction->predictionResults as $result)
                            <div class="p-6 border border-gray-200 rounded-lg shadow-md bg-gray-50">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-lg font-semibold text-primary">
                                        {{ ucfirst($result->model_name) }}
                                    </span>
                                    @if ($result->confidence)
                                        <span class="text-sm text-gray-500">
                                            {{ round($result->confidence * 100) }}% Confidence
                                        </span>
                                    @endif
                                </div>
                                <p class="mb-4 text-gray-700">{{ $result->result_detail }}</p>
                                @if ($result->image_path)
                                    <a href="{{ Storage::url($result->image_path) }}" target="_blank">
                                        <img src="{{ Storage::url($result->image_path) }}"
                                             alt="Grad-CAM for {{ $result->model_name }}"
                                             class="object-cover w-full h-48 transition duration-300 rounded hover:opacity-90">
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
