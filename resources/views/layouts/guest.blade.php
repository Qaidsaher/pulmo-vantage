<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >

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

<body class="font-sans antialiased text-gray-900">
    <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">
        <div>
            <a href="/">
                <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
            </a>
        </div>

        <div class="w-full px-6 py-4 mt-6 overflow-hidden bg-white shadow-md sm:max-w-md sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
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
