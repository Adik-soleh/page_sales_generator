{{-- Modern Template — Editorial / Magazine --}}
@php $content = $content ?? []; @endphp

<div class="bg-ivory text-ink">

    {{-- Issue masthead --}}
    <header class="border-b-2 border-ink">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3 text-[11px] font-mono uppercase tracking-[0.18em] text-ink/70">
                <span class="font-bold text-ink">№ {{ str_pad($salesPage->id ?? 1, 3, '0', STR_PAD_LEFT) }}</span>
                <span class="hidden sm:inline">/</span>
                <span class="hidden sm:inline">Vol. {{ now()->format('y') }}</span>
                <span class="hidden sm:inline">/</span>
                <span class="hidden sm:inline">{{ now()->format('d M Y') }}</span>
            </div>
            <div class="text-[11px] font-mono uppercase tracking-[0.18em] text-ink/70">
                <span class="hidden sm:inline">An editorial on</span> <span class="font-bold text-ink">{{ $salesPage->product_name }}</span>
            </div>
        </div>
    </header>

    {{-- Hero — asymmetric editorial --}}
    <section class="border-b-2 border-ink">
        <div class="max-w-6xl mx-auto px-6 py-12 md:py-20 grid grid-cols-12 gap-6 md:gap-10">
            <div class="col-span-12 md:col-span-1 hidden md:flex flex-col items-start gap-3">
                <span class="font-mono text-[10px] uppercase tracking-[0.22em] text-ink/60 [writing-mode:vertical-rl]">Feature / 01</span>
            </div>

            <div class="col-span-12 md:col-span-7">
                <span class="text-[11px] font-mono uppercase tracking-[0.22em] text-salmon-600 font-bold">Cover Story</span>
                <div class="group relative mt-4">
                    <h1 class="h-display text-[clamp(2.5rem,7vw,5.5rem)] leading-[0.95] text-ink">
                        {{ $content['headline'] ?? 'Your Headline' }}
                    </h1>
                    <button @click="regenerate('headline')" :disabled="regenerating.headline" class="absolute -right-1 top-0 opacity-0 group-hover:opacity-100 transition-opacity bg-ivory rounded-full p-2 border-2 border-ink" title="Regenerate">
                        <svg class="w-4 h-4" :class="{'animate-spin':regenerating.headline}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                    </button>
                </div>
                <div class="group relative mt-6 max-w-xl">
                    <p class="font-display text-xl md:text-2xl italic text-ink/75 leading-snug">{{ $content['sub_headline'] ?? '' }}</p>
                    <button @click="regenerate('sub_headline')" :disabled="regenerating.sub_headline" class="absolute -right-1 top-0 opacity-0 group-hover:opacity-100 transition-opacity bg-ivory rounded-full p-2 border-2 border-ink" title="Regenerate">
                        <svg class="w-4 h-4" :class="{'animate-spin':regenerating.sub_headline}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                    </button>
                </div>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="#pricing" class="inline-flex items-center px-7 py-3 bg-ink text-ivory font-semibold rounded-full border-2 border-ink hover:bg-salmon hover:text-ink transition-colors">
                        {{ $content['call_to_action'] ?? 'Read More' }}
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2.4" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4-4 4M3 12h18"/></svg>
                    </a>
                    <a href="#benefits" class="inline-flex items-center px-7 py-3 font-semibold rounded-full border-2 border-ink hover:bg-ivory-200 transition-colors">Read story →</a>
                </div>
            </div>

            <aside class="col-span-12 md:col-span-4 md:border-l-2 md:border-ink md:pl-8 flex flex-col justify-between">
                <div>
                    <div class="text-[10px] font-mono uppercase tracking-[0.22em] text-ink/60 mb-3">In this issue</div>
                    <ol class="space-y-2 text-sm">
                        <li class="flex items-baseline gap-2 border-b border-ink/15 pb-2"><span class="font-mono text-ink/50">01</span><span class="font-medium">The brief</span><span class="ml-auto text-ink/40 text-xs">p. 1</span></li>
                        <li class="flex items-baseline gap-2 border-b border-ink/15 pb-2"><span class="font-mono text-ink/50">02</span><span class="font-medium">The benefits</span><span class="ml-auto text-ink/40 text-xs">p. 2</span></li>
                        <li class="flex items-baseline gap-2 border-b border-ink/15 pb-2"><span class="font-mono text-ink/50">03</span><span class="font-medium">The features</span><span class="ml-auto text-ink/40 text-xs">p. 3</span></li>
                        <li class="flex items-baseline gap-2 border-b border-ink/15 pb-2"><span class="font-mono text-ink/50">04</span><span class="font-medium">A reader's note</span><span class="ml-auto text-ink/40 text-xs">p. 4</span></li>
                        <li class="flex items-baseline gap-2"><span class="font-mono text-ink/50">05</span><span class="font-medium">The offer</span><span class="ml-auto text-ink/40 text-xs">p. 5</span></li>
                    </ol>
                </div>
                <div class="mt-8 pt-6 border-t-2 border-ink">
                    <div class="text-[10px] font-mono uppercase tracking-[0.22em] text-ink/60">For</div>
                    <div class="font-display text-lg italic mt-1 leading-tight">{{ $salesPage->target_audience ?? 'Discerning readers' }}</div>
                </div>
            </aside>
        </div>
    </section>

    {{-- Description / drop-cap article --}}
    <section class="border-b-2 border-ink">
        <div class="max-w-6xl mx-auto px-6 py-14 md:py-20 grid grid-cols-12 gap-6 md:gap-10">
            <div class="col-span-12 md:col-span-3 md:sticky md:top-24 self-start">
                <span class="text-[10px] font-mono uppercase tracking-[0.22em] text-ink/60 block">§ 01</span>
                <h2 class="font-display text-3xl italic mt-2 leading-tight">The brief</h2>
                <div class="w-12 h-[3px] bg-salmon mt-3"></div>
            </div>
            <div class="col-span-12 md:col-span-9 group relative">
                <p class="font-display text-lg md:text-xl leading-relaxed text-ink/80 first-letter:font-display first-letter:text-7xl first-letter:font-bold first-letter:float-left first-letter:mr-3 first-letter:mt-1 first-letter:leading-[0.85] first-letter:text-ink">
                    {{ $content['description'] ?? '' }}
                </p>
                <button @click="regenerate('description')" :disabled="regenerating.description" class="absolute -right-1 top-0 opacity-0 group-hover:opacity-100 transition-opacity bg-ivory rounded-full p-2 border-2 border-ink" title="Regenerate">
                    <svg class="w-4 h-4" :class="{'animate-spin':regenerating.description}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                </button>
            </div>
        </div>
    </section>

    {{-- Benefits --}}
    <section id="benefits" class="border-b-2 border-ink bg-ivory-50">
        <div class="max-w-6xl mx-auto px-6 py-14 md:py-20 grid grid-cols-12 gap-6 md:gap-10">
            <div class="col-span-12 md:col-span-3 md:sticky md:top-24 self-start">
                <span class="text-[10px] font-mono uppercase tracking-[0.22em] text-ink/60 block">§ 02</span>
                <h2 class="font-display text-3xl italic mt-2 leading-tight">The benefits</h2>
                <div class="w-12 h-[3px] bg-salmon mt-3"></div>
                <p class="text-sm text-ink/60 mt-4">Why readers turn the page.</p>
            </div>
            <div class="col-span-12 md:col-span-9 group relative">
                <ol class="space-y-0">
                    @foreach(($content['benefits'] ?? []) as $i => $benefit)
                        <li class="flex items-baseline gap-6 py-5 {{ !$loop->last ? 'border-b border-ink/20' : '' }}">
                            <span class="font-display text-4xl md:text-5xl italic text-salmon font-medium leading-none w-14 flex-shrink-0">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            <p class="font-display text-lg md:text-xl leading-snug text-ink">{{ $benefit }}</p>
                        </li>
                    @endforeach
                </ol>
                <button @click="regenerate('benefits')" :disabled="regenerating.benefits" class="absolute -right-1 top-0 opacity-0 group-hover:opacity-100 transition-opacity bg-ivory rounded-full p-2 border-2 border-ink" title="Regenerate">
                    <svg class="w-4 h-4" :class="{'animate-spin':regenerating.benefits}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                </button>
            </div>
        </div>
    </section>

    {{-- Features --}}
    <section id="features" class="border-b-2 border-ink">
        <div class="max-w-6xl mx-auto px-6 py-14 md:py-20">
            <div class="flex items-end justify-between flex-wrap gap-3 mb-10">
                <div>
                    <span class="text-[10px] font-mono uppercase tracking-[0.22em] text-ink/60 block">§ 03</span>
                    <h2 class="font-display text-4xl md:text-5xl italic mt-2">The features</h2>
                </div>
                <span class="text-[11px] font-mono uppercase tracking-[0.18em] text-ink/50">A breakdown — read across</span>
            </div>
            <div class="group relative">
                <div class="grid grid-cols-1 md:grid-cols-3 border-y-2 border-ink">
                    @foreach(($content['features_breakdown'] ?? []) as $i => $feature)
                        <article class="p-6 md:p-7 {{ $i % 3 !== 2 ? 'md:border-r-2 md:border-ink' : '' }} {{ $i >= 3 ? 'border-t-2 border-ink' : '' }}">
                            <div class="flex items-baseline justify-between mb-3">
                                <span class="font-mono text-[11px] font-bold uppercase tracking-[0.18em] text-ink/60">Fig. {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                <span class="text-salmon font-display italic text-2xl leading-none">·</span>
                            </div>
                            <h3 class="font-display text-2xl font-semibold leading-tight mb-2">{{ $feature['title'] ?? '' }}</h3>
                            <p class="text-ink/70 leading-relaxed text-[15px]">{{ $feature['description'] ?? '' }}</p>
                        </article>
                    @endforeach
                </div>
                <button @click="regenerate('features_breakdown')" :disabled="regenerating.features_breakdown" class="absolute -right-1 -top-2 opacity-0 group-hover:opacity-100 transition-opacity bg-ivory rounded-full p-2 border-2 border-ink" title="Regenerate">
                    <svg class="w-4 h-4" :class="{'animate-spin':regenerating.features_breakdown}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                </button>
            </div>
        </div>
    </section>

    {{-- Social proof — pull quote --}}
    <section class="border-b-2 border-ink bg-salmon/20">
        <div class="max-w-4xl mx-auto px-6 py-16 md:py-24 group relative">
            <span class="text-[10px] font-mono uppercase tracking-[0.22em] text-ink/60 block">§ 04 — A reader's note</span>
            <div class="font-display text-3xl md:text-5xl italic leading-[1.1] mt-6">
                <span class="text-salmon-600 mr-1">&ldquo;</span>{{ $content['social_proof'] ?? 'Trusted by thousands.' }}<span class="text-salmon-600 ml-1">&rdquo;</span>
            </div>
            <div class="mt-7 flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-ink text-ivory font-display font-semibold flex items-center justify-center text-sm">
                    {{ strtoupper(substr($salesPage->target_audience ?? 'A', 0, 1)) }}
                </div>
                <div class="text-sm">
                    <div class="font-bold">A verified reader</div>
                    <div class="text-ink/60 text-xs font-mono uppercase tracking-widest">{{ $salesPage->target_audience ?? 'Reader' }}</div>
                </div>
            </div>
            <button @click="regenerate('social_proof')" :disabled="regenerating.social_proof" class="absolute right-4 top-4 opacity-0 group-hover:opacity-100 transition-opacity bg-ivory rounded-full p-2 border-2 border-ink" title="Regenerate">
                <svg class="w-4 h-4" :class="{'animate-spin':regenerating.social_proof}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            </button>
        </div>
    </section>

    {{-- Pricing --}}
    <section id="pricing" class="border-b-2 border-ink">
        <div class="max-w-6xl mx-auto px-6 py-14 md:py-20 grid grid-cols-12 gap-6 md:gap-10 items-stretch">
            <div class="col-span-12 md:col-span-5">
                <span class="text-[10px] font-mono uppercase tracking-[0.22em] text-ink/60 block">§ 05</span>
                <h2 class="font-display text-4xl md:text-5xl italic mt-2 leading-tight">The offer</h2>
                <p class="text-ink/70 mt-4 max-w-sm leading-relaxed">A single subscription. No tiers, no surprises. Cancel any time.</p>
            </div>
            <div class="col-span-12 md:col-span-7 group relative">
                <div class="border-2 border-ink rounded-2xl p-7 md:p-9 bg-ivory-50 relative overflow-hidden">
                    <div class="absolute top-4 right-4 text-[10px] font-mono uppercase tracking-[0.22em] text-ink/50">Form 05/A</div>
                    @if($salesPage->price)
                        <div class="flex items-baseline gap-2">
                            <span class="font-display text-7xl md:text-8xl font-medium leading-none">${{ number_format($salesPage->price, 0) }}</span>
                            @if(fmod($salesPage->price, 1) > 0)
                                <span class="font-display text-3xl text-ink/50">.{{ str_pad((string)round(fmod($salesPage->price, 1) * 100), 2, '0', STR_PAD_LEFT) }}</span>
                            @endif
                        </div>
                    @endif
                    <p class="text-ink/70 mt-4 max-w-md leading-relaxed">{{ $content['pricing_display'] ?? '' }}</p>
                    <a href="#" class="inline-flex items-center mt-7 px-7 py-3.5 bg-ink text-ivory font-semibold rounded-full border-2 border-ink hover:bg-salmon hover:text-ink transition-colors">
                        {{ $content['call_to_action'] ?? 'Subscribe' }}
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2.4" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4-4 4M3 12h18"/></svg>
                    </a>
                    <p class="text-[11px] font-mono uppercase tracking-widest text-ink/50 mt-4">30-day refund. Plain promise.</p>
                </div>
                <button @click="regenerate('pricing_display')" :disabled="regenerating.pricing_display" class="absolute -right-1 -top-2 opacity-0 group-hover:opacity-100 transition-opacity bg-ivory rounded-full p-2 border-2 border-ink" title="Regenerate">
                    <svg class="w-4 h-4" :class="{'animate-spin':regenerating.pricing_display}" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                </button>
            </div>
        </div>
    </section>

    {{-- Colophon footer --}}
    <footer class="bg-ink text-ivory">
        <div class="max-w-6xl mx-auto px-6 py-10 grid grid-cols-12 gap-6">
            <div class="col-span-12 md:col-span-6">
                <div class="text-[10px] font-mono uppercase tracking-[0.22em] text-ivory/60">Colophon</div>
                <h3 class="font-display text-3xl italic mt-2">{{ $salesPage->product_name }}</h3>
                <p class="text-ivory/65 text-sm mt-3 max-w-sm leading-relaxed">An editorial published for {{ $salesPage->target_audience ?? 'discerning readers' }}.</p>
            </div>
            <div class="col-span-12 md:col-span-6 md:text-right text-[11px] font-mono uppercase tracking-[0.18em] text-ivory/55 flex md:justify-end items-end">
                © {{ date('Y') }} — Issue №{{ str_pad($salesPage->id ?? 1, 3, '0', STR_PAD_LEFT) }}
            </div>
        </div>
    </footer>

</div>
