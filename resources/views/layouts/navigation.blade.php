<nav x-data="{ open: false }" class="bg-white border-b border-dark-100 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}" class="flex items-center gap-2.5">
                    <img src="{{ asset('logo.png') }}" alt="{{ config('app.name') }}" class="h-8 w-auto" />
                    <span class="font-heading text-lg font-bold text-dark hidden sm:block">Sales<span class="text-dark-400">Forge</span></span>
                </a>

                <!-- Navigation Links -->
                <div class="hidden sm:flex sm:items-center sm:ml-10 space-x-1">
                    <a href="{{ route('dashboard') }}"
                       class="px-4 py-2 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-dark-50 text-dark' : 'text-dark-400 hover:text-dark hover:bg-dark-50' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('sales-pages.index') }}"
                       class="px-4 py-2 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('sales-pages.*') ? 'bg-dark-50 text-dark' : 'text-dark-400 hover:text-dark hover:bg-dark-50' }}">
                        My Pages
                    </a>
                    <a href="{{ route('sales-pages.create') }}"
                       class="px-4 py-2 rounded-xl text-sm font-medium transition-all duration-200 bg-dark text-white hover:bg-dark-700">
                        <span class="flex items-center gap-1.5">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            New Page
                        </span>
                    </a>
                </div>
            </div>

            <!-- User Dropdown -->
            <div class="hidden sm:flex sm:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center gap-2 px-3 py-2 rounded-xl text-sm font-medium text-dark-500 hover:text-dark hover:bg-dark-50 transition-all duration-200">
                            <div class="w-8 h-8 bg-dark-800 rounded-xl flex items-center justify-center text-white text-xs font-bold">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 text-dark-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="py-1">
                            <x-dropdown-link :href="route('profile.edit')" class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="flex items-center gap-2 text-red-500 hover:text-red-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                    </svg>
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center sm:hidden">
                <button @click="open = ! open" class="p-2 rounded-xl text-dark-400 hover:text-dark hover:bg-dark-50 transition-all duration-200">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden border-t border-dark-100 bg-white">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <a href="{{ route('dashboard') }}"
               class="block px-4 py-2.5 rounded-xl text-sm font-medium {{ request()->routeIs('dashboard') ? 'bg-dark-50 text-dark' : 'text-dark-400 hover:bg-dark-50' }}">
                Dashboard
            </a>
            <a href="{{ route('sales-pages.index') }}"
               class="block px-4 py-2.5 rounded-xl text-sm font-medium {{ request()->routeIs('sales-pages.index') ? 'bg-dark-50 text-dark' : 'text-dark-400 hover:bg-dark-50' }}">
                My Pages
            </a>
            <a href="{{ route('sales-pages.create') }}"
               class="block px-4 py-2.5 rounded-xl text-sm font-medium text-dark bg-dark-50">
                + New Page
            </a>
        </div>

        <!-- Responsive Settings -->
        <div class="pt-4 pb-3 border-t border-dark-100 px-4">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-10 h-10 bg-dark-800 rounded-xl flex items-center justify-center text-white font-bold">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div>
                    <div class="font-semibold text-dark">{{ Auth::user()->name }}</div>
                    <div class="text-sm text-dark-400">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <a href="{{ route('profile.edit') }}" class="block px-4 py-2.5 rounded-xl text-sm font-medium text-dark-400 hover:bg-dark-50">
                Profile
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2.5 rounded-xl text-sm font-medium text-red-500 hover:bg-red-50">
                    Log Out
                </button>
            </form>
        </div>
    </div>
</nav>
