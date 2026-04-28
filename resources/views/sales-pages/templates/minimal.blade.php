{{-- Minimal Template - Clean & Elegant --}}
@php $content = $content ?? []; @endphp

<!-- Hero -->
<section class="py-24 md:py-36 bg-white">
    <div class="max-w-3xl mx-auto px-6">
        <div class="inline-flex items-center gap-2 mb-8 text-primary-500 text-sm font-semibold uppercase tracking-widest">
            <span class="w-8 h-px bg-primary-400"></span> {{ $salesPage->product_name }}
        </div>
        <div class="group relative w-full mb-8">
            <h1 class="font-heading text-4xl sm:text-5xl md:text-6xl font-bold text-dark leading-[1.08] tracking-tight">{{ $content['headline'] ?? 'Your Headline' }}</h1>
            <button @click="regenerate('headline')" :disabled="regenerating.headline" class="absolute -right-2 top-0 opacity-0 group-hover:opacity-100 transition-opacity bg-white rounded-full p-2 shadow-card border border-dark-100" title="Regenerate">
                <svg class="w-4 h-4 text-dark-400" :class="{'animate-spin':regenerating.headline}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            </button>
        </div>
        <div class="group relative w-full mb-12">
            <p class="text-xl text-dark-400 leading-relaxed max-w-xl">{{ $content['sub_headline'] ?? '' }}</p>
            <button @click="regenerate('sub_headline')" :disabled="regenerating.sub_headline" class="absolute -right-2 top-0 opacity-0 group-hover:opacity-100 transition-opacity bg-white rounded-full p-2 shadow-card border border-dark-100" title="Regenerate">
                <svg class="w-4 h-4 text-dark-400" :class="{'animate-spin':regenerating.sub_headline}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            </button>
        </div>
        <div class="flex gap-4">
            <a href="#pricing" class="inline-flex items-center px-8 py-3.5 bg-dark text-white font-semibold rounded-lg hover:bg-dark-700 transition-colors duration-200">
                {{ $content['call_to_action'] ?? 'Get Started' }} →
            </a>
            <a href="#features" class="inline-flex items-center px-8 py-3.5 text-dark-500 font-semibold hover:text-dark transition-colors">Learn more</a>
        </div>
    </div>
</section>

<!-- Description with side accent -->
<section class="py-20 md:py-28 bg-dark-50/30 border-y border-dark-100">
    <div class="max-w-3xl mx-auto px-6 group relative">
        <div class="grid md:grid-cols-3 gap-12 items-start">
            <div class="md:col-span-1">
                <span class="text-xs font-bold uppercase tracking-widest text-dark-300">About</span>
            </div>
            <div class="md:col-span-2">
                <p class="text-lg text-dark-600 leading-relaxed">{{ $content['description'] ?? '' }}</p>
            </div>
        </div>
        <button @click="regenerate('description')" :disabled="regenerating.description" class="absolute -right-2 top-0 opacity-0 group-hover:opacity-100 transition-opacity bg-white rounded-full p-2 shadow-card border border-dark-100" title="Regenerate">
            <svg class="w-4 h-4 text-dark-400" :class="{'animate-spin':regenerating.description}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
        </button>
    </div>
</section>

<!-- Benefits -->
<section class="py-20 md:py-28 bg-white" id="benefits">
    <div class="max-w-3xl mx-auto px-6">
        <div class="grid md:grid-cols-3 gap-12 items-start mb-12">
            <div class="md:col-span-1">
                <span class="text-xs font-bold uppercase tracking-widest text-dark-300">Benefits</span>
                <h2 class="font-heading text-2xl font-bold text-dark mt-2">Why choose us</h2>
            </div>
        </div>
        <div class="group relative">
            <div class="space-y-0">
                @foreach(($content['benefits'] ?? []) as $i => $benefit)
                <div class="flex items-start gap-6 py-6 {{ !$loop->last ? 'border-b border-dark-100' : '' }} hover:bg-dark-50/30 -mx-4 px-4 rounded-lg transition-colors">
                    <span class="text-primary-500 font-heading font-bold text-2xl leading-none mt-0.5">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    <p class="text-dark-600 text-lg">{{ $benefit }}</p>
                </div>
                @endforeach
            </div>
            <button @click="regenerate('benefits')" :disabled="regenerating.benefits" class="absolute -right-2 top-0 opacity-0 group-hover:opacity-100 transition-opacity bg-white rounded-full p-2 shadow-card border border-dark-100" title="Regenerate">
                <svg class="w-4 h-4 text-dark-400" :class="{'animate-spin':regenerating.benefits}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            </button>
        </div>
    </div>
</section>

