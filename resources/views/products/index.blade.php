@extends('layouts.public')

@section('title', 'Ryoki Skincare - Produk')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Header Bento Box -->
        <div class="bento-card flex flex-col items-center justify-center text-center mb-8 py-12 relative overflow-hidden group">
            <div class="absolute inset-0 bg-[#CCFF00] opacity-5 filter blur-[100px] rounded-full transform group-hover:scale-110 transition-transform duration-1000"></div>
            <div class="inline-flex items-center px-3 py-1 rounded-full border border-white/10 bg-white/5 text-neon font-mono text-xs font-semibold uppercase tracking-wider mb-6 relative z-10">
                <span class="w-2 h-2 rounded-full bg-[#CCFF00] mr-2 animate-pulse"></span>
                MODULE: PRODUCTS
            </div>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 relative z-10">Katalog Sistem</h1>
            <p class="text-lg text-muted max-w-2xl mx-auto relative z-10 font-light">Eksplorasi modul skincare teknis Ryoki yang dioptimasi untuk kinerja maksimal.</p>
        </div>

        <div class="bento-card p-6 md:p-8 mb-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <!-- Filters -->
                <div class="flex space-x-3 overflow-x-auto w-full md:w-auto pb-2 md:pb-0 scrollbar-hide">
                    <a href="{{ route('products.index') }}" class="whitespace-nowrap px-4 py-2 rounded-lg text-xs font-mono font-medium {{ request('category') ? 'bg-white/5 text-muted hover:text-neon border border-white/10' : 'bg-[#CCFF00]/10 text-neon border border-[#CCFF00]/30' }} transition-colors">
                        ALL_MODULES
                    </a>
                    @foreach($categories as $category)
                    <a href="{{ route('products.index', ['category' => $category]) }}" class="whitespace-nowrap px-4 py-2 rounded-lg text-xs font-mono font-medium {{ request('category') == $category ? 'bg-[#CCFF00]/10 text-neon border border-[#CCFF00]/30' : 'bg-white/5 text-muted hover:text-neon border border-white/10' }} transition-colors">
                        {{ strtoupper($category) }}
                    </a>
                    @endforeach
                </div>
                
                <!-- Search -->
                <form action="{{ route('products.index') }}" method="GET" class="w-full md:w-auto relative group">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="QUERY..." class="w-full md:w-64 pl-10 pr-4 py-2 bg-[#020617] border border-white/10 rounded-lg text-white font-mono text-xs focus:border-neon focus:ring-1 focus:ring-neon transition-colors placeholder-gray-600 shadow-sm">
                    <svg class="w-4 h-4 text-muted group-hover:text-neon absolute left-3 top-2.5 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </form>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($products as $index => $product)
            <div class="bento-card flex flex-col group h-full" style="padding: 20px !important;">
                <div class="flex justify-between items-start mb-4">
                    <span class="font-mono text-[10px] text-muted border border-white/10 bg-white/5 px-2 py-1 rounded">[ CAT: {{ strtoupper($product->category) }} ]</span>
                    <span class="font-mono text-xs font-bold text-neon">IDR {{ number_format($product->price, 0, ',', '.') }}</span>
                </div>
                
                <a href="{{ route('products.show', $product->slug) }}" class="relative w-full rounded-lg overflow-hidden mb-4 bg-[#020617] border border-white/5 block" style="height: 200px; max-height: 220px;">
                    @if($product->image)
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="product-img mix-blend-luminosity group-hover:mix-blend-normal transform group-hover:scale-105 transition duration-700 ease-in-out" style="width:100%; height:100%; object-fit:cover;">
                    @else
                        <img src="https://placehold.co/400x220/020617/F8FAFC?text={{ urlencode($product->name) }}" alt="{{ $product->name }}" class="product-img mix-blend-luminosity group-hover:mix-blend-normal transform group-hover:scale-105 transition duration-700 ease-in-out" style="width:100%; height:100%; object-fit:cover;">
                    @endif
                    
                    @if($product->is_best_seller)
                    <div class="absolute top-3 left-3 bg-[#CCFF00] text-[#020617] text-[10px] font-bold px-2 py-1 rounded uppercase tracking-widest z-10 font-mono">
                        TOP_RATED
                    </div>
                    @endif
                    
                    @if(!$product->in_stock)
                    <div class="absolute inset-0 bg-[#020617]/80 flex items-center justify-center z-20 backdrop-blur-sm">
                        <span class="border border-red-500 text-red-500 font-mono text-xs font-bold py-1 px-3 rounded bg-red-500/10">ERR: OUT_OF_STOCK</span>
                    </div>
                    @endif
                </a>
                
                <h3 class="text-lg font-bold text-white mb-2 line-clamp-1 group-hover:text-neon transition-colors">
                    <a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
                </h3>
                
                <p class="text-xs text-muted line-clamp-3 mb-4 flex-grow font-light">
                    {{ Str::limit($product->description ?? 'Modul skincare ini dirancang untuk optimalisasi tekstur wajah.', 80) }}
                </p>
                
                <a href="https://tiktok.com/@ryokiskincare" target="_blank" class="btn-premium btn-premium-neon w-full text-xs font-mono py-2 rounded-lg text-center mt-auto">
                    TIKTOK SHOP ↗
                </a>
            </div>
            @empty
            <div class="col-span-full bento-card p-12 text-center flex flex-col items-center justify-center border-dashed border-white/20">
                <svg class="w-12 h-12 text-muted mb-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <p class="text-neon font-mono text-sm">[ERROR_404: DATA_NOT_FOUND]</p>
                <p class="text-muted mt-2">Tidak ada modul yang cocok dengan parameter.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-12 flex justify-center">
            {{ $products->links() }}
        </div>
    </div>
@endsection
