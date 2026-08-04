@extends('layouts.public')

@section('title', 'Katalog Skincare Ryoki — Produk BPOM & Formula Jepang | Harga Terbaru 2025')
@section('meta_description', 'Katalog lengkap produk Ryoki Skincare resmi BPOM RI. Facial Wash, Gold Serum, Day & Night Cream, Toner, Peeling Spray, Hand Body, Deodorant. Formulasi Jepang untuk kulit cerah & glowing. Beli di TikTok Shop & Shopee Official.')
@section('meta_keywords', 'katalog ryoki skincare, produk ryoki, harga ryoki skincare, facial wash ryoki, serum ryoki gold, day cream ryoki, night cream ryoki, toner ryoki, peeling spray ryoki, hand body ryoki, skincare bpom murah, skincare jepang terbaik')

@push('head')
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "CollectionPage",
  "name": "Katalog Produk Ryoki Skincare",
  "description": "Katalog lengkap rangkaian produk skincare Ryoki Skincare dengan formulasi Jepang bersertifikasi BPOM RI.",
  "url": "{{ route('products.index') }}",
  "breadcrumb": {
    "@@type": "BreadcrumbList",
    "itemListElement": [{
      "@@type": "ListItem",
      "position": 1,
      "name": "Beranda",
      "item": "{{ route('home') }}"
    },{
      "@@type": "ListItem",
      "position": 2,
      "name": "Katalog Produk Skincare",
      "item": "{{ route('products.index') }}"
    }]
  }
}
</script>
@endpush

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-10"
     x-data="productCatalog()"
     x-init="fetchProducts()">

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
    <div class="bg-white p-4 md:p-6 rounded-2xl border border-slate-200 shadow-xs space-y-4 md:space-y-0 md:flex md:flex-row md:justify-between md:items-center md:gap-4">
        <!-- Categories -->
        <div class="flex items-center gap-2 overflow-x-auto w-full md:w-auto pb-2 md:pb-0 scrollbar-hide">
            <!-- "Semua Produk" button -->
            <button @click="setCategory('')"
                    :class="activeCategory === ''
                        ? 'bg-[#0284C7] text-white shadow-sm shadow-sky-500/25 scale-[1.03]'
                        : 'bg-slate-100 text-slate-600 hover:bg-slate-200 hover:text-slate-800'"
                    class="px-4 py-2 rounded-full text-xs font-semibold whitespace-nowrap transition-all duration-300 ease-out focus:outline-none focus:ring-2 focus:ring-sky-300 focus:ring-offset-1">
                Semua Produk
            </button>

            <!-- Dynamic category buttons -->
            <template x-for="cat in categories" :key="cat">
                <button @click="setCategory(cat)"
                        :class="activeCategory === cat
                            ? 'bg-[#0284C7] text-white shadow-sm shadow-sky-500/25 scale-[1.03]'
                            : 'bg-slate-100 text-slate-600 hover:bg-slate-200 hover:text-slate-800'"
                        class="px-4 py-2 rounded-full text-xs font-semibold whitespace-nowrap transition-all duration-300 ease-out focus:outline-none focus:ring-2 focus:ring-sky-300 focus:ring-offset-1 capitalize"
                        x-text="cat.charAt(0).toUpperCase() + cat.slice(1)">
                </button>
            </template>
        </div>

        <!-- Search Input -->
        <div class="relative w-full md:w-72">
            <input type="text"
                   x-model="searchQuery"
                   @input.debounce.350ms="fetchProducts()"
                   placeholder="Cari produk skincare..."
                   class="skincare-input w-full pl-10 pr-10 py-2.5 text-xs rounded-xl border border-slate-200 focus:border-sky-300 focus:ring-2 focus:ring-sky-100 transition-all duration-200"
                   id="product-search-input">
            <!-- Search icon -->
            <svg class="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            <!-- Clear button -->
            <button x-show="searchQuery.length > 0"
                    x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0 scale-75"
                    x-transition:enter-end="opacity-100 scale-100"
                    @click="searchQuery = ''; fetchProducts()"
                    class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 transition-colors focus:outline-none"
                    title="Hapus pencarian">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    <!-- Result Count & Active Filter Info -->
    <div x-show="!loading && products.length > 0"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="flex items-center justify-between text-xs text-slate-500 px-1">
        <p>
            Menampilkan <span class="font-semibold text-slate-700" x-text="products.length"></span> produk
            <template x-if="activeCategory">
                <span> dalam kategori <span class="font-semibold text-[#0284C7] capitalize" x-text="activeCategory"></span></span>
            </template>
            <template x-if="searchQuery.length > 0">
                <span> untuk "<span class="font-semibold text-slate-700" x-text="searchQuery"></span>"</span>
            </template>
        </p>
    </div>

    <!-- Loading Skeleton -->
    <div x-show="loading" x-transition.opacity.duration.200ms class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3.5 sm:gap-6">
        <template x-for="i in 8" :key="'skeleton-' + i">
            <div class="skincare-card p-3 sm:p-4 animate-pulse">
                <div class="w-full aspect-square sm:aspect-[4/5] rounded-xl bg-slate-200 mb-2.5"></div>
                <div class="flex items-center gap-2 mb-2">
                    <div class="h-3 w-10 bg-slate-200 rounded"></div>
                    <div class="h-3 w-14 bg-slate-200 rounded"></div>
                </div>
                <div class="h-4 w-3/4 bg-slate-200 rounded mb-1.5"></div>
                <div class="h-3 w-full bg-slate-200 rounded mb-1"></div>
                <div class="h-3 w-2/3 bg-slate-200 rounded mb-3"></div>
                <div class="border-t border-slate-100 pt-2.5 mb-2.5 flex justify-between">
                    <div class="h-3 w-12 bg-slate-200 rounded"></div>
                    <div class="h-4 w-20 bg-slate-200 rounded"></div>
                </div>
                <div class="h-8 w-full bg-slate-200 rounded-lg"></div>
            </div>
        </template>
    </div>

    <!-- Product Grid -->
    <div x-show="!loading && products.length > 0"
         x-transition:enter="transition ease-out duration-400"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3.5 sm:gap-6">
        <template x-for="(product, index) in products" :key="product.id">
            <div class="skincare-card p-3 sm:p-4 flex flex-col justify-between group catalog-card-enter"
                 :style="'animation-delay: ' + (index * 60) + 'ms'">

                <div>
                    <!-- Product Image -->
                    <a :href="product.url"
                       class="relative block w-full aspect-square sm:aspect-[4/5] rounded-xl overflow-hidden bg-slate-50 mb-2.5 border border-slate-100">
                        <img :src="product.image_url"
                             :alt="product.name"
                             class="relative z-10 w-full h-full object-contain p-4 group-hover:scale-105 transition-transform duration-500"
                             loading="lazy">

                        <!-- Best Seller Badge -->
                        <span x-show="product.is_best_seller"
                              class="absolute top-2 left-2 z-10 bg-gradient-to-r from-[#0284C7] to-[#0369A1] text-white text-[9px] sm:text-[10px] font-bold tracking-wide px-2 sm:px-2.5 py-0.5 sm:py-1 rounded-full shadow-md shadow-sky-500/25">
                            ★ BEST SELLER
                        </span>

                        <!-- Category Badge -->
                        <span x-show="product.category"
                              class="absolute top-2 right-2 z-10 bg-white/90 backdrop-blur-sm text-[9px] sm:text-[10px] font-semibold text-slate-700 px-2 sm:px-2.5 py-0.5 sm:py-1 rounded-full border border-slate-200/80 shadow-sm capitalize"
                              x-text="product.category">
                        </span>
                    </a>

                    <!-- Rating -->
                    <div class="flex items-center gap-1 text-[11px] sm:text-xs mb-1">
                        <span class="text-amber-400 font-bold">★ <span x-text="product.rating"></span></span>
                        <span class="text-slate-300">·</span>
                        <span class="text-slate-400 text-[10px] sm:text-[11px] font-medium">BPOM RI</span>
                    </div>

                    <!-- Product Name -->
                    <h3 class="text-xs sm:text-base font-bold text-slate-900 group-hover:text-[#0284C7] transition-colors mb-1 font-heading line-clamp-1 leading-snug">
                        <a :href="product.url" x-text="product.name"></a>
                    </h3>

                    <!-- Description -->
                    <p class="text-[11px] sm:text-xs text-slate-500 line-clamp-2 mb-3 font-light leading-relaxed" x-text="product.description"></p>
                </div>

                <div>
                    <!-- Price -->
                    <div class="flex items-center justify-between pt-2.5 border-t border-slate-100 mb-2.5">
                        <span class="text-[10px] sm:text-[11px] text-slate-400 uppercase font-medium tracking-wide">Harga</span>
                        <span class="text-xs sm:text-base font-bold text-[#0284C7]" x-text="product.price_formatted"></span>
                    </div>

                    <!-- CTA Buttons (TikTok & Shopee Dual Marketplace) -->
                    <div class="grid grid-cols-2 gap-1">
                        <a :href="product.tiktok_url"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="py-2 sm:py-2.5 px-1.5 text-[10px] sm:text-[11px] font-bold rounded-xl bg-slate-100 hover:bg-slate-900 text-slate-800 hover:text-white transition-all flex items-center justify-center gap-1 shadow-2xs border border-slate-200/90"
                           title="Beli di TikTok Shop Official">
                            <svg class="w-3 h-3 sm:w-3.5 sm:h-3.5 fill-current shrink-0" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/></svg>
                            <span>TikTok</span>
                        </a>
                        <a :href="product.shopee_url || 'https://shopee.co.id/ryokiofficialstore'"
                           target="_blank"
                           rel="noopener noreferrer"
                           :onclick="'trackShopeeClick(\'' + product.name + '\', ' + product.id + ', \'Product Grid Alpine\')'"
                           class="py-2 sm:py-2.5 px-1.5 text-[10px] sm:text-[11px] font-bold rounded-xl bg-orange-50 hover:bg-[#EE4D2D] text-[#EE4D2D] hover:text-white transition-all flex items-center justify-center gap-1 shadow-2xs border border-orange-200/90"
                           title="Beli di Shopee Official Store">
                            <svg class="w-3 h-3 sm:w-3.5 sm:h-3.5 fill-current shrink-0" viewBox="0 0 24 24"><path d="M19.77 7.06h-3.41V5.44C16.36 2.44 13.92 0 10.92 0S5.48 2.44 5.48 5.44v1.62H1.71L.12 21.61C-.07 22.9 1 24 2.29 24h16.89c1.29 0 2.36-1.1 2.17-2.39l-1.58-14.55zM7.48 5.44c0-1.9 1.54-3.44 3.44-3.44s3.44 1.54 3.44 3.44v1.62H7.48V5.44zm11.75 16.56H2.25L3.6 8.56h1.88v2.09c0 .55.45 1 1 1s1-.45 1-1V8.56h6.88v2.09c0 .55.45 1 1 1s1-.45 1-1V8.56h1.88l1.35 13.44z"/></svg>
                            <span>Shopee</span>
                        </a>
                    </div>
                </div>
            </div>
        </template>
    </div>

    <!-- Empty State -->
    <div x-show="!loading && products.length === 0"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         class="col-span-full py-16 text-center bg-white rounded-2xl border border-dashed border-slate-300">
        <svg class="w-14 h-14 text-slate-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
        </svg>
        <p class="text-slate-700 font-semibold text-sm">Produk tidak ditemukan</p>
        <p class="text-slate-400 text-xs mt-1.5 max-w-sm mx-auto">
            Tidak ada produk yang cocok dengan filter atau pencarian Anda. Coba kata kunci lain atau reset filter.
        </p>
        <button @click="activeCategory = ''; searchQuery = ''; fetchProducts()"
                class="mt-5 inline-flex items-center gap-1.5 px-5 py-2 rounded-full text-xs font-semibold text-[#0284C7] bg-sky-50 hover:bg-sky-100 transition-colors focus:outline-none focus:ring-2 focus:ring-sky-200">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
            </svg>
            Reset Semua Filter
        </button>
    </div>

