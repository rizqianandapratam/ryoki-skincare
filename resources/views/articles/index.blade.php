@extends('layouts.public')

@section('title', 'Ryoki Skincare - Artikel & Tips')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <!-- Header Bento Box -->
        <div class="bento-card flex flex-col items-center justify-center text-center mb-10 py-12 relative overflow-hidden group">
            <div class="absolute inset-0 bg-[#CCFF00] opacity-5 filter blur-[100px] rounded-full transform group-hover:scale-110 transition-transform duration-1000"></div>
            <div class="inline-flex items-center px-3 py-1 rounded-full border border-white/10 bg-white/5 text-neon font-mono text-xs font-semibold uppercase tracking-wider mb-6 relative z-10">
                <span class="w-2 h-2 rounded-full bg-[#CCFF00] mr-2 animate-pulse"></span>
                DATA_LOGS
            </div>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 relative z-10">Ryoki Journal</h1>
            <p class="text-lg text-muted max-w-2xl mx-auto relative z-10 font-light">Arsip data, panduan teknis, dan informasi terbaru seputar kalibrasi kulit.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @forelse($articles as $article)
            <article class="bento-card flex flex-col h-full group p-5">
                <a href="{{ route('articles.show', $article->slug) }}" class="block overflow-hidden relative aspect-video rounded-lg bg-[#020617] border border-white/5 mb-6">
                    @if($article->thumbnail)
                        <img src="{{ Storage::url($article->thumbnail) }}" alt="{{ $article->title }}" class="w-full h-full object-cover mix-blend-luminosity group-hover:mix-blend-normal transform group-hover:scale-105 transition duration-700">
                    @else
                        <img src="https://placehold.co/800x450/1E293B/94A3B8?text=Ryoki+Journal" alt="{{ $article->title }}" class="w-full h-full object-cover mix-blend-luminosity group-hover:mix-blend-normal transform group-hover:scale-105 transition duration-700">
                    @endif
                    <div class="absolute inset-0 ring-1 ring-inset ring-white/10 rounded-lg pointer-events-none"></div>
                </a>
                
                <div class="flex flex-col flex-grow">
                    <div class="flex items-center text-xs text-muted mb-4">
                        <svg class="w-3.5 h-3.5 mr-1.5 text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span>Published: {{ $article->created_at->translatedFormat('d F Y') }}</span>
                    </div>
                    
                    <h2 class="text-xl font-bold text-white mb-3 leading-tight line-clamp-2 group-hover:text-neon transition-colors">
                        <a href="{{ route('articles.show', $article->slug) }}">{{ $article->title }}</a>
                    </h2>
                    
                    <p class="text-sm text-muted mb-6 line-clamp-3 flex-grow font-light">
                        {{ Str::limit(strip_tags($article->content), 120) }}
                    </p>
                    
                    <a href="{{ route('articles.show', $article->slug) }}" class="mt-auto inline-flex items-center text-xs font-semibold text-white hover:text-neon transition-colors group/link w-max uppercase tracking-wider">
                        <span class="border-b border-white/20 group-hover/link:border-neon pb-0.5">READ ARTICLE</span> 
                        <svg class="w-4 h-4 ml-1.5 transform group-hover/link:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
            </article>
            @empty
            <div class="col-span-full bento-card p-12 text-center flex flex-col items-center justify-center border-dashed border-white/20">
                <svg class="w-12 h-12 text-muted mb-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H14"></path></svg>
                <p class="text-neon font-mono text-sm">[ERROR: ARCHIVE_EMPTY]</p>
                <p class="text-muted mt-2">Belum ada log data yang diarsip.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
            {{ $articles->links() }}
        </div>
    </div>
@endsection
