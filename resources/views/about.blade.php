@extends('layouts.public')

@section('title', 'Tentang Ryoki Skincare — PT Golden Intan Berlian | Skincare Jepang BPOM RI')
@section('meta_description', 'Kenali Ryoki Skincare oleh PT Golden Intan Berlian — brand skincare Indonesia dengan formulasi standar Jepang bersertifikasi BPOM RI. Filosofi kecantikan alami, bahan aktif premium, dan komitmen keamanan kulit.')
@section('meta_keywords', 'tentang ryoki skincare, pt golden intan berlian, skincare jepang indonesia, skincare bpom ri, filosofi skincare ryoki, brand skincare lokal berkualitas, skincare aman bpom')

@push('head')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "BreadcrumbList",
  "itemListElement": [{
    "@@type": "ListItem",
    "position": 1,
    "name": "Beranda",
    "item": "{{ route('home') }}"
  },{
    "@@type": "ListItem",
    "position": 2,
    "name": "Tentang Kami",
    "item": "{{ route('about') }}"
  }]
}
</script>
@endpush

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-20">

    <!-- ═══════════════════════════════════════════════════════════
         1. HERO HEADER SECTION
         ═══════════════════════════════════════════════════════════ -->
    <div class="relative rounded-3xl bg-gradient-to-r from-sky-50/80 via-blue-50/40 to-slate-50 border border-sky-100/80 p-8 sm:p-12 md:p-16 text-center overflow-hidden shadow-xs space-y-5">
        <!-- Subtle Decorative Background Circles -->
        <div class="absolute -top-24 -left-24 w-72 h-72 rounded-full bg-sky-200/30 blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-24 -right-24 w-80 h-80 rounded-full bg-blue-200/30 blur-3xl pointer-events-none"></div>

        <div class="relative z-10 space-y-4 max-w-3xl mx-auto">
            <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/90 border border-sky-200 text-[#0284C7] text-xs font-semibold tracking-wider uppercase shadow-xs">
                ✨ Japanese Beauty Philosophy
            </span>

            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold font-playfair text-slate-900 leading-tight">
                Seni Merawat Kulit Sehat & Glowing Alami
            </h1>

            <p class="text-slate-600 font-light text-base md:text-lg leading-relaxed max-w-2xl mx-auto">
                Ryoki Skincare memadukan keahlian formulasi Jepang dengan bahan botanikal murni untuk memperkuat <strong class="text-slate-800 font-medium">skin barrier</strong> Anda setiap hari.
            </p>
        </div>

        <!-- Stat Highlights Bar -->
        <div class="relative z-10 pt-6 grid grid-cols-2 md:grid-cols-4 gap-4 max-w-4xl mx-auto text-left">
            <div class="bg-white/80 backdrop-blur-md p-4 rounded-2xl border border-slate-200/70 space-y-1 shadow-xs">
                <div class="text-2xl font-bold font-heading text-[#0284C7]">100%</div>
                <div class="text-xs font-semibold text-slate-700">BPOM RI Certified</div>
                <div class="text-[11px] text-slate-400 font-light">Resmi & Terverifikasi</div>
            </div>
            <div class="bg-white/80 backdrop-blur-md p-4 rounded-2xl border border-slate-200/70 space-y-1 shadow-xs">
                <div class="text-2xl font-bold font-heading text-[#0284C7]">Cruelty-Free</div>
                <div class="text-xs font-semibold text-slate-700">Bebas Pengujian Hewan</div>
                <div class="text-[11px] text-slate-400 font-light">Etika Formulatif</div>
            </div>
            <div class="bg-white/80 backdrop-blur-md p-4 rounded-2xl border border-slate-200/70 space-y-1 shadow-xs">
                <div class="text-2xl font-bold font-heading text-[#0284C7]">Natural</div>
                <div class="text-xs font-semibold text-slate-700">Bahan Botanikal Pilihan</div>
                <div class="text-[11px] text-slate-400 font-light">Tanpa Zat Berbahaya</div>
            </div>
            <div class="bg-white/80 backdrop-blur-md p-4 rounded-2xl border border-slate-200/70 space-y-1 shadow-xs">
                <div class="text-2xl font-bold font-heading text-[#0284C7]">Dermatology</div>
                <div class="text-xs font-semibold text-slate-700">Teruji Secara Klinis</div>
                <div class="text-[11px] text-slate-400 font-light">Aman Kulit Sensitif</div>
            </div>
        </div>
    </div>

    <!-- ═══════════════════════════════════════════════════════════
         2. BRAND STORY & PHILOSOPHY (RESPONSIVE MOBILE & DESKTOP SHOWCASE)
         ═══════════════════════════════════════════════════════════ -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">

        <!-- Text Column -->
        <div class="lg:col-span-6 space-y-5 sm:space-y-6">
            <div class="space-y-2">
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-sky-50 text-[#0284C7] text-xs font-bold uppercase tracking-wider border border-sky-100">
                    🌿 Filosofi &amp; Komitmen Ryoki
                </span>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold font-playfair text-slate-900 leading-tight">
                    Lahir Dari Kepedulian Terhadap Kesehatan Skin Barrier
                </h2>
            </div>

            <div class="space-y-3.5 sm:space-y-4 text-slate-600 font-light text-sm sm:text-base leading-relaxed">
                <p class="bg-white/80 sm:bg-transparent p-4 sm:p-0 rounded-2xl border border-slate-100 sm:border-0 shadow-2xs sm:shadow-none">
                    Ryoki Skincare dipasarkan secara resmi bekerja sama dengan <strong class="text-slate-800 font-semibold">PT Golden Intan Berlian</strong> sebagai mitra pemasaran resmi di Bandar Lampung. Perjalanan kami dimulai dari keprihatinan mendalam terhadap maraknya produk perawatan kulit di pasar yang menawarkan hasil putih instan, namun berisiko mengikis kelembaban alami dan merusak lapisan pertahanan (*skin barrier*) dalam jangka panjang.
                </p>

                <p class="bg-gradient-to-r from-sky-50/80 via-blue-50/40 to-sky-50/60 p-4 sm:p-5 rounded-2xl border border-sky-100/90 italic text-slate-700 text-xs sm:text-sm shadow-2xs leading-relaxed">
                    "Kami percaya pada prinsip filosofi perawatan kulit Jepang: <strong class="not-italic font-semibold text-slate-900">Kulit cantik adalah hasil langsung dari kulit yang sehat dan terhidrasi dengan seimbang.</strong>"
                </p>

                <p>
                    Oleh sebab itu, setiap tetes produk Ryoki diracik secara teliti menggunakan kombinasi nutrisi botanikal terbaik seperti <strong class="text-slate-800 font-medium">Niacinamide murni, Alpha Arbutin, Collagen, Centella Asiatica</strong>, dan <strong class="text-slate-800 font-medium">5 jenis Ceramide</strong> untuk menutrisi kulit hingga ke lapisan terdalam.
                </p>
            </div>

            <div class="pt-2 flex flex-col sm:flex-row gap-3 sm:gap-4 items-stretch sm:items-center">
                <a href="{{ route('products.index') }}" class="btn-ryoki btn-ryoki-primary text-xs px-6 py-3.5 shadow-md justify-center">
                    Lihat Koleksi Skincare
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                </a>
                <span class="text-[11px] sm:text-xs text-slate-400 font-medium text-center sm:text-left">Toko Resmi: TikTok Shop &amp; Shopee Official</span>
            </div>
        </div>

        <!-- Photo Showcase Composition (Optimized for Mobile & Desktop) -->
        <div class="lg:col-span-6 relative pt-4 sm:pt-0">
            <div class="relative max-w-sm sm:max-w-md mx-auto">

                <!-- Main Image Card Container -->
                <div class="rounded-3xl overflow-hidden shadow-lg border border-slate-100 aspect-[4/3] bg-gradient-to-br from-white via-sky-50/30 to-blue-50/20 p-3 sm:p-4 flex items-center justify-center relative">
                    <img src="{{ asset('images/facial-wash.png') }}" alt="Filosofi Ryoki Skincare Facial Wash" class="w-full h-full object-contain mix-blend-multiply drop-shadow-sm" loading="lazy">

                    <!-- Mobile-friendly Rating Tag on Image -->
                    <div class="absolute top-3 left-3 bg-white/95 backdrop-blur-md px-2.5 py-1 rounded-full border border-amber-200/80 shadow-2xs flex items-center gap-1 text-[10px] font-bold text-slate-800">
                        <span class="text-amber-400">★ 4.9</span>
                        <span class="text-slate-400 font-normal">/ 5.0</span>
                    </div>
                </div>

                <!-- Secondary Floating Image Card (Visible on Mobile & Desktop) -->
                <div class="absolute -bottom-6 -left-2 sm:-left-6 w-32 sm:w-48 rounded-2xl overflow-hidden shadow-xl border-3 sm:border-4 border-white aspect-square bg-white p-1.5 sm:p-2.5 flex items-center justify-center">
                    <img src="{{ asset('images/Hand-Body.png') }}" alt="Ryoki Hand & Body Serum" class="w-full h-full object-contain mix-blend-multiply" loading="lazy">
                </div>

                <!-- Floating Social Proof Badge (Visible on Mobile & Desktop) -->
                <div class="absolute -top-4 -right-2 sm:-top-6 sm:-right-6 bg-white/95 backdrop-blur-md p-3 sm:p-4 rounded-2xl shadow-lg border border-sky-100 max-w-[150px] sm:max-w-[200px] space-y-1">
                    <div class="flex items-center gap-1 text-amber-400 text-[10px] sm:text-xs font-bold">
                        ★ ★ ★ ★ ★
                    </div>
                    <p class="text-[10px] sm:text-xs font-bold text-slate-800 leading-tight">100% BPOM RI</p>
                    <p class="text-[9px] sm:text-[10px] text-slate-400 leading-tight">Formula Aman &amp; Teruji Klinis</p>
                </div>

            </div>
        </div>

    </div>

    <!-- ═══════════════════════════════════════════════════════════
         3. KEUNGGULAN BAHAN & PILAR KEAMANAN (4 CARDS GRID)
         ═══════════════════════════════════════════════════════════ -->
    <section class="space-y-8">
        <div class="text-center space-y-2 max-w-xl mx-auto">
            <span class="text-xs font-bold text-[#0284C7] uppercase tracking-widest">Standar Kualitas</span>
            <h2 class="text-3xl font-bold font-playfair text-slate-900">4 Pilar Utama Formulasi Ryoki</h2>
            <p class="text-slate-500 font-light text-xs sm:text-sm">
                Komitmen penuh kami terhadap keamanan dan keefektifan setiap produk.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Pillar 1: Cruelty-Free -->
            <div class="bg-white p-7 rounded-3xl border border-slate-200/90 shadow-xs space-y-4 hover:border-sky-300 transition-colors group">
                <div class="w-12 h-12 rounded-2xl bg-sky-50 text-[#0284C7] flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                    🐰
                </div>
                <div class="space-y-1.5">
                    <h3 class="text-lg font-bold font-heading text-slate-900">Cruelty-Free</h3>
                    <p class="text-xs text-slate-500 font-light leading-relaxed">
                        Seluruh proses pengembangan produk tidak pernah diujicobakan pada hewan (no animal testing).
                    </p>
                </div>
            </div>

            <!-- Pillar 2: BPOM Approved -->
            <div class="bg-white p-7 rounded-3xl border border-slate-200/90 shadow-xs space-y-4 hover:border-sky-300 transition-colors group">
                <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                    🛡️
                </div>
                <div class="space-y-1.5">
                    <h3 class="text-lg font-bold font-heading text-slate-900">BPOM Approved</h3>
                    <p class="text-xs text-slate-500 font-light leading-relaxed">
                        Seluruh formula terdaftar secara legal di Badan Pengawas Obat dan Makanan (BPOM RI) sehingga dijamin aman digunakan.
                    </p>
                </div>
            </div>

            <!-- Pillar 3: Natural & Botanical -->
            <div class="bg-white p-7 rounded-3xl border border-slate-200/90 shadow-xs space-y-4 hover:border-sky-300 transition-colors group">
                <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-600 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                    🌿
                </div>
                <div class="space-y-1.5">
                    <h3 class="text-lg font-bold font-heading text-slate-900">Natural Ingredients</h3>
                    <p class="text-xs text-slate-500 font-light leading-relaxed">
                        Mengutamakan ekstrak herbal botanikal alami pilihan tanpa campuran bahan berbahaya seperti merkuri atau hidrokuinon.
                    </p>
                </div>
            </div>

            <!-- Pillar 4: Dermatology Tested -->
            <div class="bg-white p-7 rounded-3xl border border-slate-200/90 shadow-xs space-y-4 hover:border-sky-300 transition-colors group">
                <div class="w-12 h-12 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                    🧪
                </div>
                <div class="space-y-1.5">
                    <h3 class="text-lg font-bold font-heading text-slate-900">Dermatology Tested</h3>
                    <p class="text-xs text-slate-500 font-light leading-relaxed">
                        Telah melalui pengujian dermatologis intensif untuk memastikan kompatibilitas tinggi pada kulit sensitif sekalipun.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ═══════════════════════════════════════════════════════════
         4. VISI & MISI BRAND (DUAL CARDS)
         ═══════════════════════════════════════════════════════════ -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Visi -->
        <div class="bg-gradient-to-br from-white to-sky-50/50 p-8 sm:p-10 rounded-3xl border border-slate-200 shadow-sm space-y-4">
            <div class="flex items-center gap-3">
                <span class="w-10 h-10 rounded-xl bg-[#0284C7] text-white flex items-center justify-center text-lg font-bold">👁️</span>
                <h3 class="text-2xl font-bold font-playfair text-slate-900">Visi Brand</h3>
            </div>
            <p class="text-slate-600 font-light text-sm sm:text-base leading-relaxed">
                Menjadi pelopor dan standar utama dalam kategori Active-Lifestyle Skincare di Asia Tenggara, yang mengubah persepsi perawatan kulit dari sebuah rutinitas yang rumit menjadi essential gear yang praktis, tangguh, dan performa tinggi.
            </p>
        </div>

        <!-- Misi -->
        <div class="bg-gradient-to-br from-white to-blue-50/50 p-8 sm:p-10 rounded-3xl border border-slate-200 shadow-sm space-y-4">
            <div class="flex items-center gap-3">
                <span class="w-10 h-10 rounded-xl bg-[#0284C7] text-white flex items-center justify-center text-lg font-bold">🎯</span>
                <h3 class="text-2xl font-bold font-playfair text-slate-900">Misi Brand</h3>
            </div>
            <ul class="space-y-3 text-xs sm:text-sm text-slate-600 font-light">
                <li class="flex items-start gap-3">
                    <span class="w-2 h-2 rounded-full bg-[#0284C7] mt-1.5 shrink-0"></span>
                    <span><strong>Mengeliminasi Inefisiensi:</strong> Memangkas tahapan skincare yang rumit menjadi formulasi praktis (Simple Steps) tanpa mengurangi efektivitas hasil (Maximum Glow).</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="w-2 h-2 rounded-full bg-[#0284C7] mt-1.5 shrink-0"></span>
                    <span><strong>Inovasi Formulasi Tahan Banting:</strong> Mengembangkan produk berstandar Jepang yang tahan keringat, ramah iklim tropis, dan melindungi kulit dari paparan ekstrem ruang terbuka.</span>
                </li>
                <li class="flex items-start gap-3">
                    <span class="w-2 h-2 rounded-full bg-[#0284C7] mt-1.5 shrink-0"></span>
                    <span><strong>Edukasi Gaya Hidup Aktif:</strong> Mengikis stigma bahwa merawat kulit itu merepotkan bagi orang yang aktif, sekaligus mengintegrasikan perlindungan kulit ke dalam perlengkapan wajib harian (Skin Gear).</span>
                </li>
            </ul>
        </div>
    </div>

    <!-- ═══════════════════════════════════════════════════════════
         5. COMPANY IDENTITY & OFFICIAL STORES CARD
         ═══════════════════════════════════════════════════════════ -->
    <div class="bg-gradient-to-r from-sky-100/80 via-blue-50 to-white rounded-3xl p-8 sm:p-12 border border-sky-200/70 shadow-sm space-y-6 text-center max-w-4xl mx-auto">
        <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-white text-[#0284C7] text-xs font-semibold shadow-xs border border-sky-100">
            🏢 Mitra Resmi Pemasaran
        </div>

        <div class="space-y-2">
            <h2 class="text-3xl font-bold font-playfair text-slate-900">PT Golden Intan Berlian</h2>
            <p class="text-xs sm:text-sm text-slate-500 font-light max-w-xl mx-auto">
                Jl. Griya Harapan No. 12, Way Halim Permai, Bandar Lampung, Lampung 35141, Indonesia.
            </p>
        </div>

        <div class="pt-2 flex justify-center items-center">
            <a href="{{ route('contact.index') }}" class="btn-ryoki btn-ryoki-primary text-xs sm:text-sm px-8 py-3.5 font-bold shadow-md">
                Hubungi Kami
            </a>
        </div>
    </div>

</div>
@endsection
