@extends('layouts.public')

@section('title', 'Tentang Ryoki Skincare — PT Golden Intan Berlian')
@section('meta_description', 'Kenali filosofi, dedikasi, dan standar kualitas di balik Ryoki Skincare. Formulasi aman BPOM oleh PT Golden Intan Berlian, Bandar Lampung.')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 space-y-16">

    <!-- Hero Header -->
    <div class="bg-gradient-to-r from-sky-50 via-blue-50 to-white border border-sky-100 rounded-3xl p-8 md:p-14 text-center space-y-4 max-w-5xl mx-auto shadow-xs">
        <p class="text-xs font-semibold uppercase tracking-widest text-[#0284C7]">Filosofi Kecantikan Jepang</p>
        <h1 class="text-3xl md:text-5xl font-bold font-heading text-slate-900 leading-tight">
            Merawat Kesehatan Skin Barrier Anda Setiap Hari
        </h1>
        <p class="text-slate-600 font-light text-base md:text-lg max-w-2xl mx-auto leading-relaxed">
            Ryoki Skincare hadir untuk mengembalikan kepercayaan diri Anda melalui formulasi perawatan kulit yang jujur, aman, dan teruji secara klinis.
        </p>
    </div>

    <!-- Story Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
        <div class="lg:col-span-6 space-y-5">
            <h2 class="text-3xl font-bold font-heading text-slate-900 leading-tight">
                Berawal dari Komitmen Terhadap Kualitas & Keamanan
            </h2>
            <div class="space-y-4 text-slate-600 font-light text-sm leading-relaxed">
                <p>
                    Ryoki Skincare didirikan di bawah naungan <strong class="text-slate-800 font-medium">PT Golden Intan Berlian</strong> di Bandar Lampung. Kami berdiri dari kepedulian terhadap banyaknya produk perawatan kulit di pasaran yang menjanjikan hasil instan namun merusak <em>skin barrier</em> dalam jangka panjang.
                </p>
                <p>
                    Kami percaya bahwa kecantikan sejati berasal dari sistem kulit yang sehat dan seimbang. Oleh karena itu, Ryoki diformulasikan dengan memadukan kebaikan bahan alami bersertifikat dan inovasi sains kecantikan Jepang untuk hasil yang tahan lama tanpa risiko iritasi.
                </p>
                <p>
                    Kini, Ryoki Skincare menjadi salah satu pilihan favorit di TikTok Shop Indonesia, dipercaya oleh ribuan pelanggan untuk merawat kesehatan kulit mereka sehari-hari.
                </p>
            </div>
        </div>

        <div class="lg:col-span-6">
            <div class="rounded-3xl overflow-hidden shadow-lg border border-slate-200 aspect-[4/3] relative">
                <img src="{{ asset('images/hero-banner.png') }}" alt="Ryoki Skincare Story" class="w-full h-full object-cover">
            </div>
        </div>
    </div>

    <!-- Vision & Mission -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="bg-white p-8 md:p-10 rounded-3xl border border-slate-200 shadow-sm space-y-4">
            <h3 class="text-2xl font-bold font-heading text-slate-900">Visi Perusahaan</h3>
            <p class="text-slate-600 font-light text-sm leading-relaxed">
                Menjadi brand skincare terpercaya pilihan utama masyarakat Indonesia yang dikenal atas integritas kualitas, keamanan BPOM, dan hasil nyata dalam merawat kecantikan alami kulit.
            </p>
        </div>

        <div class="bg-white p-8 md:p-10 rounded-3xl border border-slate-200 shadow-sm space-y-4">
            <h3 class="text-2xl font-bold font-heading text-slate-900">Misi Perusahaan</h3>
            <ul class="space-y-3 text-xs text-slate-600 font-light">
                <li class="flex items-start gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-[#0284C7] mt-1.5 shrink-0"></span> Memformulasikan produk skincare aman bersertifikat BPOM RI.</li>
                <li class="flex items-start gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-[#0284C7] mt-1.5 shrink-0"></span> Menggunakan bahan aktif pilihan tanpa zat berbahaya.</li>
                <li class="flex items-start gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-[#0284C7] mt-1.5 shrink-0"></span> Memberikan edukasi tepat seputar kesehatan kulit (Skinpedia).</li>
                <li class="flex items-start gap-2.5"><span class="w-1.5 h-1.5 rounded-full bg-[#0284C7] mt-1.5 shrink-0"></span> Menjamin kepuasan dan kemudahan akses produk melalui TikTok Shop Official.</li>
            </ul>
        </div>
    </div>

    <!-- Company Details -->
    <div class="bg-gradient-to-br from-[#E0F2FE] via-[#F0F9FF] to-white rounded-3xl p-8 md:p-12 text-center space-y-3 border border-sky-100 shadow-xs">
        <p class="text-xs font-semibold uppercase tracking-widest text-[#0284C7]">Identitas Perusahaan</p>
        <h2 class="text-2xl md:text-3xl font-bold font-heading text-slate-900">PT Golden Intan Berlian</h2>
        <p class="text-slate-600 text-sm font-light max-w-3xl mx-auto leading-relaxed">
            Jl. Griya Harapan No. 12, Way Halim Permai, Bandar Lampung, Lampung 35141, Indonesia.<br>
            Entitas resmi pengelola dan pengembang distribusi produk merek Ryoki Skincare di Indonesia.
        </p>
    </div>

</div>
@endsection
