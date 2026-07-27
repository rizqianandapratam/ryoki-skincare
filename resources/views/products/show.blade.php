@extends('layouts.public')

@section('title', 'Ryoki Skincare — ' . $product->name)
@section('meta_description', Str::limit($product->description ?? 'Detail produk skincare Ryoki asli BPOM.', 155))

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-8">

    <!-- Breadcrumb -->
    <nav class="flex items-center gap-2 text-xs text-slate-400 font-medium">
        <a href="{{ route('home') }}" class="hover:text-[#0284C7]">Beranda</a>
        <span>/</span>
        <a href="{{ route('products.index') }}" class="hover:text-[#0284C7]">Produk Skincare</a>
        <span>/</span>
        <span class="text-slate-800 font-semibold">{{ $product->name }}</span>
    </nav>

    <!-- Main Detail Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

        <!-- Product Image Showcase -->
        <div class="lg:col-span-5">
            <div class="bg-white p-4 rounded-3xl border border-slate-200 shadow-sm relative sticky top-32">
                <div class="relative w-full aspect-square rounded-2xl overflow-hidden bg-slate-50 border border-slate-100">
                    @if($product->image)
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                    @else
                        @php
                            $imgSrc = asset('images/facial-wash.png');
                            if(str_contains(strtolower($product->name), 'peeling')) $imgSrc = asset('images/peeling-spray.png');
                            elseif(str_contains(strtolower($product->name), 'cream')) $imgSrc = asset('images/day-cream.png');
                        @endphp
                        <img src="{{ $imgSrc }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                    @endif
                </div>

                <!-- Product Guarantee Badges -->
                <div class="grid grid-cols-3 gap-2 mt-4 text-center text-[11px] font-medium text-slate-600">
                    <div class="p-2 bg-sky-50 rounded-xl border border-sky-100">
                        BPOM RI Approved
                    </div>
                    <div class="p-2 bg-sky-50 rounded-xl border border-sky-100">
                        100% Halal Safe
                    </div>
                    <div class="p-2 bg-sky-50 rounded-xl border border-sky-100">
                        Dermatologist Tested
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Info & Purchase Options -->
        <div class="lg:col-span-7 space-y-6">

            <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm space-y-6">
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold font-heading text-slate-900 leading-tight">
                        {{ $product->name }}
                    </h1>

                    <div class="flex items-center gap-3 mt-3">
                        <span class="text-amber-500 font-bold text-xs">★ 4.9 / 5.0 Rating</span>
                        <span class="text-xs text-slate-400">| Terjual 1.200+ Pcs di TikTok Shop</span>
                    </div>
                </div>

                <!-- Price & Stock -->
                <div class="flex items-baseline gap-4 pt-4 border-t border-slate-100">
                    <span class="text-3xl font-bold text-[#0284C7]">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                    @if($product->in_stock)
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200 text-xs font-semibold">
                            Stok Tersedia
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-red-50 text-red-600 border border-red-200 text-xs font-semibold">
                            Stok Habis
                        </span>
                    @endif
                </div>

                <!-- Purchase CTA -->
                <div class="space-y-3 pt-2">
                    <a href="https://www.tiktok.com/@ryokijapanskin" target="_blank" rel="noopener noreferrer"
                       class="btn-ryoki btn-ryoki-primary w-full py-4 text-base shadow-lg justify-center font-bold">
                        Beli Langsung di TikTok Shop Official
                    </a>
                    <p class="text-center text-xs text-slate-400 font-light">
                        Jaminan Produk 100% Original & Dikirim Langsung dari Pabrik Resmi Ryoki.
                    </p>
                </div>
            </div>

            <!-- Detailed Accordion Information -->
            <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm" x-data="{ activeTab: 1 }">
                <div class="border-b border-slate-200 pb-4">
                    <button @click="activeTab = activeTab === 1 ? null : 1" class="w-full flex justify-between items-center py-2 text-left font-bold text-slate-900">
                        <span>Deskripsi & Manfaat Utama</span>
                        <span class="text-[#0284C7]" x-text="activeTab === 1 ? '−' : '+'"></span>
                    </button>
                    <div x-show="activeTab === 1" x-collapse class="pt-3 text-sm text-slate-600 leading-relaxed font-light">
                        {{ $product->description ?? 'Deskripsi produk berkualitas tinggi dari Ryoki Skincare.' }}
                    </div>
                </div>

                <div class="border-b border-slate-200 py-4">
                    <button @click="activeTab = activeTab === 2 ? null : 2" class="w-full flex justify-between items-center py-2 text-left font-bold text-slate-900">
                        <span>Petunjuk Penggunaan</span>
                        <span class="text-[#0284C7]" x-text="activeTab === 2 ? '−' : '+'"></span>
                    </button>
                    <div x-show="activeTab === 2" x-collapse class="pt-3 text-sm text-slate-600 leading-relaxed font-light">
                        {{ $product->usage ?? 'Gunakan secara teratur pada kulit yang bersih setiap pagi dan malam hari untuk hasil terbaik.' }}
                    </div>
                </div>

                <div class="pt-4">
                    <button @click="activeTab = activeTab === 3 ? null : 3" class="w-full flex justify-between items-center py-2 text-left font-bold text-slate-900">
                        <span>Komposisi Bahan (Ingredients)</span>
                        <span class="text-[#0284C7]" x-text="activeTab === 3 ? '−' : '+'"></span>
                    </button>
                    <div x-show="activeTab === 3" x-collapse class="pt-3 text-xs text-slate-500 leading-relaxed font-mono">
                        {{ $product->ingredients ?? 'Aqua, Niacinamide, Alpha Arbutin, Collagen, Aloe Barbadensis Leaf Extract, Glycerin, Phenoxyethanol.' }}
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
