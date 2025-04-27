<x-app-layout>
    <div class="min-h-screen py-16 bg-neutral text-darkNeutral">
      <div class="container px-6 mx-auto space-y-16 md:px-12 lg:px-24">

        {{-- Header --}}
        <header class="max-w-2xl mx-auto space-y-4 text-center">
          <i class="fas fa-gavel text-secondary text-7xl"></i>
          <h1 class="text-4xl font-extrabold sm:text-5xl md:text-6xl text-primary">
            Terms of Service
          </h1>
          <p class="text-lg text-gray-700 sm:text-xl">
            By accessing and using Pulmo-Vantage, you agree to these terms and conditions.
          </p>
        </header>

        {{-- Terms Sections --}}
        <article class="space-y-12">

          {{-- Usage Terms --}}
          <section class="p-8 bg-white shadow-lg rounded-2xl lg:p-12">
            <div class="flex items-center mb-4">
              <i class="mr-3 text-2xl fas fa-clipboard-list text-primary"></i>
              <h2 class="text-2xl font-bold md:text-3xl text-darkNeutral">Usage Terms</h2>
            </div>
            <p class="mb-4 leading-relaxed text-gray-700">
              Pulmo-Vantage provides advanced lung health predictions powered by AI. By using our platform, you agree to:
            </p>
            <ul class="space-y-3">
              <li class="flex items-start">
                <i class="mt-1 mr-3 fas fa-check-circle text-accent"></i>
                <span>Use the service solely for obtaining health insights.</span>
              </li>
              <li class="flex items-start">
                <i class="mt-1 mr-3 fas fa-check-circle text-accent"></i>
                <span>Refrain from unauthorized access, data extraction, or tampering.</span>
              </li>
              <li class="flex items-start">
                <i class="mt-1 mr-3 fas fa-check-circle text-accent"></i>
                <span>Comply with all applicable laws when accessing our platform.</span>
              </li>
            </ul>
          </section>

          {{-- User Responsibilities --}}
          <section class="p-8 bg-white shadow-lg rounded-2xl lg:p-12">
            <div class="flex items-center mb-4">
              <i class="mr-3 text-2xl fas fa-user-shield text-primary"></i>
              <h2 class="text-2xl font-bold md:text-3xl text-darkNeutral">User Responsibilities</h2>
            </div>
            <p class="mb-4 leading-relaxed text-gray-700">
              As a user, you are responsible for the security and accuracy of your account:
            </p>
            <ul class="space-y-3">
              <li class="flex items-start">
                <i class="mt-1 mr-3 fas fa-check-circle text-accent"></i>
                <span>Providing accurate personal details.</span>
              </li>
              <li class="flex items-start">
                <i class="mt-1 mr-3 fas fa-check-circle text-accent"></i>
                <span>Keeping your credentials confidential.</span>
              </li>
              <li class="flex items-start">
                <i class="mt-1 mr-3 fas fa-check-circle text-accent"></i>
                <span>Reporting any unauthorized account activity immediately.</span>
              </li>
            </ul>
          </section>

          {{-- Limitations of Liability --}}
          <section class="p-8 bg-white shadow-lg rounded-2xl lg:p-12">
            <div class="flex items-center mb-4">
              <i class="mr-3 text-2xl fas fa-exclamation-triangle text-primary"></i>
              <h2 class="text-2xl font-bold md:text-3xl text-darkNeutral">Limitations of Liability</h2>
            </div>
            <p class="mb-4 leading-relaxed text-gray-700">
              Pulmo-Vantage and its affiliates are not liable for direct, indirect, incidental, or consequential damages
              arising from use of our platform. Our insights are informational and do not replace professional medical advice.
            </p>
            <ul class="space-y-3">
              <li class="flex items-start">
                <i class="mt-1 mr-3 fas fa-check-circle text-accent"></i>
                <span>We do not provide formal medical diagnoses.</span>
              </li>
              <li class="flex items-start">
                <i class="mt-1 mr-3 fas fa-check-circle text-accent"></i>
                <span>Decisions based on our insights are at your own risk.</span>
              </li>
              <li class="flex items-start">
                <i class="mt-1 mr-3 fas fa-check-circle text-accent"></i>
                <span>Always consult a qualified healthcare professional.</span>
              </li>
            </ul>
          </section>

          {{-- Modification of Terms --}}
          <section class="p-8 bg-white shadow-lg rounded-2xl lg:p-12">
            <div class="flex items-center mb-4">
              <i class="mr-3 text-2xl fas fa-sync-alt text-primary"></i>
              <h2 class="text-2xl font-bold md:text-3xl text-darkNeutral">Modification of Terms</h2>
            </div>
            <p class="leading-relaxed text-gray-700">
              We may update these Terms at any time. Major changes will be posted on our website or emailed to you. Continued use
              signifies acceptance of the revised terms.
            </p>
          </section>

          {{-- Governing Law & Dispute Resolution --}}
          <section class="p-8 bg-white shadow-lg rounded-2xl lg:p-12">
            <div class="flex items-center mb-4">
              <i class="mr-3 text-2xl fas fa-gavel text-primary"></i>
              <h2 class="text-2xl font-bold md:text-3xl text-darkNeutral">
                Governing Law & Dispute Resolution
              </h2>
            </div>
            <p class="leading-relaxed text-gray-700">
              These Terms are governed by the laws of our operating jurisdiction. Disputes will be resolved via binding arbitration
              or in a competent court as stipulated here.
            </p>
          </section>

          {{-- Closing Statement --}}
          <section class="p-8 leading-relaxed text-gray-700 bg-white shadow-lg rounded-2xl lg:p-12">
            <p>
              For questions or clarifications, please
              <a href="{{ route('contact') }}" class="font-semibold text-secondary hover:underline">contact us</a>.
            </p>
          </section>

        </article>
      </div>
    </div>
  </x-app-layout>
