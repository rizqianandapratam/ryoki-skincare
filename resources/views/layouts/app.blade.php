<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ isset($title) ? $title . ' — Admin Ryoki Skincare' : 'Admin Panel — Ryoki Skincare' }}</title>

        <!-- Favicons -->
        <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

        <!-- Fonts & Performance Preconnects -->
        <link rel="dns-prefetch" href="//fonts.googleapis.com">
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">

        <!-- Custom CSS & Vite -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @stack('styles')
    </head>
    <body class="font-sans antialiased bg-[#F6F9FC] text-[#334155] min-h-screen flex flex-col justify-between selection:bg-sky-100 selection:text-[#0284C7]">
        <div class="min-h-screen flex flex-col">
            @include('layouts.navigation')

            <!-- Page Heading Banner -->
            @isset($header)
                <header class="bg-white border-b border-slate-200/80 shadow-xs">
                    <div class="max-w-7xl mx-auto py-5 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="flex-grow py-8">
                {{ $slot }}
            </main>

            <!-- Admin Footer -->
            <footer class="bg-white border-t border-slate-200/80 py-4 text-center text-xs text-slate-400">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-2">
                    <p>&copy; {{ date('Y') }} <strong>Ryoki Skincare</strong> — PT Golden Intan Berlian. All rights reserved.</p>
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-sky-50 text-[#0284C7] font-semibold text-[11px] border border-sky-100">
                        Admin Dashboard v2.0
                    </span>
                </div>
            </footer>
        </div>
        @stack('scripts')
    </body>
</html>
