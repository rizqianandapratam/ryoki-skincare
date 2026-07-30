@extends('layouts.public')

@section('title', 'Ryoki Skinpedia — ' . $article->title)
@section('meta_description', Str::limit(strip_tags($article->content), 155))

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">

    <!-- Breadcrumb -->
    <nav class="flex items-center gap-2 text-xs text-slate-400 font-medium">
        <a href="{{ route('home') }}" class="hover:text-[#0284C7]">Beranda</a>
        <span>/</span>
        <a href="{{ route('articles.index') }}" class="hover:text-[#0284C7]">Skinpedia</a>
        <span>/</span>
        <span class="text-slate-800 font-semibold line-clamp-1">{{ $article->title }}</span>
    </nav>

    <!-- Article Content Wrapper -->
    <article class="bg-white p-6 md:p-12 rounded-3xl border border-slate-200 shadow-sm space-y-8">

        <!-- Header -->
        <div class="space-y-3 text-center max-w-2xl mx-auto">
            <p class="text-xs font-semibold uppercase tracking-widest text-[#0284C7]">Ryoki Skinpedia</p>
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold font-heading text-slate-900 leading-tight">
                {{ $article->title }}
            </h1>
            <p class="text-xs text-slate-400 font-medium pt-1">
                Ditulis oleh <strong class="text-slate-700">Tim Ryoki Skincare</strong>
            </p>
        </div>

        <!-- Featured Image -->
        <div class="aspect-video w-full rounded-2xl overflow-hidden bg-slate-100 border border-slate-100">
            @if($article->thumbnail)
                <img src="{{ Storage::url($article->thumbnail) }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
            @else
                <img src="{{ asset('images/hero-banner.png') }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
            @endif
        </div>

        <!-- Body Content -->
        <div class="prose prose-slate prose-lg max-w-none font-light leading-relaxed text-slate-700">
            {!! $article->content !!}
        </div>

        <!-- Author / Footer Box (Dual Marketplace Access) -->
        <div class="bg-gradient-to-r from-sky-50 via-white to-orange-50/40 border border-sky-100/80 rounded-2xl p-6 flex flex-col sm:flex-row items-center justify-between gap-4 shadow-sm">
            <div class="space-y-1 text-center sm:text-left">
                <h4 class="font-bold text-slate-900 text-sm">Ingin Mencoba Produk Ryoki Skincare?</h4>
                <p class="text-xs text-slate-500 font-light">Temukan rangkaian skincare 100% original BPOM di Toko Resmi TikTok Shop &amp; Shopee Official.</p>
            </div>
            <div class="flex items-center gap-2 shrink-0">
                <a href="https://www.tiktok.com/@ryokijapanskin" target="_blank" rel="noopener noreferrer" class="py-2.5 px-3.5 text-xs font-bold bg-slate-900 hover:bg-slate-800 text-white rounded-xl flex items-center gap-1.5 shadow-sm transition-all hover:scale-105">
                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/></svg>
                    TikTok Shop
                </a>
                <a href="{{ config('services.shopee.official_url', 'https://shopee.co.id/ryokiofficialstore') }}" target="_blank" rel="noopener noreferrer" onclick="trackShopeeClick('Article Detail', null, 'Skinpedia Footer Card')" class="py-2.5 px-3.5 text-xs font-bold bg-[#EE4D2D] hover:bg-[#d63f21] text-white rounded-xl flex items-center gap-1.5 shadow-sm transition-all hover:scale-105">
                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M19.77 7.06h-3.41V5.44C16.36 2.44 13.92 0 10.92 0S5.48 2.44 5.48 5.44v1.62H1.71L.12 21.61C-.07 22.9 1 24 2.29 24h16.89c1.29 0 2.36-1.1 2.17-2.39l-1.58-14.55zM7.48 5.44c0-1.9 1.54-3.44 3.44-3.44s3.44 1.54 3.44 3.44v1.62H7.48V5.44zm11.75 16.56H2.25L3.6 8.56h1.88v2.09c0 .55.45 1 1 1s1-.45 1-1V8.56h6.88v2.09c0 .55.45 1 1 1s1-.45 1-1V8.56h1.88l1.35 13.44z"/></svg>
                    Shopee Official
                </a>
            </div>
        </div>

    </article>

    <!-- Back Button -->
    <div class="text-center pt-4">
        <a href="{{ route('articles.index') }}" class="btn-ryoki btn-ryoki-secondary text-xs">
            ← Kembali ke Daftar Skinpedia
        </a>
    </div>

</div>
@endsection
