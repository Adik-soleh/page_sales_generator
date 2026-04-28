@section('title', $salesPage->product_name . ' — Preview')

<x-app-layout>
    <!-- Toolbar -->
    <div class="bg-white/90 backdrop-blur-sm border-b border-primary-100 sticky top-16 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-14">
                <div class="flex items-center gap-3">
                    <a href="{{ route('sales-pages.index') }}" class="btn-ghost p-2" title="Back to list">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </a>
                    <div class="hidden sm:block">
                        <h2 class="font-heading font-bold text-dark text-sm">{{ $salesPage->product_name }}</h2>
                        <p class="text-xs text-dark-300">Live Preview — {{ ucfirst($salesPage->template) }} Template</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('sales-pages.edit', $salesPage) }}" class="btn-secondary text-sm py-2 px-4">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Edit
                    </a>
                    <a href="{{ route('sales-pages.export', $salesPage) }}" class="btn-secondary text-sm py-2 px-4">
                        <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                        </svg>
                        Export HTML
                    </a>
                    <form method="POST" action="{{ route('sales-pages.destroy', $salesPage) }}" id="delete-form-show">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmDeleteShow()" class="btn-ghost text-sm py-2 px-3 text-red-400 hover:text-red-500 hover:bg-red-50">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Live Preview Content -->
    <div x-data="sectionRegenerate()" class="pb-12">
        @php $content = $salesPage->generated_content; @endphp

        @if($salesPage->template === 'bold')
            @include('sales-pages.templates.bold', ['content' => $content, 'salesPage' => $salesPage])
        @elseif($salesPage->template === 'minimal')
            @include('sales-pages.templates.minimal', ['content' => $content, 'salesPage' => $salesPage])
        @else
            @include('sales-pages.templates.modern', ['content' => $content, 'salesPage' => $salesPage])
        @endif
    </div>

    <script>
    function confirmDeleteShow() {
        Swal.fire({
            title: 'Delete Sales Page?',
            html: 'Are you sure you want to delete <strong>"{{ addslashes($salesPage->product_name) }}"</strong>? This cannot be undone.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#EF4444',
            cancelButtonColor: '#78716C',
            confirmButtonText: 'Yes, Delete',
            cancelButtonText: 'Cancel',
            customClass: { popup: 'rounded-2xl', confirmButton: 'rounded-xl', cancelButton: 'rounded-xl' }
        }).then((result) => {
            if (result.isConfirmed) document.getElementById('delete-form-show').submit();
        });
    }

    function sectionRegenerate() {
        return {
            regenerating: {},
            async regenerate(section) {
                if (this.regenerating[section]) return;
                this.regenerating[section] = true;

                try {
                    const response = await fetch('{{ route("sales-pages.regenerate-section", $salesPage) }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({ section }),
                    });

                    const data = await response.json();
                    if (data.success) {
                        Swal.fire({ icon: 'success', title: 'Regenerated!', text: 'Section updated successfully.', toast: true, position: 'top-end', showConfirmButton: false, timer: 2500, timerProgressBar: true, customClass: { popup: 'rounded-xl' } });
                        setTimeout(() => window.location.reload(), 1500);
                    } else {
                        Swal.fire({ icon: 'error', title: 'Failed', text: 'Could not regenerate section. Please try again.', confirmButtonColor: '#F97316', customClass: { popup: 'rounded-2xl', confirmButton: 'rounded-xl' } });
                    }
                } catch (error) {
                    Swal.fire({ icon: 'error', title: 'Error', text: 'An unexpected error occurred. Please try again.', confirmButtonColor: '#F97316', customClass: { popup: 'rounded-2xl', confirmButton: 'rounded-xl' } });
                } finally {
                    this.regenerating[section] = false;
                }
            }
        }
    }
    </script>
</x-app-layout>