</div>

<!-- Alpine.js Component Logic -->
<script>
    function productCatalog() {
        return {
            products: [],
            categories: @json($categories),
            activeCategory: '{{ request('category', '') }}',
            searchQuery: '{{ request('search', '') }}',
            loading: true,

            setCategory(cat) {
                if (this.activeCategory === cat) return;
                this.activeCategory = cat;
                this.fetchProducts();
            },

            async fetchProducts() {
                this.loading = true;

                const params = new URLSearchParams();
                if (this.activeCategory) params.set('category', this.activeCategory);
                if (this.searchQuery) params.set('search', this.searchQuery);

                try {
                    const response = await fetch(`{{ route('api.products.index') }}?${params.toString()}`);
                    const data = await response.json();
                    this.products = data.products;
                    this.categories = data.categories;
                } catch (error) {
                    console.error('Failed to fetch products:', error);
                } finally {
                    // Small delay to let skeleton feel natural
                    setTimeout(() => { this.loading = false; }, 180);
                }
            },
        }
    }
</script>

<!-- Staggered Card Animation -->
<style>
    @keyframes catalogCardEnter {
        from {
            opacity: 0;
            transform: translateY(16px) scale(0.97);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }
    .catalog-card-enter {
        animation: catalogCardEnter 0.45s cubic-bezier(0.22, 1, 0.36, 1) forwards;
    }
</style>
@endsection
