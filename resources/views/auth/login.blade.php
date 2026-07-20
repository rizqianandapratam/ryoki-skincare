@extends('layouts.public')

@section('title', 'Ryoki Skincare - Login')

@section('content')
<div class="min-h-[80vh] flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#020617]">
    <div class="w-full sm:max-w-md mt-6 px-8 py-10" style="background: #1E293B; border-radius: 20px; border: 1px solid rgba(255, 255, 255, 0.05); box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);">

        <div class="flex justify-center mb-8">
            <div class="inline-flex items-center px-3 py-1 rounded-full border border-white/10 bg-white/5 text-[#CCFF00] font-mono text-xs font-semibold uppercase tracking-wider relative z-10">
                <span class="w-2 h-2 rounded-full bg-[#CCFF00] mr-2 animate-pulse"></span>
                AUTH_PORTAL
            </div>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-5">
                <label for="email" class="block font-mono text-sm text-[#94A3B8] mb-2">[ EMAIL_ADDRESS ]</label>
                <input id="email" class="block mt-1 w-full bg-[#020617] text-white border border-white/10 rounded-lg px-4 py-2.5 focus:border-[#CCFF00] focus:ring focus:ring-[#CCFF00]/20 focus:outline-none transition-all font-sans" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
                @error('email')
                    <p class="text-red-500 text-xs font-mono mt-2">[ERROR: {{ $message }}]</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-5">
                <label for="password" class="block font-mono text-sm text-[#94A3B8] mb-2">[ PASSWORD ]</label>
                <input id="password" class="block mt-1 w-full bg-[#020617] text-white border border-white/10 rounded-lg px-4 py-2.5 focus:border-[#CCFF00] focus:ring focus:ring-[#CCFF00]/20 focus:outline-none transition-all font-sans" type="password" name="password" required autocomplete="current-password" />
                @error('password')
                    <p class="text-red-500 text-xs font-mono mt-2">[ERROR: {{ $message }}]</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="block mt-4 mb-6">
                <label for="remember_me" class="inline-flex items-center cursor-pointer group">
                    <input id="remember_me" type="checkbox" class="rounded bg-[#020617] border-white/10 text-[#CCFF00] shadow-sm focus:ring-[#CCFF00] focus:ring-offset-[#1E293B]" name="remember">
                    <span class="ms-2 text-sm text-[#94A3B8] font-mono group-hover:text-white transition">_REMEMBER_ME</span>
                </label>
            </div>

            <div class="flex items-center justify-between mt-4">
                @if (Route::has('password.request'))
                    <a class="text-xs font-mono text-[#94A3B8] hover:text-[#CCFF00] rounded-md focus:outline-none transition-colors" href="{{ route('password.request') }}">
                        [ FORGOT_PASSWORD? ]
                    </a>
                @endif

                <button type="submit" class="inline-flex items-center px-6 py-2.5 bg-[#CCFF00] border border-transparent rounded-lg font-mono text-sm text-[#020617] font-bold uppercase tracking-widest hover:bg-[#b3ff00] focus:bg-[#b3ff00] active:bg-[#99cc00] focus:outline-none focus:ring-2 focus:ring-[#CCFF00] focus:ring-offset-2 focus:ring-offset-[#1E293B] transition ease-in-out duration-150">
                    LOGIN
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
