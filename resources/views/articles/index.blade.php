@extends('layouts.public')

@section('title', 'Skinpedia by Ryoki — Edukasi & Tips Perawatan Kulit')
@section('meta_description', 'Kumpulan artikel dan panduan skincare Ryoki tentang kesehatan skin barrier, bahan aktif, dan rutinitas kecantikan harian.')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-10">

    <!-- Header Section -->
    <div class="bg-gradient-to-r from-sky-50 to-blue-50 border border-sky-100 rounded-3xl p-8 md:p-12 text-center space-y-3">
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold font-heading text-slate-900">
            Ryoki Skinpedia
        </h1>
        <p class="text-slate-600 font-light text-sm md:text-base max-w-2xl mx-auto leading-relaxed">
            Panduan terlengkap dari pakar kecantikan untuk memahami kebutuhan kulit Anda, mengenal kandungan aktif, dan memilih rutinitas terbaik.
        </p>
    </div>

    <!-- Article List Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @forelse($articles as $article)
        <article class="skincare-card p-5 flex flex-col justify-between group">
            <div>
                <a href="{{ route('articles.show', $article->slug) }}" class="block aspect-video rounded-xl overflow-hidden bg-slate-100 mb-4 border border-slate-100 relative">
                    <img src="{{ $article->thumbnail_url }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </a>

                <h2 class="text-lg font-bold text-slate-900 group-hover:text-[#0284C7] transition-colors mb-2 line-clamp-2 leading-snug">
                    <a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
                </h2>

                <p class="text-xs text-slate-500 line-clamp-3 font-light leading-relaxed mb-4">
                    {{ Str::limit(strip_tags($article->content), 120) }}
                </p>
            </div>

            <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                <span class="text-xs font-semibold text-sky-600">Oleh Tim Ryoki Skincare</span>
                <a href="{{ route('articles.show', $article->slug) }}" class="text-xs font-bold text-[#0284C7] hover:underline flex items-center gap-1">
                    Baca Artikel <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
        </article>
        @empty
        <div class="col-span-full py-16 text-center bg-white rounded-2xl border border-dashed border-slate-300">
            <p class="text-slate-700 font-semibold text-sm">Belum ada artikel Skinpedia</p>
            <p class="text-slate-400 text-xs mt-1">Nantikan panduan kecantikan terbaru dari tim pakar Ryoki.</p>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="pt-6 flex justify-center">
        {{ $articles->links() }}
    </div>

</div>
@endsection
