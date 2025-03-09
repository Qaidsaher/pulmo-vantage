<x-app-layout>
    <div class="min-h-screen px-6 py-16 bg-neutral text-darkNeutral md:px-12">
      <!-- Header -->
      <header class="mb-16 text-center">
        <i class="mx-auto fas fa-question-circle text-7xl text-accent"></i>
        <h1 class="mt-4 text-5xl font-extrabold text-primary">Help Center</h1>
        <p class="max-w-3xl mx-auto mt-4 text-lg text-gray-700">
          Find answers to your questions, troubleshoot issues, and get support from our team.
        </p>
      </header>

      <!-- FAQ Section -->
      @php
        $faqs = [
          [
            'question' => 'How do I schedule a prediction?',
            'answer' => 'Simply register and navigate to the prediction tool in your dashboard.'
          ],
          [
            'question' => 'Is my data secure?',
            'answer' => 'Yes, we use industry-standard encryption, Firebase authentication, and secure API calls to protect your data.'
          ],
          [
            'question' => 'What AI models do you use?',
            'answer' => 'We leverage deep-learning algorithms trained on extensive lung health datasets to ensure high accuracy in predictions.'
          ],
          [
            'question' => 'Can I use Pulmo-Vantage for free?',
            'answer' => 'We offer both free and premium plans. The free version provides limited predictions, while premium users get advanced analytics.'
          ],
          [
            'question' => 'How can I contact customer support?',
            'answer' => 'You can reach us via email, live chat, or phone. Our support team is available 24/7.'
          ],
        ];
      @endphp

      <section class="max-w-4xl mx-auto">
        <h2 class="mb-8 text-3xl font-bold text-center text-primary">Frequently Asked Questions</h2>
        <div class="space-y-6">
          @foreach ($faqs as $index => $faq)
            <div x-data="{ open: false }" @click="open = !open" class="p-6 transition-all duration-300 bg-white shadow-lg cursor-pointer rounded-xl hover:shadow-2xl">
              <h2 class="flex items-center justify-between text-xl font-semibold text-primary">
                {{ $faq['question'] }}
                <span class="text-2xl text-accent" x-text="open ? '−' : '+'"></span>
              </h2>
              <div x-show="open" x-collapse class="mt-3 text-darkNeutral">
                {{ $faq['answer'] }}
              </div>
            </div>
          @endforeach
        </div>
      </section>

      <!-- Contact & Support Section -->
      @php
        $contacts = [
          [
            'icon'  => 'fas fa-phone-alt',
            'title' => 'Call Support',
            'desc'  => 'Reach us at +1 (800) 123-4567'
          ],
          [
            'icon'  => 'fas fa-envelope',
            'title' => 'Email Us',
            'desc'  => 'support@pulmovantage.com'
          ],
          [
            'icon'  => 'fas fa-headset',
            'title' => 'Live Chat',
            'desc'  => 'Chat with us anytime, anywhere'
          ],
        ];
      @endphp

      <section class="max-w-6xl mx-auto mt-20 text-center">
        <h2 class="text-4xl font-extrabold text-primary">Need More Help?</h2>
        <p class="max-w-3xl mx-auto mt-4 text-lg text-gray-700">
          If you can’t find what you’re looking for, our support team is available 24/7 to assist you.
        </p>
        <div class="grid grid-cols-1 gap-12 mt-12 md:grid-cols-3">
          @foreach ($contacts as $contact)
            <div class="p-8 transition-all duration-300 bg-white shadow-lg rounded-xl hover:shadow-2xl">
              <i class="{{ $contact['icon'] }} text-6xl text-accent mx-auto"></i>
              <h3 class="mt-4 text-2xl font-bold text-darkNeutral">{{ $contact['title'] }}</h3>
              <p class="mt-3 text-lg text-gray-700">{{ $contact['desc'] }}</p>
            </div>
          @endforeach
        </div>
      </section>
    </div>

    <!-- AlpineJS for interactivity -->
  </x-app-layout>
