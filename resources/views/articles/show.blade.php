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
            {!! nl2br(e($article->content)) !!}
        </div>

        <!-- Author / Footer Box -->
        <div class="bg-sky-50 border border-sky-100 rounded-2xl p-6 flex flex-col sm:flex-row items-center justify-between gap-4">
            <div class="space-y-1 text-center sm:text-left">
                <h4 class="font-bold text-slate-900 text-sm">Ingin Mencoba Produk Ryoki?</h4>
                <p class="text-xs text-slate-500 font-light">Temukan rangkaian skincare resmi BPOM di Toko Resmi TikTok Shop.</p>
            </div>
            <a href="https://www.tiktok.com/@ryokijapanskin" target="_blank" class="btn-ryoki btn-ryoki-primary text-xs shrink-0">
                Kunjungi TikTok Shop
            </a>
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
