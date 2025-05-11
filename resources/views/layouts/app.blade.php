<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="theme-warm">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Basic Meta Tags -->
    <title>Pulmo-Vantage | AI-Powered Lung Health & Early Detection</title>
    <meta name="description"
        content="Pulmo-Vantage revolutionizes lung health with AI. Early detection, real-time insights, HIPAA & GDPR compliance. Breathe better and live healthier.">
    <meta name="keywords"
        content="lung health, AI lung analysis, early detection, pulmonary wellness, AI diagnosis, lung scan AI, HIPAA compliant health platform, pulmonary AI insights, lung disease detection, Pulmo-Vantage">
    <meta name="author" content="Pulmo-Vantage Team">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="Pulmo-Vantage | AI-Powered Lung Health & Early Detection">
    <meta property="og:description"
        content="Discover how AI can enhance your lung health. Upload your scans, get instant reports, and trust AI-powered, doctor-verified insights.">
    <meta property="og:image" content="{{ asset('images/lung-awareness-annotated.png') }}">
    <meta property="og:url" content="https://yourwebsite.com">
    <meta property="og:site_name" content="Pulmo-Vantage">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Pulmo-Vantage | AI-Powered Lung Health & Early Detection">
    <meta name="twitter:description"
        content="Early lung health detection powered by AI. Instant insights, full data privacy, and doctor-verified accuracy.">
    <meta name="twitter:image" content="{{ asset('images/lung-awareness-annotated.png') }}">
    <meta name="twitter:site" content="@yourtwitterhandle">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-neutral text-darkAccent">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
        @include('layouts.footer')
    </div>
    @livewireScripts
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
            const theme = localStorage.getItem('theme') || 'theme-green';
            setTheme(theme);
        });
    </script>
</body>

</html>
