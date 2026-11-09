@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-16">
    <div class="bg-[#121212] border border-white/10 p-10 rounded-3xl shadow-2xl relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-gold/5 rounded-full blur-3xl pointer-events-none"></div>

        <div class="text-center mb-10">
            <span class="text-gold uppercase tracking-[0.2em] text-xs font-semibold">Reservation Portal</span>
            <h1 class="font-luxury text-3xl font-bold text-white mt-2">Formulir Reservasi Lapangan</h1>
            <p class="text-gray-400 text-sm mt-1">Lengkapi detail di bawah untuk mengamankan jadwal sesi Anda.</p>
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

        <form action="{{ route('booking.store') }}" method="POST" class="space-y-6">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Pemesan -->
                <div>
                    <label class="block text-xs uppercase tracking-wider text-gray-400 mb-2 font-medium">Nama Lengkap</label>
                    <input type="text" name="customer_name" value="{{ old('customer_name') }}" required 
                        class="w-full bg-[#181818] border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold transition">
                </div>

                <!-- Nomor Telepon -->
                <div>
                    <label class="block text-xs uppercase tracking-wider text-gray-400 mb-2 font-medium">Nomor WhatsApp / Telepon</label>
                    <input type="text" name="customer_phone" value="{{ old('customer_phone') }}" required 
                        class="w-full bg-[#181818] border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold transition">
                </div>
            </div>

            <!-- Pilih Lapangan -->
            <div>
                <label class="block text-xs uppercase tracking-wider text-gray-400 mb-2 font-medium">Pilih Lapangan Padel</label>
                <select name="court_id" required class="w-full bg-[#181818] border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold transition">
                    <option value="">-- Pilih Arena Prestige --</option>
                    @foreach($courts as $court)
                        <option value="{{ $court->id }}" {{ (isset($selectedCourtId) && $selectedCourtId == $court->id) || old('court_id') == $court->id ? 'selected' : '' }}>
                            {{ $court->name }} (Rp {{ number_format($court->price_per_hour, 0, ',', '.') }}/jam)
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Tanggal Booking -->
                <div>
                    <label class="block text-xs uppercase tracking-wider text-gray-400 mb-2 font-medium">Tanggal Main</label>
                    <input type="date" name="booking_date" value="{{ old('booking_date') }}" min="{{ date('Y-m-d') }}" required 
                        class="w-full bg-[#181818] border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold transition [&::-webkit-calendar-picker-indicator]:filter [&::-webkit-calendar-picker-indicator]:invert [&::-webkit-calendar-picker-indicator]:opacity-80 hover:[&::-webkit-calendar-picker-indicator]:opacity-100 cursor-pointer">
                </div>

                <!-- Jam Mulai -->
                <div>
                    <label class="block text-xs uppercase tracking-wider text-gray-400 mb-2 font-medium">Jam Mulai</label>
                    <input type="time" name="start_time" value="{{ old('start_time') }}" required 
                        class="w-full bg-[#181818] border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold transition [&::-webkit-calendar-picker-indicator]:filter [&::-webkit-calendar-picker-indicator]:invert [&::-webkit-calendar-picker-indicator]:opacity-80 hover:[&::-webkit-calendar-picker-indicator]:opacity-100 cursor-pointer">
                </div>

                <!-- Durasi -->
                <div>
                    <label class="block text-xs uppercase tracking-wider text-gray-400 mb-2 font-medium">Durasi (Jam)</label>
                    <select name="duration_hours" required class="w-full bg-[#181818] border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold transition">
                        @for($i = 1; $i <= 8; $i++)
                            <option value="{{ $i }}" {{ old('duration_hours') == $i ? 'selected' : '' }}>{{ $i }} Jam</option>
                        @endfor
                    </select>
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full bg-gradient-to-r from-amber-300 via-gold to-amber-600 text-black font-bold uppercase tracking-wider py-4 rounded-xl shadow-xl hover:opacity-95 transition transform hover:-translate-y-0.5 text-sm">
                    Konfirmasi & Proses Reservasi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection