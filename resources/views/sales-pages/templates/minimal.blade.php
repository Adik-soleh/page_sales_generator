{{-- Minimal Template - Premium & Elegant --}}
@php $content = $content ?? []; @endphp

<div class="bg-[#FAFAFA] text-gray-900 font-sans selection:bg-gray-200 antialiased">
    <!-- Hero -->
    <section class="relative pt-32 pb-20 md:pt-48 md:pb-32 overflow-hidden">
        <!-- Subtle background glow -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-3xl h-[500px] bg-gradient-to-b from-gray-200/50 to-transparent blur-3xl -z-10 rounded-full"></div>
        
        <div class="max-w-4xl mx-auto px-6 text-center">
            <div class="inline-flex items-center gap-2 mb-8 px-4 py-1.5 rounded-full bg-white border border-gray-200 shadow-sm text-xs font-medium text-gray-500 tracking-wide">
                <span class="w-2 h-2 rounded-full bg-gray-400"></span> {{ $salesPage->product_name }}
            </div>
            
            <div class="group relative w-full mb-8 flex justify-center">
                <h1 class="text-5xl sm:text-6xl md:text-7xl font-semibold text-transparent bg-clip-text bg-gradient-to-br from-gray-900 via-gray-800 to-gray-500 leading-[1.1] tracking-tight max-w-3xl">
                    {{ $content['headline'] ?? 'Your Headline' }}
                </h1>
                <button onclick="regenerateSection('headline', {{ $salesPage->id }})" class="absolute -right-4 top-0 opacity-0 group-hover:opacity-100 transition-all duration-300 bg-white/80 backdrop-blur rounded-full p-2 shadow-lg border border-gray-100 hover:scale-110" title="Regenerate">
                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                </button>
            </div>
            
            <div class="group relative w-full mb-12 flex justify-center">
                <p class="text-xl md:text-2xl text-gray-500 leading-relaxed max-w-2xl font-light">
                    {{ $content['sub_headline'] ?? '' }}
                </p>
                <button onclick="regenerateSection('sub_headline', {{ $salesPage->id }})" class="absolute -right-4 top-0 opacity-0 group-hover:opacity-100 transition-all duration-300 bg-white/80 backdrop-blur rounded-full p-2 shadow-lg border border-gray-100 hover:scale-110" title="Regenerate">
                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                </button>
            </div>
            
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="#pricing" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 bg-gray-900 text-white font-medium rounded-2xl hover:bg-gray-800 transition-all duration-300 hover:shadow-xl hover:shadow-gray-900/20 active:scale-95">
                    {{ $content['call_to_action'] ?? 'Get Started' }}
                </a>
                <a href="#features" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 bg-white text-gray-900 font-medium rounded-2xl border border-gray-200 hover:bg-gray-50 hover:border-gray-300 transition-all duration-300 active:scale-95">
                    Learn more
                </a>
            </div>
        </div>
    </section>

    <!-- Description -->
    <section class="py-24 bg-white border-y border-gray-100 relative">
        <div class="max-w-4xl mx-auto px-6 group relative">
            <div class="text-center mb-12">
                <h2 class="text-sm font-semibold tracking-widest text-gray-400 uppercase">The Vision</h2>
            </div>
            <div class="relative">
                <p class="text-2xl md:text-4xl text-gray-800 leading-snug font-medium text-center">
                    {{ $content['description'] ?? '' }}
                </p>
                <button onclick="regenerateSection('description', {{ $salesPage->id }})" class="absolute -right-8 -top-8 opacity-0 group-hover:opacity-100 transition-all duration-300 bg-white/80 backdrop-blur rounded-full p-2 shadow-lg border border-gray-100 hover:scale-110" title="Regenerate">
                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                </button>
            </div>
        </div>
    </section>

    <!-- Benefits -->
    <section class="py-24 md:py-32" id="benefits">
        <div class="max-w-5xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-semibold text-gray-900 tracking-tight">Why choose us</h2>
                <p class="mt-4 text-gray-500 text-lg">Experience the difference of true refinement.</p>
            </div>
            
            <div class="group relative">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach(($content['benefits'] ?? []) as $i => $benefit)
                    <div class="bg-white p-8 rounded-3xl border border-gray-100 shadow-sm hover:shadow-xl hover:shadow-gray-200/50 transition-all duration-500 hover:-translate-y-1">
                        <div class="w-12 h-12 bg-gray-50 rounded-2xl flex items-center justify-center mb-6 text-gray-400 font-mono text-sm">
                            {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                        </div>
                        <p class="text-gray-700 text-lg leading-relaxed">{{ $benefit }}</p>
                    </div>
                    @endforeach
                </div>
                <button onclick="regenerateSection('benefits', {{ $salesPage->id }})" class="absolute -right-4 -top-4 opacity-0 group-hover:opacity-100 transition-all duration-300 bg-white/80 backdrop-blur rounded-full p-2 shadow-lg border border-gray-100 hover:scale-110" title="Regenerate">
                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                </button>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="py-24 md:py-32 bg-white border-y border-gray-100" id="features">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-20">
                <h2 class="text-3xl md:text-4xl font-semibold text-gray-900 tracking-tight">Everything you need</h2>
            </div>
            
            <div class="group relative">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                    @foreach(($content['features_breakdown'] ?? []) as $feature)
                    <div class="group/feature">
                        <div class="w-14 h-14 mb-6 bg-gray-50 rounded-2xl flex items-center justify-center group-hover/feature:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-3 tracking-tight">{{ $feature['title'] ?? '' }}</h3>
                        <p class="text-gray-500 leading-relaxed font-light">{{ $feature['description'] ?? '' }}</p>
                    </div>
                    @endforeach
                </div>
                <button onclick="regenerateSection('features_breakdown', {{ $salesPage->id }})" class="absolute -right-4 -top-4 opacity-0 group-hover:opacity-100 transition-all duration-300 bg-white/80 backdrop-blur rounded-full p-2 shadow-lg border border-gray-100 hover:scale-110" title="Regenerate">
                    <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                </button>
            </div>
        </div>
    </section>

    <!-- Social Proof -->
    <section class="py-24 md:py-32 overflow-hidden relative">
        <!-- Decoration -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-gray-100 rounded-full blur-3xl -z-10 opacity-50"></div>

        <div class="max-w-4xl mx-auto px-6 group relative text-center">
            <div class="flex justify-center gap-1 text-gray-900 mb-8">
                @for($i = 0; $i < 5; $i++)
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                @endfor
            </div>
            
            <p class="text-3xl md:text-5xl text-gray-900 font-medium tracking-tight leading-tight mb-10">
                "{{ $content['social_proof'] ?? 'Trusted by thousands.' }}"
            </p>
            
            <div class="flex items-center justify-center gap-4">
                <div class="w-12 h-12 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-medium text-lg">
                    {{ strtoupper(substr($salesPage->target_audience ?? 'C', 0, 1)) }}
                </div>
                <div class="text-left">
                    <div class="font-medium text-gray-900">Verified Customer</div>
                    <div class="text-gray-500 text-sm">{{ $salesPage->target_audience ?? 'Global' }}</div>
                </div>
            </div>

            <button onclick="regenerateSection('social_proof', {{ $salesPage->id }})" class="absolute -right-4 top-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 transition-all duration-300 bg-white/80 backdrop-blur rounded-full p-2 shadow-lg border border-gray-100 hover:scale-110" title="Regenerate">
                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            </button>
        </div>
    </section>

    <!-- Pricing -->
    <section class="py-24 md:py-32 bg-gray-900 text-white" id="pricing">
        <div class="max-w-3xl mx-auto px-6 group relative">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-5xl font-semibold tracking-tight mb-4">Transparent pricing</h2>
                <p class="text-gray-400 text-lg">One simple plan, everything included.</p>
            </div>
            
            <div class="bg-gray-800/50 backdrop-blur-xl border border-gray-700/50 rounded-[2.5rem] p-10 md:p-14 text-center shadow-2xl relative overflow-hidden">
                <!-- Glow effect -->
                <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-[200px] bg-gray-700/30 blur-3xl -z-10 rounded-full"></div>

                @if($salesPage->price)
                <div class="flex items-center justify-center gap-2 mb-6">
                    <span class="text-6xl md:text-8xl font-semibold tracking-tight">${{ number_format($salesPage->price, 0) }}</span>
                    @if(fmod($salesPage->price, 1) > 0)
                        <span class="text-3xl text-gray-400 font-medium">.{{ str_pad((string)round(fmod($salesPage->price, 1) * 100), 2, '0', STR_PAD_LEFT) }}</span>
                    @endif
                </div>
                @endif
                
                <p class="text-gray-300 text-lg md:text-xl mb-10 max-w-lg mx-auto font-light leading-relaxed">
                    @if(is_array($content['pricing_display'] ?? null))
                        {{ $content['pricing_display']['value'] ?? '' }}
                    @else
                        {{ $content['pricing_display'] ?? '' }}
                    @endif
                </p>
                
                <a href="#" class="inline-flex items-center justify-center w-full md:w-auto px-10 py-5 bg-white text-gray-900 font-medium rounded-2xl hover:bg-gray-100 transition-all duration-300 hover:shadow-lg hover:shadow-white/10 active:scale-95 text-lg">
                    {{ $content['call_to_action'] ?? 'Get Started' }}
                </a>
                <p class="text-sm text-gray-500 mt-6">Secure payment • Cancel anytime</p>
            </div>

            <button onclick="regenerateSection('pricing_display', {{ $salesPage->id }})" class="absolute -right-4 top-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 transition-all duration-300 bg-white/10 backdrop-blur rounded-full p-2 border border-white/20 hover:bg-white/20" title="Regenerate">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            </button>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-12 bg-white text-center border-t border-gray-100">
        <p class="text-gray-400 text-sm">© {{ date('Y') }} {{ $salesPage->product_name }}. Designed with precision.</p>
    </footer>
</div>
