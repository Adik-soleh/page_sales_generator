{{-- Modern Template - Rich & Dynamic --}}
@php $content = $content ?? []; @endphp

<!-- Hero -->
<section class="relative overflow-hidden bg-gradient-to-br from-warm via-white to-primary-50 min-h-[80vh] flex items-center">
    <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-gradient-to-bl from-primary-200/30 to-transparent rounded-full blur-3xl -translate-y-1/4 translate-x-1/4 animate-pulse-slow"></div>
    <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-gradient-to-tr from-accent-300/20 to-transparent rounded-full blur-3xl translate-y-1/3 -translate-x-1/4 animate-pulse-slow"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] border border-primary-100/30 rounded-full"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] border border-primary-100/20 rounded-full"></div>

    <div class="max-w-5xl mx-auto px-6 py-24 md:py-36 text-center relative z-10">
        <div class="inline-flex items-center gap-2 mb-8 px-5 py-2 bg-white/80 backdrop-blur-sm border border-primary-200 text-primary-700 rounded-full text-sm font-semibold shadow-sm">
            <span class="w-2 h-2 bg-primary-500 rounded-full animate-pulse"></span>
            {{ $salesPage->product_name }}
        </div>

        <div class="group relative w-full">
            <h1 class="font-heading text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold text-dark leading-[1.05] mb-8 tracking-tight">
                {{ $content['headline'] ?? 'Your Headline' }}
            </h1>
            <button @click="regenerate('headline')" :disabled="regenerating.headline" class="absolute -right-2 top-0 opacity-0 group-hover:opacity-100 transition-opacity bg-white rounded-full p-2 shadow-card border border-primary-100" title="Regenerate">
                <svg class="w-4 h-4 text-primary-500" :class="{'animate-spin':regenerating.headline}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            </button>
        </div>

        <div class="group relative w-full">
            <p class="text-lg md:text-xl text-dark-400 max-w-2xl mx-auto mb-12 leading-relaxed">{{ $content['sub_headline'] ?? '' }}</p>
            <button @click="regenerate('sub_headline')" :disabled="regenerating.sub_headline" class="absolute -right-2 top-0 opacity-0 group-hover:opacity-100 transition-opacity bg-white rounded-full p-2 shadow-card border border-primary-100" title="Regenerate">
                <svg class="w-4 h-4 text-primary-500" :class="{'animate-spin':regenerating.sub_headline}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            </button>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#pricing" class="btn-primary text-lg px-10 py-4 shadow-glow">
                {{ $content['call_to_action'] ?? 'Get Started' }}
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
            <a href="#features" class="btn-secondary text-lg px-10 py-4">Learn More</a>
        </div>

        <!-- Trust indicators -->
        <div class="mt-14 flex flex-wrap items-center justify-center gap-8 text-dark-300 text-sm">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                Free Trial Available
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                No Credit Card Required
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                Cancel Anytime
            </div>
        </div>
    </div>
</section>

<!-- Description with visual accent -->
<section class="py-20 md:py-28 bg-white relative">
    <div class="absolute left-0 top-0 w-1 h-full bg-gradient-to-b from-primary-500 via-accent-400 to-primary-500"></div>
    <div class="max-w-4xl mx-auto px-6">
        <div class="grid md:grid-cols-5 gap-12 items-center">
            <div class="md:col-span-3 group relative">
                <span class="inline-block px-3 py-1 bg-primary-100 text-primary-700 rounded-full text-xs font-semibold mb-4 uppercase tracking-wider">About</span>
                <p class="text-xl md:text-2xl text-dark-600 leading-relaxed font-light">{{ $content['description'] ?? '' }}</p>
                <button @click="regenerate('description')" :disabled="regenerating.description" class="absolute -right-2 top-0 opacity-0 group-hover:opacity-100 transition-opacity bg-white rounded-full p-2 shadow-card border border-primary-100" title="Regenerate">
                    <svg class="w-4 h-4 text-primary-500" :class="{'animate-spin':regenerating.description}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                </button>
            </div>
            <div class="md:col-span-2">
                <div class="bg-gradient-to-br from-primary-500 to-primary-600 rounded-3xl p-8 text-white text-center shadow-glow">
                    <div class="text-5xl font-heading font-extrabold mb-2">100%</div>
                    <div class="text-primary-100 text-sm font-medium">Satisfaction Guaranteed</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Benefits - numbered cards with accent -->
