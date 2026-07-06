@extends('layouts.public')

@section('title', 'Ryoki Skincare - Tentang Kami')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Header Bento Box -->
        <div class="bento-card flex flex-col items-center justify-center text-center mb-8 py-12 relative overflow-hidden group">
            <div class="absolute inset-0 bg-[#CCFF00] opacity-5 filter blur-[100px] rounded-full transform group-hover:scale-110 transition-transform duration-1000"></div>
            <div class="inline-flex items-center px-3 py-1 rounded-full border border-white/10 bg-white/5 text-neon font-mono text-xs font-semibold uppercase tracking-wider mb-6 relative z-10">
                <span class="w-2 h-2 rounded-full bg-[#CCFF00] mr-2 animate-pulse"></span>
                SYSTEM INFO
            </div>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 relative z-10">Cerita Ryoki Skincare</h1>
            <p class="text-lg text-muted max-w-2xl mx-auto relative z-10 font-light">Lebih dari sekadar perawatan kulit, kami hadir untuk mengembalikan kepercayaan diri Anda melalui sistem kulit yang sehat.</p>
        </div>

        <!-- Story Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div class="bento-card p-0 relative overflow-hidden group h-full min-h-[400px]">
                <div class="absolute inset-0 bg-[#CCFF00] opacity-20 filter blur-3xl transform group-hover:scale-125 transition-transform duration-1000"></div>
                <img src="https://placehold.co/800x1000/1E293B/CCFF00?text=SYS.STORY" alt="Ryoki Skincare Story" class="w-full h-full object-cover relative z-10 mix-blend-luminosity hover:mix-blend-normal transition duration-700">
                <div class="absolute inset-0 ring-1 ring-inset ring-white/10 z-20 rounded-[20px]"></div>
            </div>
            
            <div class="bento-card flex flex-col justify-center p-8 md:p-12">
                <span class="text-neon font-mono text-xs uppercase mb-4 block">[INIT: AWAL_MULA]</span>
                <h2 class="text-3xl font-bold text-white mb-6">Berawal dari Keresahan</h2>
                <div class="space-y-4 text-muted leading-relaxed">
                    <p>
                        Ryoki Skincare didirikan di bawah naungan <strong class="text-white">PT Golden Intan Berlian</strong> di Bandar Lampung, berawal dari keresahan melihat banyaknya produk perawatan kulit yang menjanjikan hasil instan namun merusak <em>skin barrier</em> dalam jangka panjang.
                    </p>
                    <p>
                        Kami percaya bahwa kecantikan sejati berasal dari sistem kulit yang stabil. Oleh karena itu, Ryoki diformulasikan dengan menggabungkan kebaikan bahan alami dan inovasi sains yang presisi untuk memberikan hasil optimal tanpa risiko.
                    </p>
                    <p>
                        Saat ini, Ryoki telah menjadi salah satu modul perawatan terpercaya di TikTok, membantu ribuan pengguna mengkalibrasi ulang kesehatan kulit mereka.
                    </p>
                </div>
            </div>
        </div>

        <!-- Visi Misi -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div class="bento-card p-8 md:p-10 group hover:border-neon/50 transition-colors">
                <div class="w-12 h-12 bg-white/5 border border-white/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-[#CCFF00]/10 transition-colors">
                    <svg class="w-6 h-6 text-neon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                </div>
                <h2 class="text-2xl font-bold text-white mb-4">Visi [SYS.VISION]</h2>
                <p class="text-muted leading-relaxed">
                    Menjadi protokol perawatan kulit lokal terpercaya yang mengedepankan integritas <em>skin barrier</em> dan memberdayakan setiap pengguna untuk tampil dengan versi terbaik mereka.
                </p>
            </div>

            <div class="bento-card p-8 md:p-10 group hover:border-neon/50 transition-colors">
                <div class="w-12 h-12 bg-white/5 border border-white/10 rounded-xl flex items-center justify-center mb-6 group-hover:bg-[#CCFF00]/10 transition-colors">
                    <svg class="w-6 h-6 text-neon" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h2 class="text-2xl font-bold text-white mb-4">Misi [SYS.MISSION]</h2>
                <ul class="text-muted leading-relaxed space-y-4">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-neon mr-3 mt-1 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span>Menghadirkan formulasi inovatif, aman (BPOM), dan berkualitas.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-neon mr-3 mt-1 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span>Edukasi perawatan kulit yang komprehensif untuk basis pengguna.</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="w-5 h-5 text-neon mr-3 mt-1 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span>Praktik operasional yang <em>cruelty-free</em> dan efisien.</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- PT Golden Intan Berlian -->
        <div class="bento-card p-8 md:p-12 text-center">
            <span class="text-neon font-mono text-xs uppercase mb-4 block">[ORG_INFO]</span>
            <h2 class="text-3xl font-bold text-white mb-6">Tentang PT Golden Intan Berlian</h2>
            <p class="text-lg text-muted leading-relaxed mb-6 max-w-4xl mx-auto">
                PT Golden Intan Berlian adalah entitas digital marketing dan distribusi logistik kecantikan yang berbasis di Jalan Griya Harapan No. 12, Way Halim Permai, Bandar Lampung. Dengan algoritma distribusi yang luas di ekosistem digital commerce, kami berkomitmen untuk mendeploy brand-brand unggulan di pasar nasional, dimulai dari <strong>Ryoki Skincare</strong>.
            </p>
        </div>
    </div>
@endsection
