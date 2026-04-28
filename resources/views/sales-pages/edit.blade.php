@section('title', 'Edit — ' . $salesPage->product_name)

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('sales-pages.show', $salesPage) }}" class="btn-ghost p-2 border-2 border-ink rounded-full">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <div>
                <span class="eyebrow">Edit</span>
                <h1 class="h-display text-3xl md:text-4xl mt-1.5 line-clamp-1">{{ $salesPage->product_name }}</h1>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('sales-pages.update', $salesPage) }}"
                  x-data="{ loading: false, template: '{{ $salesPage->template }}' }" @submit="loading = true">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-12 gap-5">
                    <div class="col-span-12 lg:col-span-8 card p-6 md:p-8">
                        <div class="grid grid-cols-12 gap-5">
                            <div class="col-span-12">
                                <label for="product_name" class="label-text">Product / Service Name <span class="text-salmon">*</span></label>
                                <input type="text" name="product_name" id="product_name"
                                       value="{{ old('product_name', $salesPage->product_name) }}" class="input-field" required />
                                <x-input-error :messages="$errors->get('product_name')" class="mt-2" />
                            </div>

                            <div class="col-span-12">
                                <label for="description" class="label-text">Product Description <span class="text-salmon">*</span></label>
                                <textarea name="description" id="description" rows="4" class="input-field resize-none" required>{{ old('description', $salesPage->description) }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>

                            <div class="col-span-12">
                                <label for="features" class="label-text">Key Features <span class="text-salmon">*</span></label>
                                <input type="text" name="features" id="features"
                                       value="{{ old('features', is_array($salesPage->features) ? implode(', ', $salesPage->features) : $salesPage->features) }}"
                                       class="input-field" required />
                                <p class="text-[11px] font-mono uppercase tracking-widest text-ink/50 mt-2">// separate with commas</p>
                                <x-input-error :messages="$errors->get('features')" class="mt-2" />
                            </div>

                            <div class="col-span-12 md:col-span-7">
                                <label for="target_audience" class="label-text">Target Audience <span class="text-salmon">*</span></label>
                                <input type="text" name="target_audience" id="target_audience"
                                       value="{{ old('target_audience', $salesPage->target_audience) }}" class="input-field" required />
                                <x-input-error :messages="$errors->get('target_audience')" class="mt-2" />
                            </div>

                            <div class="col-span-12 md:col-span-5">
                                <label for="price" class="label-text">Price (USD)</label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-ink/50 font-bold">$</span>
                                    <input type="number" name="price" id="price"
                                           value="{{ old('price', $salesPage->price) }}" class="input-field pl-8"
                                           step="0.01" min="0" />
                                </div>
                            </div>

                            <div class="col-span-12">
                                <label class="label-text">Design Template</label>
                                <div class="grid grid-cols-3 gap-3">
                                    @foreach(['modern' => 'bg-lime', 'bold' => 'bg-ink', 'minimal' => 'bg-ivory-100 border border-ink/30'] as $tmpl => $thumb)
                                        <label class="cursor-pointer">
                                            <input type="radio" name="template" value="{{ $tmpl }}" x-model="template" class="sr-only" />
                                            <div :class="template === '{{ $tmpl }}' ? 'border-ink shadow-brutal -translate-x-[2px] -translate-y-[2px]' : 'border-ink/30'"
                                                 class="border-2 rounded-2xl p-3 transition-all duration-150 bg-ivory-50">
                                                <div class="rounded-lg {{ $thumb }} h-16 flex items-end p-2">
                                                    <div class="space-y-1 w-full">
                                                        <div class="h-1.5 rounded-full {{ $tmpl === 'bold' ? 'bg-lime' : 'bg-ink' }} w-2/3"></div>
                                                        <div class="h-1 rounded-full {{ $tmpl === 'bold' ? 'bg-ivory/40' : 'bg-ink/30' }} w-full"></div>
                                                    </div>
                                                </div>
                                                <div class="flex items-center justify-between mt-2">
                                                    <span class="text-xs font-bold">{{ ucfirst($tmpl) }}</span>
                                                    <span x-show="template === '{{ $tmpl }}'" class="w-4 h-4 rounded-full bg-lime border-2 border-ink flex items-center justify-center">
                                                        <svg class="w-2.5 h-2.5" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-span-12">
                                <label for="selling_points" class="label-text">Unique Selling Points</label>
                                <textarea name="selling_points" id="selling_points" rows="3" class="input-field resize-none">{{ old('selling_points', $salesPage->selling_points) }}</textarea>
                            </div>
                        </div>

                        <div class="flex items-center justify-between flex-wrap gap-3 pt-5 mt-5 border-t-2 border-ink/10">
                            <a href="{{ route('sales-pages.show', $salesPage) }}" class="btn-secondary">Cancel</a>
                            <div class="flex flex-wrap gap-2">
                                <button type="submit" class="btn-secondary" :disabled="loading">Save only</button>
                                <button type="submit" name="regenerate" value="1" class="btn-accent" :disabled="loading">
                                    <template x-if="!loading">
                                        <span class="flex items-center">
                                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                                            Save & regenerate
                                        </span>
                                    </template>
                                    <template x-if="loading">
                                        <span class="flex items-center"><span class="spinner mr-2"></span>Working...</span>
                                    </template>
                                </button>
                            </div>
                        </div>
                    </div>

                    <aside class="col-span-12 lg:col-span-4 space-y-4">
                        <div class="card p-5 bg-lime/30">
                            <span class="badge-mono">Tip</span>
                            <h3 class="font-display text-xl font-semibold mt-3 leading-tight">Don't need full regen?</h3>
                            <p class="text-sm text-ink/70 mt-1.5 leading-relaxed">Use <strong>Save only</strong> to update the input data without touching the generated copy. Hop to the preview to regenerate <em>just</em> a single section.</p>
                            <a href="{{ route('sales-pages.show', $salesPage) }}" class="inline-flex items-center mt-3 text-sm font-bold underline decoration-2 underline-offset-4 decoration-ink hover:text-salmon">
                                Open preview →
                            </a>
                        </div>

                        <div class="card-dark p-5">
                            <span class="badge-mono bg-lime text-ink">Heads up</span>
                            <p class="text-sm text-ivory/80 mt-3 leading-relaxed">Hitting <strong class="text-lime">Save & regenerate</strong> will rewrite all sections from scratch using your new input.</p>
                        </div>
                    </aside>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
