@extends('layouts.public')

@section('title', '404 Halaman Tidak Ditemukan — Ryoki Skincare')
@section('meta_description', 'Maaf, halaman yang Anda cari tidak ditemukan atau telah dipindahkan. Kembali ke beranda resmi Ryoki Skincare.')

@section('content')
<div class="min-h-[70vh] flex items-center justify-center px-4 py-16">
    <div class="max-w-xl mx-auto text-center space-y-6 bg-white p-8 sm:p-12 rounded-3xl border border-slate-200/80 shadow-md">
        
        <!-- Animated 404 Illustration Badge -->
        <div class="relative w-28 h-28 mx-auto flex items-center justify-center rounded-full bg-gradient-to-br from-sky-50 to-blue-100 border border-sky-200 text-[#0284C7] shadow-sm">
            <span class="text-4xl">💧</span>
            <span class="absolute -top-1 -right-1 bg-amber-400 text-slate-900 font-bold text-xs px-2.5 py-0.5 rounded-full shadow-xs">
                404
            </span>
        </div>

        <div class="space-y-3">
            <span class="text-xs font-bold text-[#0284C7] uppercase tracking-widest">Halaman Tidak Ditemukan</span>
            <h1 class="text-3xl sm:text-4xl font-bold font-playfair text-slate-900 leading-tight">
                Maaf, Halaman Yang Anda Cari Tidak Ada
            </h1>
            <p class="text-slate-500 font-light text-xs sm:text-sm leading-relaxed max-w-md mx-auto">
                Halaman ini mungkin telah dipindahkan, dihapus, atau tautan yang Anda masukkan kurang tepat. Mari kembali ke halaman utama untuk menjelajahi produk Ryoki Skincare.
            </p>
        </div>

        <!-- Quick Action Buttons -->
        <div class="pt-4 flex flex-col sm:flex-row gap-3 justify-center">
            <a href="{{ route('home') }}" class="btn-ryoki btn-ryoki-primary text-xs sm:text-sm px-8 py-3.5 shadow-md font-bold justify-center">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Kembali ke Beranda
            </a>
            <a href="{{ route('products.index') }}" class="btn-ryoki btn-ryoki-secondary text-xs sm:text-sm px-6 py-3.5 font-semibold justify-center">
                Katalog Skincare
            </a>
        </div>

        <div class="pt-6 border-t border-slate-100 text-[11px] text-slate-400 font-light">
            Butuh bantuan? <a href="https://wa.me/6282384991316" target="_blank" class="text-[#0284C7] font-semibold hover:underline">Hubungi Tim Customer Service Ryoki</a>
        </div>
    </div>
</div>
@endsection
