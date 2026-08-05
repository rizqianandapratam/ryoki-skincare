@extends('layouts.public')

@section('title', 'Ryoki Skincare — Rahasia Kulit Sehat & Glowing Alami | Skincare Jepang BPOM')
@section('meta_description', 'Ryoki Skincare Official — Rangkaian skincare Jepang bersertifikasi BPOM RI. Facial Wash, Serum, Day & Night Cream, Toner, Peeling Spray untuk kulit cerah, glowing & sehat alami. Beli di TikTok Shop & Shopee Official.')
@section('meta_keywords', 'ryoki skincare, skincare jepang, skincare bpom, facial wash niacinamide, serum pencerah wajah, day cream spf, night cream retinol, toner wajah, peeling spray, skincare glowing, skincare pemula, kulit cerah alami, ryoki japan, pt golden intan berlian, tiktok shop ryoki, shopee ryoki official')

@push('head')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "FAQPage",
  "mainEntity": [
    {
      "@@type": "Question",
      "name": "Apakah produk Ryoki Skincare sudah terdaftar BPOM?",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "Ya, seluruh rangkaian produk Ryoki Skincare sudah terdaftar dan tersertifikasi resmi oleh BPOM RI (Badan Pengawas Obat dan Makanan Republik Indonesia). Produk kami juga teruji secara dermatologis dan aman untuk semua jenis kulit."
      }
    },
    {
      "@@type": "Question",
      "name": "Di mana bisa membeli produk Ryoki Skincare yang original?",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "Produk Ryoki Skincare 100% original hanya tersedia di toko resmi kami: TikTok Shop (@ryokijapanskin) dan Shopee Official Store (Ryoki Skincare Official). Hati-hati terhadap produk palsu dari penjual tidak resmi."
      }
    },
    {
      "@@type": "Question",
      "name": "Apa keunggulan Ryoki Skincare dibanding skincare lain?",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "Ryoki Skincare menggunakan formulasi standar Jepang dengan bahan aktif premium seperti Niacinamide, Alpha Arbutin, Glutathione, 24K Gold Extract, Retinol, dan Collagen. Semua produk diproduksi oleh PT Golden Intan Berlian dengan sertifikasi BPOM RI dan telah teruji dermatologis."
      }
    },
    {
      "@@type": "Question",
      "name": "Berapa lama hasil skincare Ryoki terlihat?",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "Dengan penggunaan rutin, hasil awal biasanya terlihat dalam 2-4 minggu. Untuk hasil optimal seperti kulit cerah, glowing, dan merata, dibutuhkan penggunaan konsisten selama 2-3 bulan sesuai dengan siklus regenerasi kulit."
      }
    },
    {
      "@@type": "Question",
      "name": "Apakah Ryoki Skincare cocok untuk kulit sensitif?",
      "acceptedAnswer": {
        "@@type": "Answer",
        "text": "Ya, Ryoki Skincare diformulasikan dengan bahan-bahan yang lembut dan telah teruji dermatologis sehingga aman untuk semua jenis kulit termasuk kulit sensitif. Namun kami tetap menyarankan untuk melakukan patch test terlebih dahulu."
      }
    }
  ]
}
</script>
@endpush

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

                    <!-- Mobile Highlighted Hero Product Showcase -->
                    <div class="block lg:hidden relative my-4 py-2">
                        <div class="relative flex items-center justify-center">
                            <!-- Radiant Spotlight Glow -->
                            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                                <div class="w-64 h-64 rounded-full bg-gradient-to-tr from-[#0284C7]/40 via-[#38BDF8]/35 to-[#2DD4BF]/30 blur-2xl"></div>
                            </div>

                            <!-- Highlighting Soft Glass Card -->
                            <div class="relative z-10 w-full max-w-[320px] mx-auto rounded-[2.5rem] bg-gradient-to-br from-white/90 via-[#E0F2FE]/70 via-[#CCFBF1]/40 to-[#38BDF8]/20 backdrop-blur-xl p-5 shadow-[0_15px_40px_rgba(2,132,199,0.12)] group transition-all duration-500 hover:scale-[1.02]">
                                <img src="{{ asset('images/ryoki-japan.png') }}"
                                     alt="Ryoki Japan Skincare"
                                     class="w-full h-auto max-h-[260px] object-contain drop-shadow-[0_15px_25px_rgba(2,132,199,0.25)] transition-transform duration-500 group-hover:scale-105">
                                <!-- Base Glowing Pedestal -->
                                <div class="w-40 h-4 mx-auto bg-gradient-to-r from-transparent via-[#38BDF8]/40 to-transparent blur-sm rounded-full -mt-3"></div>
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

                <!-- Right: Highlighted Luxury Hero Showcase (Desktop Only) -->
                <div class="hidden lg:flex relative items-center justify-end min-h-[460px]">

                    <!-- Radiant Studio Spotlight Halo Glow (Vibrant Sky Blue + Mint + Cyan) -->
                    <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                        <div class="w-80 h-80 xl:w-[420px] xl:h-[420px] rounded-full bg-gradient-to-tr from-[#0284C7]/40 via-[#38BDF8]/35 to-[#2DD4BF]/30 blur-3xl"></div>
                    </div>

                    <!-- Highlighted Studio Glass Showcase Card -->
                    <div class="relative z-20 w-full max-w-[380px] xl:max-w-[420px] rounded-[3rem] bg-gradient-to-br from-white/90 via-[#E0F2FE]/70 via-[#CCFBF1]/40 to-[#38BDF8]/20 p-6 sm:p-8 backdrop-blur-2xl shadow-[0_20px_50px_rgba(2,132,199,0.15)] group transition-all duration-700 ease-out hover:scale-[1.03] hover:shadow-[0_25px_60px_rgba(2,132,199,0.25)]">
                        
                        <!-- Studio Light Beam Overlay -->
                        <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white/30 to-transparent pointer-events-none rounded-[3rem]"></div>

                        <!-- Highlighted Bottle Showcase Image -->
                        <div class="relative z-10">
                            <img src="{{ asset('images/ryoki-japan.png') }}"
                                 alt="Ryoki Japan Skincare Lineup"
                                 class="w-full h-auto max-h-[320px] xl:max-h-[350px] object-contain drop-shadow-[0_20px_35px_rgba(2,132,199,0.3)] transition-all duration-700 ease-out group-hover:scale-105 group-hover:-translate-y-2 group-hover:drop-shadow-[0_25px_45px_rgba(2,132,199,0.4)]">
                        </div>

                        <!-- Base Glowing Pedestal Effect -->
                        <div class="w-48 xl:w-56 h-5 mx-auto bg-gradient-to-r from-transparent via-[#38BDF8]/50 to-transparent blur-md rounded-full -mt-4 relative z-0"></div>

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

    <!-- CUSTOMER REVIEWS & DUAL MARKETPLACE PROOF (Continuous Infinite Scroll Marquee) -->
    <section class="w-full overflow-hidden py-6 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-10 text-center space-y-3">
            <div class="flex items-center justify-center gap-2 flex-wrap">
                <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-orange-50 text-[#EE4D2D] text-xs font-semibold border border-orange-200 shadow-2xs">
                    <svg class="w-3.5 h-3.5 fill-current text-[#EE4D2D]" viewBox="0 0 24 24"><path d="M19.77 7.06h-3.41V5.44C16.36 2.44 13.92 0 10.92 0S5.48 2.44 5.48 5.44v1.62H1.71L.12 21.61C-.07 22.9 1 24 2.29 24h16.89c1.29 0 2.36-1.1 2.17-2.39l-1.58-14.55zM7.48 5.44c0-1.9 1.54-3.44 3.44-3.44s3.44 1.54 3.44 3.44v1.62H7.48V5.44zm11.75 16.56H2.25L3.6 8.56h1.88v2.09c0 .55.45 1 1 1s1-.45 1-1V8.56h6.88v2.09c0 .55.45 1 1 1s1-.45 1-1V8.56h1.88l1.35 13.44z"/></svg>
                    Shopee Official
                </span>
                <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-slate-900 text-white text-xs font-semibold border border-slate-800 shadow-2xs">
                    <svg class="w-3.5 h-3.5 fill-current text-white" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/></svg>
                    TikTok Shop Official
                </span>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold font-playfair text-slate-900">Apa Kata Mereka Tentang Ryoki?</h2>
            <p class="text-slate-500 text-sm font-light leading-relaxed max-w-2xl mx-auto">
                Ribuan ulasan jujur &amp; rating bintang 5 dari pembeli terverifikasi di Shopee Official Store &amp; TikTok Shop Official.
            </p>
        </div>

        <!-- Marquee Container with Left & Right Gradient Fade Masks -->
        <div class="relative w-full overflow-hidden group">
            <!-- Left Gradient Fade Mask -->
            <div class="pointer-events-none absolute left-0 top-0 z-10 h-full w-16 sm:w-32 bg-gradient-to-r from-slate-50 via-slate-50/80 to-transparent"></div>
            <!-- Right Gradient Fade Mask -->
            <div class="pointer-events-none absolute right-0 top-0 z-10 h-full w-16 sm:w-32 bg-gradient-to-l from-slate-50 via-slate-50/80 to-transparent"></div>

            @php
                $marketplaceReviews = [
                    [
                        'platform' => 'shopee',
                        'name' => 'm***a',
                        'location' => 'Shopee Verified',
                        'product' => 'Gold Whitening Serum',
                        'initials' => 'M',
                        'bg' => 'from-amber-400 to-orange-500',
                        'comment' => 'Suka bgt sm serum ryoki ini, cepat meresap dan muka jd cerah bgt semenjak rutin pake ini. Flek hitam di pipi juga makin pudar! Recomended parah.',
                    ],
                    [
                        'platform' => 'tiktok',
                        'name' => 'rachel_glow',
                        'location' => 'TikTok Shop Verified',
                        'product' => 'Luminous Night Cream',
                        'initials' => 'R',
                        'bg' => 'from-slate-800 to-slate-950',
                        'comment' => 'Review jujur racun TikTok: Night cream ryoki ini ringan bgt gampang meresap, bangun tidur wajah rasanya kenyal & lembab bgt!',
                    ],
                    [
                        'platform' => 'shopee',
                        'name' => 'n***1',
                        'location' => 'Shopee Verified',
                        'product' => 'Peeling Spray',
                        'initials' => 'N',
                        'bg' => 'from-[#0284C7] to-teal-400',
                        'comment' => 'Daki dan sel kulit mati di tangan & leher langsung rontok pas disemprot peeling spray ini. Wanginya seger bgt dan gak bikin perih di kulit!',
                    ],
                    [
                        'platform' => 'tiktok',
                        'name' => 'tiktoker_skincare',
                        'location' => 'TikTok Shop Verified',
                        'product' => 'Luminous Day Cream',
                        'initials' => 'T',
                        'bg' => 'from-slate-900 to-sky-900',
                        'comment' => 'Pesen di VT TikTok Live Ryoki langsung nyampe 2 hari, dapet diskon live! Pake day cream-nya mukaku keliatan glowing kayak cewe Jepang, sukaa bgt!',
                    ],
                    [
                        'platform' => 'shopee',
                        'name' => 's***i',
                        'location' => 'Shopee Verified',
                        'product' => 'Gentle Glow Facial Wash',
                        'initials' => 'S',
                        'bg' => 'from-sky-400 to-indigo-500',
                        'comment' => 'Sabun cuci mukanya lembut banget, busanya halus dan abis cuci muka wajah terasa bersih moist tanpa rasa ketarik. Wajah jd bersih glowing!',
                    ],
                    [
                        'platform' => 'tiktok',
                        'name' => 'cynthia_beauty',
                        'location' => 'TikTok Shop Verified',
                        'product' => 'Peeling Spray',
                        'initials' => 'C',
                        'bg' => 'from-slate-900 to-teal-900',
                        'comment' => 'Peeling spray ryoki emang viral di TikTok bukan kaleng-kaleng. Sekali semprot daki luntur semua di siku & lutut. Wajib checkout pas live!',
                    ],
                    [
                        'platform' => 'shopee',
                        'name' => 'd***a',
                        'location' => 'Shopee Verified',
                        'product' => 'Miss Comby Comby',
                        'initials' => 'D',
                        'bg' => 'from-pink-500 to-rose-400',
                        'comment' => 'Sabun kewanitaan ter-enakeun! Mengurangi gatal & bikin segar seharian. Pengiriman dr Shopee official juga cepet bgt dan pakingan super rapi aman.',
                    ],
                    [
                        'platform' => 'tiktok',
                        'name' => 'dinda_glow',
                        'location' => 'TikTok Shop Verified',
                        'product' => 'Gold Whitening Serum',
                        'initials' => 'D',
                        'bg' => 'from-slate-900 to-amber-900',
                        'comment' => 'Serum gold ryoki wanginya enak bgt gak lebay. Seminggu pake bekas jerawat lumayan memudar. Bakal repurchase lagi di TikTok shop!',
                    ],
                    [
                        'platform' => 'shopee',
                        'name' => 'f***n',
                        'location' => 'Shopee Verified',
                        'product' => 'Deodorant Spray',
                        'initials' => 'F',
                        'bg' => 'from-emerald-500 to-teal-600',
                        'comment' => 'Bagus bgt deo spray ryoki ini, ketiak jd ga bau seharian walau keringatan dan pelan2 warna ketiak jd lebih cerah alami. Bakal langganan terus.',
                    ],
                    [
                        'platform' => 'tiktok',
                        'name' => 'putri_skincare',
                        'location' => 'TikTok Shop Verified',
                        'product' => 'Hand Body Lotion',
                        'initials' => 'P',
                        'bg' => 'from-slate-950 to-indigo-950',
                        'comment' => 'Hand body lotion ryoki ini beneran melembabkan & wangi mewah banget! Langsung checkout 2 botol pas promo TikTok Shop.',
                    ],
                ];
            @endphp

            <!-- Infinite Scroll Track -->
            <div class="marquee-track flex gap-6 w-max animate-marquee group-hover:[animation-play-state:paused]">
                {{-- Loop twice for seamless infinite marquee loop --}}
                @foreach(array_merge($marketplaceReviews, $marketplaceReviews) as $review)
                    <div class="w-[310px] sm:w-[360px] shrink-0 bg-white p-6 rounded-3xl border border-slate-200/90 shadow-sm hover:border-sky-300 hover:shadow-md transition-all flex flex-col justify-between space-y-4">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-1 text-amber-400 text-xs">
                                    ★ ★ ★ ★ ★
                                    <span class="text-slate-800 font-bold text-xs ml-1">5.0</span>
                                </div>
                                @if($review['platform'] === 'shopee')
                                    <span class="text-[10px] font-bold text-[#EE4D2D] bg-orange-50 px-2.5 py-1 rounded-full border border-orange-100 flex items-center gap-1">
                                        <svg class="w-3 h-3 fill-current text-[#EE4D2D]" viewBox="0 0 24 24"><path d="M19.77 7.06h-3.41V5.44C16.36 2.44 13.92 0 10.92 0S5.48 2.44 5.48 5.44v1.62H1.71L.12 21.61C-.07 22.9 1 24 2.29 24h16.89c1.29 0 2.36-1.1 2.17-2.39l-1.58-14.55zM7.48 5.44c0-1.9 1.54-3.44 3.44-3.44s3.44 1.54 3.44 3.44v1.62H7.48V5.44zm11.75 16.56H2.25L3.6 8.56h1.88v2.09c0 .55.45 1 1 1s1-.45 1-1V8.56h6.88v2.09c0 .55.45 1 1 1s1-.45 1-1V8.56h1.88l1.35 13.44z"/></svg>
                                        Shopee Buyer
                                    </span>
                                @else
                                    <span class="text-[10px] font-bold text-white bg-slate-900 px-2.5 py-1 rounded-full border border-slate-800 flex items-center gap-1">
                                        <svg class="w-3 h-3 fill-current text-white" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/></svg>
                                        TikTok Buyer
                                    </span>
                                @endif
                            </div>
                            <p class="text-xs text-slate-600 leading-relaxed font-light italic">
                                "{{ $review['comment'] }}"
                            </p>
                        </div>

                        <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-gradient-to-tr {{ $review['bg'] }} text-white font-bold text-xs flex items-center justify-center font-heading shadow-xs">
                                    {{ $review['initials'] }}
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-slate-900">{{ $review['name'] }}</p>
                                    <p class="text-[10px] text-slate-400 font-medium">{{ $review['location'] }}</p>
                                </div>
                            </div>
                            <span class="text-[10px] font-semibold text-[#0284C7] bg-sky-50 px-2 py-0.5 rounded-md">
                                {{ $review['product'] }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CSS Keyframe Animation for Marquee -->
    @push('head')
    <style>
        @keyframes marquee {
            0% {
                transform: translateX(0%);
            }
            100% {
                transform: translateX(-50%);
            }
        }
        .animate-marquee {
            animation: marquee 35s linear infinite;
        }
        .animate-marquee:hover {
            animation-play-state: paused;
        }
    </style>
    @endpush

</div>
@endsection

