{{-- Bold Template — High-Impact Neo-Brutalist --}}
@php $content = $content ?? []; @endphp

<div class="bg-white text-black font-sans selection:bg-black selection:text-[#CCFF00] min-h-screen border-8 border-black">

    {{-- Marquee Banner --}}
    <div class="bg-[#CCFF00] border-b-4 border-black overflow-hidden py-3">
        <div class="flex w-max animate-marquee text-sm font-black uppercase tracking-widest">
            @for ($i = 0; $i < 4; $i++)
                <div class="flex items-center gap-10 pr-10 whitespace-nowrap">
                    <span>⚡ {{ $salesPage->product_name }}</span>
                    <span>BREAK THE RULES</span>
                    <span>NO EXCUSES</span>
                    <span>MADE FOR {{ strtoupper($salesPage->target_audience ?? 'THE BOLD') }}</span>
                </div>
            @endfor
        </div>
    </div>

    {{-- Hero --}}
    <section class="relative border-b-4 border-black overflow-hidden bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjIiIGZpbGw9IiNjY2MiIGZpbGwtb3BhY2l0eT0iMC40Ii8+PC9zdmc+')]">
        <div class="max-w-6xl mx-auto px-6 py-20 md:py-32 grid grid-cols-1 md:grid-cols-12 gap-10 items-center">
            
            <div class="md:col-span-8 relative">
                <div class="inline-block bg-[#FF3366] text-white px-4 py-2 border-4 border-black shadow-[4px_4px_0_0_#000] text-sm font-black uppercase tracking-widest mb-8 -rotate-2">
                    Issue No. 1
                </div>

                <div class="group relative">
                    <h1 class="text-6xl sm:text-7xl md:text-8xl lg:text-[100px] font-black leading-[0.85] uppercase tracking-tighter mix-blend-multiply">
                        @php $words = explode(' ', $content['headline'] ?? 'Your Headline'); @endphp
                        @foreach($words as $i => $w)
                            <span class="inline-block {{ $i % 3 === 1 ? 'text-[#FF3366]' : ($i % 3 === 2 ? 'text-[#00E5FF]' : '') }}">{{ $w }}</span>
                        @endforeach
                    </h1>
                    <button onclick="regenerateSection('headline', {{ $salesPage->id }})" class="absolute -right-4 top-0 opacity-0 group-hover:opacity-100 transition-all bg-[#CCFF00] rounded-none p-3 border-4 border-black shadow-[4px_4px_0_0_#000] hover:translate-y-1 hover:shadow-[0px_0px_0_0_#000] active:translate-y-2 active:shadow-none" title="Regenerate">
                        <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                    </button>
                </div>

                <div class="group relative mt-10 max-w-2xl">
                    <p class="text-2xl md:text-3xl font-bold leading-snug border-l-8 border-[#00E5FF] pl-6 bg-white p-4">
                        {{ $content['sub_headline'] ?? '' }}
                    </p>
                    <button onclick="regenerateSection('sub_headline', {{ $salesPage->id }})" class="absolute -right-4 top-0 opacity-0 group-hover:opacity-100 transition-all bg-[#00E5FF] rounded-none p-3 border-4 border-black shadow-[4px_4px_0_0_#000] hover:translate-y-1 hover:shadow-[0px_0px_0_0_#000]" title="Regenerate">
                        <svg class="w-5 h-5 text-black" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                    </button>
                </div>

                <div class="mt-12 flex flex-wrap gap-4 items-center">
                    <a href="#pricing" class="inline-flex items-center gap-3 px-8 py-5 bg-[#CCFF00] text-black font-black uppercase text-xl border-4 border-black shadow-[8px_8px_0_0_#000] hover:translate-x-1 hover:translate-y-1 hover:shadow-[4px_4px_0_0_#000] active:translate-x-2 active:translate-y-2 active:shadow-none transition-all">
                        {{ $content['call_to_action'] ?? 'Take Action' }}
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4-4 4M3 12h18"/></svg>
                    </a>
                </div>
            </div>
            
            <div class="md:col-span-4 hidden md:flex flex-col items-end justify-center">
                <div class="bg-black text-white p-6 border-4 border-black rotate-6 shadow-[8px_8px_0_0_#CCFF00] hover:rotate-0 transition-transform duration-300">
                    <div class="text-sm font-bold uppercase tracking-widest text-[#00E5FF] mb-2">Current Price</div>
                    <div class="text-6xl font-black">
                        @if($salesPage->price)${{ number_format($salesPage->price, 0) }}@else FREE @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Description --}}
    <section class="border-b-4 border-black bg-[#00E5FF]">
        <div class="max-w-5xl mx-auto px-6 py-20 md:py-28 group relative">
            <h2 class="text-4xl md:text-6xl font-black uppercase tracking-tight mb-8">What is this?</h2>
            <div class="bg-white border-4 border-black p-8 md:p-12 shadow-[12px_12px_0_0_#000]">
                <p class="text-2xl md:text-4xl font-bold leading-tight">{{ $content['description'] ?? '' }}</p>
            </div>
            <button onclick="regenerateSection('description', {{ $salesPage->id }})" class="absolute right-4 top-4 opacity-0 group-hover:opacity-100 transition-all bg-white rounded-none p-4 border-4 border-black shadow-[4px_4px_0_0_#000] hover:translate-y-1 hover:shadow-[0px_0px_0_0_#000]" title="Regenerate">
                <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            </button>
        </div>
    </section>

    {{-- Benefits --}}
    <section id="benefits" class="border-b-4 border-black bg-black text-white">
        <div class="max-w-6xl mx-auto px-6 py-20 md:py-32">
            <h2 class="text-5xl md:text-8xl font-black uppercase tracking-tighter mb-16 text-center text-[#CCFF00]">
                Why Bother
            </h2>
            <div class="group relative grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12">
                @foreach(($content['benefits'] ?? []) as $i => $benefit)
                    @php
                        $bg = $i % 3 === 0 ? 'bg-[#FF3366]' : ($i % 3 === 1 ? 'bg-[#00E5FF]' : 'bg-[#CCFF00]');
                        $text = $i % 3 === 0 ? 'text-white' : 'text-black';
                    @endphp
                    <div class="{{ $bg }} {{ $text }} border-4 border-white p-8 md:p-10 shadow-[8px_8px_0_0_#fff] hover:-translate-y-2 hover:shadow-[12px_12px_0_0_#fff] transition-all">
                        <div class="text-5xl font-black mb-4">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</div>
                        <p class="text-2xl md:text-3xl font-bold leading-tight">{{ $benefit }}</p>
                    </div>
                @endforeach
                <button onclick="regenerateSection('benefits', {{ $salesPage->id }})" class="absolute -right-4 -top-4 opacity-0 group-hover:opacity-100 transition-all bg-white rounded-none p-4 border-4 border-black shadow-[4px_4px_0_0_#CCFF00]" title="Regenerate">
                    <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                </button>
            </div>
        </div>
    </section>

    {{-- Features --}}
    <section id="features" class="border-b-4 border-black bg-white">
        <div class="max-w-6xl mx-auto px-6 py-20 md:py-32">
            <h2 class="text-5xl md:text-8xl font-black uppercase tracking-tighter mb-16 text-center">
                The Specs
            </h2>
            <div class="group relative grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach(($content['features_breakdown'] ?? []) as $i => $feature)
                    <div class="bg-white border-4 border-black p-8 shadow-[8px_8px_0_0_#FF3366] {{ $i % 2 === 0 ? '-rotate-1' : 'rotate-2' }} hover:rotate-0 transition-transform">
                        <h3 class="text-2xl md:text-3xl font-black uppercase mb-4">{{ $feature['title'] ?? '' }}</h3>
                        <p class="text-xl font-bold">{{ $feature['description'] ?? '' }}</p>
                    </div>
                @endforeach
                <button onclick="regenerateSection('features_breakdown', {{ $salesPage->id }})" class="absolute -right-4 -top-4 opacity-0 group-hover:opacity-100 transition-all bg-[#FF3366] rounded-none p-4 border-4 border-black shadow-[4px_4px_0_0_#000]" title="Regenerate">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                </button>
            </div>
        </div>
    </section>

    {{-- Social proof --}}
    <section class="border-b-4 border-black bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjIiIGZpbGw9IiNjY2MiIGZpbGwtb3BhY2l0eT0iMC40Ii8+PC9zdmc+')]">
        <div class="max-w-4xl mx-auto px-6 py-20 md:py-32 group relative">
            <div class="bg-[#CCFF00] border-4 border-black p-10 md:p-16 shadow-[16px_16px_0_0_#000] text-center">
                <p class="text-3xl md:text-5xl font-black uppercase leading-tight">
                    "{{ $content['social_proof'] ?? 'LOUD, HONEST, USEFUL.' }}"
                </p>
                <div class="mt-8 font-bold text-xl uppercase tracking-widest border-t-4 border-black pt-8 inline-block">
                    — {{ $salesPage->target_audience ?? 'VERIFIED USER' }}
                </div>
            </div>
            <button onclick="regenerateSection('social_proof', {{ $salesPage->id }})" class="absolute right-0 -top-4 opacity-0 group-hover:opacity-100 transition-all bg-black rounded-none p-4 border-4 border-[#CCFF00] shadow-[4px_4px_0_0_#CCFF00]" title="Regenerate">
                <svg class="w-6 h-6 text-[#CCFF00]" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            </button>
        </div>
    </section>

    {{-- Pricing --}}
    <section id="pricing" class="bg-[#FF3366] text-white">
        <div class="max-w-6xl mx-auto px-6 py-20 md:py-32 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div>
                <h2 class="text-6xl md:text-8xl font-black uppercase leading-[0.85] mb-6">
                    PAY UP.
                </h2>
                <p class="text-2xl font-bold uppercase tracking-wider mb-8">No tiers. No coupons. One price.</p>
                <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMDAgMTAwIj48cGF0aCBkPSJNMTAgOTBsODAtODBNOTAgOTBMMTAgMTAiIHN0cm9rZT0iIzAwMCIgc3Ryb2tlLXdpZHRoPSIxMCIvPjwvc3ZnPg==" alt="Strike" class="w-20 h-20 opacity-50">
            </div>
            
            <div class="group relative">
                <div class="bg-black text-white border-4 border-black p-10 md:p-14 shadow-[16px_16px_0_0_#00E5FF] -rotate-2 hover:rotate-0 transition-transform duration-300 text-center">
                    @if($salesPage->price)
                        <div class="text-7xl md:text-9xl font-black text-[#CCFF00] mb-6">
                            ${{ number_format($salesPage->price, 0) }}
                        </div>
                    @else
                        <div class="text-7xl md:text-9xl font-black text-[#CCFF00] mb-6 uppercase">
                            FREE
                        </div>
                    @endif
                    
                    <p class="text-xl md:text-2xl font-bold mb-10">
                        @if(is_array($content['pricing_display'] ?? null))
                            {{ $content['pricing_display']['value'] ?? '' }}
                        @else
                            {{ $content['pricing_display'] ?? '' }}
                        @endif
                    </p>
                    
                    <a href="#" class="block w-full py-5 bg-[#00E5FF] text-black font-black uppercase text-2xl border-4 border-black shadow-[8px_8px_0_0_#fff] hover:translate-x-1 hover:translate-y-1 hover:shadow-[4px_4px_0_0_#fff] active:translate-x-2 active:translate-y-2 active:shadow-none transition-all">
                        {{ $content['call_to_action'] ?? 'Get It Now' }}
                    </a>
                </div>
                <button onclick="regenerateSection('pricing_display', {{ $salesPage->id }})" class="absolute -right-4 -top-4 opacity-0 group-hover:opacity-100 transition-all bg-white rounded-none p-4 border-4 border-black shadow-[4px_4px_0_0_#00E5FF]" title="Regenerate">
                    <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                </button>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-black text-white border-t-8 border-white">
        <div class="max-w-6xl mx-auto px-6 py-12 flex flex-col md:flex-row justify-between items-center gap-6">
            <h3 class="text-4xl md:text-5xl font-black uppercase tracking-tighter">{{ $salesPage->product_name }}</h3>
            <div class="bg-[#CCFF00] text-black px-6 py-3 font-black uppercase text-xl -rotate-2">
                © {{ date('Y') }}
            </div>
        </div>
    </footer>

</div>
