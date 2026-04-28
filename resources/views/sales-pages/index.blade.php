@section('title', 'My Sales Pages')

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between gap-4 flex-wrap">
            <div>
                <span class="eyebrow">Library</span>
                <h1 class="h-display text-3xl md:text-4xl mt-2">My <em>sales pages</em></h1>
            </div>
            <a href="{{ route('sales-pages.create') }}" class="btn-accent text-sm py-2.5 px-5">
                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/></svg>
                New page
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($salesPages->isEmpty())
                <div class="card p-10 text-center relative overflow-hidden">
                    <div class="absolute -top-10 -right-10 w-40 h-40 rounded-full bg-salmon/30 blur-2xl"></div>
                    <div class="relative">
                        <div class="w-14 h-14 mx-auto mb-4 bg-lime border-2 border-ink rounded-2xl flex items-center justify-center -rotate-6">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                        </div>
                        <h3 class="h-display text-3xl mb-2">Empty <em>library</em>.</h3>
                        <p class="text-ink/60 mb-5 max-w-md mx-auto">Forge your first AI-powered sales page. Drop in product details and a full landing page comes back.</p>
                        <a href="{{ route('sales-pages.create') }}" class="btn-accent">Forge first page →</a>
                    </div>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 animate-fade-in">
                    @foreach($salesPages as $i => $page)
                        @php
                            $tmpl = $page->template;
                            $accent = $tmpl === 'bold' ? 'bg-ink text-ivory' : ($tmpl === 'minimal' ? 'bg-ivory-200' : 'bg-lime');
                            $thumb = $tmpl === 'bold' ? 'bg-ink' : ($tmpl === 'minimal' ? 'bg-ivory-100 border border-ink/30' : 'bg-lime');
                        @endphp
                        <div class="card p-5 relative">
                            {{-- thumbnail strip --}}
                            <div class="rounded-xl border-2 border-ink {{ $thumb }} p-3 mb-4 h-24 flex flex-col justify-between">
                                <div class="flex justify-between items-start">
                                    <span class="badge bg-ivory border-ink text-[9px]">{{ ucfirst($tmpl) }}</span>
                                    @if($page->price)
                                        <span class="text-[10px] font-mono font-bold {{ $tmpl === 'bold' ? 'text-lime' : 'text-ink' }}">${{ number_format($page->price, 0) }}</span>
                                    @endif
                                </div>
                                <div>
                                    <div class="h-1.5 rounded-full {{ $tmpl === 'bold' ? 'bg-lime' : 'bg-ink' }} w-3/4 mb-1"></div>
                                    <div class="h-1 rounded-full {{ $tmpl === 'bold' ? 'bg-ivory/40' : 'bg-ink/30' }} w-full"></div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between mb-2">
                                <span class="text-[10px] font-mono uppercase tracking-widest text-ink/50">{{ $page->created_at->format('d M Y') }}</span>
                            </div>

                            <h3 class="font-display text-xl font-semibold leading-tight line-clamp-1">{{ $page->product_name }}</h3>
                            <p class="text-sm text-ink/65 mt-1 line-clamp-2 leading-snug">
                                {{ $page->generated_content['headline'] ?? Str::limit($page->description, 80) }}
                            </p>

                            <div class="flex items-center gap-1.5 pt-3 mt-3 border-t-2 border-ink/10">
                                <a href="{{ route('sales-pages.show', $page) }}" class="btn-ghost text-xs py-1.5 px-3 flex-1" title="Preview">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    Preview
                                </a>
                                <a href="{{ route('sales-pages.edit', $page) }}" class="btn-ghost text-xs py-1.5 px-3 flex-1" title="Edit">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    Edit
                                </a>
                                <form method="POST" action="{{ route('sales-pages.destroy', $page) }}" class="flex-shrink-0" id="delete-form-{{ $page->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete({{ $page->id }}, '{{ addslashes($page->product_name) }}')" class="btn-ghost text-xs py-1.5 px-2.5 text-salmon-600 hover:bg-salmon/30 hover:border-ink" title="Delete">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-8">
                    {{ $salesPages->links() }}
                </div>
            @endif
        </div>
    </div>

    <script>
    function confirmDelete(id, name) {
        Swal.fire({
            title: 'Delete this page?',
            html: `Are you sure you want to delete <strong>"${name}"</strong>? This cannot be undone.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#FF6B47',
            cancelButtonColor: '#0E0E10',
            confirmButtonText: 'Yes, delete',
            cancelButtonText: 'Keep',
            customClass: { popup: 'rounded-2xl', confirmButton: 'rounded-full', cancelButton: 'rounded-full' }
        }).then((result) => {
            if (result.isConfirmed) document.getElementById('delete-form-' + id).submit();
        });
    }
    </script>
</x-app-layout>
