@section('title', 'My Sales Pages')

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="font-heading text-2xl font-bold text-dark">My Sales Pages</h1>
                <p class="text-dark-400 mt-1">Manage all your generated sales pages</p>
            </div>
            <a href="{{ route('sales-pages.create') }}" class="btn-primary">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                New Page
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($salesPages->isEmpty())
                <div class="card p-12 text-center">
                    <div class="w-20 h-20 mx-auto mb-6 bg-gradient-to-br from-primary-100 to-primary-200 rounded-3xl flex items-center justify-center">
                        <svg class="w-10 h-10 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="font-heading text-xl font-bold text-dark mb-2">No sales pages yet</h3>
                    <p class="text-dark-400 mb-6">Get started by creating your first AI-powered sales page.</p>
                    <a href="{{ route('sales-pages.create') }}" class="btn-primary">
                        Create Your First Page
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($salesPages as $page)
                        <div class="card p-6 group animate-fade-in">
                            <div class="flex items-start justify-between mb-4">
                                <span class="badge-primary">{{ ucfirst($page->template) }}</span>
                                <div class="flex items-center gap-2">
                                    <span class="text-xs text-dark-300">{{ $page->created_at->format('M d, Y') }}</span>
                                </div>
                            </div>

                            <h3 class="font-heading text-lg font-bold text-dark mb-2 line-clamp-1">
                                {{ $page->product_name }}
                            </h3>

                            <p class="text-sm text-dark-400 mb-3 line-clamp-2">
                                {{ $page->generated_content['headline'] ?? $page->description }}
                            </p>

                            @if($page->price)
                                <p class="text-primary-600 font-bold text-lg mb-4">${{ number_format($page->price, 2) }}</p>
                            @endif

                            <div class="flex items-center gap-2 pt-4 border-t border-dark-50">
                                <a href="{{ route('sales-pages.show', $page) }}" class="btn-ghost text-sm flex-1 justify-center" title="Preview">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    Preview
                                </a>
                                <a href="{{ route('sales-pages.edit', $page) }}" class="btn-ghost text-sm flex-1 justify-center" title="Edit">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('sales-pages.destroy', $page) }}" class="flex-1"
                                      id="delete-form-{{ $page->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete({{ $page->id }}, '{{ addslashes($page->product_name) }}')" class="btn-ghost text-sm w-full justify-center text-red-400 hover:text-red-500 hover:bg-red-50" title="Delete">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-8">
                    {{ $salesPages->links() }}
                </div>
            @endif
        </div>
    </div>

    <script>
    function confirmDelete(id, name) {
        Swal.fire({
            title: 'Delete Sales Page?',
            html: `Are you sure you want to delete <strong>"${name}"</strong>? This action cannot be undone.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#EF4444',
            cancelButtonColor: '#78716C',
            confirmButtonText: 'Yes, Delete',
            cancelButtonText: 'Cancel',
            customClass: {
                popup: 'rounded-2xl',
                confirmButton: 'rounded-xl',
                cancelButton: 'rounded-xl'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    }
    </script>
</x-app-layout>
