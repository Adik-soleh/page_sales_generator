<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SalesForge — AI Sales Page Generator</title>
    <meta name="description" content="Transform your product info into stunning, high-converting sales pages in seconds with AI-powered copywriting.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-warm">

    <!-- Navbar -->
    <nav class="fixed top-0 w-full bg-white/80 backdrop-blur-sm border-b border-primary-100 z-50">
        <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between">
            <a href="/" class="flex items-center gap-2.5">
                <img src="{{ asset('logo.png') }}" alt="SalesForge" class="h-9 w-auto" />
                <span class="font-heading text-xl font-bold text-dark">Sales<span class="text-primary-500">Forge</span></span>
            </a>
            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn-primary text-sm py-2.5 px-6">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn-ghost text-sm font-semibold">Log In</a>
                    <a href="{{ route('register') }}" class="btn-primary text-sm py-2.5 px-6">Get Started Free</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="relative min-h-screen flex items-center overflow-hidden pt-16">
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-gradient-to-bl from-primary-200/30 to-transparent rounded-full blur-3xl -translate-y-1/4 translate-x-1/4"></div>
        <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-gradient-to-tr from-accent-300/20 to-transparent rounded-full blur-3xl translate-y-1/3 -translate-x-1/4"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] border border-primary-100/20 rounded-full"></div>

        <div class="max-w-5xl mx-auto px-6 py-20 text-center relative z-10">
            <div class="inline-flex items-center gap-2 mb-8 px-5 py-2 bg-white/80 backdrop-blur-sm border border-primary-200 text-primary-700 rounded-full text-sm font-semibold shadow-sm">
                <span class="w-2 h-2 bg-primary-500 rounded-full animate-pulse"></span>
                AI-Powered Sales Pages
            </div>

            <h1 class="font-heading text-5xl sm:text-6xl md:text-7xl font-extrabold text-dark leading-[1.05] tracking-tight mb-8">
                Turn Product Info Into
                <span class="bg-gradient-to-r from-primary-500 to-accent-400 bg-clip-text text-transparent"> Stunning Sales Pages</span>
            </h1>

            <p class="text-lg md:text-xl text-dark-400 max-w-2xl mx-auto mb-12 leading-relaxed">
                Stop spending hours writing copy. Just enter your product details and let AI create a professional, high-converting sales page in seconds.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-16">
                <a href="{{ route('register') }}" class="btn-primary text-lg px-10 py-4 shadow-glow">
                    Start Creating Free
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
                <a href="#how-it-works" class="btn-secondary text-lg px-10 py-4">See How It Works</a>
            </div>

            <!-- Trust -->
            <div class="flex flex-wrap items-center justify-center gap-8 text-dark-300 text-sm">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    100% Free to Start
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    No Credit Card Required
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    Export as HTML
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="py-24 bg-white relative" id="how-it-works">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-1.5 bg-primary-100 text-primary-700 rounded-full text-xs font-bold uppercase tracking-wider mb-4">How It Works</span>
                <h2 class="font-heading text-3xl md:text-5xl font-bold text-dark">Three Simple Steps</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="text-center relative">
                    <div class="w-16 h-16 mx-auto mb-6 bg-gradient-to-br from-primary-500 to-primary-600 rounded-2xl flex items-center justify-center shadow-soft">
                        <span class="text-white font-heading font-extrabold text-2xl">1</span>
                    </div>
                    <h3 class="font-heading text-xl font-bold text-dark mb-3">Enter Product Details</h3>
                    <p class="text-dark-400">Name, description, features, target audience, and price. That's all we need.</p>
                </div>

                <div class="text-center relative">
                    <div class="w-16 h-16 mx-auto mb-6 bg-gradient-to-br from-primary-500 to-primary-600 rounded-2xl flex items-center justify-center shadow-soft">
                        <span class="text-white font-heading font-extrabold text-2xl">2</span>
                    </div>
                    <h3 class="font-heading text-xl font-bold text-dark mb-3">AI Generates Copy</h3>
                    <p class="text-dark-400">Our AI writes headlines, benefits, features, testimonials, pricing, and CTAs in seconds.</p>
                </div>

                <div class="text-center relative">
                    <div class="w-16 h-16 mx-auto mb-6 bg-gradient-to-br from-primary-500 to-primary-600 rounded-2xl flex items-center justify-center shadow-soft">
                        <span class="text-white font-heading font-extrabold text-2xl">3</span>
                    </div>
                    <h3 class="font-heading text-xl font-bold text-dark mb-3">Preview & Export</h3>
                    <p class="text-dark-400">See it live, tweak any section, then export as a standalone HTML file.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="py-24 bg-warm relative overflow-hidden">
        <div class="absolute -right-20 top-20 w-60 h-60 bg-primary-100/40 rounded-full blur-3xl"></div>
        <div class="max-w-6xl mx-auto px-6 relative z-10">
            <div class="text-center mb-16">
                <span class="inline-block px-4 py-1.5 bg-accent-300/30 text-accent-500 rounded-full text-xs font-bold uppercase tracking-wider mb-4">Features</span>
                <h2 class="font-heading text-3xl md:text-5xl font-bold text-dark">Everything You Need</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @php
                $features = [
                    ['icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'title' => 'AI Copywriting', 'desc' => 'Powered by advanced AI models that write natural, persuasive sales copy.'],
                    ['icon' => 'M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6z', 'title' => '3 Design Templates', 'desc' => 'Modern, Bold, and Minimal — choose the style that fits your brand.'],
                    ['icon' => 'M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15', 'title' => 'Section Regeneration', 'desc' => 'Not happy with a headline? Regenerate individual sections with one click.'],
                    ['icon' => 'M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4', 'title' => 'HTML Export', 'desc' => 'Download your page as a standalone HTML file — ready to deploy anywhere.'],
                    ['icon' => 'M15 12a3 3 0 11-6 0 3 3 0 016 0z', 'title' => 'Live Preview', 'desc' => 'See exactly how your sales page looks before publishing or exporting.'],
                    ['icon' => 'M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z', 'title' => 'Secure & Private', 'desc' => 'Your data stays yours. Each user can only access their own pages.'],
                ];
                @endphp

                @foreach($features as $f)
                <div class="bg-white rounded-2xl p-8 border border-primary-100/50 hover:shadow-card-hover hover:border-primary-200 transition-all duration-300 hover:-translate-y-1">
                    <div class="w-14 h-14 mb-5 bg-gradient-to-br from-primary-100 to-primary-200 rounded-2xl flex items-center justify-center">
                        <svg class="w-7 h-7 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $f['icon'] }}"/></svg>
                    </div>
                    <h3 class="font-heading text-lg font-bold text-dark mb-3">{{ $f['title'] }}</h3>
                    <p class="text-dark-400 leading-relaxed">{{ $f['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-24 bg-gradient-to-br from-dark via-dark-800 to-dark-900 relative overflow-hidden">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-primary-500/10 rounded-full blur-3xl"></div>
        <div class="max-w-3xl mx-auto px-6 text-center relative z-10">
            <h2 class="font-heading text-3xl md:text-5xl font-bold text-white mb-6">Ready to Build Your Sales Page?</h2>
            <p class="text-lg text-dark-200 mb-10 max-w-xl mx-auto">Create your first AI-powered sales page in under a minute. No design skills needed.</p>
            <a href="{{ route('register') }}" class="inline-flex items-center px-10 py-4 bg-gradient-to-r from-primary-500 to-accent-400 text-dark font-bold text-lg rounded-xl shadow-glow hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300">
                Get Started Free
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-8 bg-dark-900 text-center">
        <p class="text-dark-400 text-sm">© {{ date('Y') }} SalesForge. All rights reserved.</p>
    </footer>

</body>
</html>
