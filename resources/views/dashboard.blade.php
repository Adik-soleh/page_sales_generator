@section('title', 'Dashboard')

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="font-heading text-2xl font-bold text-dark">
                    Good {{ now()->hour < 12 ? 'morning' : (now()->hour < 17 ? 'afternoon' : 'evening') }}, {{ Auth::user()->name }}! 👋
                </h1>
                <p class="text-dark-400 mt-1">Here's what's happening with your sales pages</p>
            </div>
            <a href="{{ route('sales-pages.create') }}" class="btn-primary hidden sm:inline-flex">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Create New Page
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                <!-- Total Pages -->
                <div class="stat-card">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-dark-400 mb-1">Total Pages</p>
                            <p class="text-3xl font-heading font-bold text-dark">{{ $totalPages }}</p>
                        </div>
                        <div class="w-12 h-12 bg-dark-50 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-dark-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- This Month -->
                <div class="stat-card">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-dark-400 mb-1">This Month</p>
                            <p class="text-3xl font-heading font-bold text-dark">
                                {{ Auth::user()->salesPages()->whereMonth('created_at', now()->month)->count() }}
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-dark-50 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-dark-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Quick Action -->
                <a href="{{ route('sales-pages.create') }}" class="stat-card cursor-pointer bg-dark-800 border-dark-800 hover:bg-dark-700">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-dark-300 mb-1">Quick Action</p>
                            <p class="text-lg font-heading font-bold text-white">Generate New Page</p>
                        </div>
                        <div class="w-12 h-12 bg-white/10 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Recent Pages -->
            <div class="flex items-center justify-between mb-6">
                <h2 class="font-heading text-xl font-bold text-dark">Recent Pages</h2>
                @if($totalPages > 0)
                    <a href="{{ route('sales-pages.index') }}" class="text-sm font-medium text-dark-400 hover:text-dark transition-colors flex items-center gap-1">
                        View All
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                @endif
            </div>

            @if($salesPages->isEmpty())
                <div class="card p-12 text-center">
                    <div class="w-16 h-16 mx-auto mb-6 bg-dark-50 rounded-2xl flex items-center justify-center">
                        <svg class="w-8 h-8 text-dark-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="font-heading text-xl font-bold text-dark mb-2">No sales pages yet</h3>
                    <p class="text-dark-400 mb-6 max-w-md mx-auto">Create your first AI-powered sales page by entering your product details. It only takes a minute!</p>
                    <a href="{{ route('sales-pages.create') }}" class="btn-primary">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Create Your First Page
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($salesPages as $page)
                        <div class="card p-6">
                            <div class="flex items-start justify-between mb-4">
                                <span class="badge-primary">{{ ucfirst($page->template) }}</span>
                                <span class="text-xs text-dark-300">{{ $page->created_at->diffForHumans() }}</span>
                            </div>
                            <h3 class="font-heading text-lg font-bold text-dark mb-2 line-clamp-1">{{ $page->product_name }}</h3>
                            <p class="text-sm text-dark-400 mb-4 line-clamp-2">
                                {{ $page->generated_content['headline'] ?? 'Sales page content' }}
                            </p>
                            @if($page->price)
                                <p class="text-dark-600 font-bold mb-4">${{ number_format($page->price, 2) }}</p>
                            @endif
                            <div class="flex items-center gap-2 pt-4 border-t border-dark-100">
                                <a href="{{ route('sales-pages.show', $page) }}" class="btn-ghost text-sm flex-1 justify-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    Preview
                                </a>
                                <a href="{{ route('sales-pages.edit', $page) }}" class="btn-ghost text-sm flex-1 justify-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    Edit
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
