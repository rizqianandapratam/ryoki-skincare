<nav x-data="{ open: false }" class="bg-white/95 backdrop-blur-md border-b border-slate-200/80 sticky top-0 z-40 shadow-xs">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center gap-8">
                <!-- Brand Logo (Matches Official Public Header) -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 group">
                        <img src="{{ asset('images/logo.png') }}" alt="Ryoki Japan Skincare" class="h-9 w-auto object-contain group-hover:scale-105 transition-transform duration-200" />
                        <span class="px-1.5 py-0.5 rounded bg-sky-100 text-[#0284C7] text-[10px] font-extrabold tracking-wider ml-1">ADMIN</span>
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <div class="hidden sm:flex sm:items-center sm:gap-1">
                    <a href="{{ route('admin.dashboard') }}"
                       class="px-3.5 py-2 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-sky-50 text-[#0284C7] border border-sky-100' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                       <span class="flex items-center gap-1.5">
                           <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                           Dashboard
                       </span>
                    </a>

                    <a href="{{ route('admin.products.index') }}"
                       class="px-3.5 py-2 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('admin.products.*') ? 'bg-sky-50 text-[#0284C7] border border-sky-100' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                       <span class="flex items-center gap-1.5">
                           <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                           Kelola Produk
                       </span>
                    </a>

                    <a href="{{ route('admin.articles.index') }}"
                       class="px-3.5 py-2 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('admin.articles.*') ? 'bg-sky-50 text-[#0284C7] border border-sky-100' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                       <span class="flex items-center gap-1.5">
                           <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/></svg>
                           Skinpedia Artikel
                       </span>
                    </a>

                    <a href="{{ route('admin.contacts.index') }}"
                       class="px-3.5 py-2 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('admin.contacts.*') ? 'bg-sky-50 text-[#0284C7] border border-sky-100' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                       <span class="flex items-center gap-1.5">
                           <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                           Pesan Masuk
                       </span>
                    </a>

                    <a href="{{ route('admin.analytics.index') }}"
                       class="px-3.5 py-2 rounded-xl text-xs font-semibold transition-all {{ request()->routeIs('admin.analytics.*') ? 'bg-sky-50 text-[#0284C7] border border-sky-100' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-50' }}">
                       <span class="flex items-center gap-1.5">
                           <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                           Click Analytics
                       </span>
                    </a>
                </div>
            </div>

            <!-- Right Actions (View Site & User Menu) -->
            <div class="hidden sm:flex sm:items-center sm:gap-3">
                <a href="{{ route('home') }}" target="_blank"
                   class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold text-slate-600 hover:text-[#0284C7] bg-slate-100 hover:bg-sky-50 rounded-xl transition-all border border-slate-200/60">
                    <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    Lihat Web Publik
                </a>

                <div class="h-6 w-px bg-slate-200"></div>

                <!-- Settings Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center gap-2 px-3 py-1.5 text-xs font-semibold text-slate-700 bg-white hover:bg-slate-50 border border-slate-200 rounded-xl focus:outline-none transition-all">
                            <div class="w-6 h-6 rounded-full bg-[#0284C7] text-white flex items-center justify-center font-bold text-[10px]">
                                {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                            </div>
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-2 border-b border-slate-100 text-xs">
                            <p class="font-bold text-slate-900">{{ Auth::user()->name }}</p>
                            <p class="text-[11px] text-slate-400 truncate">{{ Auth::user()->email }}</p>
                        </div>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();"
                                    class="text-rose-600 hover:text-rose-700 hover:bg-rose-50 font-medium">
                                <span class="flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                                    Log Out
                                </span>
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger (Mobile) -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl text-slate-500 hover:text-slate-700 hover:bg-slate-100 focus:outline-none transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Mobile Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-white border-b border-slate-200 px-4 pt-2 pb-4 space-y-2">
        <a href="{{ route('admin.dashboard') }}"
           class="block px-3 py-2 rounded-xl text-xs font-semibold {{ request()->routeIs('admin.dashboard') ? 'bg-sky-50 text-[#0284C7]' : 'text-slate-600' }}">
           Dashboard
        </a>
        <a href="{{ route('admin.products.index') }}"
           class="block px-3 py-2 rounded-xl text-xs font-semibold {{ request()->routeIs('admin.products.*') ? 'bg-sky-50 text-[#0284C7]' : 'text-slate-600' }}">
           Kelola Produk
        </a>
        <a href="{{ route('admin.articles.index') }}"
           class="block px-3 py-2 rounded-xl text-xs font-semibold {{ request()->routeIs('admin.articles.*') ? 'bg-sky-50 text-[#0284C7]' : 'text-slate-600' }}">
           Skinpedia Artikel
        </a>
        <a href="{{ route('admin.contacts.index') }}"
           class="block px-3 py-2 rounded-xl text-xs font-semibold {{ request()->routeIs('admin.contacts.*') ? 'bg-sky-50 text-[#0284C7]' : 'text-slate-600' }}">
           Pesan Masuk
        </a>
        <a href="{{ route('home') }}" target="_blank" class="block px-3 py-2 rounded-xl text-xs font-semibold text-slate-600 hover:bg-slate-50">
           🌐 Lihat Web Publik
        </a>

        <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
            <div>
                <p class="text-xs font-bold text-slate-800">{{ Auth::user()->name }}</p>
                <p class="text-[11px] text-slate-400">{{ Auth::user()->email }}</p>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-xs font-semibold text-rose-600 bg-rose-50 px-3 py-1.5 rounded-xl border border-rose-100">
                    Log Out
                </button>
            </form>
        </div>
    </div>
</nav>