<!-- Features -->
<section class="py-20 md:py-28 bg-dark-50/30 border-y border-dark-100" id="features">
    <div class="max-w-3xl mx-auto px-6">
        <div class="grid md:grid-cols-3 gap-12 items-start mb-14">
            <div class="md:col-span-1">
                <span class="text-xs font-bold uppercase tracking-widest text-dark-300">Features</span>
                <h2 class="font-heading text-2xl font-bold text-dark mt-2">What's included</h2>
            </div>
        </div>
        <div class="group relative">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                @foreach(($content['features_breakdown'] ?? []) as $feature)
                <div>
                    <div class="w-12 h-12 mb-5 bg-primary-100 rounded-xl flex items-center justify-center">
                        <svg class="w-6 h-6 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                    </div>
                    <h3 class="font-heading font-bold text-dark text-lg mb-3">{{ $feature['title'] ?? '' }}</h3>
                    <p class="text-dark-400 leading-relaxed">{{ $feature['description'] ?? '' }}</p>
                </div>
                @endforeach
            </div>
            <button @click="regenerate('features_breakdown')" :disabled="regenerating.features_breakdown" class="absolute -right-2 top-0 opacity-0 group-hover:opacity-100 transition-opacity bg-white rounded-full p-2 shadow-card border border-dark-100" title="Regenerate">
                <svg class="w-4 h-4 text-dark-400" :class="{'animate-spin':regenerating.features_breakdown}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            </button>
        </div>
    </div>
</section>

<!-- Social Proof -->
<section class="py-20 md:py-28 bg-white">
    <div class="max-w-3xl mx-auto px-6 group relative">
        <div class="grid md:grid-cols-3 gap-12 items-start">
            <div class="md:col-span-1">
                <span class="text-xs font-bold uppercase tracking-widest text-dark-300">Testimonial</span>
                <div class="flex gap-0.5 text-primary-500 mt-3">
                    @for($i = 0; $i < 5; $i++)
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    @endfor
                </div>
            </div>
            <div class="md:col-span-2">
                <blockquote class="border-l-2 border-primary-500 pl-6">
                    <p class="text-xl text-dark-600 italic leading-relaxed mb-4">"{{ $content['social_proof'] ?? 'Trusted by thousands.' }}"</p>
                    <footer class="text-sm text-dark-400">— Happy Customer, Verified Buyer</footer>
                </blockquote>
            </div>
        </div>
        <button @click="regenerate('social_proof')" :disabled="regenerating.social_proof" class="absolute -right-2 top-0 opacity-0 group-hover:opacity-100 transition-opacity bg-white rounded-full p-2 shadow-card border border-dark-100" title="Regenerate">
            <svg class="w-4 h-4 text-dark-400" :class="{'animate-spin':regenerating.social_proof}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
        </button>
    </div>
</section>

<!-- Pricing -->
<section class="py-20 md:py-28 bg-dark-50/30 border-y border-dark-100" id="pricing">
    <div class="max-w-lg mx-auto px-6 text-center">
        <span class="text-xs font-bold uppercase tracking-widest text-dark-300">Pricing</span>
        <h2 class="font-heading text-3xl font-bold text-dark mt-2 mb-10">Simple pricing</h2>
        <div class="group relative">
            <div class="bg-white border-2 border-dark-100 rounded-2xl p-10 md:p-12 hover:border-primary-300 transition-colors">
                @if($salesPage->price)
                <div class="mb-3"><span class="text-5xl font-heading font-bold text-dark">${{ number_format($salesPage->price, 2) }}</span></div>
                @endif
                <p class="text-dark-400 mb-8 text-lg">{{ $content['pricing_display'] ?? '' }}</p>
                <a href="#" class="inline-flex items-center justify-center w-full px-8 py-4 bg-dark text-white font-semibold rounded-lg hover:bg-dark-700 transition-colors text-lg">
                    {{ $content['call_to_action'] ?? 'Get Started' }}
                </a>
                <p class="text-xs text-dark-300 mt-4">30-day money-back guarantee</p>
            </div>
            <button @click="regenerate('pricing_display')" :disabled="regenerating.pricing_display" class="absolute -right-2 top-0 opacity-0 group-hover:opacity-100 transition-opacity bg-white rounded-full p-2 shadow-card border border-dark-100" title="Regenerate">
                <svg class="w-4 h-4 text-dark-400" :class="{'animate-spin':regenerating.pricing_display}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            </button>
        </div>
    </div>
</section>

<!-- Final CTA -->
<section class="py-20 md:py-28 bg-white">
    <div class="max-w-3xl mx-auto px-6 text-center">
        <h2 class="font-heading text-3xl md:text-4xl font-bold text-dark mb-4">Ready to start?</h2>
        <p class="text-lg text-dark-400 mb-8">Join thousands using {{ $salesPage->product_name }} today.</p>
        <a href="#" class="inline-flex items-center px-10 py-4 bg-dark text-white font-semibold rounded-lg hover:bg-dark-700 transition-colors text-lg">{{ $content['call_to_action'] ?? 'Get Started Now' }} →</a>
    </div>
</section>

<footer class="py-8 bg-dark-50/30 border-t border-dark-100 text-center">
    <p class="text-dark-300 text-sm">© {{ date('Y') }} {{ $salesPage->product_name }}. All rights reserved.</p>
</footer>
