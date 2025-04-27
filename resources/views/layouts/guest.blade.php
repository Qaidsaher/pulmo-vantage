<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Basic Meta Tags -->
<title>Pulmo-Vantage | AI-Powered Lung Health & Early Detection</title>
<meta name="description" content="Pulmo-Vantage revolutionizes lung health with AI. Early detection, real-time insights, HIPAA & GDPR compliance. Breathe better and live healthier.">
<meta name="keywords" content="lung health, AI lung analysis, early detection, pulmonary wellness, AI diagnosis, lung scan AI, HIPAA compliant health platform, pulmonary AI insights, lung disease detection, Pulmo-Vantage">
<meta name="author" content="Pulmo-Vantage Team">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:title" content="Pulmo-Vantage | AI-Powered Lung Health & Early Detection">
<meta property="og:description" content="Discover how AI can enhance your lung health. Upload your scans, get instant reports, and trust AI-powered, doctor-verified insights.">
<meta property="og:image" content="{{ asset('images/lung-awareness-annotated.png') }}">
<meta property="og:url" content="https://yourwebsite.com">
<meta property="og:site_name" content="Pulmo-Vantage">

<!-- Twitter Meta Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Pulmo-Vantage | AI-Powered Lung Health & Early Detection">
<meta name="twitter:description" content="Early lung health detection powered by AI. Instant insights, full data privacy, and doctor-verified accuracy.">
<meta name="twitter:image" content="{{ asset('images/lung-awareness-annotated.png') }}">
<meta name="twitter:site" content="@yourtwitterhandle">

<!-- Favicon -->
<link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

  <!-- Fonts & Icons -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- Tailwind & Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900">

  <div class="flex flex-col min-h-screen md:flex-row">

    {{-- Image Carousel Panel --}}
    <aside
      x-data="{
        images: ['{{ asset('images/auth-bg1.png') }}', '{{ asset('images/auth-bg2.png') }}', '{{ asset('images/auth-bg3.png') }}', '{{ asset('images/auth-bg4.png') }}'],
        captions: [
          { title: 'Pulmo-Vantage', text: 'AI-driven lung healthcare at your fingertips.' },
          { title: 'Advanced Analytics',       text: 'Visualize your health data in real time.' },
          { title: 'Personalized Insights',    text: 'Tailored recommendations for your well-being.' },
          { title: 'Trusted Care',             text: 'Collaborate with medical experts seamlessly.' }
        ],
        idx: 0
      }"
      x-init="setInterval(() => { idx = (idx + 1) % images.length }, 5000)"
      class="relative hidden w-full h-64 overflow-hidden md:flex md:w-1/2 md:h-auto"
    >
      <template x-for="(src, i) in images" :key="i">
        <div
          class="absolute inset-0 transition-opacity duration-1000"
          :class="idx === i ? 'opacity-100' : 'opacity-0'"
        >
          <img :src="src" alt="Carousel slide" class="object-cover w-full h-full" />
        </div>
      </template>

      {{-- Overlay & Dynamic Text --}}
      <div class="absolute inset-0 bg-black bg-opacity-50"></div>
      <div class="relative z-10 flex flex-col items-center justify-center w-full h-full px-6 space-y-2 text-center ">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-center text-white md:text-4xl" x-text="captions[idx].title"></h2>
            <p class="text-lg text-center text-white/80" x-text="captions[idx].text"></p>
        </div>
      </div>
    </aside>

    {{-- Form Panel --}}
    <main class="flex items-center justify-center w-full h-screen p-6 md:w-1/2">
      <div class="w-full max-w-md p-8 space-y-6 bg-white shadow-xl rounded-2xl">

        {{-- Logo & Title --}}
        <div class="text-center">
          <x-application-logo class="w-16 h-16 mx-auto text-primary" />
          <h3 class="mt-4 text-2xl font-bold text-gray-800">{{ __('Welcome Back') }}</h3>
          <p class="text-gray-600">{{ __('Sign in to continue') }}</p>
        </div>

        {{-- Slot for form --}}
        {{ $slot }}

        {{-- Footer Links --}}
        <div class="text-sm text-center text-gray-500">
          <p>
            {{ __('Don\'t have an account?') }}
            <a href="{{ route('register') }}" class="font-semibold text-primary hover:underline">
              {{ __('Register') }}
            </a>
          </p>
          @if (Route::has('password.request'))
            <p class="mt-2">
              <a href="{{ route('password.request') }}" class="text-gray-600 hover:underline">
                {{ __('Forgot your password?') }}
              </a>
            </p>
          @endif
        </div>

      </div>
    </main>

  </div>

  <script>
    function setTheme(themeClass) {
      document.documentElement.classList.forEach(c => {
        if (c.startsWith('theme-')) document.documentElement.classList.remove(c);
      });
      if (themeClass !== 'default') document.documentElement.classList.add(themeClass);
      localStorage.setItem('theme', themeClass);
    }
    document.addEventListener('DOMContentLoaded', () => {
      setTheme(localStorage.getItem('theme') || 'theme-green');
    });
  </script>
</body>
</html>
