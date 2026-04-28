{{-- Bold Template - Dark & Impactful --}}
@php $content = $content ?? []; @endphp

<!-- Hero -->
<section class="relative bg-dark min-h-[85vh] flex items-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-dark via-dark-800 to-dark-900"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[700px] bg-primary-500/8 rounded-full blur-3xl animate-pulse-slow"></div>
    <div class="absolute top-20 right-20 w-2 h-2 bg-primary-400 rounded-full animate-pulse"></div>
    <div class="absolute bottom-40 left-20 w-3 h-3 bg-accent-400 rounded-full animate-pulse-slow"></div>
    <div class="absolute top-1/3 right-1/4 w-1.5 h-1.5 bg-primary-300 rounded-full animate-pulse"></div>

    <div class="max-w-5xl mx-auto px-6 py-24 md:py-36 text-center relative z-10">
        <div class="inline-flex items-center gap-2 mb-8 px-5 py-2 bg-white/5 backdrop-blur-sm border border-white/10 text-primary-300 rounded-full text-sm font-semibold">
            <span class="w-2 h-2 bg-primary-400 rounded-full animate-pulse"></span>
            {{ $salesPage->product_name }}
        </div>

        <div class="group relative w-full">
            <h1 class="font-heading text-5xl sm:text-6xl md:text-7xl lg:text-8xl font-extrabold leading-[1.0] mb-8 bg-gradient-to-r from-white via-primary-200 to-accent-300 bg-clip-text text-transparent tracking-tight">
                {{ $content['headline'] ?? 'Your Headline' }}
            </h1>
            <button @click="regenerate('headline')" :disabled="regenerating.headline" class="absolute -right-2 top-0 opacity-0 group-hover:opacity-100 transition-opacity bg-dark-700 rounded-full p-2 shadow-lg border border-dark-600" title="Regenerate">
                <svg class="w-4 h-4 text-primary-400" :class="{'animate-spin':regenerating.headline}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            </button>
        </div>

        <div class="group relative w-full">
            <p class="text-lg md:text-xl text-dark-200 max-w-2xl mx-auto mb-12">{{ $content['sub_headline'] ?? '' }}</p>
            <button @click="regenerate('sub_headline')" :disabled="regenerating.sub_headline" class="absolute -right-2 top-0 opacity-0 group-hover:opacity-100 transition-opacity bg-dark-700 rounded-full p-2 shadow-lg border border-dark-600" title="Regenerate">
                <svg class="w-4 h-4 text-primary-400" :class="{'animate-spin':regenerating.sub_headline}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            </button>
        </div>

        <a href="#pricing" class="inline-flex items-center px-12 py-5 bg-gradient-to-r from-primary-500 to-accent-400 text-dark font-bold text-lg rounded-xl shadow-glow hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
            {{ $content['call_to_action'] ?? 'Get Started' }}
            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>

        <div class="mt-14 flex flex-wrap items-center justify-center gap-6 text-dark-300 text-sm">
            <div class="flex items-center gap-2"><svg class="w-5 h-5 text-primary-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg> Free Trial</div>
            <div class="flex items-center gap-2"><svg class="w-5 h-5 text-primary-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg> No Credit Card</div>
            <div class="flex items-center gap-2"><svg class="w-5 h-5 text-primary-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg> Cancel Anytime</div>
        </div>
    </div>
</section>

<!-- Description -->
<section class="py-20 md:py-28 bg-dark-900">
    <div class="max-w-4xl mx-auto px-6 group relative">
        <div class="grid md:grid-cols-5 gap-12 items-center">
            <div class="md:col-span-3">
                <span class="inline-block px-3 py-1 bg-primary-500/20 text-primary-400 rounded-full text-xs font-bold mb-4 uppercase tracking-wider">About</span>
                <p class="text-xl md:text-2xl text-dark-200 leading-relaxed font-light">{{ $content['description'] ?? '' }}</p>
            </div>
            <div class="md:col-span-2">
                <div class="bg-gradient-to-br from-primary-500/20 to-accent-400/20 rounded-3xl p-8 text-center border border-primary-500/30">
                    <div class="text-5xl font-heading font-extrabold text-white mb-2">100%</div>
                    <div class="text-primary-300 text-sm font-medium">Satisfaction Guaranteed</div>
                </div>
            </div>
        </div>
        <button @click="regenerate('description')" :disabled="regenerating.description" class="absolute -right-2 top-0 opacity-0 group-hover:opacity-100 transition-opacity bg-dark-700 rounded-full p-2 shadow-lg border border-dark-600" title="Regenerate">
            <svg class="w-4 h-4 text-primary-400" :class="{'animate-spin':regenerating.description}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
        </button>
    </div>
</section>

<!-- Benefits -->
<section class="py-20 md:py-28 bg-dark" id="benefits">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-1.5 bg-primary-500/20 text-primary-400 rounded-full text-xs font-bold mb-4 uppercase tracking-wider">Benefits</span>
            <h2 class="font-heading text-3xl md:text-5xl font-bold text-white">Why <span class="bg-gradient-to-r from-primary-400 to-accent-400 bg-clip-text text-transparent">{{ $salesPage->product_name }}</span>?</h2>
        </div>
        <div class="group relative">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach(($content['benefits'] ?? []) as $i => $benefit)
                <div class="flex items-start gap-5 bg-dark-800/80 backdrop-blur-sm rounded-2xl p-7 border border-dark-600 hover:border-primary-500/40 transition-all duration-300 hover:-translate-y-1">
                    <div class="w-12 h-12 bg-gradient-to-br from-primary-500 to-accent-400 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-glow">
                        <span class="text-dark font-heading font-bold text-lg">{{ $i + 1 }}</span>
                    </div>
                    <p class="text-dark-100 font-semibold text-lg">{{ $benefit }}</p>
                </div>
                @endforeach
            </div>
            <button @click="regenerate('benefits')" :disabled="regenerating.benefits" class="absolute -right-2 top-0 opacity-0 group-hover:opacity-100 transition-opacity bg-dark-700 rounded-full p-2 shadow-lg border border-dark-600" title="Regenerate">
                <svg class="w-4 h-4 text-primary-400" :class="{'animate-spin':regenerating.benefits}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            </button>
        </div>
    </div>
</section>

