<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Ryoki Skincare - Your Daily Glow')</title>
    <meta name="description" content="@yield('meta_description', 'Ryoki Skincare menghadirkan produk perawatan kulit terbaik untuk kulit sehat dan bercahaya.')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Scripts and Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine JS for interactions -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        .fade-in.appear {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body class="font-sans antialiased bg-[#020617] text-[#F8FAFC]">
    <!-- Navbar -->
    <nav x-data="{ mobileMenuOpen: false, scrolled: false }"
         @scroll.window="scrolled = (window.pageYOffset > 20) ? true : false"
         :class="{'navbar-glass': scrolled, 'bg-transparent py-2': !scrolled}"
         class="fixed w-full z-50 transition-all duration-300 top-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-white tracking-wider">RYOKI</a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex space-x-8">
                    <a href="{{ route('home') }}" class="text-gray-300 hover:text-[#CCFF00] px-3 py-2 text-sm font-medium transition">Beranda</a>
                    <a href="{{ route('about') }}" class="text-gray-300 hover:text-[#CCFF00] px-3 py-2 text-sm font-medium transition">Tentang Kami</a>
                    <a href="{{ route('products.index') }}" class="text-gray-300 hover:text-[#CCFF00] px-3 py-2 text-sm font-medium transition">Produk</a>
                    <a href="{{ route('articles.index') }}" class="text-gray-300 hover:text-[#CCFF00] px-3 py-2 text-sm font-medium transition">Artikel</a>
                    <a href="{{ route('contact.index') }}" class="text-gray-300 hover:text-[#CCFF00] px-3 py-2 text-sm font-medium transition">Kontak</a>
                </div>

                <div class="hidden md:flex items-center space-x-6">
                    <a href="https://www.tiktok.com/@ryokijapanskin?is_from_webapp=1&sender_device=pc" target="_blank" class="btn-premium btn-premium-neon shadow-sm text-sm">
                        TikTok Shop
                    </a>
                    @guest
                        <a href="{{ route('login') }}" class="nav-link btn btn-outline-light btn-sm font-mono px-3" style="border-radius: 8px; color: #CCFF00; border-color: rgba(204, 255, 0, 0.3);">LOGIN</a>
                    @endguest
                    @auth
                        <span class="text-white font-mono me-3">[ ADMIN: {{ Auth::user()->name }} ]</span>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-outline-danger btn-sm font-mono" style="color: #ef4444;">_LOGOUT</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden" style="display: none;">@csrf</form>
                    @endauth
                </div>

                <!-- Mobile menu button -->
                <div class="flex md:hidden items-center">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-white hover:text-[#CCFF00] focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" style="display: none;"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" class="md:hidden bg-[#1E293B] border-t border-white/5" style="display: none;">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-[#020617] hover:bg-[#CCFF00] transition">Beranda</a>
                <a href="{{ route('about') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-[#020617] hover:bg-[#CCFF00] transition">Tentang Kami</a>
                <a href="{{ route('products.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-[#020617] hover:bg-[#CCFF00] transition">Produk</a>
                <a href="{{ route('articles.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-[#020617] hover:bg-[#CCFF00] transition">Artikel</a>
                <a href="{{ route('contact.index') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-[#020617] hover:bg-[#CCFF00] transition">Kontak</a>
                <div class="border-t border-white/10 my-2 pt-2">
                    @guest
                        <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-mono hover:bg-white/5 transition" style="color: #CCFF00;">LOGIN</a>
                    @endguest
                    @auth
                        <div class="px-3 py-2 text-white font-mono text-sm">[ ADMIN: {{ Auth::user()->name }} ]</div>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-mobile').submit();" class="block px-3 py-2 rounded-md text-base font-mono text-red-500 hover:bg-white/5 transition">_LOGOUT</a>
                        <form id="logout-form-mobile" action="{{ route('logout') }}" method="POST" class="hidden" style="display: none;">@csrf</form>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="min-h-screen pt-20">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-[#020617] border-t border-white/5 text-gray-400 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Brand Info -->
                <div class="col-span-1 md:col-span-1">
                    <h2 class="text-2xl font-bold mb-4 tracking-wider text-white">RYOKI</h2>
                    <p class="text-sm leading-relaxed mb-4">
                        Pancarkan kilau alami kulitmu dengan rangkaian skincare dari Ryoki. Diformulasikan dengan bahan terbaik untuk semua jenis kulit.
                    </p>
                    <p class="text-xs font-mono text-gray-500">PT Golden Intan Berlian</p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-white">Tautan Cepat</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('home') }}" class="hover:text-[#CCFF00] transition">Beranda</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-[#CCFF00] transition">Tentang Kami</a></li>
                        <li><a href="{{ route('products.index') }}" class="hover:text-[#CCFF00] transition">Produk</a></li>
                        <li><a href="{{ route('articles.index') }}" class="hover:text-[#CCFF00] transition">Artikel</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-white">Hubungi Kami</h3>
                    <ul class="space-y-2 text-sm">
                        <li>Jl. Griya Harapan No. 12</li>
                        <li>Way Halim Permai, Bandar Lampung</li>
                        <li class="pt-2 font-mono">WA: +62 896-9188-0237</li>
                        <li>Email: hello@ryokiskincare.com</li>
                    </ul>
                </div>

                <!-- Social Media -->
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-white">Ikuti Kami</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 rounded-full bg-[#1E293B] border border-white/5 flex items-center justify-center hover:bg-[#CCFF00] hover:text-[#020617] transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" /></svg>
                        </a>
                        <a href="https://www.instagram.com/ryokiofficial.id?igsh=MWgyamFmbTV1c3h2Zw==" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full bg-[#1E293B] border border-white/5 flex items-center justify-center hover:bg-[#CCFF00] hover:text-[#020617] transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                        </a>
                        <a href="https://www.tiktok.com/@ryokijapanskin?is_from_webapp=1&sender_device=pc" target="_blank" class="w-10 h-10 rounded-full bg-[#1E293B] border border-white/5 flex items-center justify-center hover:bg-[#CCFF00] hover:text-[#020617] transition">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="border-t border-white/5 mt-12 pt-8 text-center text-sm text-gray-500 font-mono">
                <p>&copy; {{ date('Y') }} SYSTEM_RYOKI. ALL RIGHTS RESERVED.</p>
            </div>
        </div>
    </footer>

    <!-- Scroll Animation Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('appear');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.fade-in').forEach(element => {
                observer.observe(element);
            });
        });
    </script>
</body>
</html>
