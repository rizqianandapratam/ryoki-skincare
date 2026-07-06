@extends('layouts.public')

@section('title', 'Ryoki Skincare - Pancarkan Kilau Alami Kulitmu')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8">

    {{-- ================================================================ --}}
    {{-- BAGIAN 1: HERO BANNER                                            --}}
    {{-- ================================================================ --}}
    <section id="hero" class="bento-card group flex flex-col md:flex-row items-center gap-10 py-14 px-8 md:px-12">

        {{-- Kiri: Teks Utama --}}
        <div class="flex-1 flex flex-col items-start gap-6">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full border border-[#CCFF00]/30 bg-[#CCFF00]/10">
                <span class="w-2 h-2 rounded-full bg-[#CCFF00] animate-pulse"></span>
                <span class="font-mono text-[#CCFF00] text-xs font-semibold uppercase tracking-widest">Ryoki Skincare</span>
            </div>

            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-[1.15] tracking-tight">
                Pancarkan Kilau<br>
                Alami Kulitmu<br>
                <span class="text-[#94A3B8] font-light">dengan Ryoki</span>
            </h1>

            <p class="text-base md:text-lg text-[#94A3B8] max-w-md font-light leading-relaxed">
                Perawatan kulit inovatif yang diformulasikan secara klinis untuk merawat, melindungi, dan memperkuat skin barrier Anda secara optimal.
            </p>

            <div class="flex flex-col sm:flex-row gap-3 w-full sm:w-auto">
                <a href="#products" class="btn-premium btn-premium-neon px-8 py-3 text-sm">
                    JELAJAHI PRODUK
                </a>
                <a href="{{ route('contact.index') }}" class="btn-premium btn-premium-outline px-8 py-3 text-sm">
                    HUBUNGI KAMI
                </a>
            </div>
        </div>

        {{-- Kanan: Placeholder Visual --}}
        <div class="flex-1 w-full relative aspect-square max-w-sm mx-auto md:max-w-none rounded-2xl overflow-hidden">
            {{-- Neon glow di belakang --}}
            <div class="absolute inset-0 bg-[#CCFF00] opacity-15 filter blur-3xl rounded-full transform group-hover:scale-110 transition-transform duration-1000"></div>

            {{-- Frame visual --}}
            <div class="relative z-10 w-full h-full rounded-2xl border border-white/10 bg-[#020617] flex flex-col items-center justify-center gap-4 overflow-hidden">
                {{-- Grid dekoratif --}}
                <div class="absolute inset-0" style="background-image: linear-gradient(rgba(204,255,0,.06) 1px, transparent 1px), linear-gradient(90deg, rgba(204,255,0,.06) 1px, transparent 1px); background-size: 36px 36px;"></div>

                {{-- Lingkaran neon tengah --}}
                <div class="relative z-10 flex flex-col items-center gap-3">
                    <div class="w-20 h-20 rounded-full border border-[#CCFF00]/20 bg-[#CCFF00]/5 flex items-center justify-center">
                        <div class="w-10 h-10 rounded-full border border-[#CCFF00]/40 bg-[#CCFF00]/10 flex items-center justify-center">
                            <div class="w-4 h-4 rounded-full bg-[#CCFF00] animate-pulse"></div>
                        </div>
                    </div>
                    <span class="font-mono text-[#94A3B8] text-xs tracking-widest">[ RYOKI_HERO_IMAGE ]</span>
                    <div class="w-20 h-px bg-gradient-to-r from-transparent via-[#CCFF00]/50 to-transparent"></div>
                    <span class="font-mono text-[#CCFF00] text-[10px] opacity-50">PT GOLDEN INTAN BERLIAN</span>
                </div>
            </div>
        </div>

    </section>

    {{-- ================================================================ --}}
    {{-- BAGIAN 2: BRAND STORY & VALUES                                   --}}
    {{-- ================================================================ --}}
    <section id="brand" class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- Kotak Kiri: Brand Story --}}
        <div class="bento-card flex flex-col justify-between gap-6 py-8 px-8">
            <div>
                <p class="font-mono text-[#CCFF00] text-xs uppercase tracking-widest mb-3">[ TENTANG KAMI ]</p>
                <h2 class="text-2xl md:text-3xl font-bold text-white mb-4 leading-snug">
                    Integritas Formula,<br>Kejernihan Kulit
                </h2>
                <p class="text-sm text-[#94A3B8] leading-relaxed font-light mb-3">
                    Ryoki Skincare lahir dari komitmen <strong class="text-white font-semibold">PT Golden Intan Berlian</strong> untuk menghadirkan produk perawatan kulit yang jujur, aman, dan efektif.
                </p>
                <p class="text-sm text-[#94A3B8] leading-relaxed font-light">
                    Setiap formula kami dirancang bersama para ahli dermatologi menggunakan bahan aktif bermutu tinggi — tanpa bahan berbahaya, tanpa uji coba pada hewan, dengan harga yang terjangkau tanpa mengorbankan kualitas.
                </p>
            </div>
            <a href="{{ route('about') }}" class="inline-flex items-center gap-2 text-xs font-mono text-[#CCFF00] hover:opacity-80 transition border-b border-[#CCFF00]/30 pb-1 w-max">
                Selengkapnya Tentang Kami
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

        {{-- Kotak Kanan: Keunggulan / Values --}}
        <div class="bento-card flex flex-col gap-5 py-8 px-8">
            <p class="font-mono text-[#94A3B8] text-xs uppercase tracking-widest">[ KEUNGGULAN PRODUK ]</p>
            <ul class="space-y-3 flex-1">
                <li class="flex items-start gap-4 p-4 rounded-xl bg-white/[0.03] border border-white/5 hover:border-[#CCFF00]/30 transition-colors">
                    <div class="w-8 h-8 rounded-lg bg-[#CCFF00]/10 border border-[#CCFF00]/20 flex items-center justify-center text-[#CCFF00] font-bold text-base flex-shrink-0">✓</div>
                    <div>
                        <p class="text-white text-sm font-semibold mb-0.5">BPOM Certified</p>
                        <p class="text-[#94A3B8] text-xs font-light">Terdaftar & mendapat persetujuan resmi dari BPOM RI.</p>
                    </div>
                </li>
                <li class="flex items-start gap-4 p-4 rounded-xl bg-white/[0.03] border border-white/5 hover:border-[#CCFF00]/30 transition-colors">
                    <div class="w-8 h-8 rounded-lg bg-[#CCFF00]/10 border border-[#CCFF00]/20 flex items-center justify-center text-[#CCFF00] font-bold text-base flex-shrink-0">✓</div>
                    <div>
                        <p class="text-white text-sm font-semibold mb-0.5">Cruelty-Free & Vegan</p>
                        <p class="text-[#94A3B8] text-xs font-light">Tidak ada hewan yang dirugikan dalam proses pengembangan produk kami.</p>
                    </div>
                </li>
                <li class="flex items-start gap-4 p-4 rounded-xl bg-white/[0.03] border border-white/5 hover:border-[#CCFF00]/30 transition-colors">
                    <div class="w-8 h-8 rounded-lg bg-[#CCFF00]/10 border border-[#CCFF00]/20 flex items-center justify-center text-[#CCFF00] font-bold text-base flex-shrink-0">✓</div>
                    <div>
                        <p class="text-white text-sm font-semibold mb-0.5">Dermatologist Tested</p>
                        <p class="text-[#94A3B8] text-xs font-light">Diuji oleh dokter spesialis kulit untuk keamanan pemakaian.</p>
                    </div>
                </li>
            </ul>
        </div>

    </section>

    {{-- ================================================================ --}}
    {{-- BAGIAN 3: FEATURED PRODUCTS CATALOG                              --}}
    {{-- ================================================================ --}}
    <section id="products" class="pt-2">

        {{-- Header Section --}}
        <div class="flex items-center justify-between mb-6">
            <div>
                <p class="font-mono text-[#CCFF00] text-xs uppercase tracking-widest mb-1">[ PRODUK UNGGULAN ]</p>
                <h2 class="text-2xl md:text-3xl font-bold text-white">Best Sellers</h2>
            </div>
            <a href="{{ route('products.index') }}" class="hidden md:inline-flex items-center gap-1.5 text-xs font-mono text-[#94A3B8] hover:text-[#CCFF00] transition-colors border-b border-dashed border-white/20 hover:border-[#CCFF00] pb-0.5">
                Lihat Semua Produk
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

        {{-- Grid Produk: 3 kolom --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($bestSellers->take(3) as $product)
            <div class="bento-card flex flex-col group h-full">

                {{-- Label Kategori & Harga --}}
                <div class="flex justify-between items-center mb-4">
                    <span class="font-mono text-[10px] text-[#94A3B8] border border-white/10 bg-white/5 px-2 py-1 rounded">[ CAT: {{ strtoupper($product->category) }} ]</span>
                    <span class="font-mono text-xs font-bold text-[#CCFF00]">IDR {{ number_format($product->price, 0, ',', '.') }}</span>
                </div>

                {{-- Gambar Produk --}}
                <a href="{{ route('products.show', $product->slug) }}" class="relative w-full aspect-[4/3] rounded-xl overflow-hidden mb-5 bg-[#020617] border border-white/5 block flex-shrink-0">
                    @if($product->image)
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover mix-blend-luminosity group-hover:mix-blend-normal transform group-hover:scale-105 transition duration-700">
                    @else
                        <img src="https://placehold.co/400x300/1E293B/94A3B8?text={{ urlencode($product->name) }}" alt="{{ $product->name }}" class="w-full h-full object-cover mix-blend-luminosity group-hover:mix-blend-normal transform group-hover:scale-105 transition duration-700">
                    @endif
                    @if($product->is_best_seller)
                    <div class="absolute top-3 left-3 bg-[#CCFF00] text-[#020617] text-[10px] font-bold px-2 py-1 rounded font-mono uppercase tracking-widest z-10">
                        BEST SELLER
                    </div>
                    @endif
                    @if(!$product->in_stock)
                    <div class="absolute inset-0 bg-[#020617]/80 flex items-center justify-center z-20 backdrop-blur-sm">
                        <span class="border border-red-500 text-red-500 font-mono text-xs font-bold py-1 px-3 rounded bg-red-500/10">HABIS TERJUAL</span>
                    </div>
                    @endif
                </a>

                {{-- Nama Produk --}}
                <h3 class="text-base font-bold text-white mb-1.5 line-clamp-1 group-hover:text-[#CCFF00] transition-colors">
                    <a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
                </h3>

                {{-- Deskripsi Singkat --}}
                <p class="text-xs text-[#94A3B8] line-clamp-2 mb-5 flex-grow font-light leading-relaxed">
                    {{ Str::limit($product->description ?? '', 90) }}
                </p>

                {{-- Tombol CTA --}}
                <a href="https://www.tiktok.com/@ryokiskincare" target="_blank" rel="noopener noreferrer"
                   class="btn-premium btn-premium-neon w-full text-xs font-mono py-3 rounded-xl text-center mt-auto">
                    TIKTOK SHOP ↗
                </a>

            </div>
            @empty
            <div class="col-span-3 bento-card py-16 text-center border border-dashed border-white/20">
                <p class="text-[#CCFF00] font-mono text-sm mb-2">[EMPTY: BELUM ADA PRODUK]</p>
                <p class="text-[#94A3B8] text-xs">Produk akan segera hadir.</p>
            </div>
            @endforelse
        </div>

        {{-- Lihat Semua (Mobile) --}}
        <div class="mt-6 text-center md:hidden">
            <a href="{{ route('products.index') }}" class="inline-flex items-center gap-1.5 text-xs font-mono text-[#94A3B8] hover:text-[#CCFF00] transition-colors border-b border-dashed border-white/20 hover:border-[#CCFF00] pb-0.5">
                Lihat Semua Produk
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

    </section>

</div>
@endsection
