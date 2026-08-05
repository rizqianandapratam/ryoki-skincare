{{--
    Reusable Product Card Component
    Usage: <x-product-card :product="$product" />
    Optional: <x-product-card :product="$product" :show-category="true" />
--}}

@props(['product', 'showCategory' => true])

@php
    $imgSrc = $product->image_url;
    $displayRating = $product->rating ? number_format($product->rating, 1) : '4.9';
@endphp

<div {{ $attributes->merge(['class' => 'relative skincare-card p-3 sm:p-5 flex flex-col justify-between group']) }}>
    <div>
        {{-- Product Image --}}
        <a href="{{ route('products.show', $product->slug) }}"
                     class="relative block w-full aspect-square sm:aspect-[4/5] rounded-xl overflow-hidden bg-slate-50 mb-2.5 border border-slate-100">
             <img src="{{ $imgSrc }}"
                 alt="{{ $product->name }}"
                 class="relative z-10 w-full h-full object-contain p-4 group-hover:scale-105 transition-transform duration-500"
                 loading="lazy">

            {{-- Best Seller Badge --}}
            @if($product->is_best_seller)
                <span class="absolute top-2 left-2 z-10 bg-gradient-to-r from-[#0284C7] to-[#0369A1] text-white text-[9px] sm:text-[10px] font-bold tracking-wide px-2 sm:px-2.5 py-0.5 sm:py-1 rounded-full shadow-md shadow-sky-500/25">
                    ★ BEST SELLER
                </span>
            @endif

            {{-- Category Badge --}}
            @if($showCategory && $product->category)
                <span class="absolute top-2 right-2 z-10 bg-white/90 backdrop-blur-sm text-[9px] sm:text-[10px] font-semibold text-slate-700 px-2 sm:px-2.5 py-0.5 sm:py-1 rounded-full border border-slate-200/80 shadow-sm capitalize">
                    {{ ucfirst($product->category) }}
                </span>
            @endif
        </a>

        {{-- Rating & Combined Sold Count --}}
        <div class="flex items-center gap-1.5 text-[11px] sm:text-xs mb-1">
            <span class="text-amber-500 font-bold">★ {{ $displayRating }}</span>
            <span class="text-slate-300">·</span>
            <span class="text-slate-500 text-[10px] sm:text-[11px] font-medium">
                {{ $product->sold_count >= 1000 ? number_format($product->sold_count / 1000, 1) . 'k' : number_format($product->sold_count) }}+ Terjual (Shopee &amp; TikTok)
            </span>
        </div>

        {{-- Product Name --}}
        <h3 class="text-xs sm:text-base font-bold text-slate-900 group-hover:text-[#0284C7] transition-colors mb-1 font-heading line-clamp-1 leading-snug">
            <a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
        </h3>

        {{-- Description --}}
        <p class="text-[11px] sm:text-xs text-slate-500 line-clamp-2 mb-3 font-light leading-relaxed">
            {{ $product->description }}
        </p>
    </div>

    <div>
        {{-- Price & Stock --}}
        <div class="flex items-center justify-between pt-2.5 border-t border-slate-100 mb-2.5">
            <span class="text-[10px] sm:text-[11px] text-slate-400 uppercase font-medium tracking-wide">Harga</span>
            <span class="text-xs sm:text-base font-bold text-[#0284C7]">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
        </div>

        {{-- CTA Buttons (TikTok Shop & Shopee Official - Soft Luxury Style) --}}
        <div class="grid grid-cols-2 gap-1.5">
            <a href="{{ $product->tiktok_url }}"
               target="_blank"
               rel="noopener noreferrer"
               onclick="trackTikTokClick('{{ addslashes($product->name) }}', {{ $product->id }}, 'Product Card Grid')"
               class="flex items-center justify-center gap-1 bg-slate-100 hover:bg-slate-900 text-slate-800 hover:text-white border border-slate-200/90 hover:border-slate-900 text-[10px] sm:text-[11px] font-bold py-2 sm:py-2.5 px-1.5 rounded-xl transition-all duration-300 shadow-2xs hover:shadow-md"
               title="Beli di TikTok Shop Official">
                <svg class="w-3 h-3 sm:w-3.5 sm:h-3.5 fill-current shrink-0" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/></svg>
                <span>TikTok</span>
            </a>
            <a href="{{ $product->shopee_url }}"
               target="_blank"
               rel="noopener noreferrer"
               onclick="trackShopeeClick('{{ addslashes($product->name) }}', {{ $product->id }}, 'Product Card Grid')"
               class="flex items-center justify-center gap-1 bg-orange-50 hover:bg-[#EE4D2D] text-[#EE4D2D] hover:text-white border border-orange-200/90 hover:border-[#EE4D2D] text-[10px] sm:text-[11px] font-bold py-2 sm:py-2.5 px-1.5 rounded-xl transition-all duration-300 shadow-2xs hover:shadow-md"
               title="Beli di Shopee Official Store">
                <svg class="w-3 h-3 sm:w-3.5 sm:h-3.5 fill-current shrink-0" viewBox="0 0 24 24"><path d="M19.77 7.06h-3.41V5.44C16.36 2.44 13.92 0 10.92 0S5.48 2.44 5.48 5.44v1.62H1.71L.12 21.61C-.07 22.9 1 24 2.29 24h16.89c1.29 0 2.36-1.1 2.17-2.39l-1.58-14.55zM7.48 5.44c0-1.9 1.54-3.44 3.44-3.44s3.44 1.54 3.44 3.44v1.62H7.48V5.44zm11.75 16.56H2.25L3.6 8.56h1.88v2.09c0 .55.45 1 1 1s1-.45 1-1V8.56h6.88v2.09c0 .55.45 1 1 1s1-.45 1-1V8.56h1.88l1.35 13.44z"/></svg>
                <span>Shopee</span>
            </a>
        </div>
    </div>
</div>
