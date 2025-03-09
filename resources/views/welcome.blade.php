<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="theme-warm">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-neutral text-darkAccent">
        @include('layouts.navigation')

      

        <!-- Page Content -->
        <main>





            <!-- Hero Section -->
            <section class="relative flex items-center px-6 py-16 bg-neutral text-darkNeutral lg:py-24">
                <div class="grid items-center grid-cols-1 gap-12 mx-auto max-w-7xl lg:grid-cols-2">
                    <!-- Left Side: Text & CTA -->
                    <div class="max-w-xl">
                        <i class="mb-4 text-6xl fas fa-lungs md:text-7xl text-accent"></i>
                        <h1 class="text-4xl font-extrabold leading-tight sm:text-5xl">
                            Elevate Your Lung Health<br />
                            <span class="text-primary">AI-Powered Wellness</span>
                        </h1>
                        <p class="mt-4 text-lg leading-relaxed sm:text-xl text-darkNeutral">
                            Our advanced lung health platform provides <strong>early detection</strong> and personalized
                            <strong>AI-driven insights</strong>, helping you breathe better and live healthier.
                        </p>
                        <!-- CTA Buttons -->
                        <div class="flex flex-wrap gap-4 mt-6">
                            <a href="#"
                                class="px-8 py-3 font-semibold text-white transition-all duration-300 rounded-lg shadow-md bg-primary hover:bg-opacity-80">
                                Get Started
                            </a>
                            <a href="#"
                                class="px-8 py-3 font-semibold transition-all duration-300 border rounded-lg shadow-md border-primary text-primary hover:bg-primary hover:text-white">
                                Learn More
                            </a>
                        </div>
                        <!-- Social Media Icons -->
                        <div class="flex gap-4 mt-6">
                            <a href="#" target="_blank"
                                class="flex items-center justify-center w-12 h-12 text-white transition-all duration-300 rounded-full shadow-md bg-secondary hover:bg-opacity-80">
                                <i class="fab fa-linkedin" style="font-size: 24px;"></i>
                            </a>
                            <a href="#" target="_blank"
                                class="flex items-center justify-center w-12 h-12 text-white transition-all duration-300 rounded-full shadow-md bg-secondary hover:bg-opacity-80">
                                <i class="fab fa-x-twitter" style="font-size: 24px;"></i>
                            </a>
                            <a href="#" target="_blank"
                                class="flex items-center justify-center w-12 h-12 text-white transition-all duration-300 rounded-full shadow-md bg-secondary hover:bg-opacity-80">
                                <i class="fab fa-instagram" style="font-size: 24px;"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Right Side: Image -->
                    <div class="justify-center hidden lg:flex">
                        <div class="relative">
                            <img src="https://source.unsplash.com/600x400/?lungs,healthcare,doctor"
                                alt="Lung Health Awareness" class="w-full max-w-md shadow-2xl rounded-xl lg:max-w-lg" />
                            <div class="absolute w-24 h-24 rounded-full opacity-50 -top-6 -left-6 bg-secondary"></div>
                            <div class="absolute w-16 h-16 rounded-full opacity-50 -bottom-6 -right-6 bg-accent"></div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- How It Works Section -->
            <section class="px-6 py-20 mx-auto text-center md:px-16 max-w-7xl">
                <h2 class="mb-10 text-5xl font-extrabold text-primary">How It Works</h2>
                <div class="grid grid-cols-1 gap-12 md:grid-cols-3">
                    <div class="p-10 transition-all shadow-lg bg-neutral rounded-2xl hover:shadow-xl">
                        <div class="mb-4 text-6xl text-accent">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-darkNeutral">Scan Upload</h3>
                        <p class="text-lg text-gray-600">Securely upload lung images for AI analysis.</p>
                    </div>
                    <div class="p-10 transition-all shadow-lg bg-neutral rounded-2xl hover:shadow-xl">
                        <div class="mb-4 text-6xl text-accent">
                            <i class="fas fa-robot"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-darkNeutral">AI Processing</h3>
                        <p class="text-lg text-gray-600">Advanced deep-learning models detect patterns.</p>
                    </div>
                    <div class="p-10 transition-all shadow-lg bg-neutral rounded-2xl hover:shadow-xl">
                        <div class="mb-4 text-6xl text-accent">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-darkNeutral">Instant Report</h3>
                        <p class="text-lg text-gray-600">Receive a detailed health report within seconds.</p>
                    </div>
                </div>
            </section>

            <!-- Features Section -->
            <section class="px-6 py-20 mx-auto text-center md:px-16 max-w-7xl">
                <h2 class="mb-12 text-5xl font-extrabold text-primary">Why Choose Pulmo-Vantage?</h2>
                <div class="grid grid-cols-1 gap-10 md:grid-cols-3">
                    <!-- Feature Card 1 -->
                    <div
                        class="p-10 overflow-hidden transition-all bg-white border border-gray-200 shadow-xl rounded-3xl hover:shadow-2xl">
                        <div class="mb-6 text-6xl text-accent">
                            <i class="fas fa-brain"></i>
                        </div>
                        <h3 class="mb-3 text-2xl font-bold text-darkNeutral">AI-Powered Precision</h3>
                        <p class="text-lg text-gray-600">Deep learning models trained on thousands of cases.</p>
                    </div>
                    <!-- Feature Card 2 -->
                    <div
                        class="p-10 overflow-hidden transition-all bg-white border border-gray-200 shadow-xl rounded-3xl hover:shadow-2xl">
                        <div class="mb-6 text-6xl text-accent">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <h3 class="mb-3 text-2xl font-bold text-darkNeutral">Doctor Verified</h3>
                        <p class="text-lg text-gray-600">Developed with leading pulmonologists &amp; experts.</p>
                    </div>
                    <!-- Feature Card 3 -->
                    <div
                        class="p-10 overflow-hidden transition-all bg-white border border-gray-200 shadow-xl rounded-3xl hover:shadow-2xl">
                        <div class="mb-6 text-6xl text-accent">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3 class="mb-3 text-2xl font-bold text-darkNeutral">Privacy &amp; Security</h3>
                        <p class="text-lg text-gray-600">HIPAA &amp; GDPR compliance with full encryption.</p>
                    </div>
                    <!-- Feature Card 4 -->
                    <div
                        class="p-10 overflow-hidden transition-all bg-white border border-gray-200 shadow-xl rounded-3xl hover:shadow-2xl">
                        <div class="mb-6 text-6xl text-accent">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3 class="mb-3 text-2xl font-bold text-darkNeutral">Real-Time Insights</h3>
                        <p class="text-lg text-gray-600">Instant health diagnostics and recommendations.</p>
                    </div>
                    <!-- Feature Card 5 -->
                    <div
                        class="p-10 overflow-hidden transition-all bg-white border border-gray-200 shadow-xl rounded-3xl hover:shadow-2xl">
                        <div class="mb-6 text-6xl text-accent">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="mb-3 text-2xl font-bold text-darkNeutral">Global Accessibility</h3>
                        <p class="text-lg text-gray-600">Available worldwide with multi-language support.</p>
                    </div>
                    <!-- Feature Card 6 -->
                    <div
                        class="p-10 overflow-hidden transition-all bg-white border border-gray-200 shadow-xl rounded-3xl hover:shadow-2xl">
                        <div class="mb-6 text-6xl text-accent">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h3 class="mb-3 text-2xl font-bold text-darkNeutral">Continuous Learning</h3>
                        <p class="text-lg text-gray-600">AI models constantly improve accuracy over time.</p>
                    </div>
                </div>
            </section>

            <!-- AI Insights Section -->
            <section class="px-6 py-20 mx-auto text-center text-white md:px-16 max-w-7xl bg-darkNeutral">
                <h2 class="mb-10 text-5xl font-extrabold">
                    Revolutionizing Lung Health with AI
                </h2>
                <p class="text-lg md:text-xl">
                    Our AI-powered diagnostic system is trained on millions of cases to ensure <strong>highly accurate
                        predictions</strong> and <strong>real-time insights</strong>.
                </p>
            </section>

            <!-- Why Trust Section -->
            <section class="px-6 py-20 mx-auto text-center md:px-16 max-w-7xl">
                <h2 class="mb-10 text-5xl font-extrabold text-primary">Why Trust Pulmo-Vantage?</h2>
                <div class="grid grid-cols-1 gap-10 md:grid-cols-3">
                    <!-- Trust Card 1 -->
                    <div
                        class="p-10 overflow-hidden transition-all bg-white border border-gray-200 shadow-xl rounded-3xl hover:shadow-2xl">
                        <div class="mb-6 text-6xl text-accent">
                            <i class="fas fa-user-shield"></i>
                        </div>
                        <h3 class="mb-3 text-2xl font-bold text-darkNeutral">HIPAA &amp; GDPR Compliant</h3>
                        <p class="text-lg text-gray-600">Your data is 100% secure and encrypted.</p>
                    </div>
                    <!-- Trust Card 2 -->
                    <div
                        class="p-10 overflow-hidden transition-all bg-white border border-gray-200 shadow-xl rounded-3xl hover:shadow-2xl">
                        <div class="mb-6 text-6xl text-accent">
                            <i class="fas fa-brain"></i>
                        </div>
                        <h3 class="mb-3 text-2xl font-bold text-darkNeutral">Cutting-Edge AI</h3>
                        <p class="text-lg text-gray-600">State-of-the-art deep learning models for accuracy.</p>
                    </div>
                    <!-- Trust Card 3 -->
                    <div
                        class="p-10 overflow-hidden transition-all bg-white border border-gray-200 shadow-xl rounded-3xl hover:shadow-2xl">
                        <div class="mb-6 text-6xl text-accent">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <h3 class="mb-3 text-2xl font-bold text-darkNeutral">Doctor Recommended</h3>
                        <p class="text-lg text-gray-600">Developed in collaboration with pulmonologists.</p>
                    </div>
                </div>
            </section>

            <!-- Testimonials Section -->
            <section class="px-6 py-20 mx-auto text-center md:px-16 max-w-7xl">
                <h2 class="mb-10 text-5xl font-extrabold text-primary">What Our Clients Say</h2>
                <div class="grid grid-cols-1 gap-10 md:grid-cols-3">
                    <div
                        class="p-10 transition-all bg-white border border-gray-200 shadow-xl rounded-3xl hover:shadow-2xl">
                        <p class="text-lg text-gray-600">
                            "Pulmo-Vantage has revolutionized our approach to lung health. Their AI insights are truly
                            remarkable."
                        </p>
                        <div class="mt-4">
                            <h4 class="text-xl font-bold text-darkNeutral">John Doe</h4>
                            <span class="text-gray-500">Healthcare CEO</span>
                        </div>
                    </div>
                    <div
                        class="p-10 transition-all bg-white border border-gray-200 shadow-xl rounded-3xl hover:shadow-2xl">
                        <p class="text-lg text-gray-600">
                            "The platform's precision and speed have helped us catch issues early. A game changer!"
                        </p>
                        <div class="mt-4">
                            <h4 class="text-xl font-bold text-darkNeutral">Jane Smith</h4>
                            <span class="text-gray-500">Pulmonologist</span>
                        </div>
                    </div>
                    <div
                        class="p-10 transition-all bg-white border border-gray-200 shadow-xl rounded-3xl hover:shadow-2xl">
                        <p class="text-lg text-gray-600">
                            "Excellent customer support and user-friendly interface. Highly recommended."
                        </p>
                        <div class="mt-4">
                            <h4 class="text-xl font-bold text-darkNeutral">Alex Johnson</h4>
                            <span class="text-gray-500">Medical Researcher</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Call-to-Action Section -->
            <section class="px-6 py-20 mx-auto text-center md:px-16 max-w-7xl bg-primary text-neutral">
                <h2 class="mb-6 text-5xl font-extrabold">Ready to Transform Your Lung Health?</h2>
                <p class="mb-8 text-lg">Join us today and experience the power of AI in healthcare.</p>
                <a href="/join"
                    class="px-8 py-3 font-semibold text-white transition-all duration-300 rounded-lg shadow-md bg-secondary hover:bg-opacity-90">
                    Get Started
                </a>
            </section>

        </main>
        @include('layouts.footer')
    </div>
    <!-- Theme Selector Script -->
    <script>
        function setTheme(themeClass) {
            // Remove any classes that start with "theme-"
            document.documentElement.classList.forEach(function(c) {
                if (c.startsWith('theme-')) {
                    document.documentElement.classList.remove(c);
                }
            });
            // If the theme is not default, add the new class.
            if (themeClass !== 'default') {
                document.documentElement.classList.add(themeClass);
            }
            // Save the preference in local storage.
            localStorage.setItem('theme', themeClass);
        }

        // On page load, check local storage for theme.
        document.addEventListener('DOMContentLoaded', function() {
            const theme = localStorage.getItem('theme') || 'default';
            setTheme(theme);
        });
    </script>
</body>

</html>
