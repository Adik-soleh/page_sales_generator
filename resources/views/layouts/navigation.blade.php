<nav x-data="{ open: false }" class="bg-ivory/85 backdrop-blur border-b-2 border-ink sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center gap-8">
                {{-- Logo --}}
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2.5">
                    <div
                        class="w-8 h-8 rounded-lg bg-lime border-2 border-ink flex items-center justify-center font-display font-bold text-ink">
                        S</div>
                    <span class="font-display text-lg font-bold tracking-tight hidden sm:block">Sales<em
                            class="not-italic text-salmon">Forge</em></span>
                </a>

                {{-- Nav links --}}
                <div class="hidden sm:flex items-center gap-1">
                    <a href="{{ route('dashboard') }}"
                        class="px-3.5 py-1.5 rounded-full text-sm font-semibold transition-all duration-150 {{ request()->routeIs('dashboard') ? 'bg-ink text-ivory' : 'text-ink/70 hover:text-ink hover:bg-lime/40' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('sales-pages.index') }}"
                        class="px-3.5 py-1.5 rounded-full text-sm font-semibold transition-all duration-150 {{ request()->routeIs('sales-pages.index') || request()->routeIs('sales-pages.show') || request()->routeIs('sales-pages.edit') ? 'bg-ink text-ivory' : 'text-ink/70 hover:text-ink hover:bg-lime/40' }}">
                        My Pages
                    </a>
                </div>
            </div>

            <div class="hidden sm:flex items-center gap-3">
                <a href="{{ route('sales-pages.create') }}" class="btn-accent text-sm py-2 px-5">
                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" stroke-width="2.5"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                    </svg>
                    New page
                </a>

                {{-- User Dropdown --}}
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="flex items-center gap-2 pl-1.5 pr-3 py-1.5 rounded-full text-sm font-semibold border-2 border-white hover:bg-lime/40 transition-all duration-150">
                            <div
                                class="w-7 h-7 bg-ink rounded-full flex items-center justify-center text-lime text-white font-bold">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <span class="text-ink">{{ Str::limit(Auth::user()->name, 14) }}</span>
                            <svg class="w-3.5 h-3.5 text-ink/60" fill="none" stroke="currentColor" stroke-width="2.5"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="py-1">
                            <x-dropdown-link :href="route('profile.edit')" class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                {{ __('Profile') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="flex items-center gap-2 text-salmon hover:text-salmon-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                    </svg>
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            {{-- Hamburger --}}
            <div class="flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="p-2 rounded-full border-2 border-ink text-ink hover:bg-lime/40 transition-all duration-150">
                    <svg class="h-5 w-5" stroke="currentColor" fill="none" viewBox="0 0 24 24" stroke-width="2.5">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- Mobile menu --}}
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t-2 border-ink bg-ivory">
        <div class="pt-3 pb-2 space-y-1.5 px-4">
            <a href="{{ route('dashboard') }}"
                class="block px-4 py-2.5 rounded-full text-sm font-semibold {{ request()->routeIs('dashboard') ? 'bg-ink text-ivory' : 'text-ink/70 hover:bg-lime/40' }}">
                Dashboard
            </a>
            <a href="{{ route('sales-pages.index') }}"
                class="block px-4 py-2.5 rounded-full text-sm font-semibold {{ request()->routeIs('sales-pages.index') ? 'bg-ink text-ivory' : 'text-ink/70 hover:bg-lime/40' }}">
                My Pages
            </a>
            <a href="{{ route('sales-pages.create') }}"
                class="block px-4 py-2.5 rounded-full text-sm font-bold bg-lime border-2 border-ink text-ink">
                + New page
            </a>
        </div>

        <div class="pt-3 pb-3 border-t-2 border-ink px-4">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 bg-ink rounded-full flex items-center justify-center text-lime font-bold">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div>
                    <div class="font-display font-semibold text-ink">{{ Auth::user()->name }}</div>
                    <div class="text-xs font-mono text-ink/60">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <a href="{{ route('profile.edit') }}"
                class="block px-4 py-2 rounded-full text-sm font-semibold text-ink/70 hover:bg-lime/40">
                Profile
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full text-left px-4 py-2 rounded-full text-sm font-semibold text-salmon hover:bg-salmon/10">
                    Log Out
                </button>
            </form>
        </div>
    </div>
</nav>