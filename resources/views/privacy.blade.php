<x-app-layout>
    <div class="min-h-screen py-16 bg-neutral text-darkNeutral">
      <div class="container px-6 mx-auto space-y-16 md:px-12 lg:px-24">

        {{-- Header --}}
        <header class="max-w-2xl mx-auto space-y-4 text-center">
          <i class="fas fa-lock text-secondary text-7xl"></i>
          <h1 class="text-4xl font-extrabold sm:text-5xl md:text-6xl text-primary">
            Privacy Policy
          </h1>
          <p class="text-lg text-gray-700 sm:text-xl">
            Your privacy is our priority. This policy explains how we collect, use, and protect your personal information.
          </p>
        </header>

        {{-- Policy Sections --}}
        <article class="space-y-12">

          {{-- Our Commitment --}}
          <section class="p-8 bg-white shadow-lg rounded-2xl lg:p-12">
            <div class="flex items-center mb-4">
              <i class="mr-3 text-2xl fas fa-user-shield text-primary"></i>
              <h2 class="text-2xl font-bold md:text-3xl text-darkNeutral">Our Commitment</h2>
            </div>
            <p class="leading-relaxed text-gray-700">
              At <span class="font-semibold text-darkNeutral">Pulmo-Vantage</span>, we adhere to the highest privacy
              standards to keep your data secure, maintaining full transparency and accountability.
            </p>
          </section>

          {{-- Data Collection --}}
          <section class="p-8 bg-white shadow-lg rounded-2xl lg:p-12">
            <div class="flex items-center mb-4">
              <i class="mr-3 text-2xl fas fa-database text-primary"></i>
              <h2 class="text-2xl font-bold md:text-3xl text-darkNeutral">Data Collection</h2>
            </div>
            <p class="mb-4 leading-relaxed text-gray-700">
              We only gather the information necessary to deliver and improve our services, including:
            </p>
            <ul class="space-y-3">
              <li class="flex items-start">
                <i class="mt-1 mr-3 fas fa-check-circle text-accent"></i>
                <span>Name, email address, and contact details</span>
              </li>
              <li class="flex items-start">
                <i class="mt-1 mr-3 fas fa-check-circle text-accent"></i>
                <span>Health-related inputs for AI analysis</span>
              </li>
              <li class="flex items-start">
                <i class="mt-1 mr-3 fas fa-check-circle text-accent"></i>
                <span>Usage data to optimize performance</span>
              </li>
              <li class="flex items-start">
                <i class="mt-1 mr-3 fas fa-check-circle text-accent"></i>
                <span>Technical details such as IP address and browser type</span>
              </li>
            </ul>
          </section>

          {{-- How We Use Your Data --}}
          <section class="p-8 bg-white shadow-lg rounded-2xl lg:p-12">
            <div class="flex items-center mb-4">
              <i class="mr-3 text-2xl fas fa-info-circle text-primary"></i>
              <h2 class="text-2xl font-bold md:text-3xl text-darkNeutral">How We Use Your Data</h2>
            </div>
            <p class="mb-4 leading-relaxed text-gray-700">
              We leverage your information to:
            </p>
            <ul class="space-y-3">
              <li class="flex items-start">
                <i class="mt-1 mr-3 fas fa-check-circle text-accent"></i>
                <span>Personalize your experience and deliver tailored insights</span>
              </li>
              <li class="flex items-start">
                <i class="mt-1 mr-3 fas fa-check-circle text-accent"></i>
                <span>Enhance the accuracy of our AI-driven diagnostics</span>
              </li>
              <li class="flex items-start">
                <i class="mt-1 mr-3 fas fa-check-circle text-accent"></i>
                <span>Improve platform performance and functionality</span>
              </li>
              <li class="flex items-start">
                <i class="mt-1 mr-3 fas fa-check-circle text-accent"></i>
                <span>Notify you of important updates and policy changes</span>
              </li>
            </ul>
          </section>

          {{-- Security & Protection --}}
          <section class="p-8 bg-white shadow-lg rounded-2xl lg:p-12">
            <div class="flex items-center mb-4">
              <i class="mr-3 text-2xl fas fa-shield-alt text-primary"></i>
              <h2 class="text-2xl font-bold md:text-3xl text-darkNeutral">Security &amp; Protection</h2>
            </div>
            <p class="mb-4 leading-relaxed text-gray-700">
              We employ advanced security protocols to safeguard your data:
            </p>
            <ul class="space-y-3">
              <li class="flex items-start">
                <i class="mt-1 mr-3 fas fa-lock text-accent"></i>
                <span>End-to-end encryption for sensitive information</span>
              </li>
              <li class="flex items-start">
                <i class="mt-1 mr-3 fas fa-user-lock text-accent"></i>
                <span>Secure authentication, including multi-factor options</span>
              </li>
              <li class="flex items-start">
                <i class="mt-1 mr-3 fas fa-clipboard-check text-accent"></i>
                <span>Regular security audits and compliance checks</span>
              </li>
              <li class="flex items-start">
                <i class="mt-1 mr-3 fas fa-bell-slash text-accent"></i>
                <span>Continuous monitoring to prevent and detect threats</span>
              </li>
            </ul>
          </section>

          {{-- Your Rights --}}
          <section class="p-8 bg-white shadow-lg rounded-2xl lg:p-12">
            <div class="flex items-center mb-4">
              <i class="mr-3 text-2xl fas fa-gavel text-primary"></i>
              <h2 class="text-2xl font-bold md:text-3xl text-darkNeutral">Your Rights</h2>
            </div>
            <p class="mb-4 leading-relaxed text-gray-700">
              You have the right to:
            </p>
            <ul class="space-y-3">
              <li class="flex items-start">
                <i class="mt-1 mr-3 fas fa-user-edit text-accent"></i>
                <span>Access and update your personal information</span>
              </li>
              <li class="flex items-start">
                <i class="mt-1 mr-3 fas fa-trash-alt text-accent"></i>
                <span>Request deletion of your data</span>
              </li>
              <li class="flex items-start">
                <i class="mt-1 mr-3 fas fa-ban text-accent"></i>
                <span>Opt out of data sharing and marketing</span>
              </li>
              <li class="flex items-start">
                <i class="mt-1 mr-3 fas fa-file-download text-accent"></i>
                <span>Receive your data in a portable format</span>
              </li>
            </ul>
          </section>

          {{-- Cookies & Tracking --}}
          <section class="p-8 bg-white shadow-lg rounded-2xl lg:p-12">
            <div class="flex items-center mb-4">
              <i class="mr-3 text-2xl fas fa-cookie-bite text-primary"></i>
              <h2 class="text-2xl font-bold md:text-3xl text-darkNeutral">Cookies &amp; Tracking</h2>
            </div>
            <p class="leading-relaxed text-gray-700">
              We use cookies and similar technologies to enhance your experience, analyze site traffic, and personalize
              content. You can manage these settings in your browser at any time.
            </p>
          </section>

          {{-- Policy Updates --}}
          <section class="p-8 bg-white shadow-lg rounded-2xl lg:p-12">
            <div class="flex items-center mb-4">
              <i class="mr-3 text-2xl fas fa-sync-alt text-primary"></i>
              <h2 class="text-2xl font-bold md:text-3xl text-darkNeutral">Policy Updates</h2>
            </div>
            <p class="leading-relaxed text-gray-700">
              We may revise this policy periodically. Please revisit this page to stay informed about how we protect
              your information.
            </p>
          </section>

          {{-- Closing Statement --}}
          <section class="p-8 leading-relaxed text-gray-700 bg-white shadow-lg rounded-2xl lg:p-12">
            <p>
              If you have any questions or concerns about our practices, please
              <a href="{{ route('contact') }}" class="font-semibold text-secondary hover:underline">
                contact us
              </a>
              for assistance.
            </p>
          </section>

        </article>
      </div>
    </div>
  </x-app-layout>
