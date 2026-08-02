<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Primary Meta Tags -->
    @php
        $defaultTitle = 'Ryoki Skincare — Rahasia Kulit Sehat & Glowing Alami';
        $defaultDesc = 'Ryoki Skincare menghadirkan formulasi skincare Jepang berkualitas tinggi bersertifikasi BPOM RI untuk mencerahkan, melembabkan, dan merawat kesehatan skin barrier.';
        $defaultKeywords = 'skincare jepang, ryoki skincare, skin barrier, bpom ri, pt golden intan berlian, facial wash, day cream, peeling spray, skincare halal, tiktok shop ryoki';
        $defaultImage = asset('images/hero-banner.png');
        
        $currentTitle = trim(View::getSection('title')) ?: $defaultTitle;
        $currentDesc = trim(View::getSection('meta_description')) ?: $defaultDesc;
        $currentKeywords = trim(View::getSection('meta_keywords')) ?: $defaultKeywords;
        $currentImage = trim(View::getSection('og_image')) ?: $defaultImage;
        $currentUrl = trim(View::getSection('canonical_url')) ?: url()->current();
    @endphp

    <title>{{ $currentTitle }}</title>
    <meta name="title" content="{{ $currentTitle }}">
    <meta name="description" content="{{ $currentDesc }}">
    <meta name="keywords" content="{{ $currentKeywords }}">
    <meta name="author" content="PT Golden Intan Berlian — Ryoki Skincare">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ $currentUrl }}">

    <!-- Open Graph / Facebook / WhatsApp Social Preview -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:site_name" content="Ryoki Skincare Official">
    <meta property="og:url" content="{{ $currentUrl }}">
    <meta property="og:title" content="{{ $currentTitle }}">
    <meta property="og:description" content="{{ $currentDesc }}">
    <meta property="og:image" content="{{ $currentImage }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:locale" content="id_ID">

    <!-- Twitter Card Preview -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@ryokiskincare">
    <meta name="twitter:creator" content="@ryokiskincare">
    <meta name="twitter:url" content="{{ $currentUrl }}">
    <meta name="twitter:title" content="{{ $currentTitle }}">
    <meta name="twitter:description" content="{{ $currentDesc }}">
    <meta name="twitter:image" content="{{ $currentImage }}">

    <!-- Schema.org JSON-LD Structured Data (Organization & WebSite) -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@graph": [
        {
          "@@type": "Organization",
          "@@id": "{{ url('/') }}#organization",
          "name": "Ryoki Skincare",
          "legalName": "PT Golden Intan Berlian",
          "url": "{{ url('/') }}",
          "logo": "{{ asset('images/logo.png') }}",
          "image": "{{ asset('images/hero-banner.png') }}",
          "description": "Ryoki Skincare memadukan keahlian formulasi Jepang dengan lisensi resmi BPOM RI untuk merawat skin barrier, mencerahkan, dan memberikan kelembapan alami.",
          "telephone": "+6282384991316",
          "address": {
            "@@type": "PostalAddress",
            "addressLocality": "Bandar Lampung",
            "addressCountry": "ID"
          },
          "sameAs": [
            "https://shopee.co.id/ryokiofficialstore",
            "https://www.tiktok.com/@ryokijapanskin"
          ]
        },
        {
          "@@type": "WebSite",
          "@@id": "{{ url('/') }}#website",
          "url": "{{ url('/') }}",
          "name": "Ryoki Skincare Official",
          "description": "Official Website Ryoki Skincare — Rahasia Kulit Sehat & Glowing Alami BPOM RI",
          "publisher": {
            "@@id": "{{ url('/') }}#organization"
          },
          "inLanguage": "id-ID"
        }
      ]
    }
    </script>

    <!-- Early Synchronous Analytics Click Tracker (Guarantees 0ms readiness on first click) -->
    <script>
        window.trackMarketplaceClick = function(platform, productName, productId, buttonLocation) {
            try {
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
                const payload = JSON.stringify({
                    platform: platform || 'other',
                    product_id: productId || null,
                    product_name: productName || 'General',
                    button_location: buttonLocation || 'General'
                });

                if (navigator.sendBeacon) {
                    const blob = new Blob([payload], { type: 'application/json' });
                    navigator.sendBeacon('/analytics/click', blob);
                } else {
                    fetch('/analytics/click', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json', 'Accept': 'application/json', 'X-CSRF-TOKEN': csrfToken || '' },
                        body: payload,
                        keepalive: true
                    }).catch(function() {});
                }
            } catch(e) {}
            return true;
        };
        window.trackShopeeClick = function(pn, pi, bl) { return window.trackMarketplaceClick('shopee', pn, pi, bl); };
        window.trackTikTokClick = function(pn, pi, bl) { return window.trackMarketplaceClick('tiktok', pn, pi, bl); };
        window.trackWhatsAppClick = function(pn, pi, bl) { return window.trackMarketplaceClick('whatsapp', pn, pi, bl); };
    </script>

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/logo.png') }}">

    <!-- Fonts & Performance Preconnects -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&family=Cormorant+Garamond:ital,wght@0,500;0,600;1,400;1,600&display=swap" rel="stylesheet">

    <!-- Custom CSS & Vite -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('head')
