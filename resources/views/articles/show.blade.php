@extends('layouts.public')

@section('title', 'Ryoki Skincare - ' . $article->title)

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <!-- System Path -->
        <div class="bento-card py-4 px-6 mb-8 flex items-center text-xs font-mono text-muted overflow-x-auto whitespace-nowrap scrollbar-hide">
            <span class="text-neon mr-2">C:\SYS></span>
            <a href="{{ route('home') }}" class="hover:text-neon transition">ROOT</a>
            <span class="mx-2 opacity-50">/</span>
            <a href="{{ route('articles.index') }}" class="hover:text-neon transition">DATA_LOGS</a>
            <span class="mx-2 opacity-50">/</span>
            <span class="text-white">{{ strtoupper(Str::limit($article->title, 20)) }}</span>
        </div>

        <article class="bento-card p-6 md:p-10 mb-12 relative overflow-hidden">
            <!-- Header -->
            <header class="mb-10 relative z-10">
                <div class="flex items-center text-[10px] font-mono text-muted mb-6 border border-white/10 bg-white/5 inline-flex px-3 py-1.5 rounded uppercase">
                    <span class="w-2 h-2 rounded-full bg-[#CCFF00] mr-2 animate-pulse"></span>
                    LOG_CREATED: {{ $article->created_at->translatedFormat('d F Y') }}
                </div>
                
                <h1 class="text-3xl md:text-5xl font-bold text-white mb-6 leading-tight">{{ $article->title }}</h1>
                
                <div class="flex items-center text-muted font-mono text-xs border-t border-white/10 pt-6">
                    <span class="text-neon mr-2">AUTHOR:</span>
                    <span class="text-white">RYOKI_SYSTEMS</span>
                </div>
            </header>

            <!-- Image -->
            <div class="aspect-video w-full rounded-xl overflow-hidden mb-12 bg-[#020617] border border-white/10 relative z-10 group">
                <div class="absolute inset-0 bg-[#CCFF00] opacity-10 filter blur-[100px] transform group-hover:scale-110 transition-transform duration-1000"></div>
                @if($article->thumbnail)
                    <img src="{{ Storage::url($article->thumbnail) }}" alt="{{ $article->title }}" class="w-full h-full object-cover mix-blend-luminosity hover:mix-blend-normal transition duration-700 relative z-10">
                @else
                    <img src="https://placehold.co/1200x675/020617/CCFF00?text=DATA+LOG+IMG" alt="{{ $article->title }}" class="w-full h-full object-cover mix-blend-luminosity hover:mix-blend-normal transition duration-700 relative z-10">
                @endif
                <div class="absolute inset-0 ring-1 ring-inset ring-white/10 z-20 rounded-xl pointer-events-none"></div>
            </div>

            <!-- Content -->
            <div class="prose prose-invert prose-lg max-w-none text-muted leading-relaxed font-light relative z-10 
                prose-headings:text-white prose-headings:font-bold prose-headings:font-sans
                prose-a:text-neon prose-a:no-underline hover:prose-a:underline
                prose-strong:text-white prose-strong:font-bold
                prose-code:text-neon prose-code:bg-white/5 prose-code:px-1 prose-code:py-0.5 prose-code:rounded
                prose-blockquote:border-l-neon prose-blockquote:bg-white/5 prose-blockquote:py-1 prose-blockquote:px-4 prose-blockquote:text-white prose-blockquote:not-italic prose-blockquote:rounded-r">
                {!! nl2br(e($article->content)) !!}
            </div>
            
            <!-- Share Section -->
            <div class="mt-16 pt-8 border-t border-white/10 relative z-10">
                <h3 class="text-sm font-mono text-white mb-4 uppercase">[SYS.SHARE] Distribusikan Log</h3>
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 rounded-lg bg-white/5 border border-white/10 text-muted flex items-center justify-center hover:bg-[#CCFF00]/10 hover:border-[#CCFF00]/50 hover:text-neon transition-colors group">
                        <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" /></svg>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-lg bg-white/5 border border-white/10 text-muted flex items-center justify-center hover:bg-[#CCFF00]/10 hover:border-[#CCFF00]/50 hover:text-neon transition-colors group">
                        <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" /></svg>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-lg bg-white/5 border border-white/10 text-muted flex items-center justify-center hover:bg-[#CCFF00]/10 hover:border-[#CCFF00]/50 hover:text-neon transition-colors group">
                        <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                    </a>
                </div>
            </div>
        </article>
    </div>
@endsection
