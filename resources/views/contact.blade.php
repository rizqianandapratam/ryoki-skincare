@extends('layouts.public')

@section('title', 'Hubungi Ryoki Skincare — Customer Support & Konsultasi Produk')
@section('meta_description', 'Hubungi customer service Ryoki Skincare untuk konsultasi skincare, info pemesanan, kolaborasi bisnis, atau reseller. WhatsApp: +6282384991316. Email: ryokijapanskincaree@gmail.com.')
@section('meta_keywords', 'kontak ryoki skincare, customer service ryoki, whatsapp ryoki, konsultasi skincare, reseller ryoki skincare, pemesanan ryoki')

@push('head')
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
    "name": "Hubungi Kami",
    "item": "{{ route('contact.index') }}"
  }]
}
</script>
@endpush

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
        <div class="lg:col-span-5 space-y-4">

            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs flex items-start gap-4">
                <div class="w-10 h-10 rounded-xl bg-sky-50 text-[#0284C7] flex items-center justify-center shrink-0 border border-sky-100/60">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <div class="space-y-1">
                    <h3 class="font-bold text-slate-900 text-sm font-heading">Alamat Kantor Utama</h3>
                    <p class="text-xs text-slate-500 font-light leading-relaxed">
                        PT Golden Intan Berlian<br>
                        Jl. Griya Harapan No. 12, Way Halim Permai,<br>
                        Bandar Lampung, Indonesia.
                    </p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs flex items-start gap-4">
                <div class="w-10 h-10 rounded-xl bg-sky-50 text-[#0284C7] flex items-center justify-center shrink-0 border border-sky-100/60">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                    </svg>
                </div>
                <div class="space-y-1">
                    <h3 class="font-bold text-slate-900 text-sm font-heading">WhatsApp Customer Service</h3>
                    <p class="text-xs text-slate-500 font-light leading-relaxed">
                        <a href="https://wa.me/6282384991316" target="_blank" rel="noopener noreferrer" onclick="trackWhatsAppClick('Contact Page CS', null, 'Contact Page Info Card')" class="hover:text-[#0284C7] font-semibold transition-colors">
                            +62 823-8499-1316
                        </a>
                    </p>
                    <p class="text-[11px] text-slate-400 font-light">Jam Operasional: Senin – Sabtu (09.00 – 17.00 WIB)</p>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-200/80 shadow-xs flex items-start gap-4">
                <div class="w-10 h-10 rounded-xl bg-sky-50 text-[#0284C7] flex items-center justify-center shrink-0 border border-sky-100/60">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div class="space-y-1">
                    <h3 class="font-bold text-slate-900 text-sm font-heading">Email Layanan Pelanggan</h3>
                    <p class="text-xs text-slate-500 font-light">
                        <a href="mailto:ryokijapanskincaree@gmail.com" class="hover:text-[#0284C7] transition-colors">ryokijapanskincaree@gmail.com</a>
                    </p>
                </div>
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