</head>
<body class="font-sans antialiased bg-[#F6F9FC] text-[#334155] overflow-x-hidden">

    <!-- Top Announcement Bar (Scrolls naturally at top of page) -->
    <div class="bg-gradient-to-r from-[#0284C7] via-[#0369A1] to-[#075985] text-white text-center py-2 px-4 text-xs font-medium tracking-wide relative z-50 flex items-center justify-center gap-2 flex-wrap">
        <span>✨ Toko Resmi Ryoki Skincare: Jaminan 100% Original BPOM &amp; Gratis Ongkir di</span>
        <div class="inline-flex items-center gap-2">
            <a href="https://www.tiktok.com/@ryokijapanskin" target="_blank" rel="noopener noreferrer" onclick="trackTikTokClick('Announcement Bar', null, 'Header Top Banner')" class="inline-flex items-center gap-1 font-semibold underline hover:text-sky-200">
                <svg class="w-3 h-3 fill-current" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/></svg>
                TikTok Shop
            </a>
            <span>&amp;</span>
            <a href="{{ config('services.shopee.official_url', 'https://shopee.co.id/ryokiofficialstore') }}" target="_blank" rel="noopener noreferrer" onclick="trackShopeeClick('Announcement Bar', null, 'Announcement Bar')" class="inline-flex items-center gap-1 font-semibold underline hover:text-orange-200">
                <svg class="w-3 h-3 fill-current" viewBox="0 0 24 24"><path d="M19.77 7.06h-3.41V5.44C16.36 2.44 13.92 0 10.92 0S5.48 2.44 5.48 5.44v1.62H1.71L.12 21.61C-.07 22.9 1 24 2.29 24h16.89c1.29 0 2.36-1.1 2.17-2.39l-1.58-14.55zM7.48 5.44c0-1.9 1.54-3.44 3.44-3.44s3.44 1.54 3.44 3.44v1.62H7.48V5.44zm11.75 16.56H2.25L3.6 8.56h1.88v2.09c0 .55.45 1 1 1s1-.45 1-1V8.56h6.88v2.09c0 .55.45 1 1 1s1-.45 1-1V8.56h1.88l1.35 13.44z"/></svg>
                Shopee Official
            </a>
        </div>
    </div>

    <!-- STICKY NAVBAR WRAPPER (Solid Clean Nav, 100% Instant 1-Click Navigation) -->
    <header x-data="{ mobileMenuOpen: false }" class="sticky top-0 z-50 bg-white border-b border-slate-200/80 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2.5">
            <div class="flex justify-between items-center h-12">

                <!-- Brand Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-2 group shrink-0">
                    <img src="{{ asset('images/logo.png') }}" alt="Ryoki Japan Skincare" class="h-10 sm:h-12 w-auto object-contain group-hover:scale-105 transition-transform duration-200" />
                </a>

                <!-- Desktop Navigation Links -->
                <div class="hidden md:flex items-center gap-1 bg-slate-100/90 p-1 rounded-full border border-slate-200/80">
                    <a href="{{ route('home') }}"
                       class="px-5 py-2 rounded-full text-xs font-semibold transition-colors {{ request()->routeIs('home') ? 'bg-[#0284C7] text-white shadow-xs' : 'text-slate-600 hover:text-[#0284C7]' }}">
                        Beranda
                    </a>
                    <a href="{{ route('about') }}"
                       class="px-5 py-2 rounded-full text-xs font-semibold transition-colors {{ request()->routeIs('about') ? 'bg-[#0284C7] text-white shadow-xs' : 'text-slate-600 hover:text-[#0284C7]' }}">
                        Tentang Kami
                    </a>
                    <a href="{{ route('products.index') }}"
                       class="px-5 py-2 rounded-full text-xs font-semibold transition-colors {{ request()->routeIs('products.*') ? 'bg-[#0284C7] text-white shadow-xs' : 'text-slate-600 hover:text-[#0284C7]' }}">
                        Produk Skincare
                    </a>
                    <a href="{{ route('articles.index') }}"
                       class="px-5 py-2 rounded-full text-xs font-semibold transition-colors {{ request()->routeIs('articles.*') ? 'bg-[#0284C7] text-white shadow-xs' : 'text-slate-600 hover:text-[#0284C7]' }}">
                        Skinpedia
                    </a>
                    <a href="{{ route('contact.index') }}"
                       class="px-5 py-2 rounded-full text-xs font-semibold transition-colors {{ request()->routeIs('contact.*') ? 'bg-[#0284C7] text-white shadow-xs' : 'text-slate-600 hover:text-[#0284C7]' }}">
                        Kontak
                    </a>
                </div>

                <!-- Right CTAs: Dual Marketplace Buttons (TikTok Shop & Shopee Official) -->
                <div class="hidden lg:flex items-center gap-2">
                    <a href="https://www.tiktok.com/@ryokijapanskin"
                       target="_blank" rel="noopener noreferrer"
                       onclick="trackTikTokClick('Header Navbar', null, 'Desktop Navbar Header')"
                       class="px-3.5 py-2 rounded-xl bg-slate-900 hover:bg-slate-800 text-white text-xs font-bold flex items-center gap-1.5 shadow-sm transition-all hover:scale-105">
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/></svg>
                        TikTok Shop
                    </a>
                    <a href="{{ config('services.shopee.official_url', 'https://shopee.co.id/ryokiofficialstore') }}"
                       target="_blank" rel="noopener noreferrer"
                       onclick="trackShopeeClick('Header Navbar', null, 'Desktop Navbar Header')"
                       class="px-3.5 py-2 rounded-xl bg-[#EE4D2D] hover:bg-[#d63f21] text-white text-xs font-bold flex items-center gap-1.5 shadow-sm transition-all hover:scale-105">
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M19.77 7.06h-3.41V5.44C16.36 2.44 13.92 0 10.92 0S5.48 2.44 5.48 5.44v1.62H1.71L.12 21.61C-.07 22.9 1 24 2.29 24h16.89c1.29 0 2.36-1.1 2.17-2.39l-1.58-14.55zM7.48 5.44c0-1.9 1.54-3.44 3.44-3.44s3.44 1.54 3.44 3.44v1.62H7.48V5.44zm11.75 16.56H2.25L3.6 8.56h1.88v2.09c0 .55.45 1 1 1s1-.45 1-1V8.56h6.88v2.09c0 .55.45 1 1 1s1-.45 1-1V8.56h1.88l1.35 13.44z"/></svg>
                        Shopee Official
                    </a>
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="btn-ryoki btn-ryoki-secondary text-xs ml-1">
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

        <!-- Mobile Menu Dropdown (Dual Store CTAs included) -->
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
            
            <div class="pt-3 border-t border-slate-100 grid grid-cols-2 gap-2">
                <a href="https://www.tiktok.com/@ryokijapanskin" target="_blank" onclick="trackTikTokClick('Mobile Menu', null, 'Mobile Dropdown Menu')" class="py-2.5 px-3 text-xs justify-center font-bold bg-slate-900 hover:bg-slate-800 text-white rounded-xl flex items-center gap-1.5 shadow-sm">
                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/></svg>
                    TikTok Shop
                </a>
                <a href="{{ config('services.shopee.official_url', 'https://shopee.co.id/ryokiofficialstore') }}" target="_blank" onclick="trackShopeeClick('Mobile Menu', null, 'Mobile Dropdown Menu')" class="py-2.5 px-3 text-xs justify-center font-bold bg-[#EE4D2D] hover:bg-[#d63f21] text-white rounded-xl flex items-center gap-1.5 shadow-sm">
                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M19.77 7.06h-3.41V5.44C16.36 2.44 13.92 0 10.92 0S5.48 2.44 5.48 5.44v1.62H1.71L.12 21.61C-.07 22.9 1 24 2.29 24h16.89c1.29 0 2.36-1.1 2.17-2.39l-1.58-14.55zM7.48 5.44c0-1.9 1.54-3.44 3.44-3.44s3.44 1.54 3.44 3.44v1.62H7.48V5.44zm11.75 16.56H2.25L3.6 8.56h1.88v2.09c0 .55.45 1 1 1s1-.45 1-1V8.56h6.88v2.09c0 .55.45 1 1 1s1-.45 1-1V8.56h1.88l1.35 13.44z"/></svg>
                    Shopee Official
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="min-h-screen pt-4">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-white border-t border-slate-200 text-slate-600 pt-16 pb-12 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 pb-12 border-b border-slate-100">

                <!-- Col 1: Brand & Entity Info -->
                <div class="md:col-span-1 space-y-3 text-center flex flex-col items-center justify-center">
                    <div class="flex items-center justify-center w-full">
                        <img src="{{ asset('images/logo.png') }}" alt="Ryoki Japan Skincare" class="h-24 sm:h-28 w-auto object-contain mx-auto" />
                    </div>
                    <p class="text-xs sm:text-sm text-slate-500 leading-relaxed font-light max-w-xs mx-auto">
                        Rangkaian skincare Jepang untuk merawat dan menutrisi kulit Anda setiap hari.
                    </p>
                </div>

                <!-- Col 2: Navigation Links -->
                <div>
                    <h4 class="text-xs font-bold text-[#0F172A] uppercase tracking-wider mb-4 font-heading">Navigasi Utama</h4>
                    <ul class="space-y-2.5 text-xs sm:text-sm font-light">
                        <li><a href="{{ route('home') }}" class="hover:text-[#0284C7] transition-colors">Beranda</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-[#0284C7] transition-colors">Tentang Ryoki</a></li>
                        <li><a href="{{ route('products.index') }}" class="hover:text-[#0284C7] transition-colors">Katalog Produk</a></li>
                        <li><a href="{{ route('articles.index') }}" class="hover:text-[#0284C7] transition-colors">Skinpedia (Edukasi)</a></li>
                        <li><a href="{{ route('contact.index') }}" class="hover:text-[#0284C7] transition-colors">Hubungi Kami</a></li>
                    </ul>
                </div>

                <!-- Col 3: Official Social Media & Contacts -->
                <div>
                    <h4 class="text-xs font-bold text-[#0F172A] uppercase tracking-wider mb-4 font-heading">Saluran Resmi</h4>
                    <ul class="space-y-3 text-xs sm:text-sm">
                        <li>
                            <a href="https://www.tiktok.com/@ryokijapanskin" target="_blank" rel="noopener noreferrer"
                               onclick="trackTikTokClick('Footer Channel', null, 'Footer Link')"
                               class="flex items-center gap-2.5 text-slate-600 hover:text-[#0284C7] transition-colors group">
                                <div class="w-7 h-7 rounded-lg bg-slate-100 flex items-center justify-center group-hover:bg-sky-50 group-hover:text-[#0284C7] transition-colors">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/></svg>
                                </div>
                                <span>TikTok Shop: <strong>@ryokijapanskin</strong></span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ config('services.shopee.official_url', 'https://shopee.co.id/ryokiofficialstore') }}" target="_blank" rel="noopener noreferrer"
                               onclick="trackShopeeClick('Footer Channel', null, 'Footer Link')"
                               class="flex items-center gap-2.5 text-slate-600 hover:text-[#EE4D2D] transition-colors group">
                                <div class="w-7 h-7 rounded-lg bg-orange-50 text-[#EE4D2D] flex items-center justify-center group-hover:bg-orange-100 transition-colors">
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M19.77 7.06h-3.41V5.44C16.36 2.44 13.92 0 10.92 0S5.48 2.44 5.48 5.44v1.62H1.71L.12 21.61C-.07 22.9 1 24 2.29 24h16.89c1.29 0 2.36-1.1 2.17-2.39l-1.58-14.55zM7.48 5.44c0-1.9 1.54-3.44 3.44-3.44s3.44 1.54 3.44 3.44v1.62H7.48V5.44zm11.75 16.56H2.25L3.6 8.56h1.88v2.09c0 .55.45 1 1 1s1-.45 1-1V8.56h6.88v2.09c0 .55.45 1 1 1s1-.45 1-1V8.56h1.88l1.35 13.44z"/></svg>
                                </div>
                                <span>Shopee Official: <strong>Ryoki Skincare</strong></span>
                            </a>
                        </li>
                        <li>
                            <a href="https://instagram.com/ryokiofficial.id" target="_blank" rel="noopener noreferrer"
                               class="flex items-center gap-2.5 text-slate-600 hover:text-[#0284C7] transition-colors group">
                                <div class="w-7 h-7 rounded-lg bg-slate-100 flex items-center justify-center group-hover:bg-sky-50 group-hover:text-[#0284C7] transition-colors">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                </div>
                                <span>IG: <strong>@ryokiofficial.id</strong></span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Col 4: Official Marketplace Purchase Card (TikTok & Shopee) -->
                <div>
                    <h4 class="text-xs font-bold text-[#0F172A] uppercase tracking-wider mb-4 font-heading">Pembelian Official</h4>
                    <p class="text-xs text-slate-500 mb-3.5 leading-relaxed font-light">
                        Dapatkan jaminan produk 100% original bersertifikat BPOM dengan promo gratis ongkir di TikTok Shop &amp; Shopee Official.
                    </p>
                    <div class="grid grid-cols-2 gap-2">
                        <a href="https://www.tiktok.com/@ryokijapanskin" target="_blank" rel="noopener noreferrer" onclick="trackTikTokClick('Footer Card', null, 'Footer CTA')" class="py-2.5 px-2 text-xs justify-center font-bold bg-slate-900 hover:bg-slate-800 text-white rounded-xl flex items-center gap-1.5 shadow-sm transition-all hover:scale-105">
                            <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/></svg>
                            TikTok Shop
                        </a>
                        <a href="{{ config('services.shopee.official_url', 'https://shopee.co.id/ryokiofficialstore') }}" target="_blank" rel="noopener noreferrer" onclick="trackShopeeClick('Footer Card', null, 'Footer CTA')" class="py-2.5 px-2 text-xs justify-center font-bold bg-[#EE4D2D] hover:bg-[#d63f21] text-white rounded-xl flex items-center gap-1.5 shadow-sm transition-all hover:scale-105">
                            <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M19.77 7.06h-3.41V5.44C16.36 2.44 13.92 0 10.92 0S5.48 2.44 5.48 5.44v1.62H1.71L.12 21.61C-.07 22.9 1 24 2.29 24h16.89c1.29 0 2.36-1.1 2.17-2.39l-1.58-14.55zM7.48 5.44c0-1.9 1.54-3.44 3.44-3.44s3.44 1.54 3.44 3.44v1.62H7.48V5.44zm11.75 16.56H2.25L3.6 8.56h1.88v2.09c0 .55.45 1 1 1s1-.45 1-1V8.56h6.88v2.09c0 .55.45 1 1 1s1-.45 1-1V8.56h1.88l1.35 13.44z"/></svg>
                            Shopee Official
                        </a>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="pt-8 text-center text-xs text-slate-400">
                <p>&copy; {{ date('Y') }} Ryoki Skincare by PT Golden Intan Berlian. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- FLOATING ACTION BUTTON (FAB) WIDGET (Fixed Bottom Right) -->
    <div x-data="{ fabOpen: false }" class="fixed bottom-6 right-6 z-40 flex flex-col items-end gap-3">
        
        <!-- Expanded Quick Communication Actions -->
        <div x-show="fabOpen"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 translate-y-4 scale-90"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 scale-90"
             class="flex flex-col items-end gap-2.5 mb-1"
             style="display: none;">
            
            <!-- WhatsApp CS Button -->
            <a href="https://wa.me/6282384991316?text={{ urlencode('Halo Ryoki Skincare, saya ingin bertanya seputar produk-produk skincare di sini') }}"
               target="_blank"
               rel="noopener noreferrer"
               onclick="trackWhatsAppClick('WhatsApp CS Floating FAB', null, 'Floating FAB Widget')"
               class="group flex items-center gap-2.5 bg-emerald-500 hover:bg-emerald-600 text-white text-xs font-bold py-2.5 px-4 rounded-full shadow-lg shadow-emerald-500/25 transition-all hover:scale-105">
                <span class="opacity-95 group-hover:opacity-100">Konsultasi WhatsApp CS</span>
                <div class="w-6 h-6 rounded-full bg-white/20 flex items-center justify-center">
                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                </div>
            </a>

        </div>

        <!-- Main FAB Toggle Trigger (Enlarged for Easy Touch) -->
        <button @click="fabOpen = !fabOpen"
                class="relative w-15 h-15 sm:w-16 sm:h-16 rounded-full bg-gradient-to-tr from-[#0284C7] to-[#38BDF8] text-white flex items-center justify-center shadow-2xl shadow-sky-500/35 hover:scale-105 active:scale-95 transition-all focus:outline-none ring-4 ring-white/70"
                title="Bantuan & CS Ryoki Skincare">
            <!-- Green active dot when closed -->
            <span x-show="!fabOpen" class="absolute top-0 right-0 w-4 h-4 bg-emerald-400 border-2 border-white rounded-full animate-ping"></span>
            <span x-show="!fabOpen" class="absolute top-0 right-0 w-4 h-4 bg-emerald-500 border-2 border-white rounded-full"></span>
            
            <!-- Chat Icon when closed -->
            <svg x-show="!fabOpen" class="w-7 h-7 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
            </svg>

                <!-- Close X Icon when open -->
            <svg x-show="fabOpen" class="w-7 h-7 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" style="display:none;">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <!-- Feather-Light Instant Page Preloader Engine (Zero-Blocking Pointer Prefetch) -->
    <script>
        (function() {
            const preloaded = new Set();
            function prefetch(url) {
                if (!url || preloaded.has(url) || url.includes('#')) return;
                preloaded.add(url);
                const link = document.createElement('link');
                link.rel = 'prefetch';
                link.href = url;
                link.as = 'document';
                document.head.appendChild(link);
            }
            document.addEventListener('pointerdown', function(e) {
                const a = e.target.closest('a');
                if (a && a.href && a.origin === location.origin && a.target !== '_blank') {
                    prefetch(a.href);
                }
            }, { passive: true });
            document.addEventListener('mouseover', function(e) {
                const a = e.target.closest('a');
                if (a && a.href && a.origin === location.origin && a.target !== '_blank') {
                    let timer = setTimeout(() => { if (a.matches(':hover')) prefetch(a.href); }, 65);
                    a.addEventListener('mouseleave', () => clearTimeout(timer), { once: true });
                }
            }, { passive: true });

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
        })();
    </script>
</body>
</html>

