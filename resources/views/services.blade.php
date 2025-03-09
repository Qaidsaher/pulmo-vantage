<x-app-layout>
    <div class="min-h-screen px-6 py-16 bg-neutral text-darkNeutral md:px-12">
        <!-- Page Header -->
        <header class="mb-16 text-center">
            <h1 class="text-5xl font-extrabold text-primary">Our Services</h1>
            <p class="max-w-3xl mx-auto mt-4 text-xl text-gray-700">
                Discover our innovative services designed to provide accurate predictions and ensure complete
                transparency in our AI models.
            </p>
        </header>

        <!-- Services Grid -->
        <section class="grid max-w-5xl grid-cols-1 gap-12 mx-auto md:grid-cols-2">
            <!-- Prediction Tool Card -->
            <div class="p-8 transition transform bg-white shadow-xl rounded-xl hover:scale-105 hover:shadow-2xl">
                <div class="flex items-center justify-center mb-4">
                    <i class="text-5xl fas fa-cogs text-accent"></i>
                </div>
                <h2 class="mb-4 text-3xl font-bold text-center text-primary">Prediction Tool</h2>
                <div class="text-lg text-gray-700">
                    <p>
                        Our Prediction Tool harnesses advanced AI algorithms to deliver early diagnoses and accurate
                        predictions for lung health. Benefit from real-time insights and data-driven decisions.
                    </p>
                    <p class="mt-4">
                        Designed with precision, our tool helps clinicians and patients stay one step ahead by detecting
                        potential issues before they escalate.
                    </p>
                </div>
            </div>

            <!-- Model Transparency Card -->
            <div class="p-8 transition transform bg-white shadow-xl rounded-xl hover:scale-105 hover:shadow-2xl">
                <div class="flex items-center justify-center mb-4">
                    <i class="text-5xl fas fa-chart-bar text-accent"></i>
                </div>
                <h2 class="mb-4 text-3xl font-bold text-center text-primary">Model Transparency</h2>
                <div class="text-lg text-gray-700">
                    <p>
                        We prioritize complete transparency in our AI models by providing clear documentation,
                        performance metrics, and regular updates. Trust is built on understanding, and our model
                        transparency ensures you know exactly how predictions are made.
                    </p>
                    <p class="mt-4">
                        Our commitment to transparency empowers healthcare professionals and users alike to make
                        informed decisions with confidence.
                    </p>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>
