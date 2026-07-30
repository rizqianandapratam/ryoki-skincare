@extends('layouts.public')

@section('title', 'Login Admin — Ryoki Skincare Official')

@section('content')
<div class="min-h-[75vh] flex flex-col items-center justify-center py-12 px-4">

    <div class="w-full max-w-md space-y-6">
        
        <!-- Header Brand Logo (Matches Official Public Header) -->
        <div class="text-center space-y-3">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-3 group">
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
            <p class="text-xs font-semibold uppercase tracking-widest text-[#0284C7]">Portal Admin Skincare</p>
        </div>

        <!-- Login Form Card -->
        <div class="bg-white p-8 sm:p-10 rounded-3xl border border-slate-200/80 shadow-sm space-y-6">
            
            <div class="space-y-1">
                <h2 class="text-xl font-bold font-heading text-slate-900">Selamat Datang Kembali</h2>
                <p class="text-xs text-slate-400 font-light">Masukan email dan password untuk masuk ke dashboard admin</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Alamat Email</label>
                    <input id="email"
                           type="email"
                           name="email"
                           value="{{ old('email') }}"
                           required
                           autofocus
                           autocomplete="username"
                           placeholder="admin@ryokiskincare.id"
                           class="w-full px-4 py-3 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#0284C7] focus:border-transparent transition-all bg-slate-50/50 text-slate-900" />
                    @error('email')
                        <p class="text-rose-500 text-xs font-medium mt-1.5 flex items-center gap-1">
                            ⚠️ {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Password</label>
                    <input id="password"
                           type="password"
                           name="password"
                           required
                           autocomplete="current-password"
                           placeholder="••••••••"
                           class="w-full px-4 py-3 text-sm rounded-xl border border-slate-200 focus:outline-none focus:ring-2 focus:ring-[#0284C7] focus:border-transparent transition-all bg-slate-50/50 text-slate-900" />
                    @error('password')
                        <p class="text-rose-500 text-xs font-medium mt-1.5 flex items-center gap-1">
                            ⚠️ {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between pt-1">
                    <label for="remember_me" class="inline-flex items-center gap-2 cursor-pointer">
                        <input id="remember_me" type="checkbox" name="remember" class="rounded text-[#0284C7] focus:ring-[#0284C7] w-4 h-4">
                        <span class="text-xs font-medium text-slate-600">Ingat Saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-xs font-semibold text-[#0284C7] hover:underline" href="{{ route('password.request') }}">
                            Lupa Password?
                        </a>
                    @endif
                </div>

                <div class="pt-2">
                    <button type="submit"
                            class="btn-ryoki btn-ryoki-primary w-full py-3.5 text-sm font-bold shadow-lg shadow-sky-500/20 justify-center rounded-xl hover:scale-[1.01] transition-transform">
                        Masuk ke Dashboard
                    </button>
                </div>
            </form>

            <div class="pt-4 border-t border-slate-100 text-center">
                <a href="{{ url('/') }}" class="text-xs font-semibold text-slate-400 hover:text-[#0284C7] transition-colors inline-flex items-center gap-1">
                    ← Kembali ke Website Utama
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
