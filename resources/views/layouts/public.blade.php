<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Ryoki Skincare — Rahasia Kulit Sehat & Glowing Alami')</title>
    <meta name="description" content="@yield('meta_description', 'Ryoki Skincare menghadirkan formulasi skincare Jepang berkualitas tinggi BPOM untuk mencerahkan, melembabkan, dan merawat skin barrier.')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Cormorant+Garamond:ital,wght@0,500;0,600;1,400;1,600&display=swap" rel="stylesheet">

    <!-- Custom CSS & Vite -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="font-sans antialiased bg-[#F6F9FC] text-[#334155]">

    <!-- HEADER & NAVBAR WRAPPER (No Gap on Scroll) -->
    <header x-data="{ mobileMenuOpen: false, scrolled: false }"
            @scroll.window="scrolled = (window.pageYOffset > 15)"
            class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">

        <!-- Top Announcement Bar (Shrinks/Fades gracefully when scrolled) -->
        <div x-show="!scrolled"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 max-h-10"
             x-transition:leave-end="opacity-0 max-h-0"
             class="bg-gradient-to-r from-[#0284C7] via-[#0369A1] to-[#075985] text-white text-center py-2 px-4 text-xs font-medium tracking-wide">
            ✨ Promo Spesial & Gratis Ongkir Pembelian Official di <a href="https://www.tiktok.com/@ryokijapanskin" target="_blank" class="underline hover:text-sky-200 font-semibold">TikTok Shop Official Ryoki</a>
        </div>

        <!-- Main Navbar -->
        <div :class="scrolled ? 'bg-white/95 backdrop-blur-md border-b border-slate-200/90 shadow-md py-3' : 'bg-white/80 backdrop-blur-sm border-b border-slate-200/50 py-4'"
             class="transition-all duration-300">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center">

                    <!-- Brand Logo -->
                    <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-[#0284C7] to-[#38BDF8] flex items-center justify-center text-white shadow-md shadow-sky-500/25 group-hover:scale-105 transition-transform">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <div class="flex flex-col">
                            <span class="text-xl font-bold tracking-tight text-[#0F172A] font-heading leading-tight">RYOKI</span>
                            <span class="text-[9px] text-[#0284C7] font-semibold tracking-widest uppercase">Japan Skincare</span>
                        </div>
                    </a>

                    <!-- Desktop Navigation Links -->
                    <div class="hidden md:flex items-center gap-1 bg-slate-100/80 p-1 rounded-full border border-slate-200/80">
                        <a href="{{ route('home') }}"
                           class="px-5 py-2 rounded-full text-xs font-semibold transition-all {{ request()->routeIs('home') ? 'bg-[#0284C7] text-white shadow-sm' : 'text-slate-600 hover:text-[#0284C7]' }}">
                            Beranda
                        </a>
                        <a href="{{ route('about') }}"
                           class="px-5 py-2 rounded-full text-xs font-semibold transition-all {{ request()->routeIs('about') ? 'bg-[#0284C7] text-white shadow-sm' : 'text-slate-600 hover:text-[#0284C7]' }}">
                            Tentang Kami
                        </a>
                        <a href="{{ route('products.index') }}"
                           class="px-5 py-2 rounded-full text-xs font-semibold transition-all {{ request()->routeIs('products.*') ? 'bg-[#0284C7] text-white shadow-sm' : 'text-slate-600 hover:text-[#0284C7]' }}">
                            Produk Skincare
                        </a>
                        <a href="{{ route('articles.index') }}"
                           class="px-5 py-2 rounded-full text-xs font-semibold transition-all {{ request()->routeIs('articles.*') ? 'bg-[#0284C7] text-white shadow-sm' : 'text-slate-600 hover:text-[#0284C7]' }}">
                            Skinpedia
                        </a>
                        <a href="{{ route('contact.index') }}"
                           class="px-5 py-2 rounded-full text-xs font-semibold transition-all {{ request()->routeIs('contact.*') ? 'bg-[#0284C7] text-white shadow-sm' : 'text-slate-600 hover:text-[#0284C7]' }}">
                            Kontak
                        </a>
                    </div>

                    <!-- Right CTAs -->
                    <div class="hidden md:flex items-center gap-3">
                        <a href="https://www.tiktok.com/@ryokijapanskin"
                           target="_blank" rel="noopener noreferrer"
                           class="btn-ryoki btn-ryoki-primary text-xs shadow-md">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/></svg>
                            TikTok Shop Official
                        </a>
                        @auth
                            <a href="{{ route('admin.dashboard') }}" class="btn-ryoki btn-ryoki-secondary text-xs">
                                Admin Panel
                            </a>
                        @endauth
                    </div>

                    <!-- Mobile Hamburger Button -->
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 text-slate-700 hover:text-[#0284C7] focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" style="display:none;" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu Dropdown -->
        <div x-show="mobileMenuOpen"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="md:hidden bg-white border-b border-slate-200 px-6 py-4 space-y-3 shadow-xl"
             style="display: none;">
            <a href="{{ route('home') }}" class="block text-sm font-medium text-slate-700 hover:text-[#0284C7]">Beranda</a>
            <a href="{{ route('about') }}" class="block text-sm font-medium text-slate-700 hover:text-[#0284C7]">Tentang Kami</a>
            <a href="{{ route('products.index') }}" class="block text-sm font-medium text-slate-700 hover:text-[#0284C7]">Produk Skincare</a>
            <a href="{{ route('articles.index') }}" class="block text-sm font-medium text-slate-700 hover:text-[#0284C7]">Skinpedia</a>
            <a href="{{ route('contact.index') }}" class="block text-sm font-medium text-slate-700 hover:text-[#0284C7]">Kontak</a>
            <div class="pt-3 border-t border-slate-100">
                <a href="https://www.tiktok.com/@ryokijapanskin" target="_blank" class="btn-ryoki btn-ryoki-primary w-full text-center text-xs py-2.5">
                    TikTok Shop Official
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content Area with appropriate top padding -->
    <main class="min-h-screen pt-28">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-white border-t border-slate-200 text-slate-600 pt-16 pb-12 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 pb-12 border-b border-slate-100">

                <!-- Col 1: Brand Info -->
                <div class="md:col-span-1 space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full bg-[#0284C7] flex items-center justify-center text-white font-bold text-sm">R</div>
                        <span class="text-xl font-bold tracking-tight text-[#0F172A] font-heading">RYOKI</span>
                    </div>
                    <p class="text-sm text-slate-500 leading-relaxed font-light">
                        Formula Skincare Jepang yang memprioritaskan kesehatan skin barrier, kelembaban alami, dan cahaya sehat pada kulit Anda.
                    </p>
                    <div class="text-xs text-slate-400 font-medium">
                        PT Golden Intan Berlian — Bandar Lampung
                    </div>
                </div>

                <!-- Col 2: Navigation -->
                <div>
                    <h4 class="text-sm font-bold text-[#0F172A] uppercase tracking-wider mb-4 font-heading">Jelajahi</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('home') }}" class="hover:text-[#0284C7] transition-colors">Beranda</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-[#0284C7] transition-colors">Tentang Ryoki</a></li>
                        <li><a href="{{ route('products.index') }}" class="hover:text-[#0284C7] transition-colors">Katalog Produk</a></li>
                        <li><a href="{{ route('articles.index') }}" class="hover:text-[#0284C7] transition-colors">Skinpedia (Edukasi Skincare)</a></li>
                        <li><a href="{{ route('contact.index') }}" class="hover:text-[#0284C7] transition-colors">Hubungi Kami</a></li>
                    </ul>
                </div>

                <!-- Col 3: Product Highlights -->
                <div>
                    <h4 class="text-sm font-bold text-[#0F172A] uppercase tracking-wider mb-4 font-heading">Produk Unggulan</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li class="flex items-center gap-2"><span class="text-[#0284C7]">💧</span> α Niacin Facial Wash</li>
                        <li class="flex items-center gap-2"><span class="text-[#0284C7]">🌿</span> Brightening Peeling Spray</li>
                        <li class="flex items-center gap-2"><span class="text-[#0284C7]">✨</span> Luminous Whitening Day Cream</li>
                        <li class="flex items-center gap-2"><span class="text-[#0284C7]">🌸</span> α Niacin Hand & Body Serum</li>
                    </ul>
                </div>

                <!-- Col 4: Official Store -->
                <div>
                    <h4 class="text-sm font-bold text-[#0F172A] uppercase tracking-wider mb-4 font-heading">Toko Resmi</h4>
                    <p class="text-xs text-slate-500 mb-4 leading-relaxed">
                        Dapatkan produk asli Ryoki Skincare dengan sertifikasi BPOM melalui TikTok Shop Official.
                    </p>
                    <a href="https://www.tiktok.com/@ryokijapanskin" target="_blank" class="btn-ryoki btn-ryoki-primary text-xs w-full justify-center">
                        Beli di TikTok Shop Official
                    </a>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="pt-8 flex flex-col md:flex-row justify-between items-center text-xs text-slate-400 gap-4">
                <p>&copy; {{ date('Y') }} Ryoki Skincare by PT Golden Intan Berlian. All Rights Reserved.</p>
                <div class="flex items-center gap-3 text-xs text-slate-400 font-light">
                    <span>BPOM RI Certified</span>
                    <span class="text-slate-200">|</span>
                    <span>Dermatology Tested</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll Observer -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('appear');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.08 });
            document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));
        });
    </script>
</body>
</html>
