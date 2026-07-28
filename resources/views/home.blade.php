@extends('layouts.public')

@section('title', 'Ryoki Skincare — Rahasia Kulit Sehat & Glowing Alami')
@section('meta_description', 'Skincare Jepang BPOM berkualitas tinggi. Diformulasikan untuk mencerahkan, melembabkan, dan merawat kesehatan skin barrier Anda.')

@section('content')
<div class="space-y-24 pb-20">

    <!-- HERO SECTION -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative rounded-[2rem] overflow-hidden bg-gradient-to-br from-[#E0F2FE] via-[#F0F9FF] to-white border border-sky-100/80 shadow-sm">

            <!-- Decorative Background Elements -->
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-gradient-to-bl from-[#BAE6FD]/30 to-transparent rounded-full blur-3xl -translate-y-1/3 translate-x-1/4 pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-gradient-to-tr from-[#A5F3FC]/20 to-transparent rounded-full blur-3xl translate-y-1/3 -translate-x-1/4 pointer-events-none"></div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-[#0284C7]/[0.03] rounded-full blur-3xl pointer-events-none"></div>

            <div class="relative z-10 grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-4 items-center p-8 sm:p-10 md:p-14 lg:p-16">

                <!-- Left: Copy Content -->
                <div class="space-y-7 max-w-xl">

                    <!-- Main Heading -->
                    <div class="space-y-4">
                        <h1 class="text-4xl sm:text-5xl lg:text-[3.5rem] xl:text-6xl font-bold font-playfair text-slate-900 leading-[1.18] tracking-tight">
                            Rahasia Kulit
                            <span class="relative inline-block">
                                <span class="relative z-10 text-[#0284C7] italic font-playfair font-normal">Cerah &amp; Glowing</span>
                                <span class="absolute bottom-1.5 left-0 right-0 h-3 bg-sky-200/50 -skew-x-2 rounded"></span>
                            </span>
                            <br class="hidden sm:block">Sepanjang Hari
                        </h1>

                        <p class="text-base sm:text-lg text-slate-600 font-normal leading-relaxed max-w-lg">
                            Diformulasikan secara presisi dengan <strong class="font-semibold text-slate-800">Niacinamide</strong>, <strong class="font-semibold text-slate-800">Alpha Arbutin</strong>, <strong class="font-semibold text-slate-800">Collagen</strong> &amp; Ekstrak Botanikal untuk merawat skin barrier Anda.
                        </p>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 pt-1">
                        <a href="{{ route('products.index') }}" class="btn-ryoki btn-ryoki-primary text-sm px-8 py-3.5 shadow-lg shadow-sky-500/20 hover:shadow-sky-500/30">
                            Lihat Produk Skincare
                            <svg class="w-4 h-4 transition-transform group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                        <a href="https://www.tiktok.com/@ryokijapanskin" target="_blank" rel="noopener noreferrer" class="btn-ryoki btn-ryoki-secondary text-sm px-8 py-3.5">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/></svg>
                            TikTok Shop Official
                        </a>
                    </div>

                    <!-- Micro Specification Grid (E-Commerce Luxury Style) -->
                    <div class="grid grid-cols-3 gap-4 pt-6 border-t border-sky-200/50 max-w-lg">
                        <div>
                            <span class="block text-[11px] font-bold text-slate-800 tracking-wider uppercase font-heading">BPOM RI</span>
                            <span class="block text-[11px] text-slate-400 font-light mt-0.5">Sertifikasi Resmi</span>
                        </div>
                        <div class="border-l border-slate-200/80 pl-4">
                            <span class="block text-[11px] font-bold text-slate-800 tracking-wider uppercase font-heading">Formulasi</span>
                            <span class="block text-[11px] text-slate-400 font-light mt-0.5">Standar Jepang</span>
                        </div>
                        <div class="border-l border-slate-200/80 pl-4">
                            <span class="block text-[11px] font-bold text-slate-800 tracking-wider uppercase font-heading">Keamanan</span>
                            <span class="block text-[11px] text-slate-400 font-light mt-0.5">Teruji Dermatologi</span>
                        </div>
                    </div>
                </div>

                <!-- Right: Overlapping Product Images Showcase -->
                <div class="relative flex items-center justify-center lg:justify-end min-h-[380px] sm:min-h-[440px] lg:min-h-[500px]">

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
        <div class="text-center max-w-2xl mx-auto mb-12 space-y-2">
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
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-10 gap-4">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold font-heading text-slate-900">Produk Skincare Unggulan</h2>
                <p class="text-slate-500 font-light text-sm mt-1">Solusi teruji BPOM untuk perawatan kulit sehat Anda.</p>
            </div>
            <a href="{{ route('products.index') }}" class="text-sm font-semibold text-[#0284C7] hover:text-[#0369A1] flex items-center gap-1.5">
                Lihat Semua Produk
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

            <!-- Card 1: Facial Wash -->
            <div class="skincare-card p-5 flex flex-col justify-between group">
                <div>
                    <div class="relative w-full aspect-square rounded-2xl overflow-hidden bg-slate-50 mb-4 border border-slate-100">
                        <img src="{{ asset('images/facial-wash.png') }}" alt="Ryoki α Niacin Facial Wash" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>

                    <div class="flex items-center gap-1 text-amber-400 text-xs mb-2">
                        <span>★ 4.9</span>
                        <span class="text-slate-400 font-medium ml-1">(1.2k+ Terjual)</span>
                    </div>

                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-[#0284C7] transition-colors mb-1 font-heading">
                        Ryoki α Niacin Facial Wash
                    </h3>
                    <p class="text-xs text-slate-500 line-clamp-2 mb-4 font-light leading-relaxed">
                        Pembersih wajah lembut bersertifikat BPOM yang diperkaya Niacinamide & Collagen. Mengangkat kotoran secara menyeluruh tanpa mengganggu kelembaban alami kulit.
                    </p>
                </div>

                <div>
                    <div class="flex items-center justify-between pt-4 border-t border-slate-100 mb-4">
                        <span class="text-xs text-slate-400 uppercase font-medium">Harga Resmi</span>
                        <span class="text-xl font-bold text-[#0284C7]">Rp 65.000</span>
                    </div>
                    <a href="https://www.tiktok.com/@ryokijapanskin" target="_blank" class="btn-ryoki btn-ryoki-primary w-full text-xs justify-center shadow-md">
                        Beli di TikTok Shop Official
                    </a>
                </div>
            </div>

            <!-- Card 2: Peeling Spray -->
            <div class="skincare-card p-5 flex flex-col justify-between group">
                <div>
                    <div class="relative w-full aspect-square rounded-2xl overflow-hidden bg-slate-50 mb-4 border border-slate-100">
                        <img src="{{ asset('images/peeling-spray.png') }}" alt="Brightening Peeling Spray" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>

                    <div class="flex items-center gap-1 text-amber-400 text-xs mb-2">
                        <span>★ 4.8</span>
                        <span class="text-slate-400 font-medium ml-1">(950+ Terjual)</span>
                    </div>

                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-[#0284C7] transition-colors mb-1 font-heading">
                        Brightening Peeling Spray
                    </h3>
                    <p class="text-xs text-slate-500 line-clamp-2 mb-4 font-light leading-relaxed">
                        Exfoliating spray yang mengangkat sel kulit mati secara instan di wajah dan tubuh. Diperkaya Aloe Vera & Grape Seed Extract untuk tekstur kulit lebih halus.
                    </p>
                </div>

                <div>
                    <div class="flex items-center justify-between pt-4 border-t border-slate-100 mb-4">
                        <span class="text-xs text-slate-400 uppercase font-medium">Harga Resmi</span>
                        <span class="text-xl font-bold text-[#0284C7]">Rp 75.000</span>
                    </div>
                    <a href="https://www.tiktok.com/@ryokijapanskin" target="_blank" class="btn-ryoki btn-ryoki-primary w-full text-xs justify-center shadow-md">
                        Beli di TikTok Shop Official
                    </a>
                </div>
            </div>

            <!-- Card 3: Day Cream -->
            <div class="skincare-card p-5 flex flex-col justify-between group">
                <div>
                    <div class="relative w-full aspect-square rounded-2xl overflow-hidden bg-slate-50 mb-4 border border-slate-100">
                        <img src="{{ asset('images/day-cream.png') }}" alt="Luminous Whitening Day Cream" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>

                    <div class="flex items-center gap-1 text-amber-400 text-xs mb-2">
                        <span>★ 4.9</span>
                        <span class="text-slate-400 font-medium ml-1">(1.5k+ Terjual)</span>
                    </div>

                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-[#0284C7] transition-colors mb-1 font-heading">
                        Luminous Whitening Day Cream
                    </h3>
                    <p class="text-xs text-slate-500 line-clamp-2 mb-4 font-light leading-relaxed">
                        Krim pagi mencerahkan dengan UV Protection. Menyamarkan noda hitam dan membuat kulit tampak bercahaya alami sepanjang hari.
                    </p>
                </div>

                <div>
                    <div class="flex items-center justify-between pt-4 border-t border-slate-100 mb-4">
                        <span class="text-xs text-slate-400 uppercase font-medium">Harga Resmi</span>
                        <span class="text-xl font-bold text-[#0284C7]">Rp 85.000</span>
                    </div>
                    <a href="https://www.tiktok.com/@ryokijapanskin" target="_blank" class="btn-ryoki btn-ryoki-primary w-full text-xs justify-center shadow-md">
                        Beli di TikTok Shop Official
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!-- INGREDIENTS & FORMULATION SECTION -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

            <!-- Left: Studio Product Banner Photo -->
            <div class="lg:col-span-6">
                <div class="relative w-full aspect-[4/3] rounded-3xl overflow-hidden shadow-lg border border-slate-200">
                    <img src="{{ asset('images/hero-banner.png') }}" alt="Ryoki Skincare Formulations" class="w-full h-full object-cover">
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

    <!-- CUSTOMER REVIEWS -->
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-xl mx-auto mb-12 space-y-2">
            <h2 class="text-3xl font-bold font-heading text-slate-900">Ulasan Pengguna Ryoki</h2>
            <p class="text-slate-500 text-sm font-light">Pengalaman jujur dari pelanggan setia Ryoki Skincare di Indonesia.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="skincare-card p-6 space-y-4">
                <div class="text-amber-400 text-sm font-bold">★ 5.0</div>
                <p class="text-xs text-slate-600 leading-relaxed italic font-light">
                    "Facial wash-nya beneran lembut banget di muka, abis cuci muka berasa bersih tapi nggak ketarik sama sekali. Niacinamide-nya bantu bekas jerawat aku memudar pas 2 minggu pemakaian!"
                </p>
                <div class="flex items-center gap-3 pt-2 border-t border-slate-100">
                    <div class="w-9 h-9 rounded-full bg-sky-100 text-sky-700 font-bold text-xs flex items-center justify-center font-heading">DN</div>
                    <div>
                        <p class="text-xs font-bold text-slate-900">Dina Nuraeni</p>
                        <p class="text-[10px] text-sky-600 font-semibold">Pembeli Terverifikasi TikTok</p>
                    </div>
                </div>
            </div>

            <div class="skincare-card p-6 space-y-4">
                <div class="text-amber-400 text-sm font-bold">★ 5.0</div>
                <p class="text-xs text-slate-600 leading-relaxed italic font-light">
                    "Peeling spray-nya ajaib sih, gosok sebentar daki langsung rontok semua. Dipakai di siku dan leher jadi makin cerah. Bakal repurchase terus!"
                </p>
                <div class="flex items-center gap-3 pt-2 border-t border-slate-100">
                    <div class="w-9 h-9 rounded-full bg-sky-100 text-sky-700 font-bold text-xs flex items-center justify-center font-heading">RM</div>
                    <div>
                        <p class="text-xs font-bold text-slate-900">Rina Maharani</p>
                        <p class="text-[10px] text-sky-600 font-semibold">Pembeli Terverifikasi TikTok</p>
                    </div>
                </div>
            </div>

            <div class="skincare-card p-6 space-y-4">
                <div class="text-amber-400 text-sm font-bold">★ 5.0</div>
                <p class="text-xs text-slate-600 leading-relaxed italic font-light">
                    "Day cream-nya pas dipakai langsung bikin kulit kelihatan glowing sehat. Nggak bikin gampang dempul dan nyaman banget dipakai buat aktivitas seharian."
                </p>
                <div class="flex items-center gap-3 pt-2 border-t border-slate-100">
                    <div class="w-9 h-9 rounded-full bg-sky-100 text-sky-700 font-bold text-xs flex items-center justify-center font-heading">AS</div>
                    <div>
                        <p class="text-xs font-bold text-slate-900">Anisa Syafitri</p>
                        <p class="text-[10px] text-sky-600 font-semibold">Pembeli Terverifikasi TikTok</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