<section class="py-20 md:py-28 bg-warm relative overflow-hidden" id="benefits">
    <div class="absolute -right-20 top-20 w-60 h-60 bg-primary-100/40 rounded-full blur-3xl"></div>
    <div class="max-w-6xl mx-auto px-6 relative z-10">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-1.5 bg-primary-100 text-primary-700 rounded-full text-xs font-bold mb-4 uppercase tracking-wider">Benefits</span>
            <h2 class="font-heading text-3xl md:text-5xl font-bold text-dark">Why Choose <span class="text-primary-500">{{ $salesPage->product_name }}</span>?</h2>
        </div>
        <div class="group relative">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach(($content['benefits'] ?? []) as $i => $benefit)
                <div class="flex items-start gap-5 bg-white rounded-2xl p-7 shadow-card hover:shadow-card-hover border border-primary-100/50 hover:border-primary-200 transition-all duration-300 hover:-translate-y-1">
                    <div class="w-12 h-12 bg-gradient-to-br from-primary-400 to-primary-600 rounded-2xl flex items-center justify-center flex-shrink-0 shadow-soft">
                        <span class="text-white font-heading font-bold text-lg">{{ $i + 1 }}</span>
                    </div>
                    <div>
                        <p class="text-dark-700 font-semibold text-lg">{{ $benefit }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <button @click="regenerate('benefits')" :disabled="regenerating.benefits" class="absolute -right-2 top-0 opacity-0 group-hover:opacity-100 transition-opacity bg-white rounded-full p-2 shadow-card border border-primary-100" title="Regenerate">
                <svg class="w-4 h-4 text-primary-500" :class="{'animate-spin':regenerating.benefits}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            </button>
        </div>
    </div>
</section>

<!-- Features - detailed cards with icons -->
<section class="py-20 md:py-28 bg-white relative" id="features">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-1.5 bg-accent-300/30 text-accent-500 rounded-full text-xs font-bold mb-4 uppercase tracking-wider">Features</span>
            <h2 class="font-heading text-3xl md:text-5xl font-bold text-dark">Everything You Need</h2>
            <p class="text-dark-400 mt-4 max-w-xl mx-auto">Packed with powerful features designed to help you succeed</p>
        </div>
        <div class="group relative">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php $featureIcons = ['M13 10V3L4 14h7v7l9-11h-7z', 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z']; @endphp
                @foreach(($content['features_breakdown'] ?? []) as $idx => $feature)
                <div class="relative p-8 rounded-3xl bg-gradient-to-br from-warm to-white border border-primary-100/50 hover:shadow-card-hover hover:border-primary-200 transition-all duration-300 hover:-translate-y-1 overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-bl from-primary-100/40 to-transparent rounded-bl-full"></div>
                    <div class="relative z-10">
                        <div class="w-16 h-16 mb-6 bg-gradient-to-br from-primary-100 to-primary-200 rounded-2xl flex items-center justify-center shadow-sm">
                            <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $featureIcons[$idx % 3] }}"/></svg>
                        </div>
                        <h3 class="font-heading text-xl font-bold text-dark mb-3">{{ $feature['title'] ?? '' }}</h3>
                        <p class="text-dark-400 leading-relaxed">{{ $feature['description'] ?? '' }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <button @click="regenerate('features_breakdown')" :disabled="regenerating.features_breakdown" class="absolute -right-2 top-0 opacity-0 group-hover:opacity-100 transition-opacity bg-white rounded-full p-2 shadow-card border border-primary-100" title="Regenerate">
                <svg class="w-4 h-4 text-primary-500" :class="{'animate-spin':regenerating.features_breakdown}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            </button>
        </div>
    </div>
</section>

<!-- Stats Bar -->
<section class="py-14 bg-gradient-to-r from-primary-500 via-primary-600 to-primary-500 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-1/4 w-40 h-40 bg-white rounded-full blur-2xl"></div>
        <div class="absolute bottom-0 right-1/4 w-60 h-60 bg-white rounded-full blur-3xl"></div>
    </div>
    <div class="max-w-5xl mx-auto px-6 relative z-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center text-white">
            <div>
                <div class="text-3xl md:text-4xl font-heading font-extrabold">10K+</div>
                <div class="text-primary-100 text-sm mt-1">Happy Users</div>
            </div>
            <div>
                <div class="text-3xl md:text-4xl font-heading font-extrabold">99.9%</div>
                <div class="text-primary-100 text-sm mt-1">Uptime</div>
            </div>
            <div>
                <div class="text-3xl md:text-4xl font-heading font-extrabold">4.9★</div>
                <div class="text-primary-100 text-sm mt-1">Average Rating</div>
            </div>
            <div>
                <div class="text-3xl md:text-4xl font-heading font-extrabold">24/7</div>
                <div class="text-primary-100 text-sm mt-1">Support</div>
            </div>
        </div>
    </div>
</section>

<!-- Social Proof / Testimonial -->
<section class="py-20 md:py-28 bg-warm relative">
    <div class="max-w-4xl mx-auto px-6 text-center group relative">
        <div class="mb-8">
            <div class="flex justify-center gap-1 text-accent-400 mb-6">
                @for($i = 0; $i < 5; $i++)
                <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                @endfor
            </div>
        </div>
        <p class="text-xl md:text-3xl text-dark-700 font-medium italic leading-relaxed mb-8">"{{ $content['social_proof'] ?? 'Trusted by thousands.' }}"</p>
        <div class="flex items-center justify-center gap-3">
            <div class="w-12 h-12 bg-gradient-to-br from-primary-400 to-primary-600 rounded-full flex items-center justify-center text-white font-bold shadow-soft">J</div>
            <div class="text-left">
                <div class="font-semibold text-dark">Happy Customer</div>
                <div class="text-sm text-dark-400">Verified Buyer</div>
            </div>
        </div>
        <button @click="regenerate('social_proof')" :disabled="regenerating.social_proof" class="absolute -right-2 top-0 opacity-0 group-hover:opacity-100 transition-opacity bg-white rounded-full p-2 shadow-card border border-primary-100" title="Regenerate">
            <svg class="w-4 h-4 text-primary-500" :class="{'animate-spin':regenerating.social_proof}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
        </button>
    </div>
</section>

<!-- Pricing -->
<section class="py-20 md:py-28 bg-white relative overflow-hidden" id="pricing">
    <div class="absolute -left-40 top-0 w-80 h-80 bg-primary-100/30 rounded-full blur-3xl"></div>
    <div class="absolute -right-40 bottom-0 w-80 h-80 bg-accent-300/20 rounded-full blur-3xl"></div>
    <div class="max-w-xl mx-auto px-6 text-center relative z-10">
        <span class="inline-block px-4 py-1.5 bg-primary-100 text-primary-700 rounded-full text-xs font-bold mb-4 uppercase tracking-wider">Pricing</span>
        <h2 class="font-heading text-3xl md:text-5xl font-bold text-dark mb-4">Simple, Transparent Pricing</h2>
        <p class="text-dark-400 mb-10">No hidden fees. No surprises. Just value.</p>
        <div class="group relative">
            <div class="bg-white rounded-3xl p-10 md:p-12 shadow-soft border-2 border-primary-200 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-primary-400 via-accent-400 to-primary-400"></div>
                <div class="inline-block px-3 py-1 bg-accent-300/30 text-accent-500 rounded-full text-xs font-bold mb-6 uppercase">Best Value</div>
                @if($salesPage->price)
                <div class="mb-2">
                    <span class="text-6xl font-heading font-extrabold text-dark">${{ number_format($salesPage->price, 2) }}</span>
                </div>
                @endif
                <p class="text-dark-400 mb-8 text-lg">{{ $content['pricing_display'] ?? '' }}</p>
                <a href="#" class="btn-primary text-lg px-10 py-4 w-full block shadow-glow">
                    {{ $content['call_to_action'] ?? 'Get Started' }}
                </a>
                <p class="text-xs text-dark-300 mt-4">30-day money-back guarantee</p>
            </div>
            <button @click="regenerate('pricing_display')" :disabled="regenerating.pricing_display" class="absolute -right-2 top-0 opacity-0 group-hover:opacity-100 transition-opacity bg-white rounded-full p-2 shadow-card border border-primary-100" title="Regenerate">
                <svg class="w-4 h-4 text-primary-500" :class="{'animate-spin':regenerating.pricing_display}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            </button>
        </div>
    </div>
</section>

<!-- Final CTA -->
<section class="py-20 md:py-28 bg-gradient-to-br from-dark via-dark-800 to-dark-900 relative overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[500px] h-[500px] bg-primary-500/10 rounded-full blur-3xl"></div>
    </div>
    <div class="max-w-4xl mx-auto px-6 text-center relative z-10">
        <h2 class="font-heading text-3xl md:text-5xl font-bold text-white mb-6">Ready to Transform Your Business?</h2>
        <p class="text-lg text-dark-200 mb-10 max-w-2xl mx-auto">Join thousands who already trust {{ $salesPage->product_name }}. Start your journey today.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#" class="inline-flex items-center justify-center px-10 py-4 bg-gradient-to-r from-primary-500 to-accent-400 text-dark font-bold text-lg rounded-xl shadow-glow hover:shadow-lg transform hover:-translate-y-0.5 transition-all duration-300">
                {{ $content['call_to_action'] ?? 'Get Started Now' }}
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="py-8 bg-dark-900 text-center">
    <p class="text-dark-400 text-sm">© {{ date('Y') }} {{ $salesPage->product_name }}. All rights reserved.</p>
</footer>
