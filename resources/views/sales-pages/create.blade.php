@section('title', 'Create Sales Page')

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <a href="{{ route('sales-pages.index') }}" class="btn-ghost p-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <div>
                <h1 class="font-heading text-2xl font-bold text-dark">Create Sales Page</h1>
                <p class="text-dark-400 mt-1">Fill in your product details and let AI craft your sales copy</p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('sales-pages.store') }}" x-data="{ loading: false, template: 'modern' }"
                  @submit="loading = true">
                @csrf

                <div class="card p-8">
                    <!-- Product Name -->
                    <div class="mb-6">
                        <label for="product_name" class="label-text">
                            Product / Service Name <span class="text-red-400">*</span>
                        </label>
                        <input type="text" name="product_name" id="product_name" value="{{ old('product_name') }}"
                               class="input-field" placeholder="e.g. CloudSync Pro" required />
                        <x-input-error :messages="$errors->get('product_name')" class="mt-2" />
                    </div>

                    <!-- Description -->
                    <div class="mb-6">
                        <label for="description" class="label-text">
                            Product Description <span class="text-red-400">*</span>
                        </label>
                        <textarea name="description" id="description" rows="4"
                                  class="input-field resize-none" placeholder="Describe your product or service in detail..."
                                  required>{{ old('description') }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    <!-- Features -->
                    <div class="mb-6">
                        <label for="features" class="label-text">
                            Key Features <span class="text-red-400">*</span>
                        </label>
                        <input type="text" name="features" id="features" value="{{ old('features') }}"
                               class="input-field" placeholder="e.g. Real-time sync, 99.9% uptime, API access" required />
                        <p class="text-xs text-dark-300 mt-1.5">Separate features with commas</p>
                        <x-input-error :messages="$errors->get('features')" class="mt-2" />
                    </div>

                    <!-- Target Audience -->
                    <div class="mb-6">
                        <label for="target_audience" class="label-text">
                            Target Audience <span class="text-red-400">*</span>
                        </label>
                        <input type="text" name="target_audience" id="target_audience" value="{{ old('target_audience') }}"
                               class="input-field" placeholder="e.g. Small business owners, freelancers" required />
                        <x-input-error :messages="$errors->get('target_audience')" class="mt-2" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <!-- Price -->
                        <div>
                            <label for="price" class="label-text">Price (USD)</label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-dark-300 font-medium">$</span>
                                <input type="number" name="price" id="price" value="{{ old('price') }}"
                                       class="input-field pl-8" placeholder="0.00" step="0.01" min="0" />
                            </div>
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        <!-- Template -->
                        <div>
                            <label class="label-text">Design Template</label>
                            <div class="grid grid-cols-3 gap-2">
                                <label class="cursor-pointer">
                                    <input type="radio" name="template" value="modern" x-model="template" class="sr-only" checked />
                                    <div :class="template === 'modern' ? 'border-dark-800 bg-dark-50 ring-1 ring-dark-300' : 'border-dark-200 hover:border-dark-300'"
                                         class="border rounded-xl p-3 text-center transition-all duration-200">
                                        <div class="w-8 h-8 mx-auto mb-1 bg-dark-200 rounded-lg"></div>
                                        <span class="text-xs font-semibold text-dark-600">Modern</span>
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="template" value="bold" x-model="template" class="sr-only" />
                                    <div :class="template === 'bold' ? 'border-dark-800 bg-dark-50 ring-1 ring-dark-300' : 'border-dark-200 hover:border-dark-300'"
                                         class="border rounded-xl p-3 text-center transition-all duration-200">
                                        <div class="w-8 h-8 mx-auto mb-1 bg-dark-800 rounded-lg"></div>
                                        <span class="text-xs font-semibold text-dark-600">Bold</span>
                                    </div>
                                </label>
                                <label class="cursor-pointer">
                                    <input type="radio" name="template" value="minimal" x-model="template" class="sr-only" />
                                    <div :class="template === 'minimal' ? 'border-dark-800 bg-dark-50 ring-1 ring-dark-300' : 'border-dark-200 hover:border-dark-300'"
                                         class="border rounded-xl p-3 text-center transition-all duration-200">
                                        <div class="w-8 h-8 mx-auto mb-1 bg-dark-50 rounded-lg border border-dark-200"></div>
                                        <span class="text-xs font-semibold text-dark-600">Minimal</span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Selling Points -->
                    <div class="mb-8">
                        <label for="selling_points" class="label-text">
                            Unique Selling Points
                        </label>
                        <textarea name="selling_points" id="selling_points" rows="3"
                                  class="input-field resize-none" placeholder="What makes your product different from competitors?">{{ old('selling_points') }}</textarea>
                        <x-input-error :messages="$errors->get('selling_points')" class="mt-2" />
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-end gap-4 pt-6 border-t border-dark-100">
                        <a href="{{ route('sales-pages.index') }}" class="btn-secondary">Cancel</a>
                        <button type="submit" class="btn-primary" :disabled="loading">
                            <template x-if="!loading">
                                <span class="flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                    </svg>
                                    Generate Sales Page
                                </span>
                            </template>
                            <template x-if="loading">
                                <span class="flex items-center">
                                    <div class="spinner mr-3"></div>
                                    Generating with AI...
                                </span>
                            </template>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
