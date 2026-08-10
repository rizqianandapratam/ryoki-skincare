@extends('layouts.public')

@php
    $productName = strtolower($product->name);

    $categoryName = strtolower($product->category ?? '');

    // Prefer an explicit product image (uploaded or DB-stored). Fall back to category defaults.
    if (!empty($product->image_url)) {
        $imgSrc = $product->image_url;
    } else {
        if (str_contains($productName, 'facial wash') || str_contains($categoryName, 'cleanser')) {
            $imgSrc = asset('images/facial-wash.png');
        } elseif (str_contains($productName, 'serum') || str_contains($categoryName, 'serum')) {
            $imgSrc = asset('images/serum.png');
        } elseif (str_contains($productName, 'peeling') || str_contains($productName, 'spray') || str_contains($categoryName, 'spray')) {
            $imgSrc = asset('images/peeling-spray.png');
        } elseif (str_contains($productName, 'cream') || str_contains($productName, 'moisturizer') || str_contains($categoryName, 'moisturizer')) {
            $imgSrc = asset('images/day-cream.png');
        } else {
            $imgSrc = asset('images/facial-wash.png');
        }
    }

    $hasSpecificLink = !empty($product->getAttributes()['shopee_url'] ?? null) || !empty($product->getAttributes()['tiktok_shop_url'] ?? null);
    $displayRating = ($hasSpecificLink && $product->rating > 0) ? number_format($product->rating, 1) : '0.0';
    $displaySoldCount = ($hasSpecificLink && $product->sold_count > 0) ? (int) $product->sold_count : 0;
    $displayReviewCount = ($hasSpecificLink && $product->review_count > 0) ? (int) $product->review_count : 0;
    $tiktokUrl = $product->tiktok_url;
    $shopeeUrl = $product->shopee_url;
@endphp

@section('title', $product->name . ' — Ryoki Skincare Official')
@section('meta_description', Str::limit($product->description ?? 'Beli ' . $product->name . ' resmi di TikTok Shop. Produk Skincare Ryoki asli BPOM & Formula Jepang.', 155))
@section('meta_keywords', strtolower($product->name) . ', ' . strtolower($product->category) . ', ryoki skincare, bpom ri, skincare jepang, tiktok shop ryoki')
@section('og_image', $imgSrc)
@section('og_type', 'product')

