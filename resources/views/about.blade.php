<x-app-layout>
    <div class="px-6 py-10 mx-auto space-y-20 max-w-7xl md:px-12">
      <!-- Full-Width Hero with Gradient Overlay -->
      <section class="relative h-[40vh] flex items-center rounded-lg overflow-hidden shadow-xl" style="background-image: url('https://source.unsplash.com/1600x900/?healthcare,technology');">
        <div class="absolute inset-0 bg-gradient-to-r from-primary to-secondary opacity-80"></div>
        <div class="relative z-10 flex flex-col items-start justify-center w-full h-full px-6 md:px-12">
          <h1 class="text-5xl font-extrabold text-white md:text-6xl">
            About Pulmo-Vantage
          </h1>
          <p class="max-w-3xl mt-4 text-xl text-gray-200 md:text-2xl">
            Revolutionizing lung healthcare with AI-powered diagnostics and compassionate care.
          </p>
        </div>
      </section>

      <!-- Our Story: Asymmetric Split Layout -->
      <section class="grid items-center grid-cols-1 gap-8 md:grid-cols-12">
        <div class="h-full p-10 bg-white shadow-xl md:col-span-7 rounded-xl">
            <h2 class="mb-6 text-4xl font-bold text-primary">Our Journey</h2>

            <p class="mb-6 text-lg leading-relaxed text-gray-700">
              Founded in 2021, Pulmo-Vantage emerged from a passion for innovation and a commitment to better lung care.
              Our interdisciplinary team joined forces to harness AI for early lung disease detection, turning challenges
              into opportunities and setting new standards in healthcare.
            </p>

            <ul class="space-y-4">
              <li class="flex items-start">
                <i class="mt-1 mr-3 fas fa-check-circle text-accent"></i>
                <span><strong>2021:</strong> Company founded by pulmonologists & AI researchers.</span>
              </li>
              <li class="flex items-start">
                <i class="mt-1 mr-3 fas fa-rocket text-accent"></i>
                <span><strong>2022:</strong> Launched MVP with basic image-upload and AI analysis.</span>
              </li>
              <li class="flex items-start">
                <i class="mt-1 mr-3 fas fa-brain text-accent"></i>
                <span><strong>2023:</strong> Enhanced models—98%+ accuracy on key lung markers.</span>
              </li>
              <li class="flex items-start">
                <i class="mt-1 mr-3 fas fa-globe text-accent"></i>
                <span><strong>2024:</strong> Expanded globally, supporting multi-language care.</span>
              </li>
            </ul>
          </div>

        <div class="md:col-span-5">
          <img src="{{ asset('images/journal-cover.png') }}" alt="Our Journey" class="w-full shadow-2xl rounded-xl">
        </div>
      </section>

      <!-- Mission & Vision: Dual Card Layout -->
      <section class="grid grid-cols-1 gap-4 md:grid-cols-2">
        <div class="flex flex-col p-10 bg-white shadow-xl rounded-xl">
          <div class="flex justify-center md:justify-start">
            <i class="text-6xl fas fa-heartbeat text-secondary"></i>
          </div>
          <h2 class="mt-4 text-3xl font-bold text-center text-darkNeutral md:text-left">Our Mission</h2>
          <p class="mt-3 text-lg text-center text-gray-700 md:text-left">
            To empower lung healthcare by providing early, accurate diagnostics through advanced AI technology,
            ensuring better patient outcomes and streamlined care.
          </p>
        </div>
        <div class="flex flex-col p-10 bg-white shadow-xl rounded-xl">
          <div class="flex justify-center md:justify-start">
            <i class="text-6xl fas fa-lightbulb text-secondary"></i>
          </div>
          <h2 class="mt-4 text-3xl font-bold text-center text-darkNeutral md:text-left">Our Vision</h2>
          <p class="mt-3 text-lg text-center text-gray-700 md:text-left">
            To create a future where lung diseases are detected early, managed proactively, and treated effectively,
            making high-quality healthcare accessible to all.
          </p>
        </div>
      </section>

      <!-- Core Values: Modern Card Grid -->
      <section>
        <h2 class="mb-12 text-4xl font-bold text-center text-primary">Our Core Values</h2>
        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
          <div class="p-8 text-center bg-white shadow-xl rounded-xl">
            <i class="mb-4 text-5xl fas fa-hands-helping text-accent"></i>
            <h3 class="text-2xl font-semibold text-darkNeutral">Compassion</h3>
            <p class="mt-3 text-lg text-gray-600">
              Patient care and empathy guide our every decision.
            </p>
          </div>
          <div class="p-8 text-center bg-white shadow-xl rounded-xl">
            <i class="mb-4 text-5xl fas fa-microscope text-accent"></i>
            <h3 class="text-2xl font-semibold text-darkNeutral">Innovation</h3>
            <p class="mt-3 text-lg text-gray-600">
              We continuously push boundaries to improve our AI-driven diagnostics.
            </p>
          </div>
          <div class="p-8 text-center bg-white shadow-xl rounded-xl">
            <i class="mb-4 text-5xl fas fa-shield-alt text-accent"></i>
            <h3 class="text-2xl font-semibold text-darkNeutral">Integrity</h3>
            <p class="mt-3 text-lg text-gray-600">
              Upholding ethical practices and ensuring data privacy are our top priorities.
            </p>
          </div>
        </div>
      </section>

      <!-- Testimonials: Clean Split Cards -->
      <section>
        <h2 class="mb-12 text-4xl font-bold text-center text-primary">What People Say</h2>
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
          <div class="p-8 bg-white shadow-xl rounded-xl">
            <i class="block mb-4 text-3xl fas fa-quote-left text-secondary"></i>
            <p class="text-lg italic text-gray-700">
              "Pulmo-Vantage has set a new benchmark in lung diagnostics. Their blend of advanced technology and compassionate care is unparalleled."
            </p>
            <span class="block mt-4 font-semibold text-darkNeutral">Dr. Sarah Mitchell</span>
          </div>
          <div class="p-8 bg-white shadow-xl rounded-xl">
            <i class="block mb-4 text-3xl fas fa-quote-left text-secondary"></i>
            <p class="text-lg italic text-gray-700">
              "Thanks to Pulmo-Vantage, early detection became a reality for me. Their technology is a lifesaver."
            </p>
            <span class="block mt-4 font-semibold text-darkNeutral">John Doe</span>
          </div>
        </div>
      </section>

      <!-- Our Team: Refined Card Layout -->
      <section>
        <h2 class="mb-6 text-4xl font-bold text-center text-primary">Meet Our Team</h2>
        <p class="max-w-3xl mx-auto mb-12 text-lg text-center text-gray-700">
          Our diverse team of experts in AI, medicine, and technology is dedicated to advancing lung healthcare.
        </p>
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3">
          <!-- Team Member Card -->
          <div class="p-6 text-center transition transform bg-white shadow-lg rounded-xl hover:scale-105">
            <img src="https://source.unsplash.com/200x200/?doctor,woman" alt="Dr. Alice Smith" class="object-cover w-32 h-32 mx-auto rounded-full shadow-md">
            <h3 class="mt-6 text-2xl font-semibold text-darkNeutral">Dr. Alice Smith</h3>
            <p class="mt-2 text-lg text-secondary">Chief Medical Officer</p>
            <div class="mt-4">
              <a href="#" target="_blank" class="text-gray-500 transition hover:text-primary">
                <i class="fab fa-linkedin" style="font-size: 24px;"></i>
              </a>
            </div>
          </div>
          <!-- Repeat similar cards for other team members -->
          <div class="p-6 text-center transition transform bg-white shadow-lg rounded-xl hover:scale-105">
            <img src="https://source.unsplash.com/200x200/?developer,man" alt="John Doe" class="object-cover w-32 h-32 mx-auto rounded-full shadow-md">
            <h3 class="mt-6 text-2xl font-semibold text-darkNeutral">John Doe</h3>
            <p class="mt-2 text-lg text-secondary">Lead Developer</p>
            <div class="mt-4">
              <a href="#" target="_blank" class="text-gray-500 transition hover:text-primary">
                <i class="fab fa-linkedin" style="font-size: 24px;"></i>
              </a>
            </div>
          </div>
          <div class="p-6 text-center transition transform bg-white shadow-lg rounded-xl hover:scale-105">
            <img src="https://source.unsplash.com/200x200/?scientist,woman" alt="Jane Roe" class="object-cover w-32 h-32 mx-auto rounded-full shadow-md">
            <h3 class="mt-6 text-2xl font-semibold text-darkNeutral">Jane Roe</h3>
            <p class="mt-2 text-lg text-secondary">Data Scientist</p>
            <div class="mt-4">
              <a href="#" target="_blank" class="text-gray-500 transition hover:text-primary">
                <i class="fab fa-linkedin" style="font-size: 24px;"></i>
              </a>
            </div>
          </div>
          <!-- Additional team members... -->
        </div>
      </section>
    </div>
  </x-app-layout>
