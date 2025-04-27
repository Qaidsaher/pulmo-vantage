<x-app-layout>
    <div class="px-6 py-16 mx-auto space-y-12 max-w-7xl md:px-12">
        <!-- Header Section -->
     <header class="space-y-4 text-center">
        <h1 class="text-5xl font-extrabold text-primary">Our Services</h1>
        <p class="max-w-3xl mx-auto text-lg text-gray-600">
          Discover our innovative services designed for accurate lung health predictions and full transparency in AI.
        </p>
      </header>

      <!-- Services Grid -->
      <section class="grid gap-10 sm:grid-cols-2 lg:grid-cols-3">
        <!-- Service Card 1 -->
        <div class="overflow-hidden transition transform bg-white shadow-lg group rounded-3xl hover:-translate-y-2 hover:shadow-2xl">
          <div class="flex flex-col items-center p-8 space-y-4">
            <div class="p-4 rounded-full bg-primary/10 text-primary">
              <i class="text-3xl fas fa-cogs"></i>
            </div>
            <h2 class="text-xl font-semibold text-gray-800">AI Prediction Tool</h2>
            <p class="text-center text-gray-600">
              Utilize advanced AI algorithms to deliver early lung health diagnoses with real-time, data-driven insights.
            </p>
          </div>
          <div class="py-4 text-center text-white bg-gradient-to-r from-primary to-secondary">
            <a href="{{ route('predict.history') }}" class="inline-flex items-center space-x-2 font-semibold hover:underline">
              <span>Learn More</span><i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <!-- Service Card 2 -->
        <div class="overflow-hidden transition transform bg-white shadow-lg group rounded-3xl hover:-translate-y-2 hover:shadow-2xl">
          <div class="flex flex-col items-center p-8 space-y-4">
            <div class="p-4 rounded-full bg-primary/10 text-primary">
              <i class="text-3xl fas fa-chart-bar"></i>
            </div>
            <h2 class="text-xl font-semibold text-gray-800">Model Transparency</h2>
            <p class="text-center text-gray-600">
              Gain complete visibility into our AI models with detailed documentation, performance metrics, and regular updates.
            </p>
          </div>
          <div class="py-4 text-center text-white bg-gradient-to-r from-primary to-secondary">
            <a href="{{ route('predict.image') }}" class="inline-flex items-center space-x-2 font-semibold hover:underline">
              <span>Learn More</span><i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>

        <!-- Service Card 3 -->
        <div class="overflow-hidden transition transform bg-white shadow-lg group rounded-3xl hover:-translate-y-2 hover:shadow-2xl">
          <div class="flex flex-col items-center p-8 space-y-4">
            <div class="p-4 rounded-full bg-primary/10 text-primary">
              <i class="text-3xl fas fa-user-shield"></i>
            </div>
            <h2 class="text-xl font-semibold text-gray-800">Secure Data Handling</h2>
            <p class="text-center text-gray-600">
              We adhere to HIPAA & GDPR standards, ensuring your data is encrypted, secure, and used responsibly.
            </p>
          </div>
          <div class="py-4 text-center text-white bg-gradient-to-r from-primary to-secondary">
            <a href="{{ route('predict.manual') }}" class="inline-flex items-center space-x-2 font-semibold hover:underline">
              <span>Learn More</span><i class="fas fa-arrow-right"></i>
            </a>
          </div>
        </div>
      </section>
    </div>
</x-app-layout>