@push('head')
<script type="application/ld+json">
{
  "@@context": "https://schema.org/",
  "@@type": "Product",
  "name": "{{ addslashes($product->name) }}",
  "image": [
    "{{ $imgSrc }}"
  ],
  "description": "{{ addslashes(strip_tags($product->description ?? $product->name)) }}",
  "sku": "RYOKI-{{ $product->id }}",
  "brand": {
    "@@type": "Brand",
    "name": "Ryoki Skincare"
  },
  "offers": {
    "@@type": "Offer",
    "url": "{{ url()->current() }}",
    "priceCurrency": "IDR",
    "price": "{{ (int) $product->price }}",
    "priceValidUntil": "2026-12-31",
    "itemCondition": "https://schema.org/NewCondition",
    "availability": "{{ $product->in_stock ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock' }}",
    "seller": {
      "@@type": "Organization",
      "name": "PT Golden Intan Berlian — Ryoki Skincare Official"
    }
  },
  "aggregateRating": {
    "@@type": "AggregateRating",
    "ratingValue": "{{ $displayRating }}",
    "reviewCount": "{{ $product->review_count ?: 60 }}",
    "bestRating": "5"
  }
}
</script>
<script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "BreadcrumbList",
  "itemListElement": [{
    "@@type": "ListItem",
    "position": 1,
    "name": "Beranda",
    "item": "{{ route('home') }}"
  },{
    "@@type": "ListItem",
    "position": 2,
    "name": "Katalog Produk",
    "item": "{{ route('products.index') }}"
  },{
    "@@type": "ListItem",
    "position": 3,
    "name": "{{ addslashes($product->name) }}",
    "item": "{{ url()->current() }}"
  }]
}
</script>
@endpush

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-10 space-y-8 sm:space-y-12">

    <!-- ─── Breadcrumb ─── -->
    <nav class="flex items-center gap-2 text-xs text-slate-400 font-medium" aria-label="Breadcrumb">
        <a href="{{ route('home') }}" class="hover:text-[#0284C7] transition-colors">Beranda</a>
        <svg class="w-3 h-3 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        <a href="{{ route('products.index') }}" class="hover:text-[#0284C7] transition-colors">Katalog Produk</a>
        <svg class="w-3 h-3 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        <span class="text-slate-700 font-semibold truncate max-w-[200px]">{{ $product->name }}</span>
    </nav>

    <!-- ═══════════════════════════════════════════════════════════
         DESKTOP VIEW (Original Full Layout - Hidden on Mobile)
         ═══════════════════════════════════════════════════════════ -->
    <div class="hidden lg:block space-y-8">
        <div class="grid grid-cols-12 gap-12 items-start">

            <!-- ─── LEFT COLUMN: Photo Showcase & Gallery (Desktop) ─── -->
            @php
                $galleryUrls = collect();
                $galleryUrls->push($imgSrc);
                foreach ($product->galleryImages as $gImg) {
                    $galleryUrls->push(Storage::url($gImg->image_path));
                }
            @endphp
            <div class="col-span-5" x-data="{
                images: @js($galleryUrls->values()),
                activeIndex: 0,
                get activeImg() { return this.images[this.activeIndex]; }
            }">
                <div class="sticky top-32 space-y-4">

                    <!-- Main Image Card -->
                    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm p-5 overflow-hidden">
                        <div class="relative w-full aspect-square rounded-2xl overflow-hidden bg-gradient-to-br from-slate-50 to-sky-50/40 border border-slate-100 flex items-center justify-center">
                               <img :src="activeImg"
                                   alt="{{ $product->name }}"
                                   class="relative z-10 w-full h-full object-contain p-4 transition-all duration-100 ease-out"
                                   id="main-product-image-desktop">

                            @if($product->is_best_seller)
                                <span class="absolute top-3.5 left-3.5 z-10 bg-gradient-to-r from-[#0284C7] to-[#0369A1] text-white text-[10px] font-bold tracking-wide px-3 py-1.5 rounded-full shadow-md shadow-sky-500/25">
                                    ★ BEST SELLER
                                </span>
                            @endif

                            <span class="absolute bottom-3.5 right-3.5 z-10 bg-white/90 backdrop-blur-md text-[10px] font-semibold text-slate-700 px-3 py-1 rounded-full border border-slate-200 shadow-xs">
                                BPOM RI Certified
                            </span>
                        </div>
                    </div>

                    <!-- Gallery Thumbnails Row -->
                    @if($galleryUrls->count() > 1)
                    <div class="flex gap-3 p-1 overflow-x-auto">
                        <template x-for="(src, i) in images" :key="i">
                            <button @click="activeIndex = i"
                                    :class="activeIndex === i
                                        ? 'border-2 border-[#0284C7] shadow-sm scale-[1.02]'
                                        : 'border border-slate-200 hover:border-sky-300 opacity-70 hover:opacity-100'"
                                    class="w-20 h-20 rounded-2xl overflow-hidden bg-white p-1 transition-all duration-200 flex-shrink-0">
                                <img :src="src" :alt="'Foto produk ' + (i + 1)" class="w-full h-full object-contain p-1 rounded-xl">
                            </button>
                        </template>
                    </div>
                    @endif

                </div>
            </div>

            <!-- ─── RIGHT COLUMN: Original Desktop Info ─── -->
            <div class="col-span-7 space-y-6">

                <!-- Primary Header Card -->
                <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm space-y-5">

                    <!-- Category Badge -->
                    @if($product->category)
                        <div class="flex items-center gap-2">
                            <span class="inline-flex items-center gap-1.5 px-3.5 py-1 rounded-full bg-sky-50 text-[#0284C7] text-xs font-semibold border border-sky-100 capitalize">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                                Category: {{ ucfirst($product->category) }}
                            </span>
                            @if($product->in_stock)
                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-700 text-[11px] font-medium border border-emerald-100">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                                    Tersedia
                                </span>
                            @endif
                        </div>
                    @endif

                    <!-- Product Title with font-playfair -->
                    <h1 class="text-3xl sm:text-4xl font-bold font-playfair text-slate-900 leading-tight">
                        {{ $product->name }}
                    </h1>

                    <!-- Rating & Social Proof -->
                    <div class="flex flex-wrap items-center gap-3 text-sm pt-1">
                        <div class="flex items-center gap-1 bg-amber-50 px-3 py-1 rounded-full border border-amber-200/60">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-4 h-4 {{ $i <= round($displayRating) ? 'text-amber-400' : 'text-slate-200' }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            @endfor
                            <span class="font-bold text-slate-800 ml-1 text-xs">{{ $displayRating }} / 5.0</span>
                        </div>
                        <span class="text-slate-300">·</span>
                        @if($displaySoldCount > 0)
                            <span class="text-xs text-slate-500 font-medium">Terjual {{ number_format($displaySoldCount) }}+ pcs di Shopee &amp; TikTok Shop Official</span>
                        @else
                            <span class="text-xs text-slate-400 font-medium">Terjual 0 pcs</span>
                        @endif
                        <span class="text-slate-300">·</span>
                        @if($displayReviewCount > 0)
                            <span class="text-xs text-slate-400 font-medium">{{ number_format($displayReviewCount) }} Penilaian Ulasan</span>
                        @else
                            <span class="text-xs text-slate-400 font-medium">0 Penilaian Ulasan</span>
                        @endif
                    </div>

                    <!-- Price Section -->
                    <div class="pt-4 border-t border-slate-100 flex items-baseline gap-3">
                        <span class="text-3xl sm:text-4xl font-extrabold text-[#0284C7] tracking-tight">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </span>
                        <span class="text-xs text-slate-400">Jaminan 100% Original BPOM</span>
                    </div>

                    <!-- Short Description -->
                    <div class="space-y-2 pt-2">
                        <h3 class="text-xs font-bold text-slate-400 uppercase tracking-wider">Deskripsi Singkat</h3>
                        <p class="text-sm text-slate-600 leading-relaxed font-light">
                            {{ $product->description ?? 'Formulasi perawatan kulit wajah profesional khas Jepang dari Ryoki Skincare. Dirancang untuk memberikan kelembapan intensif, mencerahkan kulit secara merata, dan memperkuat pertahanan skin barrier Anda.' }}
                        </p>
                    </div>

                    <!-- PRIMARY CTA BUTTONS -->
                    <div class="pt-4 space-y-3">
                        <div class="grid grid-cols-2 gap-3">
                            <a href="{{ $tiktokUrl }}"
                               target="_blank"
                               rel="noopener noreferrer"
                               onclick="trackTikTokClick('{{ addslashes($product->name) }}', {{ $product->id }}, 'PDP Main CTA Desktop'); return true;"
                               class="flex items-center justify-center gap-2 bg-slate-100/90 hover:bg-slate-900 text-slate-800 hover:text-white border border-slate-200/90 hover:border-slate-900 py-3.5 px-4 text-sm font-bold rounded-2xl shadow-2xs hover:shadow-md transition-all duration-300 group"
                               id="btn-buy-tiktok-desktop">
                                <svg class="w-5 h-5 fill-current shrink-0 text-slate-800 group-hover:text-white transition-colors duration-300" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/></svg>
                                <span>TikTok Shop Official</span>
                            </a>

                            <a href="{{ $shopeeUrl }}"
                               target="_blank"
                               rel="noopener noreferrer"
                               onclick="trackShopeeClick('{{ addslashes($product->name) }}', {{ $product->id }}, 'PDP Main CTA Desktop'); return true;"
                               class="flex items-center justify-center gap-2 bg-orange-50/90 hover:bg-[#EE4D2D] text-[#EE4D2D] hover:text-white border border-orange-200/90 hover:border-[#EE4D2D] py-3.5 px-4 text-sm font-bold rounded-2xl shadow-2xs hover:shadow-md transition-all duration-300 group"
                               id="btn-buy-shopee-desktop">
                                <svg class="w-5 h-5 fill-current shrink-0 text-[#EE4D2D] group-hover:text-white transition-colors duration-300" viewBox="0 0 24 24"><path d="M19.77 7.06h-3.41V5.44C16.36 2.44 13.92 0 10.92 0S5.48 2.44 5.48 5.44v1.62H1.71L.12 21.61C-.07 22.9 1 24 2.29 24h16.89c1.29 0 2.36-1.1 2.17-2.39l-1.58-14.55zM7.48 5.44c0-1.9 1.54-3.44 3.44-3.44s3.44 1.54 3.44 3.44v1.62H7.48V5.44zm11.75 16.56H2.25L3.6 8.56h1.88v2.09c0 .55.45 1 1 1s1-.45 1-1V8.56h6.88v2.09c0 .55.45 1 1 1s1-.45 1-1V8.56h1.88l1.35 13.44z"/></svg>
                                <span>Shopee Official</span>
                            </a>
                        </div>

                        <a href="https://wa.me/6282384991316?text={{ urlencode('Halo Ryoki Skincare, saya ingin berkonsultasi mengenai produk ' . $product->name) }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           onclick="trackWhatsAppClick('{{ addslashes($product->name) }}', {{ $product->id }}, 'PDP WhatsApp Desktop'); return true;"
                           class="flex items-center justify-center gap-2 w-full py-3.5 px-4 rounded-2xl bg-emerald-50/90 hover:bg-emerald-600 text-emerald-700 hover:text-white border border-emerald-200/90 hover:border-emerald-600 font-bold text-sm transition-all duration-300 shadow-2xs hover:shadow-md text-center mt-3 group">
                            <svg class="w-5 h-5 fill-current shrink-0 text-emerald-700 group-hover:text-white transition-colors duration-300" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-1.15 4.204 4.243-1.111z"/></svg>
                            <span>Konsultasi Produk via WhatsApp CS</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>

        <!-- ─── FULL-WIDTH HORIZONTAL TABS (DESKTOP) ─── -->
        <div class="bg-white rounded-3xl border border-slate-200/90 shadow-sm overflow-hidden" x-data="{ activeTab: 1 }">

            <!-- Clean Horizontal Tab Navigation -->
            <div class="flex border-b border-slate-200 bg-slate-50/40 px-6 pt-2 gap-8">
                <button @click="activeTab = 1"
                        :class="activeTab === 1 ? 'border-[#0284C7] text-slate-900 font-bold' : 'border-transparent text-slate-500 hover:text-slate-800 font-medium'"
                        class="py-4 text-sm border-b-2 transition-all duration-200 flex items-center gap-2">
                    <svg class="w-4 h-4 text-[#0284C7]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Deskripsi Produk
                </button>

                <button @click="activeTab = 2"
                        :class="activeTab === 2 ? 'border-[#0284C7] text-slate-900 font-bold' : 'border-transparent text-slate-500 hover:text-slate-800 font-medium'"
                        class="py-4 text-sm border-b-2 transition-all duration-200 flex items-center gap-2">
                    <svg class="w-4 h-4 text-[#0284C7]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L5.59 15.11a2 2 0 01-1.022-.547l-.238-.238a2 2 0 010-2.828l.238-.238a2 2 0 011.022-.547l2.387-.477a6 6 0 003.86-.517l.318-.158a6 6 0 013.86-.517l2.387.477a2 2 0 011.022.547l.238.238a2 2 0 010 2.828l-.238.238z"/></svg>
                    Cara Penggunaan
                </button>

                <button @click="activeTab = 3"
                        :class="activeTab === 3 ? 'border-[#0284C7] text-slate-900 font-bold' : 'border-transparent text-slate-500 hover:text-slate-800 font-medium'"
                        class="py-4 text-sm border-b-2 transition-all duration-200 flex items-center gap-2">
                    <svg class="w-4 h-4 text-[#0284C7]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L5.59 15.11a2 2 0 01-1.022-.547l-.238-.238a2 2 0 010-2.828l.238-.238a2 2 0 011.022-.547l2.387-.477a6 6 0 003.86-.517l.318-.158a6 6 0 013.86-.517l2.387.477a2 2 0 011.022.547l.238.238a2 2 0 010 2.828l-.238.238z"/></svg>
                    Komposisi &amp; Ingredients
                </button>
            </div>

            <!-- Tab Content Body -->
            <div class="p-8 sm:p-10">

                <!-- Tab 1: Deskripsi Produk -->
                <div x-show="activeTab === 1" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" class="space-y-8">
                    <div class="max-w-3xl space-y-3">
                        <h3 class="text-lg font-bold font-heading text-slate-900">Perawatan Kulit Wajah Teruji</h3>
                        <p class="text-sm text-slate-600 leading-relaxed font-light">
                            {{ $product->description ?? 'Formulasi perawatan kulit wajah khas Jepang dari Ryoki Skincare. Dirancang untuk memberikan kelembapan intensif, mencerahkan kulit secara merata, dan menjaga kesehatan skin barrier Anda.' }}
                        </p>
                    </div>

                    <!-- Clean 3-Column Features -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-4 border-t border-slate-100">
                        <div class="space-y-1.5">
                            <h4 class="text-xs font-bold text-slate-900 uppercase tracking-wider">Hidrasi Intensif</h4>
                            <p class="text-xs text-slate-500 leading-relaxed font-light">Menjaga kelembapan alami kulit sepanjang hari dengan tekstur ringan dan nyaman.</p>
                        </div>
                        <div class="space-y-1.5">
                            <h4 class="text-xs font-bold text-slate-900 uppercase tracking-wider">Pencerah Alami</h4>
                            <p class="text-xs text-slate-500 leading-relaxed font-light">Membantu meratakan warna kulit dan menyamarkan noda kusam secara perlahan.</p>
                        </div>
                        <div class="space-y-1.5">
                            <h4 class="text-xs font-bold text-slate-900 uppercase tracking-wider">Perlindungan Kulit</h4>
                            <p class="text-xs text-slate-500 leading-relaxed font-light">Mendukung kekuatan pertahanan lapisan luar kulit dari polusi harian.</p>
                        </div>
                    </div>
                </div>

                <!-- Tab 2: Cara Penggunaan -->
                <div x-show="activeTab === 2" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" style="display: none;" class="space-y-6 max-w-3xl">
                    <h3 class="text-lg font-bold font-heading text-slate-900">Petunjuk Penggunaan Harian</h3>

                    <div class="space-y-4 pt-1">
                        <div class="flex items-start gap-4">
                            <span class="w-8 h-8 rounded-full bg-sky-50 text-[#0284C7] font-bold text-xs flex items-center justify-center border border-sky-100 shrink-0">01</span>
                            <div class="pt-1">
                                <h4 class="text-xs font-bold text-slate-900">Bersihkan Wajah</h4>
                                <p class="text-xs text-slate-500 font-light mt-0.5">Cuci wajah hingga bersih menggunakan pembersih wajah yang lembut lalu keringkan.</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <span class="w-8 h-8 rounded-full bg-sky-50 text-[#0284C7] font-bold text-xs flex items-center justify-center border border-sky-100 shrink-0">02</span>
                            <div class="pt-1">
                                <h4 class="text-xs font-bold text-slate-900">Aplikasikan Produk</h4>
                                <p class="text-xs text-slate-500 font-light mt-0.5">{{ $product->usage ?? 'Teteskan 2-3 tetes pada telapak tangan, lalu usapkan merata pada area wajah dan leher.' }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <span class="w-8 h-8 rounded-full bg-sky-50 text-[#0284C7] font-bold text-xs flex items-center justify-center border border-sky-100 shrink-0">03</span>
                            <div class="pt-1">
                                <h4 class="text-xs font-bold text-slate-900">Resapkan Sempurna</h4>
                                <p class="text-xs text-slate-500 font-light mt-0.5">Tepuk perlahan hingga meresap sempurna sebelum melanjutkan ke produk perawatan berikutnya.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab 3: Komposisi & Ingredients -->
                <div x-show="activeTab === 3" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 translate-y-1" x-transition:enter-end="opacity-100 translate-y-0" style="display: none;" class="space-y-6">
                    <div class="space-y-1">
                        <h3 class="text-lg font-bold font-heading text-slate-900">Daftar Komposisi (INCI List)</h3>
                        <p class="text-xs text-slate-500 font-light">Kandungan bahan yang digunakan dalam produk ini:</p>
                    </div>

                    @if($product->ingredients)
                        <div class="flex flex-wrap gap-2 pt-2">
                            @foreach(explode(',', $product->ingredients) as $ingredient)
                                <span class="px-3.5 py-1.5 rounded-lg bg-slate-100/80 border border-slate-200/80 text-xs font-medium text-slate-700">
                                    {{ trim($ingredient) }}
                                </span>
                            @endforeach
                        </div>
                    @else
                        <p class="text-xs text-slate-500 font-mono bg-slate-50 p-4 rounded-xl border border-slate-200/60 max-w-3xl">
                            Aqua, Niacinamide, Alpha Arbutin, Collagen, Aloe Barbadensis Leaf Extract, Glycerin, Phenoxyethanol.
                        </p>
                    @endif

                    <div class="pt-4 border-t border-slate-100 flex items-center gap-6 text-xs text-slate-500 font-medium">
                        <span class="flex items-center gap-1.5"><svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> BPOM RI Certified</span>
                        <span class="flex items-center gap-1.5"><svg class="w-4 h-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Dermatology Tested</span>
                    </div>
                </div>

            </div>

        </div>
    </div>


    <!-- ═══════════════════════════════════════════════════════════
         MOBILE VIEW (Streamlined, Compact & Clean - Visible only on Mobile)
         ═══════════════════════════════════════════════════════════ -->
    <div class="block lg:hidden space-y-5" x-data="{
        images: @js($galleryUrls->values()),
        activeIndex: 0,
        get activeImg() { return this.images[this.activeIndex]; }
    }">

        <!-- Mobile Main Image Card (Compact height h-56) -->
        <div class="bg-white rounded-2xl border border-slate-200/90 shadow-sm p-3 overflow-hidden">
             <div class="relative w-full h-56 rounded-xl overflow-hidden bg-gradient-to-br from-slate-50 to-sky-50/20 border border-slate-100 flex items-center justify-center">
                <img :src="activeImg"
                    alt="{{ $product->name }}"
                    class="relative z-10 w-full h-full object-contain p-4 transition-all duration-500"
                    id="main-product-image-mobile">

                @if($product->is_best_seller)
                    <span class="absolute top-2.5 left-2.5 z-10 bg-gradient-to-r from-[#0284C7] to-[#0369A1] text-white text-[9px] font-bold px-2.5 py-0.5 rounded-full shadow-md">
                        ★ BEST SELLER
                    </span>
                @endif
            </div>

            <!-- Mobile Thumbnails -->
            @if($galleryUrls->count() > 1)
            <div class="flex gap-2 pt-2.5 overflow-x-auto">
                <template x-for="(src, i) in images" :key="i">
                    <button @click="activeIndex = i"
                            :class="activeIndex === i ? 'border-2 border-[#0284C7]' : 'border border-slate-200 opacity-70'"
                            class="w-12 h-12 rounded-xl overflow-hidden bg-white p-0.5 flex-shrink-0">
                        <img :src="src" :alt="'Foto produk ' + (i + 1)" class="w-full h-full object-contain p-0.5 rounded-lg">
                    </button>
                </template>
            </div>
            @endif
        </div>

        <!-- Mobile Clean Product Header Card -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/90 shadow-sm space-y-4">

            <div>
                <span class="text-[11px] font-bold text-[#0284C7] tracking-widest uppercase font-heading">
                    RYOKI {{ strtoupper($product->category ?? 'SKINCARE') }}
                </span>
                <h1 class="text-2xl font-bold font-playfair text-slate-900 leading-snug mt-0.5">
                    {{ $product->name }}
                </h1>

                <div class="flex items-center gap-2 text-xs text-slate-500 mt-1.5 font-medium">
                    <span class="text-amber-500 font-bold">★ {{ $displayRating }}</span>
                    <span class="text-slate-300">·</span>
                    <span>{{ $displaySoldCount >= 1000 ? number_format($displaySoldCount / 1000, 1) . 'k' : number_format($displaySoldCount) }}+ Terjual (Shopee &amp; TikTok)</span>
                    @if($product->in_stock)
                        <span class="text-slate-300">·</span>
                        <span class="text-emerald-600 font-semibold">Stok Ready</span>
                    @endif
                </div>
            </div>

            <!-- Price -->
            <div class="pt-2 border-t border-slate-100">
                <span class="text-2xl font-bold text-slate-900 font-heading">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </span>
            </div>

            <!-- Mobile Buy Buttons (2-Column Grid) -->
            <div class="pt-1 space-y-2.5">
                <div class="grid grid-cols-2 gap-2">
                    <a href="{{ $tiktokUrl }}" target="_blank" rel="noopener noreferrer"
                       onclick="trackTikTokClick('{{ addslashes($product->name) }}', {{ $product->id }}, 'PDP Main CTA Mobile'); return true;"
                       class="py-3 px-2.5 rounded-xl bg-slate-100/90 hover:bg-slate-900 text-slate-800 hover:text-white border border-slate-200/90 hover:border-slate-900 font-bold text-xs flex items-center justify-center gap-1.5 shadow-2xs text-center transition-all duration-300 group">
                        <svg class="w-3.5 h-3.5 fill-current shrink-0 text-slate-800 group-hover:text-white transition-colors duration-300" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/></svg>
                        <span>TikTok Shop</span>
                    </a>
                    <a href="{{ $shopeeUrl }}" target="_blank" rel="noopener noreferrer"
                       onclick="trackShopeeClick('{{ addslashes($product->name) }}', {{ $product->id }}, 'PDP Main CTA Mobile'); return true;"
                       class="py-3 px-2.5 rounded-xl bg-orange-50/90 hover:bg-[#EE4D2D] text-[#EE4D2D] hover:text-white border border-orange-200/90 hover:border-[#EE4D2D] font-bold text-xs flex items-center justify-center gap-1.5 shadow-2xs text-center transition-all duration-300 group">
                        <svg class="w-3.5 h-3.5 fill-current shrink-0 text-[#EE4D2D] group-hover:text-white transition-colors duration-300" viewBox="0 0 24 24"><path d="M19.77 7.06h-3.41V5.44C16.36 2.44 13.92 0 10.92 0S5.48 2.44 5.48 5.44v1.62H1.71L.12 21.61C-.07 22.9 1 24 2.29 24h16.89c1.29 0 2.36-1.1 2.17-2.39l-1.58-14.55zM7.48 5.44c0-1.9 1.54-3.44 3.44-3.44s3.44 1.54 3.44 3.44v1.62H7.48V5.44zm11.75 16.56H2.25L3.6 8.56h1.88v2.09c0 .55.45 1 1 1s1-.45 1-1V8.56h6.88v2.09c0 .55.45 1 1 1s1-.45 1-1V8.56h1.88l1.35 13.44z"/></svg>
                        <span>Shopee Official</span>
                    </a>
                </div>
                <a href="https://wa.me/6282384991316?text={{ urlencode('Halo Ryoki Skincare, saya ingin berkonsultasi mengenai produk ' . $product->name) }}"
                   target="_blank" rel="noopener noreferrer"
                   onclick="trackWhatsAppClick('{{ addslashes($product->name) }}', {{ $product->id }}, 'PDP WhatsApp Mobile'); return true;"
                   class="flex items-center justify-center gap-2 w-full py-3 px-3 rounded-xl bg-emerald-50/90 hover:bg-emerald-600 text-emerald-700 hover:text-white border border-emerald-200/90 hover:border-emerald-600 font-bold text-xs transition-all duration-300 shadow-2xs text-center mt-2.5 group">
                    <svg class="w-4 h-4 fill-current shrink-0 text-emerald-700 group-hover:text-white transition-colors duration-300" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-1.15 4.204 4.243-1.111z"/></svg>
                    <span>Konsultasi Produk via WhatsApp CS</span>
                </a>
            </div>
        </div>

        <!-- Mobile Clean Accordion Details -->
        <div class="bg-white p-5 rounded-2xl border border-slate-200/90 shadow-sm" x-data="{ activeTab: 1 }">

            <!-- Item 1: Deskripsi Produk -->
            <div class="border-b border-slate-100 pb-3.5">
                <button @click="activeTab = activeTab === 1 ? null : 1" class="w-full flex justify-between items-center py-1.5 text-left font-bold text-xs text-slate-900">
                    <span>Deskripsi Produk</span>
                    <span class="text-[#0284C7] font-semibold text-sm" x-text="activeTab === 1 ? '−' : '+'"></span>
                </button>
                <div x-show="activeTab === 1" x-collapse class="pt-2 space-y-3">
                    <p class="text-xs text-slate-600 leading-relaxed font-light">
                        {{ $product->description ?? 'Formulasi perawatan kulit wajah khas Jepang dari Ryoki Skincare. Dirancang untuk memberikan kelembapan intensif, mencerahkan kulit secara merata, dan menjaga kesehatan skin barrier Anda.' }}
                    </p>
                    <div class="space-y-1.5 pt-2 border-t border-slate-100/80">
                        <p class="text-[11px] font-bold text-slate-800">Hidrasi Intensif</p>
                        <p class="text-[11px] text-slate-500 font-light">Menjaga kelembapan alami kulit sepanjang hari.</p>
                        <p class="text-[11px] font-bold text-slate-800 pt-1">Pencerah Alami</p>
                        <p class="text-[11px] text-slate-500 font-light">Meratakan warna kulit dan menyamarkan noda kusam.</p>
                    </div>
                </div>
            </div>

            <!-- Item 2: Cara Penggunaan -->
            <div class="border-b border-slate-100 py-3.5">
                <button @click="activeTab = activeTab === 2 ? null : 2" class="w-full flex justify-between items-center py-1.5 text-left font-bold text-xs text-slate-900">
                    <span>Cara Penggunaan</span>
                    <span class="text-[#0284C7] font-semibold text-sm" x-text="activeTab === 2 ? '−' : '+'"></span>
                </button>
                <div x-show="activeTab === 2" x-collapse class="pt-2 space-y-2.5">
                    <div class="flex items-start gap-2.5">
                        <span class="w-5 h-5 rounded-full bg-sky-50 text-[#0284C7] font-bold text-[10px] flex items-center justify-center border border-sky-100 shrink-0">01</span>
                        <p class="text-xs text-slate-600 font-light pt-0.5">Bersihkan wajah dengan pembersih yang lembut lalu keringkan.</p>
                    </div>
                    <div class="flex items-start gap-2.5">
                        <span class="w-5 h-5 rounded-full bg-sky-50 text-[#0284C7] font-bold text-[10px] flex items-center justify-center border border-sky-100 shrink-0">02</span>
                        <p class="text-xs text-slate-600 font-light pt-0.5">{{ $product->usage ?? 'Teteskan 2-3 tetes pada telapak tangan, lalu usapkan merata pada area wajah dan leher.' }}</p>
                    </div>
                    <div class="flex items-start gap-2.5">
                        <span class="w-5 h-5 rounded-full bg-sky-50 text-[#0284C7] font-bold text-[10px] flex items-center justify-center border border-sky-100 shrink-0">03</span>
                        <p class="text-xs text-slate-600 font-light pt-0.5">Tepuk perlahan hingga meresap sempurna sebelum menggunakan produk berikutnya.</p>
                    </div>
                </div>
            </div>

            <!-- Item 3: Komposisi & Ingredients -->
            <div class="pt-3.5">
                <button @click="activeTab = activeTab === 3 ? null : 3" class="w-full flex justify-between items-center py-1.5 text-left font-bold text-xs text-slate-900">
                    <span>Komposisi &amp; Ingredients</span>
                    <span class="text-[#0284C7] font-semibold text-sm" x-text="activeTab === 3 ? '−' : '+'"></span>
                </button>
                <div x-show="activeTab === 3" x-collapse class="pt-2 space-y-3">
                    @if($product->ingredients)
                        <div class="flex flex-wrap gap-1.5 pt-1">
                            @foreach(explode(',', $product->ingredients) as $ingredient)
                                <span class="px-2.5 py-1 rounded-md bg-slate-100/90 border border-slate-200/80 text-[11px] font-medium text-slate-700">
                                    {{ trim($ingredient) }}
                                </span>
                            @endforeach
                        </div>
                    @else
                        <p class="text-xs text-slate-500 font-mono bg-slate-50 p-3 rounded-lg border border-slate-100">
                            Aqua, Niacinamide, Alpha Arbutin, Collagen, Aloe Barbadensis Leaf Extract, Glycerin, Phenoxyethanol.
                        </p>
                    @endif

                    <p class="text-[10px] text-slate-400 font-medium pt-1">✓ BPOM RI Certified · Dermatology Tested</p>
                </div>
            </div>

        </div>

    </div>

    <!-- ═══════════════════════════════════════════════════════════
         RELATED PRODUCTS SECTION (2-Column Mobile Grid)
         ═══════════════════════════════════════════════════════════ -->
    @if(isset($relatedProducts) && $relatedProducts->count() > 0)
    <section class="space-y-5 pt-6 border-t border-slate-200/70">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-lg sm:text-2xl font-bold font-heading text-slate-900">Produk Skincare Serupa</h2>
                <p class="text-xs text-slate-400 font-light mt-0.5">Rangkaian perawatan kulit terbaik Ryoki Skincare</p>
            </div>
            <a href="{{ route('products.index') }}"
               class="inline-flex items-center gap-1 text-xs font-semibold text-[#0284C7] hover:text-[#0369A1] transition-colors">
                Lihat Semua
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3.5 sm:gap-6">
            @foreach($relatedProducts as $related)
                <x-product-card :product="$related" />
            @endforeach
        </div>
    </section>
    @endif

</div>
@endsection
