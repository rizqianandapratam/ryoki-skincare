<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Ryoki Skincare — Admin Access</title>

        <!-- Favicon -->
        <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

        <!-- Fonts & Performance Preconnects -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700&family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Custom CSS & Vite -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-[#F6F9FC] text-[#334155] min-h-screen flex items-center justify-center p-4">

        <div class="w-full max-w-md space-y-6">
            
            <!-- Brand Logo (Matches Official Public Header) -->
            <div class="text-center space-y-2">
                <a href="{{ url('/') }}" class="inline-flex flex-col items-center gap-2 group">
                    <img src="{{ asset('images/logo.png') }}" alt="Ryoki Japan Skincare" class="h-16 w-auto object-contain group-hover:scale-105 transition-transform duration-200" />
                </a>
                <p class="text-xs font-semibold uppercase tracking-widest text-[#0284C7] pt-1">Portal Admin</p>
            </div>

            <div class="bg-white p-8 rounded-3xl border border-slate-200/80 shadow-sm space-y-4">
                {{ $slot }}
            </div>

            <div class="text-center">
                <a href="{{ url('/') }}" class="text-xs font-semibold text-slate-400 hover:text-[#0284C7] transition-colors">
                    ← Kembali ke Website Utama
                </a>
            </div>
        </div>
    </body>
</html>
