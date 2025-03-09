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
