<x-app-layout>
    <div class="px-6 py-16 mx-auto space-y-20 max-w-7xl md:px-12">
        <!-- Header -->
        <header class="text-center">
            <h1 class="text-5xl font-extrabold text-primary">Get In Touch</h1>
            <p class="max-w-3xl mx-auto mt-4 text-xl text-gray-700">
                Have questions or need assistance? We’re here to help! Reach out using the information below or send us
                a message.
            </p>
        </header>

        <!-- Contact Information -->
        <section class="grid grid-cols-1 gap-12 text-center md:grid-cols-3">
            <div class="p-8 transition duration-300 bg-white shadow-lg rounded-xl hover:shadow-2xl">
                <i class="mx-auto text-6xl fas fa-envelope text-accent"></i>
                <h3 class="mt-4 text-2xl font-bold text-darkNeutral">Email</h3>
                <p class="mt-3 text-lg text-gray-700">support@pulmovantage.com</p>
            </div>
            <div class="p-8 transition duration-300 bg-white shadow-lg rounded-xl hover:shadow-2xl">
                <i class="mx-auto text-6xl fas fa-phone text-accent"></i>
                <h3 class="mt-4 text-2xl font-bold text-darkNeutral">Phone</h3>
                <p class="mt-3 text-lg text-gray-700">+1 (123) 456-7890</p>
            </div>
            <div class="p-8 transition duration-300 bg-white shadow-lg rounded-xl hover:shadow-2xl">
                <i class="mx-auto text-6xl fas fa-map-marker-alt text-accent"></i>
                <h3 class="mt-4 text-2xl font-bold text-darkNeutral">Office</h3>
                <p class="mt-3 text-lg text-gray-700">123 AI Health St, San Francisco, CA</p>
            </div>
        </section>

        <!-- Contact Form -->
        <section class="p-8 mx-auto bg-white shadow-lg max-w-7xl rounded-xl">
            <h2 class="mb-6 text-3xl font-bold text-center text-primary">Send Us a Message</h2>
            <form method="POST" action="">
                @csrf
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div>
                        <label for="name" class="block mb-2 font-semibold text-darkNeutral">Full Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter your name"
                            class="w-full p-3 transition border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary"
                            required>
                    </div>
                    <div>
                        <label for="email" class="block mb-2 font-semibold text-darkNeutral">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email"
                            class="w-full p-3 transition border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary"
                            required>
                    </div>
                </div>
                <div class="mt-6">
                    <label for="message" class="block mb-2 font-semibold text-darkNeutral">Your Message</label>
                    <textarea id="message" name="message" rows="5" placeholder="Type your message..."
                        class="w-full p-3 transition border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-secondary"
                        required></textarea>
                </div>
                <div class="flex justify-end mt-6">
                    <button type="submit"
                        class="flex items-center justify-center px-4 py-3 mt-6 font-semibold transition-all duration-300 rounded-lg bg-primary text-neutral hover:bg-secondary">
                        <i class="mr-2 fas fa-paper-plane"></i>
                        Send Message
                    </button>
                </div>

            </form>
        </section>
    </div>
</x-app-layout>
