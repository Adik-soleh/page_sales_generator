@section('title', 'Create Sales Page')

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('sales-pages.index') }}" class="btn-ghost p-2 border-2 border-ink rounded-full">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <div>
                <span class="eyebrow">New page</span>
                <h1 class="h-display text-3xl md:text-4xl mt-1.5">Forge a <em>sales page</em></h1>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('sales-pages.store') }}" x-data="{ loading: false, template: 'modern' }" @submit="loading = true">
                @csrf

                <div class="grid grid-cols-12 gap-5">
                    {{-- Form --}}
                    <div class="col-span-12 lg:col-span-8 card p-6 md:p-8">
                        <div class="grid grid-cols-12 gap-5">
                            <div class="col-span-12">
                                <label for="product_name" class="label-text">Product / Service Name <span class="text-salmon">*</span></label>
                                <input type="text" name="product_name" id="product_name" value="{{ old('product_name') }}"
                                       class="input-field" placeholder="e.g. CloudSync Pro" required />
                                <x-input-error :messages="$errors->get('product_name')" class="mt-2" />
                            </div>

                            <div class="col-span-12">
                                <label for="description" class="label-text">Product Description <span class="text-salmon">*</span></label>
                                <textarea name="description" id="description" rows="4" class="input-field resize-none"
                                          placeholder="What is it? Who's it for? What problem does it solve?" required>{{ old('description') }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>

                            <div class="col-span-12">
                                <label for="features" class="label-text">Key Features <span class="text-salmon">*</span></label>
                                <input type="text" name="features" id="features" value="{{ old('features') }}"
                                       class="input-field" placeholder="Real-time sync, 99.9% uptime, API access" required />
                                <p class="text-[11px] font-mono uppercase tracking-widest text-ink/50 mt-2">// separate with commas</p>
                                <x-input-error :messages="$errors->get('features')" class="mt-2" />
                            </div>

                            <div class="col-span-12 md:col-span-7">
                                <label for="target_audience" class="label-text">Target Audience <span class="text-salmon">*</span></label>
                                <input type="text" name="target_audience" id="target_audience" value="{{ old('target_audience') }}"
                                       class="input-field" placeholder="Small business owners, freelancers" required />
                                <x-input-error :messages="$errors->get('target_audience')" class="mt-2" />
                            </div>

                            <div class="col-span-12 md:col-span-5">
                                <label for="price" class="label-text">Price (USD)</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-ink/50 font-bold">$</span>
                                    <input type="number" name="price" id="price" value="{{ old('price') }}"
                                           class="input-field pl-8" placeholder="0.00" step="0.01" min="0" />
                                </div>
                                <x-input-error :messages="$errors->get('price')" class="mt-2" />
                            </div>

                            <div class="col-span-12">
                                <label class="label-text">Design Template</label>
                                <div class="grid grid-cols-3 gap-3">
                                    @php
                                        $templates = [
                                            'modern'  => ['label' => 'Modern',  'thumb' => 'bg-lime',          'desc' => 'Rich, dynamic'],
                                            'bold'    => ['label' => 'Bold',    'thumb' => 'bg-ink',           'desc' => 'Dark, impactful'],
                                            'minimal' => ['label' => 'Minimal', 'thumb' => 'bg-ivory-100 border border-ink/30', 'desc' => 'Clean, refined'],
                                        ];
                                    @endphp
                                    @foreach($templates as $key => $t)
                                        <label class="cursor-pointer">
                                            <input type="radio" name="template" value="{{ $key }}" x-model="template" class="sr-only" {{ $key === 'modern' ? 'checked' : '' }} />
                                            <div :class="template === '{{ $key }}' ? 'border-ink shadow-brutal -translate-x-[2px] -translate-y-[2px]' : 'border-ink/30'"
                                                 class="border-2 rounded-2xl p-3 transition-all duration-150 bg-ivory-50">
                                                <div class="rounded-lg {{ $t['thumb'] }} h-16 flex items-end p-2">
                                                    <div class="space-y-1 w-full">
                                                        <div class="h-1.5 rounded-full {{ $key === 'bold' ? 'bg-lime' : 'bg-ink' }} w-2/3"></div>
                                                        <div class="h-1 rounded-full {{ $key === 'bold' ? 'bg-ivory/40' : 'bg-ink/30' }} w-full"></div>
                                                    </div>
                                                </div>
                                                <div class="flex items-center justify-between mt-2">
                                                    <span class="text-xs font-bold">{{ $t['label'] }}</span>
                                                    <span x-show="template === '{{ $key }}'" class="w-4 h-4 rounded-full bg-lime border-2 border-ink flex items-center justify-center">
                                                        <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                                    </span>
                                                </div>
                                                <p class="text-[10px] font-mono uppercase tracking-widest text-ink/50 mt-0.5">{{ $t['desc'] }}</p>
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-span-12">
                                <label for="selling_points" class="label-text">Unique Selling Points</label>
                                <textarea name="selling_points" id="selling_points" rows="3" class="input-field resize-none"
                                          placeholder="What makes this different? Patents, exclusives, awards, results...">{{ old('selling_points') }}</textarea>
                                <x-input-error :messages="$errors->get('selling_points')" class="mt-2" />
                            </div>
                        </div>

                        <div class="flex items-center justify-end gap-3 pt-5 mt-5 border-t-2 border-ink/10">
                            <a href="{{ route('sales-pages.index') }}" class="btn-secondary">Cancel</a>
                            <button type="submit" class="btn-accent" :disabled="loading">
                                <template x-if="!loading">
                                    <span class="flex items-center">
                                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                        Generate page
                                    </span>
                                </template>
                                <template x-if="loading">
                                    <span class="flex items-center"><span class="spinner mr-2"></span>Generating with AI...</span>
                                </template>
                            </button>
                        </div>
                    </div>

                    {{-- Side rail --}}
                    <aside class="col-span-12 lg:col-span-4 space-y-4">
                        <div class="card-dark p-5 relative overflow-hidden">
                            <span class="badge bg-lime text-ink text-[10px]">★ How AI helps</span>
                            <h3 class="h-display text-2xl font-semibold mt-3 text-ivory">Better input,<br><em class="text-lime not-italic" style="font-style:italic;">better page</em>.</h3>
                            <ul class="mt-4 space-y-2.5 text-sm text-ivory/75">
                                <li class="flex gap-2"><span class="text-lime font-bold">→</span> Be concrete about who it's for</li>
                                <li class="flex gap-2"><span class="text-lime font-bold">→</span> List the top 3-5 features only</li>
                                <li class="flex gap-2"><span class="text-lime font-bold">→</span> Mention measurable outcomes</li>
                                <li class="flex gap-2"><span class="text-lime font-bold">→</span> Skip jargon — write plainly</li>
                            </ul>
                            <div class="absolute -right-6 -bottom-6 w-24 h-24 rounded-full bg-lime/20 blur-2xl"></div>
                        </div>

                        <div class="card p-5">
                            <span class="eyebrow">What you'll get</span>
                            <div class="grid grid-cols-2 gap-2 mt-3">
                                <span class="badge bg-ivory-100 text-[10px]">Headline</span>
                                <span class="badge bg-ivory-100 text-[10px]">Sub-headline</span>
                                <span class="badge bg-ivory-100 text-[10px]">Description</span>
                                <span class="badge bg-ivory-100 text-[10px]">Benefits</span>
                                <span class="badge bg-ivory-100 text-[10px]">Features</span>
                                <span class="badge bg-ivory-100 text-[10px]">Social proof</span>
                                <span class="badge bg-ivory-100 text-[10px]">Pricing</span>
                                <span class="badge bg-lime text-[10px]">CTA</span>
                            </div>
                        </div>
                    </aside>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
