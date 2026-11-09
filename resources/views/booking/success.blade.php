@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-6 py-16">
    <div class="bg-[#121212] border border-white/10 p-10 rounded-3xl shadow-2xl text-center relative">
        <div class="w-16 h-16 bg-gold/10 border border-gold text-gold rounded-full flex items-center justify-center mx-auto mb-6 text-2xl font-bold">
            ✓
        </div>

        <span class="text-gold uppercase tracking-[0.2em] text-xs font-semibold">Booking Confirmed</span>
        <h1 class="font-luxury text-3xl font-bold text-white mt-2 mb-2">Reservasi Berhasil Diajukan</h1>
        <p class="text-gray-400 text-sm mb-8">Terima kasih. Pesanan Anda kini berstatus <span class="text-gold font-semibold">Pending</span> menunggu verifikasi pembayaran.</p>

        <!-- Detail Invoice -->
        <div class="bg-[#181818] border border-white/5 rounded-2xl p-6 text-left space-y-4 mb-8">
            <div class="flex justify-between border-b border-white/5 pb-3">
                <span class="text-gray-400 text-sm">Kode Booking</span>
                <span class="text-white font-mono font-bold">#PRV-{{ $booking->id }}</span>
            </div>
            <div class="flex justify-between border-b border-white/5 pb-3">
                <span class="text-gray-400 text-sm">Nama Pemesan</span>
                <span class="text-white font-medium">{{ $booking->customer_name }}</span>
            </div>
            <div class="flex justify-between border-b border-white/5 pb-3">
                <span class="text-gray-400 text-sm">No. Telepon / WhatsApp</span>
                <span class="text-white font-medium">{{ $booking->customer_phone }}</span>
            </div>
            <div class="flex justify-between border-b border-white/5 pb-3">
                <span class="text-gray-400 text-sm">Tanggal & Waktu</span>
                <span class="text-white font-medium">{{ $booking->booking_date }} | {{ $booking->details->first()->start_time ?? '-' }}</span>
            </div>
            <div class="flex justify-between border-b border-white/5 pb-3">
                <span class="text-gray-400 text-sm">Arena Lapangan</span>
                <span class="text-gold font-medium">{{ $booking->details->first()->court->name ?? '-' }}</span>
            </div>
            <div class="flex justify-between pt-1">
                <span class="text-gray-400 font-semibold text-sm">Total Biaya</span>
                <span class="text-gold font-bold text-lg">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</span>
            </div>
        </div>

        <!-- Tombol Navigasi & Aksi -->
        <div class="flex flex-wrap gap-4 justify-center items-center">
            <a href="{{ route('home') }}" class="border border-white/20 text-white px-6 py-3 rounded-xl text-xs font-semibold uppercase tracking-wider hover:bg-white/10 transition">
                Kembali ke Beranda
            </a>
            
            <a href="{{ route('booking.create') }}" class="bg-gold text-black px-6 py-3 rounded-xl text-xs font-bold uppercase tracking-wider hover:opacity-90 transition">
                Pesan Lagi
            </a>

            <!-- Tombol Khusus Admin (Hanya Tampil Jika Role Admin) -->
            @auth
                @if(Auth::user()->role === 'admin')
                    <a href="{{ route('admin.bookings.index') }}" class="bg-gradient-to-r from-amber-300 via-gold to-amber-600 text-black px-6 py-3 rounded-xl text-xs font-bold uppercase tracking-wider shadow-lg hover:opacity-95 transition">
                        Kelola Booking
                    </a>
                @endif
            @endauth
        </div>
    </div>
</div>
@endsection