@extends('layouts.public')

@section('title', 'Katalog Skincare Ryoki — Produk BPOM & Formula Jepang')
@section('meta_description', 'Beli produk Skincare Ryoki resmi. Facial Wash, Peeling Spray, Day Cream, dan Body Serum bersertifikat BPOM untuk perawatan kulit sehat.')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-10">

    <!-- Header Section -->
    <div class="bg-gradient-to-r from-sky-50 to-blue-50 border border-sky-100 rounded-3xl p-8 md:p-12 text-center space-y-3">
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold font-heading text-slate-900">
            Katalog Skincare Ryoki
        </h1>
        <p class="text-slate-600 font-light text-sm md:text-base max-w-2xl mx-auto leading-relaxed">
            Diformulasikan secara profesional untuk mencerahkan, menutrisi, dan memperkuat kelembaban alami kulit wajah dan tubuh Anda.
        </p>
    </div>

    <!-- Filter & Search Bar -->
    <div class="bg-white p-4 md:p-6 rounded-2xl border border-slate-200 shadow-xs flex flex-col md:flex-row justify-between items-center gap-4">
        <!-- Categories -->
        <div class="flex items-center gap-2 overflow-x-auto w-full md:w-auto pb-2 md:pb-0 scrollbar-hide">
            <a href="{{ route('products.index') }}"
               class="px-4 py-2 rounded-full text-xs font-semibold whitespace-nowrap transition-all {{ !request('category') ? 'bg-[#0284C7] text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                Semua Produk
            </a>
            @foreach($categories as $category)
            <a href="{{ route('products.index', ['category' => $category]) }}"
               class="px-4 py-2 rounded-full text-xs font-semibold whitespace-nowrap transition-all {{ request('category') == $category ? 'bg-[#0284C7] text-white shadow-xs' : 'bg-slate-100 text-slate-600 hover:bg-slate-200' }}">
                {{ ucfirst($category) }}
            </a>
            @endforeach
        </div>

        <!-- Search Form -->
        <form action="{{ route('products.index') }}" method="GET" class="w-full md:w-72">
            @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            <div class="relative">
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Cari produk skincare..."
                       class="skincare-input w-full pl-10 pr-4 py-2 text-xs">
                <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </div>
        </form>
    </div>

    <!-- Product Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($products as $product)
        <div class="skincare-card p-4 flex flex-col justify-between group">
            <div>
                <!-- Image -->
                <a href="{{ route('products.show', $product->slug) }}" class="relative block w-full aspect-square rounded-xl overflow-hidden bg-slate-50 mb-3 border border-slate-100">
                    @if($product->image)
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        @php
                            $imgSrc = asset('images/facial-wash.png');
                            if(str_contains(strtolower($product->name), 'peeling')) $imgSrc = asset('images/peeling-spray.png');
                            elseif(str_contains(strtolower($product->name), 'cream')) $imgSrc = asset('images/day-cream.png');
                        @endphp
                        <img src="{{ $imgSrc }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @endif
                </a>

                <!-- Rating -->
                <div class="flex items-center gap-1 text-amber-400 text-xs mb-1.5">
                    <span>★ 4.9</span>
                    <span class="text-slate-400 text-[11px] font-medium ml-1">BPOM</span>
                </div>

                <!-- Product Name -->
                <h3 class="text-base font-bold text-slate-900 group-hover:text-[#0284C7] transition-colors mb-1 line-clamp-1">
                    <a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
                </h3>

                <!-- Short Desc -->
                <p class="text-xs text-slate-500 line-clamp-2 mb-4 font-light leading-relaxed">
                    {{ $product->description }}
                </p>
            </div>

            <div>
                <!-- Price & Action -->
                <div class="flex items-center justify-between pt-3 border-t border-slate-100 mb-3">
                    <span class="text-[11px] text-slate-400 uppercase font-medium">Harga</span>
                    <span class="text-base font-bold text-[#0284C7]">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                </div>

                <a href="https://www.tiktok.com/@ryokijapanskin" target="_blank" class="btn-ryoki btn-ryoki-primary w-full text-xs justify-center py-2.5">
                    Beli di TikTok Shop Official
                </a>
            </div>
        </div>
        @empty
        <div class="col-span-full py-16 text-center bg-white rounded-2xl border border-dashed border-slate-300">
            <svg class="w-12 h-12 text-slate-300 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            <p class="text-slate-700 font-semibold text-sm">Produk tidak ditemukan</p>
            <p class="text-slate-400 text-xs mt-1">Coba gunakan kata kunci pencarian yang berbeda.</p>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="pt-6 flex justify-center">
        {{ $products->links() }}
    </div>

</div>
@endsection
