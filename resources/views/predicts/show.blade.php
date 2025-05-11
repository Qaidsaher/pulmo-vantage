<x-app-layout>
    <div class="px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="my-2 text-sm text-gray-500">
            <a href="{{ route('predict.history') }}" class="inline-flex items-center transition hover:text-primary">
                <i class="mr-2 fas fa-arrow-left"></i>Back to History
            </a>
        </nav>

        <!-- Detail Card -->
        <div class="overflow-hidden bg-white rounded-md shadow-2xl">
            <!-- Header -->
            <div class="p-8 bg-gradient-to-r from-primary to-secondary">
                <h1 class="text-4xl font-extrabold text-white">
                    {{ ucfirst($prediction->type) }} Prediction Details
                </h1>
                <p class="mt-1 text-sm text-white/80">
                    Predicted on {{ $prediction->created_at->format('M d, Y') }} &mdash;
                    Summary: <span class="font-semibold">{{ $prediction->result_summary }}</span>
                </p>
            </div>

            <!-- Body -->
            <div class="grid grid-cols-1 gap-8 p-8 lg:grid-cols-3 lg:gap-12">
                <!-- Image or Inputs -->
                <div class="col-span-1 space-y-6 lg:col-span-2">
                    @if ($prediction->type === 'image' && $prediction->image_path)
                        <div class="overflow-hidden rounded-lg">
                            <img src="{{ asset('storage/' . $prediction->image_path) }}" alt="Prediction Image"
                                class="object-cover w-full transition h-80 hover:opacity-90">
                        </div>
                    @else
                        <div class="p-6 space-y-4 rounded-lg bg-gray-50">
                            <h2 class="text-2xl font-semibold text-darkNeutral">Input Details</h2>
                            <ul class="space-y-1 text-gray-700 list-disc list-inside">
                                <li><strong>Name:</strong> {{ $prediction->manual_name }}</li>
                                <li><strong>Surname:</strong> {{ $prediction->manual_surname }}</li>
                                <li><strong>Age:</strong> {{ $prediction->manual_age }}</li>
                                <li><strong>Smokes:</strong> {{ ucfirst($prediction->manual_smokes) }}</li>
                                <li><strong>AreaQ:</strong> {{ $prediction->manual_areaq }}</li>
                                <li><strong>Alcohol:</strong> {{ $prediction->manual_alkhol }}</li>
                            </ul>
                        </div>
                    @endif

                    @if ($prediction->predictionResults->count())
                        <div class="space-y-6">
                            <h2 class="text-2xl font-semibold text-darkNeutral">Detailed Model Results</h2>
                            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                                @foreach ($prediction->predictionResults as $result)
                                    <div
                                        class="p-6 transition bg-white border border-gray-200 shadow rounded-xl hover:shadow-lg">
                                        <div class="flex items-center justify-between mb-4">
                                            <span
                                                class="text-lg font-semibold text-primary">{{ ucfirst($result->model_name) }}</span>
                                            @if ($result->confidence)
                                                <span
                                                    class="text-sm text-gray-500">{{ round($result->confidence * 100) }}%
                                                    Confidence</span>
                                            @endif
                                        </div>
                                        <p class="mb-4 text-gray-700">{{ $result->result_detail }}</p>
                                        @if ($result->image_path)
                                            <a href="{{ Storage::url($result->image_path) }}" target="_blank"
                                                class="block overflow-hidden rounded-lg">
                                                <img src="{{ Storage::url($result->image_path) }}"
                                                    alt="Grad-CAM for {{ $result->model_name }}"
                                                    class="object-cover w-full h-48 transition hover:opacity-90">
                                            </a>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Actions Sidebar -->
                <div class="col-span-1 space-y-4">
                    <form action="{{ route('predict.destroy', $prediction->id) }}" method="POST"
                        onsubmit="return confirm('Delete this prediction?');">
                        @csrf @method('DELETE')
                        <button type="submit"
                            class="block w-full px-4 py-2 font-semibold text-center text-white transition bg-red-500 rounded-lg hover:bg-red-600"
                            title="Delete Prediction">
                            <i class="mr-2 fas fa-trash-alt"></i>Delete </button>
                    </form>
            
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
