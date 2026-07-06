@extends('layouts.public')

@section('title', 'Ryoki Skincare - ' . $product->name)

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        
        <!-- Breadcrumb / System Path -->
        <div class="bento-card py-4 px-6 mb-8 flex items-center text-xs font-mono text-muted overflow-x-auto whitespace-nowrap scrollbar-hide">
            <span class="text-neon mr-2">C:\SYS></span>
            <a href="{{ route('home') }}" class="hover:text-neon transition">ROOT</a>
            <span class="mx-2 opacity-50">/</span>
            <a href="{{ route('products.index') }}" class="hover:text-neon transition">MODULES</a>
            <span class="mx-2 opacity-50">/</span>
            <span class="text-white">{{ strtoupper(Str::limit($product->name, 20)) }}</span>
        </div>

        <!-- Product Detail Bento Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            
            <!-- Product Image Bento -->
            <div class="lg:col-span-5 bento-card p-4 relative overflow-hidden group">
                <div class="absolute inset-0 bg-[#CCFF00] opacity-10 filter blur-[80px] transform group-hover:scale-110 transition-transform duration-1000"></div>
                
                @if($product->is_best_seller)
                    <div class="absolute top-6 left-6 bg-[#CCFF00] text-[#020617] text-[10px] font-bold px-3 py-1.5 rounded uppercase tracking-widest z-20 font-mono shadow-[0_0_15px_rgba(204,255,0,0.5)]">
                        TOP_RATED
                    </div>
                @endif
                
                <div class="w-full aspect-[4/5] relative bg-[#020617] rounded-xl overflow-hidden border border-white/5">
                    @if($product->image)
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover mix-blend-luminosity group-hover:mix-blend-normal transition duration-700 relative z-10">
                    @else
                        <img src="https://placehold.co/600x800/020617/CCFF00?text={{ urlencode($product->name) }}" alt="{{ $product->name }}" class="w-full h-full object-cover mix-blend-luminosity group-hover:mix-blend-normal transition duration-700 relative z-10">
                    @endif
                    <div class="absolute inset-0 ring-1 ring-inset ring-white/10 z-20 rounded-xl"></div>
                </div>
            </div>
            
            <!-- Product Info Bento -->
            <div class="lg:col-span-7 flex flex-col gap-8">
                <div class="bento-card p-8 md:p-10 flex-grow">
                    <span class="text-neon font-mono text-xs uppercase mb-4 block">[CAT: {{ strtoupper($product->category) }}]</span>
                    <h1 class="text-3xl md:text-5xl font-bold text-white mb-6 leading-tight">{{ $product->name }}</h1>
                    
                    <div class="flex items-center gap-6 mb-8 border-b border-white/10 pb-8">
                        <p class="text-3xl text-neon font-mono font-bold">IDR {{ number_format($product->price, 0, ',', '.') }}</p>
                        
                        @if($product->in_stock)
                            <span class="inline-flex items-center px-3 py-1 rounded bg-[#CCFF00]/10 border border-[#CCFF00]/30 text-neon font-mono text-xs">
                                <span class="w-2 h-2 mr-2 bg-[#CCFF00] rounded-full animate-pulse"></span> IN_STOCK
                            </span>
                        @else
                            <span class="inline-flex items-center px-3 py-1 rounded bg-red-500/10 border border-red-500/30 text-red-500 font-mono text-xs">
                                <span class="w-2 h-2 mr-2 bg-red-500 rounded-full"></span> ERR_OUT_OF_STOCK
                            </span>
                        @endif
                    </div>

                    <!-- Buy Button -->
                    <div class="mb-10">
                        <a href="https://tiktok.com/@ryokiskincare" target="_blank" class="w-full inline-flex justify-center items-center bg-[#CCFF00] hover:bg-[#b3ff00] text-[#020617] px-8 py-4 rounded-xl text-lg font-bold transition-all shadow-[0_0_20px_rgba(204,255,0,0.15)] hover:shadow-[0_0_30px_rgba(204,255,0,0.3)] transform hover:-translate-y-1 group">
                            <svg class="w-6 h-6 mr-3 group-hover:animate-bounce" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/></svg>
                            EXECUTE_PURCHASE()
                        </a>
                        <p class="text-xs text-muted font-mono mt-4 text-center">TRANSACTION ROUTED TO TIKTOK_SHOP</p>
                    </div>
                </div>

                <!-- Accordion Bento -->
                <div class="bento-card p-6 md:p-8" x-data="{ activeAccordion: 1 }">
                    <!-- Deskripsi -->
                    <div class="border-b border-white/10 last:border-0">
                        <button @click="activeAccordion = activeAccordion === 1 ? null : 1" class="w-full flex justify-between items-center py-5 focus:outline-none group">
                            <span class="text-sm font-mono text-white uppercase group-hover:text-neon transition-colors">[SYS.DESC] Deskripsi Modul</span>
                            <span class="text-neon font-mono text-xl leading-none" x-text="activeAccordion === 1 ? '-' : '+'"></span>
                        </button>
                        <div x-show="activeAccordion === 1" x-collapse>
                            <div class="pb-6 text-muted leading-relaxed font-light text-sm">
                                {{ $product->description ?? 'Deskripsi belum tersedia dalam database.' }}
                            </div>
                        </div>
                    </div>
                    
                    <!-- Cara Pakai -->
                    <div class="border-b border-white/10 last:border-0">
                        <button @click="activeAccordion = activeAccordion === 2 ? null : 2" class="w-full flex justify-between items-center py-5 focus:outline-none group">
                            <span class="text-sm font-mono text-white uppercase group-hover:text-neon transition-colors">[SYS.EXEC] Protokol Penggunaan</span>
                            <span class="text-neon font-mono text-xl leading-none" x-text="activeAccordion === 2 ? '-' : '+'"></span>
                        </button>
                        <div x-show="activeAccordion === 2" x-collapse style="display: none;">
                            <div class="pb-6 text-muted leading-relaxed font-light text-sm">
                                {{ $product->usage ?? 'Protokol penggunaan belum tersedia.' }}
                            </div>
                        </div>
                    </div>
                    
                    <!-- Komposisi -->
                    <div class="border-b border-white/10 last:border-0">
                        <button @click="activeAccordion = activeAccordion === 3 ? null : 3" class="w-full flex justify-between items-center py-5 focus:outline-none group">
                            <span class="text-sm font-mono text-white uppercase group-hover:text-neon transition-colors">[SYS.DATA] Komponen Bahan</span>
                            <span class="text-neon font-mono text-xl leading-none" x-text="activeAccordion === 3 ? '-' : '+'"></span>
                        </button>
                        <div x-show="activeAccordion === 3" x-collapse style="display: none;">
                            <div class="pb-6 text-muted leading-relaxed font-light text-xs font-mono">
                                {{ $product->ingredients ?? 'Data komponen belum tersedia.' }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection
