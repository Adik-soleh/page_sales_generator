<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SalesForge — Sales Pages, Forged by AI</title>
    <meta name="description"
        content="Turn raw product info into a complete, persuasive sales page in seconds. Headlines, benefits, pricing, CTAs — all written by AI, exported as HTML.">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    {{-- Top ticker --}}
    <div class="bg-ink text-ivory border-b-2 border-ink overflow-hidden">
        <div class="marquee-track py-2 text-xs font-mono uppercase tracking-[0.22em]">
            @for ($i = 0; $i < 2; $i++)
                <div class="flex items-center gap-10 pr-10 whitespace-nowrap">
                    <span>★ AI Sales Page Generator</span>
                    <span class="text-lime">// Headline</span>
                    <span>★ Sub-headline</span>
                    <span class="text-lime">// Benefits</span>
                    <span>★ Features Breakdown</span>
                    <span class="text-salmon">// Social Proof</span>
                    <span>★ Pricing Display</span>
                    <span class="text-lime">// Call-to-Action</span>
                    <span>★ Live Preview</span>
                    <span class="text-salmon">// Export HTML</span>
                </div>
            @endfor
        </div>
    </div>

    {{-- Navbar --}}
    <nav class="sticky top-0 z-50 bg-ivory/85 backdrop-blur border-b-2 border-ink">
        <div class="max-w-7xl mx-auto px-5 md:px-8 h-16 flex items-center justify-between">
            <a href="/" class="flex items-center gap-2.5">
                <div
                    class="w-8 h-8 rounded-lg bg-lime border-2 border-ink flex items-center justify-center font-display font-bold text-ink">
                    S
                </div>
                <span class="font-display text-xl font-bold tracking-tight">Sales<em
                        class="not-italic text-salmon">Forge</em></span>
            </a>
            <div class="hidden md:flex items-center gap-7 text-sm font-medium text-ink/70">
                <a href="#how" class="hover:text-ink">How it works</a>
                <a href="#features" class="hover:text-ink">Features</a>
                <a href="#templates" class="hover:text-ink">Templates</a>
                <a href="#cta" class="hover:text-ink">Pricing</a>
            </div>
            <div class="flex items-center gap-2">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn-accent text-sm py-2 px-5">Dashboard →</a>
                @else
                    <a href="{{ route('login') }}" class="hidden sm:inline-flex btn-ghost text-sm">Log in</a>
                    <a href="{{ route('register') }}" class="btn-accent text-sm py-2 px-5">Start free</a>
                @endauth
            </div>
        </div>
    </nav>

    {{-- Hero --}}
    <section class="relative overflow-hidden grain border-b-2 border-ink">
        <div class="max-w-7xl mx-auto px-5 md:px-8 pt-10 pb-14 md:pt-16 md:pb-20 grid grid-cols-12 gap-6">

            {{-- Left text column --}}
            <div class="col-span-12 lg:col-span-7 relative">
                <span class="eyebrow mb-5">Sales Page Generator</span>

                <h1 class="h-display text-[clamp(3rem,9vw,7rem)] text-ink mt-4">
                    Raw product info<br>
                    <em>becomes</em> a sales<br>
                    page in <span class="relative inline-block">
                        <span class="relative z-10">seconds</span>
                        <span class="absolute inset-x-0 bottom-1 h-4 bg-lime -z-0 -rotate-1"></span>
                    </span>.
                </h1>

                <p class="mt-7 text-lg md:text-xl text-ink/75 max-w-xl leading-relaxed">
                    Drop in a name, a description, features, audience and price. Our AI returns a structured landing
                    page — headline, benefits, pricing, CTA — rendered live, edit-able, exportable.
                </p>

                <div class="mt-7 flex flex-wrap gap-3">
                    <a href="{{ route('register') }}" class="btn-accent text-base px-7 py-3.5">
                        Forge a page
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2.5"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4-4 4M3 12h18" />
                        </svg>
                    </a>
                    <a href="#how" class="btn-secondary text-base px-7 py-3.5">See how</a>
                </div>

                <div
                    class="mt-8 flex flex-wrap items-center gap-x-6 gap-y-2 text-xs font-mono uppercase tracking-[0.16em] text-ink/60">
                    <span class="flex items-center gap-1.5"><span
                            class="w-2 h-2 rounded-full bg-lime border border-ink"></span> Free, no card</span>
                    <span class="flex items-center gap-1.5"><span
                            class="w-2 h-2 rounded-full bg-salmon border border-ink"></span> 3 templates</span>
                    <span class="flex items-center gap-1.5"><span class="w-2 h-2 rounded-full bg-ink"></span> HTML
                        export</span>
                </div>
            </div>

            {{-- Right preview mock --}}
            <div class="col-span-12 lg:col-span-5 relative">
                <div class="absolute -top-2 -right-2 sticker z-20">★ Live Preview</div>

                <div class="card-flat bg-ivory-50 p-5 shadow-brutal-lg rotate-[1.5deg]">
                    {{-- mock browser bar --}}
                    <div class="flex items-center gap-1.5 mb-3">
                        <span class="w-3 h-3 rounded-full bg-salmon border border-ink"></span>
                        <span class="w-3 h-3 rounded-full bg-lime border border-ink"></span>
                        <span class="w-3 h-3 rounded-full bg-ink"></span>
                        <span
                            class="ml-3 px-3 py-1 rounded-full text-[10px] font-mono bg-ivory-100 border border-ink/20">salesforge.app/preview</span>
                    </div>
                    {{-- mock page --}}
                    <div class="space-y-3">
                        <div class="badge-mono text-[9px] py-0.5">Modern Template</div>
                        <div class="font-display text-2xl leading-tight">
                            Ship faster with <em class="not-italic text-salmon">CloudSync Pro</em>
                        </div>
                        <p class="text-xs text-ink/65 leading-relaxed">Real-time sync for teams who refuse to wait.
                            Built for distributed product squads.</p>
                        <div class="grid grid-cols-3 gap-2 pt-1">
                            <div class="bg-lime/40 border border-ink rounded-lg p-2 text-[10px] font-bold">Real-time
                                sync</div>
                            <div class="bg-ivory-100 border border-ink rounded-lg p-2 text-[10px] font-bold">99.9%
                                uptime</div>
                            <div class="bg-salmon/40 border border-ink rounded-lg p-2 text-[10px] font-bold">API access
                            </div>
                        </div>
                        <div class="flex items-end justify-between pt-2 border-t border-ink/15">
                            <div>
                                <div class="text-[9px] uppercase font-mono text-ink/60 tracking-widest">From</div>
                                <div class="font-display text-2xl">$29<span class="text-sm text-ink/60">/mo</span></div>
                            </div>
                            <div class="bg-ink text-ivory text-[10px] font-bold px-3 py-2 rounded-full">Start trial →
                            </div>
                        </div>
                    </div>
                </div>

                {{-- floating chips --}}
                <div
                    class="hidden md:block absolute -left-6 top-10 bg-ivory-50 border-2 border-ink rounded-full px-4 py-2 shadow-brutal -rotate-6">
                    <span class="text-xs font-mono font-bold">⚡ 1.4s avg gen</span>
                </div>
                <div
                    class="hidden md:block absolute -bottom-4 -left-2 bg-lime border-2 border-ink rounded-2xl px-4 py-3 shadow-brutal rotate-3">
                    <div class="text-[9px] uppercase font-mono tracking-widest">CTA written</div>
                    <div class="font-display text-lg leading-none">Try it free →</div>
                </div>
            </div>
        </div>
    </section>

    {{-- How it works --}}
    <section id="how" class="border-b-2 border-ink bg-ivory-50">
        <div class="max-w-7xl mx-auto px-5 md:px-8 py-14 md:py-20">
            <div class="flex items-end justify-between flex-wrap gap-4 mb-10">
                <div>
                    <span class="eyebrow">The process</span>
                    <h2 class="h-display text-5xl md:text-6xl mt-3">Three steps. <em>One</em> page.</h2>
                </div>
                <p class="text-ink/65 max-w-md">No design skills needed. No copywriting headaches. Just product info in,
                    sales page out.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                @php
                    $steps = [
                        ['n' => '01', 'tag' => 'Input', 'color' => 'lime', 'title' => 'Drop product details', 'desc' => 'Name, description, features, audience, price, USPs. Any fields you have.'],
                        ['n' => '02', 'tag' => 'Generate', 'color' => 'salmon', 'title' => 'AI writes the page', 'desc' => 'Headline, sub-headline, benefits, features, social proof, pricing, CTA — structured.'],
                        ['n' => '03', 'tag' => 'Ship', 'color' => 'ink', 'title' => 'Preview, tweak, export', 'desc' => 'Regenerate any single section. Switch template. Export as standalone HTML.'],
                    ];
                @endphp
                @foreach($steps as $s)
                    @php
                        $bg = $s['color'] === 'lime' ? 'bg-lime' : ($s['color'] === 'salmon' ? 'bg-salmon' : 'bg-ink text-ivory');
                    @endphp
                    <div class="card p-6 relative">
                        <div class="flex items-center justify-between mb-4">
                            <div class="font-display text-6xl font-bold leading-none">{{ $s['n'] }}</div>
                            <span class="badge {{ $bg }} text-[10px]">{{ $s['tag'] }}</span>
                        </div>
                        <h3 class="font-display text-2xl font-semibold leading-tight mb-2">{{ $s['title'] }}</h3>
                        <p class="text-ink/70 text-sm leading-relaxed">{{ $s['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Bento features --}}
    <section id="features" class="border-b-2 border-ink">
        <div class="max-w-7xl mx-auto px-5 md:px-8 py-14 md:py-20">
            <div class="flex items-end justify-between flex-wrap gap-4 mb-10">
                <div>
                    <span class="eyebrow">What's inside</span>
                    <h2 class="h-display text-5xl md:text-6xl mt-3">Everything to <em>convert</em>.</h2>
                </div>
            </div>

            <div class="grid grid-cols-12 auto-rows-[minmax(160px,auto)] gap-4">
                {{-- big card --}}
                <div class="col-span-12 md:col-span-7 row-span-2 card-dark p-7 relative overflow-hidden">
                    <span class="badge-mono bg-lime text-ink">★ AI Copy</span>
                    <h3 class="h-display text-4xl md:text-5xl mt-5 text-ivory">
                        Persuasive copy,<br><em class="text-lime not-italic" style="font-style:italic;">written for
                            you</em>.
                    </h3>
                    <p class="mt-4 text-ivory/70 max-w-md leading-relaxed">Each generated page includes a compelling
                        headline, sub-headline, product description, benefits, features breakdown, social proof, pricing
                        display and a clear call-to-action.</p>
                    <div class="mt-6 flex flex-wrap gap-2 text-[10px] font-mono uppercase tracking-widest">
                        <span class="px-2.5 py-1 rounded-full bg-ivory/10 border border-ivory/20">Headline</span>
                        <span class="px-2.5 py-1 rounded-full bg-ivory/10 border border-ivory/20">Sub-headline</span>
                        <span class="px-2.5 py-1 rounded-full bg-ivory/10 border border-ivory/20">Benefits</span>
                        <span class="px-2.5 py-1 rounded-full bg-ivory/10 border border-ivory/20">Features</span>
                        <span class="px-2.5 py-1 rounded-full bg-ivory/10 border border-ivory/20">Social proof</span>
                        <span class="px-2.5 py-1 rounded-full bg-ivory/10 border border-ivory/20">Pricing</span>
                        <span class="px-2.5 py-1 rounded-full bg-lime text-ink border border-lime">CTA</span>
                    </div>
                    <div class="absolute -right-12 -bottom-12 w-48 h-48 rounded-full bg-lime/30 blur-3xl"></div>
                </div>

                {{-- 3 templates --}}
                <div id="templates" class="col-span-12 md:col-span-5 card p-6 bg-lime/40">
                    <span class="badge-mono">3 styles</span>
                    <h3 class="font-display text-2xl font-semibold mt-3">Pick a template</h3>
                    <div class="grid grid-cols-3 gap-2 mt-4">
                        <div class="aspect-[3/4] bg-ivory-50 border-2 border-ink rounded-lg p-2 flex flex-col gap-1">
                            <div class="h-2 bg-ink rounded w-3/4"></div>
                            <div class="h-1 bg-ink/30 rounded w-full"></div>
                            <div class="h-1 bg-ink/30 rounded w-2/3"></div>
                            <div class="mt-auto text-[9px] font-bold">Modern</div>
                        </div>
                        <div class="aspect-[3/4] bg-ink border-2 border-ink rounded-lg p-2 flex flex-col gap-1">
                            <div class="h-2 bg-lime rounded w-3/4"></div>
                            <div class="h-1 bg-ivory/40 rounded w-full"></div>
                            <div class="h-1 bg-ivory/40 rounded w-2/3"></div>
                            <div class="mt-auto text-[9px] font-bold text-lime">Bold</div>
                        </div>
                        <div class="aspect-[3/4] bg-ivory-100 border-2 border-ink rounded-lg p-2 flex flex-col gap-1">
                            <div class="h-2 bg-ink/70 rounded w-1/2"></div>
                            <div class="h-1 bg-ink/20 rounded w-full"></div>
                            <div class="h-1 bg-ink/20 rounded w-3/4"></div>
                            <div class="mt-auto text-[9px] font-bold">Minimal</div>
                        </div>
                    </div>
                </div>

                {{-- export --}}
                <div class="col-span-12 md:col-span-3 card p-6">
                    <div
                        class="w-10 h-10 rounded-xl bg-salmon border-2 border-ink flex items-center justify-center mb-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M7 10l5 5 5-5M12 15V3" />
                        </svg>
                    </div>
                    <h3 class="font-display text-xl font-semibold leading-tight">HTML Export</h3>
                    <p class="text-sm text-ink/70 mt-1.5 leading-relaxed">Standalone .html file. Drop on any host.</p>
                </div>

                {{-- regen --}}
                <div class="col-span-12 md:col-span-2 card p-5 bg-ink text-ivory">
                    <svg class="w-7 h-7 text-lime mb-2" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    <h3 class="font-display text-base font-semibold leading-tight">Section regen</h3>
                    <p class="text-[11px] text-ivory/60 mt-1">One click rewrite</p>
                </div>

                {{-- preview --}}
                <div class="col-span-12 md:col-span-4 card p-6">
                    <div class="flex items-center gap-2 mb-3">
                        <span class="w-2.5 h-2.5 rounded-full bg-salmon border border-ink"></span>
                        <span class="w-2.5 h-2.5 rounded-full bg-lime border border-ink"></span>
                        <span class="w-2.5 h-2.5 rounded-full bg-ink"></span>
                        <span class="text-[10px] font-mono ml-2 text-ink/60">live preview</span>
                    </div>
                    <h3 class="font-display text-xl font-semibold leading-tight">Real landing-page layout</h3>
                    <p class="text-sm text-ink/70 mt-1.5 leading-relaxed">See the rendered page exactly as visitors
                        will. No raw text dumps.</p>
                </div>

                {{-- privacy --}}
                <div class="col-span-12 md:col-span-4 card p-6 bg-salmon/30">
                    <div class="flex items-center gap-3 mb-3">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        <span class="badge-mono text-[10px]">Yours</span>
                    </div>
                    <h3 class="font-display text-xl font-semibold leading-tight">Per-user isolation</h3>
                    <p class="text-sm text-ink/70 mt-1.5 leading-relaxed">Each account only sees its own pages.
                        Auth-gated CRUD.</p>
                </div>

                {{-- save --}}
                <div class="col-span-6 md:col-span-2 card p-5">
                    <div class="font-display text-3xl font-bold leading-none">∞</div>
                    <h3 class="text-sm font-bold mt-2">Saved pages</h3>
                    <p class="text-[11px] text-ink/60 mt-0.5">View, edit, delete</p>
                </div>

                {{-- speed --}}
                <div class="col-span-6 md:col-span-2 card p-5 bg-lime">
                    <div class="font-display text-3xl font-bold leading-none">~1.4s</div>
                    <h3 class="text-sm font-bold mt-2">Avg generation</h3>
                    <p class="text-[11px] text-ink/70 mt-0.5">Fast, end to end</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Showcase --}}
    <section class="border-b-2 border-ink bg-ink text-ivory grain relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-5 md:px-8 py-14 md:py-20 relative z-10">
            <div class="flex items-end justify-between flex-wrap gap-4 mb-10">
                <div>
                    <span class="eyebrow text-ivory/70" style="--tw-text-opacity:1;">In the wild</span>
                    <h2 class="h-display text-5xl md:text-6xl mt-3 text-ivory">Sample <em class="text-lime"
                            style="font-style:italic;">outputs</em>.</h2>
                </div>
                <p class="text-ivory/60 max-w-md">A handful of pages forged from a single product blurb.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                @php
                    $samples = [
                        ['name' => 'CloudSync Pro', 'tag' => 'SaaS', 'price' => '$29/mo', 'head' => 'Sync at the speed of <em>thought</em>.', 'cta' => 'Start trial', 'tmpl' => 'Modern'],
                        ['name' => 'Lumen Lamp', 'tag' => 'D2C', 'price' => '$149', 'head' => 'Light that <em>listens</em>.', 'cta' => 'Buy now', 'tmpl' => 'Bold'],
                        ['name' => 'Mentor AI', 'tag' => 'EdTech', 'price' => '$19/mo', 'head' => 'Tutoring, <em>any hour</em>.', 'cta' => 'Get matched', 'tmpl' => 'Minimal'],
                    ];
                @endphp
                @foreach($samples as $i => $sm)
                    <div
                        class="bg-ivory-50 text-ink rounded-2xl border-2 border-ink p-5 shadow-brutal-lime hover:translate-x-[-2px] hover:translate-y-[-2px] hover:shadow-brutal-lg transition-transform">
                        <div class="flex items-center justify-between mb-3">
                            <span class="badge-mono text-[10px]">{{ $sm['tmpl'] }}</span>
                            <span
                                class="text-[10px] font-mono text-ink/60 uppercase tracking-widest">{{ $sm['tag'] }}</span>
                        </div>
                        <div class="text-[10px] uppercase font-mono text-ink/60 tracking-widest">{{ $sm['name'] }}</div>
                        <h3 class="h-display text-3xl mt-2 leading-tight">{!! $sm['head'] !!}</h3>
                        <div class="flex items-center justify-between pt-4 mt-4 border-t border-ink/15">
                            <span class="font-display text-xl font-bold">{{ $sm['price'] }}</span>
                            <span class="bg-ink text-ivory text-[10px] font-bold px-3 py-1.5 rounded-full">{{ $sm['cta'] }}
                                →</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Final CTA --}}
    <section id="cta" class="border-b-2 border-ink bg-lime relative overflow-hidden">
        <div class="absolute inset-0 grain"></div>
        <div class="max-w-7xl mx-auto px-5 md:px-8 py-16 md:py-24 grid grid-cols-12 gap-6 relative">
            <div class="col-span-12 md:col-span-8">
                <span class="eyebrow">Ready when you are</span>
                <h2 class="h-display text-[clamp(2.75rem,7vw,5.5rem)] text-ink mt-4 leading-[0.95]">
                    Stop staring at<br>blank docs. <em>Forge</em><br>your first page.
                </h2>
                <div class="mt-7 flex flex-wrap gap-3">
                    <a href="{{ route('register') }}" class="btn-primary text-base px-7 py-3.5">
                        Create free account
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" stroke-width="2.5"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4-4 4M3 12h18" />
                        </svg>
                    </a>
                    <a href="{{ route('login') }}" class="btn-secondary text-base px-7 py-3.5">I have an account</a>
                </div>
            </div>
            <div class="col-span-12 md:col-span-4 flex md:justify-end items-end">
                <div class="bg-ink text-ivory rounded-2xl border-2 border-ink p-5 -rotate-2 shadow-brutal max-w-xs">
                    <div class="text-[10px] uppercase font-mono tracking-widest text-lime">Quote</div>
                    <p class="font-display text-xl leading-snug mt-2">"Forged a launch page over coffee. Shipped before
                        lunch."</p>
                    <div class="text-xs text-ivory/60 mt-3">— Nadia, indie founder</div>
                </div>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-ink text-ivory">
        <div class="max-w-7xl mx-auto px-5 md:px-8 py-8 flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2.5">
                <div
                    class="w-7 h-7 rounded-md bg-lime border-2 border-lime flex items-center justify-center font-display font-bold text-ink">
                    S</div>
                <span class="font-display text-lg font-bold tracking-tight">Sales<em
                        class="not-italic text-salmon">Forge</em></span>
            </div>
            <p class="text-xs text-ivory/55 font-mono uppercase tracking-widest">© {{ date('Y') }} — Built for Sales
                Forge
            </p>
        </div>
    </footer>

</body>

</html>