@section('title', $salesPage->product_name . ' — Preview')

<x-app-layout>
    <!-- Toolbar -->
    <div class="bg-ivory border-b-2 border-ink sticky top-16 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-14 gap-3">
                <div class="flex items-center gap-3 min-w-0">
                    <a href="{{ route('sales-pages.index') }}" class="btn-ghost p-2 border-2 border-ink rounded-full flex-shrink-0" title="Back">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </a>
                    <div class="hidden sm:flex items-center gap-2 min-w-0">
                        <span class="badge-mono bg-lime text-ink text-[10px]">● Live Preview</span>
                        <span class="text-[11px] font-mono uppercase tracking-widest text-ink/60 truncate">{{ ucfirst($salesPage->template) }} / {{ Str::limit($salesPage->product_name, 28) }}</span>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <a href="{{ route('sales-pages.edit', $salesPage) }}" class="btn-secondary text-xs py-1.5 px-3.5">
                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Edit
                    </a>
                    <a href="{{ route('sales-pages.export', $salesPage) }}" class="btn-accent text-xs py-1.5 px-3.5">
                        <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" stroke-width="2.2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                        </svg>
                        Export
                    </a>
                    <form method="POST" action="{{ route('sales-pages.destroy', $salesPage) }}" id="delete-form-show">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="confirmDeleteShow()" class="btn-ghost text-xs py-1.5 px-2.5 text-salmon-600 hover:bg-salmon/30 hover:border-ink" title="Delete">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
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
            confirmButtonColor: '#FF6B47',
            cancelButtonColor: '#0E0E10',
            confirmButtonText: 'Yes, delete',
            cancelButtonText: 'Keep',
            customClass: { popup: 'rounded-2xl', confirmButton: 'rounded-full', cancelButton: 'rounded-full' }
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
                        Swal.fire({ icon: 'error', title: 'Failed', text: 'Could not regenerate section. Please try again.', confirmButtonColor: '#1C1917', customClass: { popup: 'rounded-2xl', confirmButton: 'rounded-xl' } });
                    }
                } catch (error) {
                    Swal.fire({ icon: 'error', title: 'Error', text: 'An unexpected error occurred. Please try again.', confirmButtonColor: '#1C1917', customClass: { popup: 'rounded-2xl', confirmButton: 'rounded-xl' } });
                } finally {
                    this.regenerating[section] = false;
                }
            }
        }
    }
    </script>
</x-app-layout>