<!-- Features -->
<section class="py-20 md:py-28 bg-dark-900" id="features">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-1.5 bg-accent-400/20 text-accent-400 rounded-full text-xs font-bold mb-4 uppercase tracking-wider">Features</span>
            <h2 class="font-heading text-3xl md:text-5xl font-bold text-white">Packed with Power</h2>
        </div>
        <div class="group relative">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach(($content['features_breakdown'] ?? []) as $feature)
                <div class="relative p-8 rounded-3xl bg-dark-800 border border-dark-600 hover:border-primary-500/50 transition-all duration-300 hover:-translate-y-1 overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-bl from-primary-500/10 to-transparent rounded-bl-full"></div>
                    <div class="relative z-10">
                        <div class="w-14 h-14 mb-6 bg-gradient-to-br from-primary-500/20 to-accent-400/20 rounded-2xl flex items-center justify-center">
                            <svg class="w-7 h-7 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <h3 class="font-heading text-xl font-bold text-white mb-3">{{ $feature['title'] ?? '' }}</h3>
                        <p class="text-dark-300 leading-relaxed">{{ $feature['description'] ?? '' }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <button @click="regenerate('features_breakdown')" :disabled="regenerating.features_breakdown" class="absolute -right-2 top-0 opacity-0 group-hover:opacity-100 transition-opacity bg-dark-700 rounded-full p-2 shadow-lg border border-dark-600" title="Regenerate">
                <svg class="w-4 h-4 text-primary-400" :class="{'animate-spin':regenerating.features_breakdown}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            </button>
        </div>
    </div>
</section>

<!-- Stats -->
<section class="py-14 bg-gradient-to-r from-primary-600 via-primary-500 to-accent-400">
    <div class="max-w-5xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div><div class="text-3xl md:text-4xl font-heading font-extrabold text-dark">10K+</div><div class="text-dark/60 text-sm mt-1">Users</div></div>
            <div><div class="text-3xl md:text-4xl font-heading font-extrabold text-dark">99.9%</div><div class="text-dark/60 text-sm mt-1">Uptime</div></div>
            <div><div class="text-3xl md:text-4xl font-heading font-extrabold text-dark">4.9★</div><div class="text-dark/60 text-sm mt-1">Rating</div></div>
            <div><div class="text-3xl md:text-4xl font-heading font-extrabold text-dark">24/7</div><div class="text-dark/60 text-sm mt-1">Support</div></div>
        </div>
    </div>
</section>

<!-- Social Proof -->
<section class="py-20 md:py-28 bg-dark">
    <div class="max-w-4xl mx-auto px-6 text-center group relative">
        <div class="flex justify-center gap-1 text-accent-400 mb-6">
            @for($i = 0; $i < 5; $i++)
            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
            @endfor
        </div>
        <p class="text-xl md:text-3xl text-white font-medium italic leading-relaxed mb-8">"{{ $content['social_proof'] ?? 'Trusted by thousands.' }}"</p>
        <div class="flex items-center justify-center gap-3">
            <div class="w-12 h-12 bg-gradient-to-br from-primary-500 to-accent-400 rounded-full flex items-center justify-center text-dark font-bold">J</div>
            <div class="text-left"><div class="font-semibold text-white">Happy Customer</div><div class="text-sm text-dark-300">Verified Buyer</div></div>
        </div>
        <button @click="regenerate('social_proof')" :disabled="regenerating.social_proof" class="absolute -right-2 top-0 opacity-0 group-hover:opacity-100 transition-opacity bg-dark-700 rounded-full p-2 shadow-lg border border-dark-600" title="Regenerate">
            <svg class="w-4 h-4 text-primary-400" :class="{'animate-spin':regenerating.social_proof}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
        </button>
    </div>
</section>

<!-- Pricing -->
<section class="py-20 md:py-28 bg-dark-900" id="pricing">
    <div class="max-w-xl mx-auto px-6 text-center">
        <span class="inline-block px-4 py-1.5 bg-primary-500/20 text-primary-400 rounded-full text-xs font-bold mb-4 uppercase tracking-wider">Pricing</span>
        <h2 class="font-heading text-3xl md:text-5xl font-bold text-white mb-10">Get Started Today</h2>
        <div class="group relative">
            <div class="bg-dark-800 rounded-3xl p-10 md:p-12 border-2 border-primary-500/50 shadow-glow relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-primary-500 via-accent-400 to-primary-500"></div>
                <div class="inline-block px-3 py-1 bg-accent-400/20 text-accent-400 rounded-full text-xs font-bold mb-6 uppercase">Best Value</div>
                @if($salesPage->price)
                <div class="mb-2"><span class="text-6xl font-heading font-extrabold text-white">${{ number_format($salesPage->price, 2) }}</span></div>
                @endif
                <p class="text-dark-300 mb-8 text-lg">{{ $content['pricing_display'] ?? '' }}</p>
                <a href="#" class="inline-flex items-center justify-center w-full px-10 py-5 bg-gradient-to-r from-primary-500 to-accent-400 text-dark font-bold text-lg rounded-xl shadow-glow hover:shadow-lg transition-all duration-300">
                    {{ $content['call_to_action'] ?? 'Get Started' }}
                </a>
                <p class="text-xs text-dark-400 mt-4">30-day money-back guarantee</p>
            </div>
            <button @click="regenerate('pricing_display')" :disabled="regenerating.pricing_display" class="absolute -right-2 top-0 opacity-0 group-hover:opacity-100 transition-opacity bg-dark-700 rounded-full p-2 shadow-lg border border-dark-600" title="Regenerate">
                <svg class="w-4 h-4 text-primary-400" :class="{'animate-spin':regenerating.pricing_display}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            </button>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="py-8 bg-dark text-center border-t border-dark-700">
    <p class="text-dark-400 text-sm">© {{ date('Y') }} {{ $salesPage->product_name }}. All rights reserved.</p>
</footer>
