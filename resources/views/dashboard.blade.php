@section('title', 'Dashboard')

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4 flex-wrap">
            <div>
                <span class="eyebrow">Workspace</span>
                <h1 class="h-display text-3xl md:text-4xl mt-2">
                    {{ now()->hour < 12 ? 'Morning' : (now()->hour < 17 ? 'Afternoon' : 'Evening') }}, <em>{{ Str::limit(Auth::user()->name, 18) }}</em>.
                </h1>
            </div>
            <a href="{{ route('sales-pages.create') }}" class="btn-accent text-sm py-2.5 px-5">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                </svg>
                Forge new page
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Bento stats --}}
            <div class="grid grid-cols-12 auto-rows-[minmax(120px,auto)] gap-4 mb-8">
                {{-- Total --}}
                <div class="col-span-6 md:col-span-3 stat-card relative overflow-hidden">
                    <div class="text-[10px] font-mono uppercase tracking-widest text-ink/60">Total pages</div>
                    <div class="font-display text-5xl md:text-6xl font-bold leading-none mt-2">{{ $totalPages }}</div>
                    <div class="text-[10px] font-mono uppercase tracking-widest text-ink/40 mt-3">All time</div>
                    <div class="absolute -bottom-3 -right-3 w-16 h-16 rounded-full bg-lime border-2 border-ink"></div>
                </div>

                {{-- This month --}}
                <div class="col-span-6 md:col-span-3 stat-card bg-lime relative overflow-hidden">
                    <div class="text-[10px] font-mono uppercase tracking-widest text-ink/70">This month</div>
                    <div class="font-display text-5xl md:text-6xl font-bold leading-none mt-2">
                        {{ Auth::user()->salesPages()->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count() }}
                    </div>
                    <div class="text-[10px] font-mono uppercase tracking-widest text-ink/60 mt-3">{{ now()->format('M Y') }}</div>
                </div>

                {{-- Templates breakdown --}}
                @php
                    $byTemplate = Auth::user()->salesPages()->selectRaw('template, COUNT(*) as c')->groupBy('template')->pluck('c', 'template');
                    $maxT = max([1, $byTemplate->max() ?? 1]);
                @endphp
                <div class="col-span-12 md:col-span-3 stat-card">
                    <div class="text-[10px] font-mono uppercase tracking-widest text-ink/60 mb-3">By template</div>
                    <div class="space-y-2.5">
                        @foreach (['modern' => 'bg-ink', 'bold' => 'bg-salmon', 'minimal' => 'bg-ivory-200'] as $t => $color)
                            @php $count = $byTemplate[$t] ?? 0; $w = $maxT > 0 ? round(($count / $maxT) * 100) : 0; @endphp
                            <div>
                                <div class="flex items-center justify-between text-[11px] font-mono uppercase tracking-widest mb-1">
                                    <span>{{ $t }}</span><span class="font-bold">{{ $count }}</span>
                                </div>
                                <div class="h-2 rounded-full bg-ivory-200 border border-ink overflow-hidden">
                                    <div class="h-full {{ $color }} {{ $t === 'minimal' ? 'border-r border-ink' : '' }}" style="width: {{ max($w, $count > 0 ? 6 : 0) }}%;"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Quick action --}}
                <a href="{{ route('sales-pages.create') }}" class="col-span-12 md:col-span-3 card-dark p-5 relative overflow-hidden group">
                    <span class="badge-mono bg-lime text-ink">New</span>
                    <h3 class="h-display text-2xl font-semibold leading-tight mt-3 text-ivory">
                        Forge a <em class="text-lime not-italic" style="font-style:italic;">page</em> →
                    </h3>
                    <p class="text-xs text-ivory/60 mt-1">Drop product info, get a sales page</p>
                    <div class="absolute -right-6 -bottom-6 w-24 h-24 rounded-full bg-lime/20 blur-2xl group-hover:bg-lime/40 transition-all"></div>
                </a>
            </div>

            {{-- Recent pages header --}}
            <div class="flex items-end justify-between mb-5 flex-wrap gap-3">
                <div>
                    <span class="eyebrow">Latest output</span>
                    <h2 class="h-display text-2xl md:text-3xl mt-2">Recent pages</h2>
                </div>
                @if($totalPages > 0)
                    <a href="{{ route('sales-pages.index') }}" class="text-sm font-bold text-ink hover:text-salmon transition-colors flex items-center gap-1.5 underline decoration-2 underline-offset-4 decoration-lime hover:decoration-salmon">
                        View all {{ $totalPages }}
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                @endif
            </div>

            @if($salesPages->isEmpty())
                <div class="card p-10 text-center relative overflow-hidden">
                    <div class="absolute -top-10 -right-10 w-40 h-40 rounded-full bg-lime/40 blur-2xl"></div>
                    <div class="relative">
                        <div class="w-14 h-14 mx-auto mb-4 bg-lime border-2 border-ink rounded-2xl flex items-center justify-center -rotate-6">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <h3 class="h-display text-3xl mb-2">No pages <em>yet</em>.</h3>
                        <p class="text-ink/60 mb-5 max-w-md mx-auto">Drop product details and get a complete sales page in seconds. Headlines, benefits, pricing, CTA — done.</p>
                        <a href="{{ route('sales-pages.create') }}" class="btn-accent">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                            Forge your first page
                        </a>
                    </div>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($salesPages as $i => $page)
                        @php
                            $tmpl = $page->template;
                            $accent = $tmpl === 'bold' ? 'bg-ink text-ivory' : ($tmpl === 'minimal' ? 'bg-ivory-200' : 'bg-lime');
                            $rotation = ['rotate-0', '-rotate-1', 'rotate-1'][$i % 3];
                        @endphp
                        <div class="card p-5 group relative">
                            <div class="flex items-start justify-between gap-2 mb-3">
                                <span class="badge {{ $accent }} text-[10px]">{{ ucfirst($tmpl) }}</span>
                                <span class="text-[10px] font-mono uppercase tracking-widest text-ink/50">{{ $page->created_at->diffForHumans(null, true) }} ago</span>
                            </div>
                            <h3 class="font-display text-xl font-semibold leading-tight line-clamp-1">{{ $page->product_name }}</h3>
                            <p class="text-sm text-ink/65 mt-1.5 line-clamp-2 leading-snug">
                                {{ $page->generated_content['headline'] ?? Str::limit($page->description, 80) }}
                            </p>
                            <div class="flex items-end justify-between gap-3 pt-3 mt-3 border-t-2 border-ink/10">
                                @if($page->price)
                                    <div>
                                        <div class="text-[9px] uppercase font-mono text-ink/50 tracking-widest">Price</div>
                                        <div class="font-display text-xl font-bold leading-none">${{ number_format($page->price, 0) }}</div>
                                    </div>
                                @else
                                    <div class="text-[10px] font-mono uppercase tracking-widest text-ink/40">No price set</div>
                                @endif
                                <div class="flex items-center gap-1.5">
                                    <a href="{{ route('sales-pages.show', $page) }}" class="btn-ghost text-xs py-1.5 px-3" title="Preview">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>
                                    <a href="{{ route('sales-pages.edit', $page) }}" class="btn-ghost text-xs py-1.5 px-3" title="Edit">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
