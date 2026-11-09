@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto px-6 py-20">
    <div class="bg-[#121212] border border-white/10 p-10 rounded-3xl shadow-2xl relative overflow-hidden">
        <div class="absolute top-0 right-0 w-48 h-48 bg-gold/5 rounded-full blur-3xl pointer-events-none"></div>

        <div class="text-center mb-8">
            <span class="text-gold uppercase tracking-[0.2em] text-xs font-semibold">New Account</span>
            <h1 class="font-luxury text-3xl font-bold text-white mt-2">Registrasi Admin</h1>
            <p class="text-gray-400 text-sm mt-1">Dapatkan akses kontrol penuh manajemen Padel.</p>
        </div>

        @if ($errors->any())
            <div class="mb-6 bg-red-950/40 border border-red-500/50 text-red-300 p-4 rounded-xl text-sm">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-xs uppercase tracking-wider text-gray-400 mb-2 font-medium">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" required 
                    class="w-full bg-[#181818] border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold transition">
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-gray-400 mb-2 font-medium">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" required 
                    class="w-full bg-[#181818] border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold transition">
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-gray-400 mb-2 font-medium">Password</label>
                <input type="password" name="password" required 
                    class="w-full bg-[#181818] border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold transition">
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-gray-400 mb-2 font-medium">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required 
                    class="w-full bg-[#181818] border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold transition">
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-amber-300 via-gold to-amber-600 text-black font-bold uppercase tracking-wider py-4 rounded-xl shadow-xl hover:opacity-95 transition text-sm">
                Daftar & Masuk
            </button>
        </form>

        <div class="text-center mt-6 text-sm text-gray-400">
            Sudah punya akun? <a href="{{ route('login') }}" class="text-gold hover:underline">Masuk di sini</a>
        </div>
    </div>
</div>
@endsection