<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin — Ryoki Skincare Official</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS & Vite -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-[#F6F9FC] text-[#334155] min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md space-y-6">
        
        <!-- Brand Logo (Matches Official Public Header) -->
        <div class="text-center space-y-3">
            <a href="{{ url('/') }}" class="inline-flex items-center gap-3 group">
                <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-[#0284C7] to-[#38BDF8] flex items-center justify-center text-white shadow-md shadow-sky-500/25 group-hover:scale-105 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <div class="flex flex-col text-left">
                    <span class="text-2xl font-bold tracking-tight text-[#0F172A] font-heading leading-tight">RYOKI</span>
                    <span class="text-[10px] text-[#0284C7] font-semibold tracking-widest uppercase">Japan Skincare</span>
                </div>
            </a>
            <p class="text-xs font-semibold uppercase tracking-widest text-[#0284C7]">Admin Management Portal</p>
        </div>

        <!-- Login Card -->
        <div class="bg-white p-8 sm:p-10 rounded-3xl border border-slate-200/80 shadow-sm space-y-6">
            
            <div class="space-y-1">
                <h2 class="text-xl font-bold font-heading text-slate-900">Selamat Datang Kembali</h2>
                <p class="text-xs text-slate-400 font-light">Masukan kredensial akun administrator Anda</p>
            </div>

            @if ($errors->any())
                <div class="bg-rose-50 border border-rose-200 text-rose-700 px-4 py-3 rounded-2xl text-xs space-y-1">
                    @foreach ($errors->all() as $error)
                        <p class="flex items-center gap-1.5 font-medium">
                            <svg class="w-4 h-4 text-rose-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            {{ $error }}
                        </p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('admin.login') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Alamat Email</label>
                    <input type="email"
                           id="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           autofocus
                           placeholder="admin@ryokiskincare.id"
                           class="w-full px-4 py-3 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#0284C7] focus:border-transparent transition-all bg-slate-50/50">
                </div>

                <div>
                    <label for="password" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Password</label>
                    <input type="password"
                           id="password"
                           name="password"
                           required
                           placeholder="••••••••"
                           class="w-full px-4 py-3 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#0284C7] focus:border-transparent transition-all bg-slate-50/50">
                </div>

                <button type="submit"
                        class="btn-ryoki btn-ryoki-primary w-full py-3.5 text-sm font-bold shadow-lg shadow-sky-500/20 justify-center rounded-xl hover:scale-[1.01] transition-transform">
                    Masuk ke Dashboard
                </button>
            </form>

            <div class="pt-4 border-t border-slate-100 text-center">
                <a href="{{ url('/') }}" class="text-xs font-semibold text-slate-400 hover:text-[#0284C7] transition-colors inline-flex items-center gap-1">
                    ← Kembali ke Website Utama
                </a>
            </div>
        </div>

        <p class="text-center text-[11px] text-slate-400 font-light mt-6">
            &copy; {{ date('Y') }} PT Golden Intan Berlian. All rights reserved.
        </p>

    </div>

</body>
</html>
