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
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-warm relative overflow-hidden">
            <!-- Decorative background elements -->
            <div class="absolute top-0 right-0 w-96 h-96 bg-gradient-to-bl from-primary-200/30 to-transparent rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
            <div class="absolute bottom-0 left-0 w-80 h-80 bg-gradient-to-tr from-accent-300/20 to-transparent rounded-full blur-3xl translate-y-1/2 -translate-x-1/3"></div>

            <div class="relative z-10">
                <a href="/" class="flex items-center gap-3 group mb-2">
                    <img src="{{ asset('logo.png') }}" alt="{{ config('app.name') }}" class="h-12 w-auto group-hover:scale-105 transition-transform duration-300" />
                    <span class="font-heading text-2xl font-bold text-dark">Sales<span class="text-primary-500">Forge</span></span>
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-8 py-8 bg-white/90 backdrop-blur-sm shadow-soft overflow-hidden rounded-2xl border border-primary-100/50 relative z-10">
                {{ $slot }}
            </div>

            <p class="mt-6 text-sm text-dark-300 relative z-10">
                © {{ date('Y') }} SalesForge. All rights reserved.
            </p>
        </div>
    </body>
</html>
