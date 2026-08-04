@extends('layouts.public')

@section('title', 'Ryoki Skincare — Rahasia Kulit Sehat & Glowing Alami')
@section('meta_description', 'Skincare Jepang BPOM berkualitas tinggi. Diformulasikan untuk mencerahkan, melembabkan, dan merawat kesehatan skin barrier Anda.')

@section('content')
<div class="space-y-28 pb-24">

    <!-- HERO SECTION -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative rounded-[2rem] overflow-hidden bg-gradient-to-br from-[#E0F2FE] via-[#F0F9FF] to-white border border-sky-100/80 shadow-sm">

            <!-- Decorative Background Elements -->
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-gradient-to-bl from-[#BAE6FD]/30 to-transparent rounded-full blur-3xl -translate-y-1/3 translate-x-1/4 pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-gradient-to-tr from-[#A5F3FC]/20 to-transparent rounded-full blur-3xl translate-y-1/3 -translate-x-1/4 pointer-events-none"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-[#0284C7]/[0.03] rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-12 items-center p-5 sm:p-10 md:p-14 lg:p-16">

                <!-- Left: Copy Content -->
                <div class="space-y-5 sm:space-y-7 max-w-xl">

                    <!-- Main Heading -->
                    <div class="space-y-3 sm:space-y-4">
                        <h1 class="text-3xl sm:text-5xl lg:text-[3.5rem] xl:text-6xl font-bold font-playfair text-slate-900 leading-[1.15] tracking-tight">
                            Rahasia Kulit
                            <span class="relative inline-block">
                                <span class="relative z-10 text-[#0284C7] italic font-playfair font-normal">Cerah &amp; Glowing</span>
                                <span class="absolute bottom-1 left-0 right-0 h-2.5 sm:h-3 bg-sky-200/50 -skew-x-2 rounded"></span>
                            </span>
                            <br class="hidden sm:block">Sepanjang Hari
                        </h1>

                        <p class="text-xs sm:text-lg text-slate-600 font-normal leading-relaxed max-w-lg">
                            Diformulasikan secara presisi dengan <strong class="font-semibold text-slate-800">Niacinamide</strong>, <strong class="font-semibold text-slate-800">Alpha Arbutin</strong> &amp; <strong class="font-semibold text-slate-800">Collagen</strong> untuk merawat skin barrier Anda.
                        </p>
                    </div>

                    <!-- Mobile Product Showcase (Immediately Visible on Mobile Screens) -->
                    <div class="block lg:hidden relative my-2 py-1">
                        <div class="relative flex items-center justify-center min-h-[200px] sm:min-h-[280px]">
                            <!-- Background glow behind products -->
                            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                                <div class="w-52 h-52 sm:w-72 sm:h-72 rounded-full bg-gradient-to-br from-[#BAE6FD]/50 via-[#E0F2FE]/40 to-[#A5F3FC]/30 blur-xl"></div>
                            </div>

                            <!-- Product 1: Facial Wash (Left) -->
                            <div class="absolute left-2 sm:left-10 z-10 w-28 sm:w-36 -rotate-6 transition-transform hover:rotate-0">
                                <div class="relative group">
                                    <div class="absolute inset-0 rounded-xl bg-white/70 backdrop-blur-sm shadow-md border border-white/80"></div>
                                    <img src="{{ asset('images/facial-wash.png') }}" alt="Ryoki Facial Wash" class="relative z-10 w-full h-auto rounded-xl p-1.5 drop-shadow-md">
                                    <div class="absolute -bottom-2 left-1/2 -translate-x-1/2 z-20 bg-white/95 rounded-full px-2 py-0.5 shadow-xs border border-sky-100 whitespace-nowrap">
                                        <span class="text-[9px] font-bold text-[#0284C7]">Facial Wash</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Product 2: Day Cream (Center-front Best Seller) -->
                            <div class="relative z-30 w-36 sm:w-44 -mt-1 transition-transform hover:scale-105">
                                <div class="relative group">
                                    <div class="absolute inset-0 rounded-xl bg-white/80 backdrop-blur-sm shadow-xl border border-white/90"></div>
                                    <img src="{{ asset('images/day-cream.png') }}" alt="Ryoki Day Cream" class="relative z-10 w-full h-auto rounded-xl p-1.5 drop-shadow-lg">
                                    <div class="absolute -top-2.5 -right-1 z-20 bg-gradient-to-r from-[#0284C7] to-[#0369A1] text-white rounded-full px-2 py-0.5 shadow-md">
                                        <span class="text-[9px] font-bold">★ BEST SELLER</span>
                                    </div>
                                    <div class="absolute -bottom-2 left-1/2 -translate-x-1/2 z-20 bg-white/95 rounded-full px-2 py-0.5 shadow-xs border border-sky-100 whitespace-nowrap">
                                        <span class="text-[9px] font-bold text-[#0284C7]">Day Cream</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Product 3: Peeling Spray (Right) -->
                            <div class="absolute right-2 sm:right-10 z-20 w-28 sm:w-36 rotate-6 transition-transform hover:rotate-0">
                                <div class="relative group">
                                    <div class="absolute inset-0 rounded-xl bg-white/70 backdrop-blur-sm shadow-md border border-white/80"></div>
                                    <img src="{{ asset('images/peeling-spray.png') }}" alt="Ryoki Peeling Spray" class="relative z-10 w-full h-auto rounded-xl p-1.5 drop-shadow-md">
                                    <div class="absolute -bottom-2 left-1/2 -translate-x-1/2 z-20 bg-white/95 rounded-full px-2 py-0.5 shadow-xs border border-sky-100 whitespace-nowrap">
                                        <span class="text-[9px] font-bold text-[#0284C7]">Peeling Spray</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CTA Buttons (Dual Marketplace & Catalog Access - Unified Design) -->
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 pt-1">
                        <!-- Primary Catalog Button (Matching rounded-2xl & single-line text) -->
                        <a href="{{ route('products.index') }}"
                           class="px-7 py-3.5 rounded-2xl bg-gradient-to-r from-[#0284C7] to-[#0369A1] hover:from-[#0369A1] hover:to-[#075985] text-white text-xs sm:text-sm font-bold flex items-center justify-center gap-2 shadow-lg shadow-sky-500/25 transition-all hover:scale-[1.02] active:scale-98">
                            <span>Eksplorasi Katalog Produk</span>
                            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>

                        <!-- Dual Marketplace Fast Links (Full Width Fill) -->
                        <div class="flex-1 grid grid-cols-2 gap-1 p-1 bg-white border border-slate-200/90 rounded-2xl shadow-sm">
                            <a href="https://www.tiktok.com/@ryokijapanskin" target="_blank" rel="noopener noreferrer"
                               onclick="trackTikTokClick('Hero Showcase', null, 'Hero Section')"
                               class="py-2.5 px-3 rounded-xl text-xs font-bold bg-slate-100 text-slate-800 hover:bg-slate-900 hover:text-white transition-all flex items-center justify-center gap-1.5 text-center">
                                <svg class="w-3.5 h-3.5 fill-current shrink-0" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/></svg>
                                <span>TikTok Shop</span>
                            </a>
                            <a href="{{ config('services.shopee.official_url', 'https://shopee.co.id/ryokiofficialstore') }}" target="_blank" rel="noopener noreferrer"
                               onclick="trackShopeeClick('Hero Showcase', null, 'Hero Section')"
                               class="py-2.5 px-3 rounded-xl text-xs font-bold bg-orange-50 text-[#EE4D2D] hover:bg-[#EE4D2D] hover:text-white transition-all flex items-center justify-center gap-1.5 text-center">
                                <svg class="w-3.5 h-3.5 fill-current shrink-0" viewBox="0 0 24 24"><path d="M19.77 7.06h-3.41V5.44C16.36 2.44 13.92 0 10.92 0S5.48 2.44 5.48 5.44v1.62H1.71L.12 21.61C-.07 22.9 1 24 2.29 24h16.89c1.29 0 2.36-1.1 2.17-2.39l-1.58-14.55zM7.48 5.44c0-1.9 1.54-3.44 3.44-3.44s3.44 1.54 3.44 3.44v1.62H7.48V5.44zm11.75 16.56H2.25L3.6 8.56h1.88v2.09c0 .55.45 1 1 1s1-.45 1-1V8.56h6.88v2.09c0 .55.45 1 1 1s1-.45 1-1V8.56h1.88l1.35 13.44z"/></svg>
                                <span>Shopee Official</span>
                            </a>
                        </div>
                    </div>

                    <!-- Micro Specification Grid (E-Commerce Luxury Style) -->
                    <div class="grid grid-cols-3 gap-3 pt-5 border-t border-sky-200/50 max-w-lg">
                        <div>
                            <span class="block text-[10px] sm:text-[11px] font-bold text-slate-800 tracking-wider uppercase font-heading">BPOM RI</span>
                            <span class="block text-[10px] sm:text-[11px] text-slate-400 font-light mt-0.5">Sertifikasi Resmi</span>
                        </div>
                        <div class="border-l border-slate-200/80 pl-3">
                            <span class="block text-[10px] sm:text-[11px] font-bold text-slate-800 tracking-wider uppercase font-heading">Formulasi</span>
                            <span class="block text-[10px] sm:text-[11px] text-slate-400 font-light mt-0.5">Standar Jepang</span>
                        </div>
                        <div class="border-l border-slate-200/80 pl-3">
                            <span class="block text-[10px] sm:text-[11px] font-bold text-slate-800 tracking-wider uppercase font-heading">Keamanan</span>
                            <span class="block text-[10px] sm:text-[11px] text-slate-400 font-light mt-0.5">Teruji Dermatologi</span>
                        </div>
                    </div>
                </div>

                <!-- Right: Overlapping Product Images Showcase (Desktop Only) -->
                <div class="hidden lg:flex relative items-center justify-end min-h-[500px]">

                    <!-- Background glow behind products -->
                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                        <div class="w-72 h-72 sm:w-80 sm:h-80 lg:w-96 lg:h-96 rounded-full bg-gradient-to-br from-[#BAE6FD]/40 via-[#E0F2FE]/30 to-[#A5F3FC]/20 blur-2xl"></div>
                    </div>

                    <!-- Product 1: Facial Wash (Back-left, rotated) -->
                    <div class="absolute left-4 sm:left-8 lg:left-4 xl:left-8 bottom-8 sm:bottom-10 lg:bottom-12
                                z-10 w-36 sm:w-44 lg:w-48 xl:w-52
                                -rotate-6 transition-transform duration-500 hover:rotate-0 hover:scale-105">
                        <div class="relative group">
                            <div class="absolute inset-0 rounded-2xl bg-white/50 backdrop-blur-sm shadow-lg shadow-sky-900/10 border border-white/60"></div>
                            <img src="{{ asset('images/facial-wash.png') }}"
                                 alt="Ryoki α Niacin Facial Wash"
                                 class="relative z-10 w-full h-auto rounded-2xl p-2 drop-shadow-lg">
                            <!-- Product label -->
                            <div class="absolute -bottom-3 left-1/2 -translate-x-1/2 z-20 bg-white/90 backdrop-blur-sm rounded-full px-3 py-1 shadow-md border border-sky-100 whitespace-nowrap">
                                <span class="text-[10px] font-bold text-[#0284C7]">Facial Wash</span>
                            </div>
                        </div>
                    </div>

                    <!-- Product 2: Day Cream (Center-front, largest, hero focus) -->
                    <div class="relative z-30 w-44 sm:w-52 lg:w-56 xl:w-64
                                -mt-4 sm:-mt-6
                                transition-transform duration-500 hover:scale-105 hover:-translate-y-2">
                        <div class="relative group">
                            <div class="absolute inset-0 rounded-2xl bg-white/60 backdrop-blur-sm shadow-xl shadow-sky-900/15 border border-white/70"></div>
                            <img src="{{ asset('images/day-cream.png') }}"
                                 alt="Ryoki Luminous Whitening Day Cream"
                                 class="relative z-10 w-full h-auto rounded-2xl p-2 drop-shadow-xl">
                            <!-- Best seller badge -->
                            <div class="absolute -top-3 -right-2 z-20 bg-gradient-to-r from-[#0284C7] to-[#0369A1] text-white rounded-full px-3 py-1 shadow-lg shadow-sky-500/30">
                                <span class="text-[10px] font-bold tracking-wide">★ BEST SELLER</span>
                            </div>
                            <!-- Product label -->
                            <div class="absolute -bottom-3 left-1/2 -translate-x-1/2 z-20 bg-white/90 backdrop-blur-sm rounded-full px-3 py-1 shadow-md border border-sky-100 whitespace-nowrap">
                                <span class="text-[10px] font-bold text-[#0284C7]">Day Cream</span>
                            </div>
                        </div>
                    </div>

                    <!-- Product 3: Peeling Spray (Back-right, rotated opposite) -->
                    <div class="absolute right-4 sm:right-8 lg:right-0 xl:right-4 bottom-8 sm:bottom-10 lg:bottom-12
                                z-20 w-36 sm:w-44 lg:w-48 xl:w-52
                                rotate-6 transition-transform duration-500 hover:rotate-0 hover:scale-105">
                        <div class="relative group">
                            <div class="absolute inset-0 rounded-2xl bg-white/50 backdrop-blur-sm shadow-lg shadow-sky-900/10 border border-white/60"></div>
                            <img src="{{ asset('images/peeling-spray.png') }}"
                                 alt="Ryoki Brightening Peeling Spray"
                                 class="relative z-10 w-full h-auto rounded-2xl p-2 drop-shadow-lg">
                            <!-- Product label -->
                            <div class="absolute -bottom-3 left-1/2 -translate-x-1/2 z-20 bg-white/90 backdrop-blur-sm rounded-full px-3 py-1 shadow-md border border-sky-100 whitespace-nowrap">
                                <span class="text-[10px] font-bold text-[#0284C7]">Peeling Spray</span>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Rating Card (overlapping bottom-center) -->
                    <div class="absolute bottom-0 sm:-bottom-2 left-1/2 -translate-x-1/2 z-40
                                bg-white/95 backdrop-blur-md rounded-2xl px-5 py-3 shadow-lg shadow-sky-900/10 border border-sky-100/80
                                flex items-center gap-4 min-w-[240px]">
                        <div class="flex flex-col">
                            <span class="text-xs font-bold text-[#0F172A]">Ryoki α Niacin Series</span>
                            <span class="text-[11px] text-slate-500 font-medium">Formulasi Jepang Original</span>
                        </div>
                        <div class="flex flex-col items-end border-l border-slate-100 pl-4">
                            <span class="text-sm font-bold text-amber-500">★ 4.9</span>
                            <span class="text-[10px] text-slate-400 font-medium">1.2k+ Reviews</span>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- DAILY RITUAL (Clean 4 Steps) -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14 space-y-2.5">
            <h2 class="text-3xl md:text-4xl font-bold font-heading text-slate-900">Rutinitas Skincare Harian</h2>
            <p class="text-slate-500 font-light text-sm">Urutan perawatan tepat untuk menjaga kelembaban dan kesehatan kulit Anda.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="skincare-card p-6 space-y-3 text-center">
                <span class="text-xs font-bold text-[#0284C7] uppercase tracking-wider">Langkah 1</span>
                <h3 class="text-lg font-bold text-slate-900">Cleansing</h3>
                <p class="text-xs text-slate-500 leading-relaxed font-light">Membersihkan kotoran & minyak tanpa rasa kering tertarik.</p>
                <p class="text-xs font-semibold text-slate-700 pt-2 border-t border-slate-100">α Niacin Facial Wash</p>
            </div>

            <div class="skincare-card p-6 space-y-3 text-center">
                <span class="text-xs font-bold text-[#0284C7] uppercase tracking-wider">Langkah 2</span>
                <h3 class="text-lg font-bold text-slate-900">Exfoliation</h3>
                <p class="text-xs text-slate-500 leading-relaxed font-light">Mengangkat sel kulit mati secara lembut untuk tampilan lebih cerah.</p>
                <p class="text-xs font-semibold text-slate-700 pt-2 border-t border-slate-100">Brightening Peeling Spray</p>
            </div>

            <div class="skincare-card p-6 space-y-3 text-center">
                <span class="text-xs font-bold text-[#0284C7] uppercase tracking-wider">Langkah 3</span>
                <h3 class="text-lg font-bold text-slate-900">Protection</h3>
                <p class="text-xs text-slate-500 leading-relaxed font-light">Krim pagi pencerah yang melindungi dari paparan sinar matahari.</p>
                <p class="text-xs font-semibold text-slate-700 pt-2 border-t border-slate-100">Luminous Whitening Day Cream</p>
            </div>

            <div class="skincare-card p-6 space-y-3 text-center">
                <span class="text-xs font-bold text-[#0284C7] uppercase tracking-wider">Langkah 4</span>
                <h3 class="text-lg font-bold text-slate-900">Body Care</h3>
                <p class="text-xs text-slate-500 leading-relaxed font-light">Nutrisi serum tubuh dengan Collagen untuk kulit tetap halus.</p>
                <p class="text-xs font-semibold text-slate-700 pt-2 border-t border-slate-100">Hand & Body Serum</p>
            </div>
        </div>
    </section>

    <!-- FEATURED PRODUCTS GRID -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-12 gap-4">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold font-heading text-slate-900">Produk Skincare Unggulan</h2>
                <p class="text-slate-500 font-light text-sm mt-1">Solusi teruji BPOM untuk perawatan kulit sehat Anda.</p>
            </div>
            <a href="{{ route('products.index') }}" class="text-sm font-semibold text-[#0284C7] hover:text-[#0369A1] flex items-center gap-1.5">
                Lihat Semua Produk
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-3.5 sm:gap-6 lg:gap-8">
            @forelse($featuredProducts as $product)
                <x-product-card :product="$product" :show-category="true" />
            @empty
                {{-- Fallback: static cards if no featured products in DB yet --}}
                <div class="col-span-full text-center py-12 text-slate-400 text-sm">
                    Belum ada produk unggulan.
                </div>
            @endforelse
        </div>
    </section>

    <!-- INGREDIENTS & FORMULATION SECTION -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

            <!-- Left: Studio Product Lineup Banner Photo -->
            <div class="lg:col-span-6">
                <div class="relative w-full rounded-3xl overflow-hidden shadow-md border border-slate-200/90 bg-white p-2.5 sm:p-3 group">
                    <img src="{{ asset('images/ryoki-lineup.png') }}" alt="Ryoki Skincare Lineup - Formulated in Japan 100% Safe and Halal Certified" class="w-full h-auto object-contain rounded-2xl transition-transform duration-300 group-hover:scale-[1.02]" loading="lazy">
                </div>
            </div>

            <!-- Right: Ingredients Grid -->
            <div class="lg:col-span-6 space-y-6">
                <div class="space-y-3">
                    <h2 class="text-3xl md:text-4xl font-bold font-heading text-slate-900 leading-tight">
                        Formulasi Lembut dengan Bahan Aktif Pilihan
                    </h2>
                    <p class="text-slate-600 font-light text-sm leading-relaxed">
                        Setiap produk Ryoki memadukan kebaikan ekstrak alami dan sains kecantikan Jepang untuk hasil yang nyata tanpa merusak lapisan pertahanan kulit (skin barrier).
                    </p>
                </div>

                <!-- Clean 2x2 Ingredients Layout -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-2">
                    <div class="space-y-1">
                        <h3 class="text-base font-bold text-slate-900 font-heading">Niacinamide High-Grade</h3>
                        <p class="text-xs text-slate-500 font-light leading-relaxed">
                            Meratakan warna kulit kusam, mencerahkan secara lembut, dan membantu menyamarkan pori-pori.
                        </p>
                    </div>

                    <div class="space-y-1">
                        <h3 class="text-base font-bold text-slate-900 font-heading">Hydro-Collagen Complex</h3>
                        <p class="text-xs text-slate-500 font-light leading-relaxed">
                            Mengunci kelembaban hingga lapisan terdalam agar kulit senantiasa kenyal dan berseri.
                        </p>
                    </div>

                    <div class="space-y-1">
                        <h3 class="text-base font-bold text-slate-900 font-heading">Alpha Arbutin</h3>
                        <p class="text-xs text-slate-500 font-light leading-relaxed">
                            Bahan aktif pilihan untuk memudarkan hiperpigmentasi, flek hitam, serta noda sisa jerawat.
                        </p>
                    </div>

                    <div class="space-y-1">
                        <h3 class="text-base font-bold text-slate-900 font-heading">Ekstrak Aloe Vera</h3>
                        <p class="text-xs text-slate-500 font-light leading-relaxed">
                            Menenangkan iritasi ringan, menyejukkan kulit, serta menjaga kesehatan skin barrier.
                        </p>
                    </div>
                </div>

                <div class="pt-4 flex items-center gap-6 text-xs text-slate-400 font-light border-t border-slate-100">
                    <div>
                        <span class="font-bold text-slate-800 font-heading">BPOM RI</span> — Terdaftar Resmi
                    </div>
                    <div class="border-l border-slate-200 pl-6">
                        <span class="font-bold text-slate-800 font-heading">GMP Factory</span> — Quality Standard
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- CUSTOMER REVIEWS & SOCIAL PROOF -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-14 space-y-3">
            <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-sky-50 text-[#0284C7] text-xs font-semibold border border-sky-200">
                💬 Ulasan Jujur Pelanggan
            </span>
            <h2 class="text-3xl md:text-4xl font-bold font-playfair text-slate-900">Apa Kata Mereka Tentang Ryoki?</h2>
            <p class="text-slate-500 text-sm font-light leading-relaxed">
                Ribuan wanita Indonesia telah membuktikan kelembutan dan manfaat nyata Ryoki Skincare dalam merawat kesehatan skin barrier.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
            <!-- Review 1 -->
            <div class="skincare-card p-6 flex flex-col justify-between hover:border-sky-300 transition-all space-y-4">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-1 text-amber-400 text-xs">
                            ★ ★ ★ ★ ★
                            <span class="text-slate-800 font-bold text-xs ml-1">5.0</span>
                        </div>
                        <span class="text-[10px] font-semibold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-100 flex items-center gap-1">
                            <svg class="w-3 h-3 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            Verified Buyer
                        </span>
                    </div>
                    <p class="text-xs text-slate-600 leading-relaxed font-light italic">
                        "Facial wash-nya beneran lembut banget di muka! Abis cuci muka berasa bersih segar tapi nggak ketarik sama sekali. Niacinamide-nya bantu bekas jerawat di pipi memudar setelah 2 minggu rutin."
                    </p>
                </div>
                <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full bg-gradient-to-tr from-[#0284C7] to-sky-300 text-white font-bold text-xs flex items-center justify-center font-heading shadow-xs">
                            DN
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-900">Dina Nuraeni</p>
                            <p class="text-[10px] text-slate-400 font-medium">Jakarta Selatan</p>
                        </div>
                    </div>
                    <span class="text-[10px] font-semibold text-sky-600 bg-sky-50 px-2 py-0.5 rounded-md">
                        α Niacin Facial Wash
                    </span>
                </div>
            </div>

            <!-- Review 2 -->
            <div class="skincare-card p-6 flex flex-col justify-between hover:border-sky-300 transition-all space-y-4">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-1 text-amber-400 text-xs">
                            ★ ★ ★ ★ ★
                            <span class="text-slate-800 font-bold text-xs ml-1">5.0</span>
                        </div>
                        <span class="text-[10px] font-semibold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-100 flex items-center gap-1">
                            <svg class="w-3 h-3 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            Verified Buyer
                        </span>
                    </div>
                    <p class="text-xs text-slate-600 leading-relaxed font-light italic">
                        "Peeling spray-nya ajaib sih, semprot bentar lalu gosok halus sel kulit mati langsung rontok. Dipakai di leher dan siku jadi makin halus dan cerah. Wajib punya!"
                    </p>
                </div>
                <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full bg-gradient-to-tr from-teal-500 to-[#0284C7] text-white font-bold text-xs flex items-center justify-center font-heading shadow-xs">
                            RM
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-900">Rina Maharani</p>
                            <p class="text-[10px] text-slate-400 font-medium">Bandung</p>
                        </div>
                    </div>
                    <span class="text-[10px] font-semibold text-sky-600 bg-sky-50 px-2 py-0.5 rounded-md">
                        Peeling Spray
                    </span>
                </div>
            </div>

            <!-- Review 3 -->
            <div class="skincare-card p-6 flex flex-col justify-between hover:border-sky-300 transition-all space-y-4">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-1 text-amber-400 text-xs">
                            ★ ★ ★ ★ ★
                            <span class="text-slate-800 font-bold text-xs ml-1">5.0</span>
                        </div>
                        <span class="text-[10px] font-semibold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-100 flex items-center gap-1">
                            <svg class="w-3 h-3 text-emerald-600" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            Verified Buyer
                        </span>
                    </div>
                    <p class="text-xs text-slate-600 leading-relaxed font-light italic">
                        "Day cream-nya pas dioleskan langsung bikin wajah glowing sehat seketika! Teksturnya ringan, nggak lengket, dan ada perlindungan UV yang nyaman dipake kerja seharian."
                    </p>
                </div>
                <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full bg-gradient-to-tr from-sky-400 to-indigo-500 text-white font-bold text-xs flex items-center justify-center font-heading shadow-xs">
                            AS
                        </div>
                        <div>
                            <p class="text-xs font-bold text-slate-900">Anisa Syafitri</p>
                            <p class="text-[10px] text-slate-400 font-medium">Surabaya</p>
                        </div>
                    </div>
                    <span class="text-[10px] font-semibold text-sky-600 bg-sky-50 px-2 py-0.5 rounded-md">
                        Luminous Day Cream
                    </span>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection

