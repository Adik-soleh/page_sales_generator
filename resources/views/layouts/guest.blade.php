<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SalesForge') }} — @yield('title', 'Welcome')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-warm">

            <div>
                <a href="/" class="flex items-center gap-2.5 mb-2">
                    <img src="{{ asset('logo.png') }}" alt="{{ config('app.name') }}" class="h-10 w-auto" />
                    <span class="font-heading text-xl font-bold text-dark">Sales<span class="text-dark-400">Forge</span></span>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-8 py-8 bg-white shadow-card overflow-hidden rounded-2xl border border-dark-100">
                {{ $slot }}
            </div>

            <p class="mt-6 text-sm text-dark-300">
                © {{ date('Y') }} SalesForge. All rights reserved.
            </p>
        </div>
    </body>
</html>
