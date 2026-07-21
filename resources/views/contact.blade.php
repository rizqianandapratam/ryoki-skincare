@extends('layouts.public')

@section('title', 'Ryoki Skincare - Hubungi Kami')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <!-- Header Bento Box -->
        <div class="bento-card flex flex-col items-center justify-center text-center mb-8 py-12 relative overflow-hidden group">
            <div class="absolute inset-0 bg-[#CCFF00] opacity-5 filter blur-[100px] rounded-full transform group-hover:scale-110 transition-transform duration-1000"></div>
            <div class="inline-flex items-center px-3 py-1 rounded-full border border-white/10 bg-white/5 text-neon font-mono text-xs font-semibold uppercase tracking-wider mb-6 relative z-10">
                <span class="w-2 h-2 rounded-full bg-[#CCFF00] mr-2 animate-pulse"></span>
                COMMS LINK
            </div>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 relative z-10">Pusat Bantuan & Kontak</h1>
            <p class="text-lg text-muted max-w-2xl mx-auto relative z-10 font-light">Tim kami siap memberikan informasi dan bantuan terbaik untuk perjalanan perawatan kulitmu.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">

            <!-- Contact Information & Map Bento -->
            <div class="bento-card p-8 md:p-10 flex flex-col h-full">
                <span class="text-neon font-mono text-xs uppercase mb-4 block">[ CONTACT_INFO ]</span>
                <h2 class="text-2xl font-bold text-white mb-8">Informasi Kontak</h2>

                <div class="space-y-6 mb-10 flex-grow">
                    <div class="flex items-start group">
                        <div class="flex-shrink-0 w-12 h-12 bg-white/5 border border-white/10 rounded-xl flex items-center justify-center group-hover:bg-[#CCFF00]/10 transition-colors">
                            <svg class="w-6 h-6 text-neon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.243-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-white">Official Address</h3>
                            <p class="mt-1 text-muted">PT Golden Intan Berlian<br>Jl. Griya Harapan No. 12, Way Halim Permai<br>Bandar Lampung, Indonesia</p>
                        </div>
                    </div>

                    <div class="flex items-start group">
                        <div class="flex-shrink-0 w-12 h-12 bg-white/5 border border-white/10 rounded-xl flex items-center justify-center group-hover:bg-[#CCFF00]/10 transition-colors">
                            <svg class="w-6 h-6 text-neon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-white">WhatsApp Hotline</h3>
                            <p class="mt-1 text-muted">+62 896-9188-0237<br><span class="text-xs font-mono">AKTIF: SENIN-SABTU (09:00 - 16 :00)</span></p>
                        </div>
                    </div>

                    <div class="flex items-start group">
                        <div class="flex-shrink-0 w-12 h-12 bg-white/5 border border-white/10 rounded-xl flex items-center justify-center group-hover:bg-[#CCFF00]/10 transition-colors">
                            <svg class="w-6 h-6 text-neon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-bold text-white">Email Support</h3>
                            <p class="mt-1 text-muted font-mono text-sm">hello@ryokiskincare.com</p>
                        </div>
                    </div>
                </div>

                <!-- Maps Placeholder -->
                <div class="rounded-xl overflow-hidden shadow-sm h-48 bg-[#020617] border border-white/10 relative group">
                    <div class="absolute inset-0 flex items-center justify-center text-muted flex-col group-hover:text-neon transition-colors">
                        <svg class="w-8 h-8 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                        <p class="font-mono text-xs uppercase">[PETA_LOKASI: OFFLINE]</p>
                    </div>
                </div>
            </div>

            <!-- Contact Form Bento -->
            <div class="bento-card p-8 md:p-10 h-full">
                <span class="text-neon font-mono text-xs uppercase mb-4 block">[ CONNECT_WITH_US ]</span>
                <h2 class="text-2xl font-bold text-white mb-6">Kirim Pesan</h2>

                @if(session('success'))
                    <div class="bg-[#CCFF00]/10 border border-[#CCFF00]/30 text-neon px-4 py-3 rounded-xl mb-6 flex items-start font-mono text-sm">
                        <svg class="w-5 h-5 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <p>[SUCCESS] {{ session('success') }}</p>
                    </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <label for="name" class="block text-xs font-mono text-muted mb-2 uppercase">Nama Lengkap</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="contact-input w-full rounded-xl transition shadow-sm @error('name') border-red-500 @enderror" style="padding: 0.65rem 1rem;" required>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1 font-mono">[ERROR] {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">
                        <div>
                            <label for="email" class="block text-xs font-mono text-muted mb-2 uppercase">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" class="contact-input w-full rounded-xl transition shadow-sm @error('email') border-red-500 @enderror" style="padding: 0.65rem 1rem;" required>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1 font-mono">[ERROR] {{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="phone" class="block text-xs font-mono text-muted mb-2 uppercase">No. HP</label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="contact-input w-full rounded-xl transition shadow-sm" style="padding: 0.65rem 1rem;">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="message" class="block text-xs font-mono text-muted mb-2 uppercase">Pesan Anda</label>
                        <textarea name="message" id="message" rows="5" class="contact-input w-full rounded-xl transition shadow-sm @error('message') border-red-500 @enderror" style="padding: 0.65rem 1rem;" required>{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-500 text-xs mt-1 font-mono">[ERROR] {{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn-premium btn-premium-neon w-full justify-center">
                        KIRIM PESAN ↗
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
