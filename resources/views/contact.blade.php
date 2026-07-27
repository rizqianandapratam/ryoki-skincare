@extends('layouts.public')

@section('title', 'Hubungi Tim Ryoki Skincare — Customer Support')
@section('meta_description', 'Hubungi customer care Ryoki Skincare untuk konsultasi produk, layanan pelanggan, atau pemesanan grosir.')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-12">

    <!-- Header -->
    <div class="bg-gradient-to-r from-sky-50 via-blue-50 to-white border border-sky-100 rounded-3xl p-8 md:p-12 text-center space-y-3">
        <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold font-heading text-slate-900">
            Hubungi Tim Ryoki Skincare
        </h1>
        <p class="text-slate-600 font-light text-sm md:text-base max-w-xl mx-auto leading-relaxed">
            Kami siap membantu menjawab pertanyaan Anda seputar perawatan kulit, penggunaan produk, maupun pesanan.
        </p>
    </div>

    <!-- Contact Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

        <!-- Contact Info Cards -->
        <div class="lg:col-span-5 space-y-6">

            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs flex items-start gap-4">
                <div class="w-10 h-10 rounded-xl bg-sky-100 text-[#0284C7] flex items-center justify-center font-bold text-base shrink-0">📍</div>
                <div class="space-y-1">
                    <h3 class="font-bold text-slate-900 text-sm font-heading">Alamat Kantor Utama</h3>
                    <p class="text-xs text-slate-500 font-light leading-relaxed">
                        PT Golden Intan Berlian<br>
                        Jl. Griya Harapan No. 12, Way Halim Permai,<br>
                        Bandar Lampung, Indonesia.
                    </p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs flex items-start gap-4">
                <div class="w-10 h-10 rounded-xl bg-sky-100 text-[#0284C7] flex items-center justify-center font-bold text-base shrink-0">💬</div>
                <div class="space-y-1">
                    <h3 class="font-bold text-slate-900 text-sm font-heading">WhatsApp Customer Service</h3>
                    <p class="text-xs text-slate-500 font-light leading-relaxed">
                        +62 896-9188-0237<br>
                        <span class="text-slate-400">Jam Operasional: Senin – Sabtu (09.00 – 17.00 WIB)</span>
                    </p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-xs flex items-start gap-4">
                <div class="w-10 h-10 rounded-xl bg-sky-100 text-[#0284C7] flex items-center justify-center font-bold text-base shrink-0">✉️</div>
                <div class="space-y-1">
                    <h3 class="font-bold text-slate-900 text-sm font-heading">Email Layanan Pelanggan</h3>
                    <p class="text-xs text-slate-500 font-light">
                        hello@ryokiskincare.com
                    </p>
                </div>
            </div>

            <!-- Official Store Box -->
            <div class="bg-gradient-to-br from-[#0284C7] to-[#0369A1] text-white p-6 rounded-2xl space-y-3">
                <h3 class="font-bold text-base font-heading">Ingin Belanja Cepat?</h3>
                <p class="text-xs text-sky-100 font-light leading-relaxed">
                    Dapatkan penawaran menarik, diskon ongkir, dan gratis konsultasi langsung di Toko Resmi TikTok Shop Ryoki.
                </p>
                <a href="https://www.tiktok.com/@ryokijapanskin" target="_blank" class="btn-ryoki btn-ryoki-secondary text-xs w-full justify-center">
                    Buka TikTok Shop Official
                </a>
            </div>

        </div>

        <!-- Form Section -->
        <div class="lg:col-span-7">
            <div class="bg-white p-8 md:p-10 rounded-3xl border border-slate-200 shadow-sm space-y-6">
                <div>
                    <h2 class="text-2xl font-bold font-heading text-slate-900">Kirim Pesan Langsung</h2>
                    <p class="text-xs text-slate-500 font-light mt-1">Isi formulir di bawah ini dan tim kami akan membalas pesan Anda dalam 1x24 jam.</p>
                </div>

                @if(session('success'))
                    <div class="p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-xs font-medium flex items-center gap-2">
                        <span>✓</span> {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Contoh: Dina Nuraeni" required class="skincare-input w-full">
                        @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1.5">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="email@domain.com" required class="skincare-input w-full">
                            @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1.5">Nomor Telepon / WA (Opsional)</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" placeholder="08xxxxxxxxxx" class="skincare-input w-full">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1.5">Pesan / Pertanyaan Anda</label>
                        <textarea name="message" rows="5" placeholder="Tuliskan pertanyaan atau kendala Anda di sini..." required class="skincare-input w-full resize-none">{{ old('message') }}</textarea>
                        @error('message') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" class="btn-ryoki btn-ryoki-primary w-full py-3.5 text-sm font-bold shadow-md justify-center">
                        Kirim Pesan
                    </button>
                </form>
            </div>
        </div>

    </div>

</div>
@endsection
