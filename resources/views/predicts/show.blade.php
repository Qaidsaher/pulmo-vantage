<x-app-layout>
    <div class="max-w-5xl px-6 py-16 mx-auto space-y-8 md:px-12">
        <!-- Back Button -->
        <a href="{{ route('predict.history') }}"
            class="inline-flex items-center transition duration-300 text-primary hover:text-secondary">
            <i class="mr-2 fas fa-arrow-left"></i> Back to History
        </a>

        <!-- Prediction Detail Card -->
        <div class="p-10 bg-white shadow-2xl rounded-xl">
            <h1 class="mb-4 text-4xl font-bold text-primary">
                {{ ucfirst($prediction->type) }} Prediction Details
            </h1>
            <p class="mb-6 text-lg text-gray-700">
                Predicted on {{ $prediction->created_at->format('M d, Y') }} &mdash;
                Summary: <span class="font-semibold">{{ $prediction->result_summary }}</span>
            </p>

            @if ($prediction->type === 'image' && $prediction->image_path)
                <div class="mb-6">
                    <img src="{{ asset('storage/' . $prediction->image_path) }}" alt="Prediction Image"
                        class="object-cover w-full h-64 rounded">
                </div>
            @endif

            @if ($prediction->type === 'manual')
                <div class="mb-6">
                    <h2 class="mb-2 text-2xl font-bold text-darkNeutral">Input Details</h2>
                    <ul class="text-gray-700 list-disc list-inside">
                        <li>Name: {{ $prediction->manual_name }}</li>
                        <li>Surname: {{ $prediction->manual_surname }}</li>
                        <li>Age: {{ $prediction->manual_age }}</li>
                        <li>Smokes: {{ ucfirst($prediction->manual_smokes) }}</li>
                        <li>AreaQ: {{ $prediction->manual_areaq }}</li>
                        <li>Alkhol: {{ $prediction->manual_alkhol }}</li>
                    </ul>
                </div>
            @endif

            @if ($prediction->predictionResults->count())
                <div>
                    <h2 class="mb-2 text-2xl font-bold text-darkNeutral">Detailed Model Results</h2>
                    <div class="space-y-4">
                        @foreach ($prediction->predictionResults as $result)
                            <div class="p-4 border border-gray-200 rounded-lg shadow-sm">
                                <div class="flex items-center justify-between">
                                    <span class="font-semibold text-primary">{{ ucfirst($result->model_name) }}</span>
                                    @if ($result->confidence)
                                        <span class="text-sm text-gray-500">{{ round($result->confidence * 100) }}%
                                            Confidence</span>
                                    @endif
                                </div>
                                <p class="mt-2 text-gray-700">{{ $result->result_detail }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
