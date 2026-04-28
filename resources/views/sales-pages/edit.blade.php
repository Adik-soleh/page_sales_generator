@section('title', 'Edit — ' . $salesPage->product_name)

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('sales-pages.show', $salesPage) }}" class="btn-ghost p-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <div>
                <h1 class="font-heading text-2xl font-bold text-dark">Edit Sales Page</h1>
                <p class="text-dark-400 mt-1">Update product info and regenerate your sales copy</p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('sales-pages.update', $salesPage) }}"
                  x-data="{ loading: false, template: '{{ $salesPage->template }}' }" @submit="loading = true">
                @csrf
                @method('PUT')

                <div class="card p-8">
                    <div class="mb-6">
                        <label for="product_name" class="label-text">Product / Service Name <span class="text-red-400">*</span></label>
                        <input type="text" name="product_name" id="product_name"
                               value="{{ old('product_name', $salesPage->product_name) }}" class="input-field" required />
                        <x-input-error :messages="$errors->get('product_name')" class="mt-2" />
                    </div>

                    <div class="mb-6">
                        <label for="description" class="label-text">Product Description <span class="text-red-400">*</span></label>
                        <textarea name="description" id="description" rows="4" class="input-field resize-none"
                                  required>{{ old('description', $salesPage->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <div class="mb-6">
                        <label for="features" class="label-text">Key Features <span class="text-red-400">*</span></label>
                        <input type="text" name="features" id="features"
                               value="{{ old('features', is_array($salesPage->features) ? implode(', ', $salesPage->features) : $salesPage->features) }}"
                               class="input-field" required />
                        <p class="text-xs text-dark-300 mt-1.5">Separate features with commas</p>
                        <x-input-error :messages="$errors->get('features')" class="mt-2" />
                    </div>

                    <div class="mb-6">
                        <label for="target_audience" class="label-text">Target Audience <span class="text-red-400">*</span></label>
                        <input type="text" name="target_audience" id="target_audience"
                               value="{{ old('target_audience', $salesPage->target_audience) }}" class="input-field" required />
                        <x-input-error :messages="$errors->get('target_audience')" class="mt-2" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="price" class="label-text">Price (USD)</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-dark-300 font-medium">$</span>
                                <input type="number" name="price" id="price"
                                       value="{{ old('price', $salesPage->price) }}" class="input-field pl-8"
                                       step="0.01" min="0" />
                            </div>
                        </div>

                        <div>
                            <label class="label-text">Design Template</label>
                            <div class="grid grid-cols-3 gap-2">
                                @foreach(['modern', 'bold', 'minimal'] as $tmpl)
                                <label class="cursor-pointer">
                                    <input type="radio" name="template" value="{{ $tmpl }}" x-model="template" class="sr-only" />
                                    <div :class="template === '{{ $tmpl }}' ? 'border-dark-800 bg-dark-50 ring-1 ring-dark-300' : 'border-dark-200 hover:border-dark-300'"
                                         class="border rounded-xl p-3 text-center transition-all duration-200">
                                        <span class="text-xs font-semibold text-dark-600">{{ ucfirst($tmpl) }}</span>
                                    </div>
                                </label>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="mb-8">
                        <label for="selling_points" class="label-text">Unique Selling Points</label>
                        <textarea name="selling_points" id="selling_points" rows="3" class="input-field resize-none">{{ old('selling_points', $salesPage->selling_points) }}</textarea>
                    </div>

                    <div class="flex items-center justify-between pt-6 border-t border-dark-100">
                        <a href="{{ route('sales-pages.show', $salesPage) }}" class="btn-secondary">Cancel</a>
                        <div class="flex gap-3">
                            <button type="submit" class="btn-secondary" :disabled="loading">Save Without Regenerating</button>
                            <button type="submit" name="regenerate" value="1" class="btn-primary" :disabled="loading">
                                <template x-if="!loading">
                                    <span class="flex items-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                        </svg>
                                        Save & Regenerate
                                    </span>
                                </template>
                                <template x-if="loading">
                                    <span class="flex items-center"><div class="spinner mr-3"></div>Processing...</span>
                                </template>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
