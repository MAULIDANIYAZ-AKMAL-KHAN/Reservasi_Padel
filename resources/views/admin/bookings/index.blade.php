@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-12">
    <!-- Header Halaman & Tombol Navigasi Admin -->
    <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-4 mb-8">
        <div>
            <span class="text-gold uppercase tracking-[0.2em] text-xs font-semibold">Admin Panel</span>
            <h1 class="font-luxury text-3xl font-bold text-white mt-1">Manajemen Reservasi</h1>
        </div>

        <!-- Grup Tombol Aksi di Samping Kanan -->
        <div class="flex flex-wrap items-center gap-3">
            <!-- Tombol Tambah Katalog Arena -->
            <a href="{{ route('admin.courts.create') }}" class="px-4 py-2.5 bg-gradient-to-r from-amber-300 via-gold to-amber-600 text-black font-bold text-xs uppercase tracking-wider rounded-xl shadow-lg hover:opacity-95 transition flex items-center gap-2">
                <span>➕</span> Tambah Arena
            </a>

            <!-- Tombol Kelola / Daftar Arena -->
            <a href="{{ route('admin.courts.index') }}" class="px-4 py-2.5 bg-[#181818] border border-gold/40 text-gold hover:bg-gold hover:text-black font-semibold text-xs uppercase tracking-wider rounded-xl transition flex items-center gap-2">
                <span>⚙️</span> Daftar Arena
            </a>

            <!-- Tombol Kembali ke Beranda -->
            <a href="{{ route('home') }}" class="px-4 py-2.5 bg-[#181818] border border-white/10 rounded-xl text-gray-300 hover:text-white text-xs uppercase tracking-wider font-medium transition flex items-center gap-2">
                &larr; Kembali ke Beranda
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-emerald-950/40 border border-emerald-500/50 text-emerald-300 p-4 rounded-xl text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-[#121212] border border-white/10 rounded-3xl shadow-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-white/10 text-gray-400 text-xs uppercase tracking-wider bg-[#181818]/50">
                        <th class="p-5">ID / Pemesan</th>
                        <th class="p-5">Lapangan & Jadwal</th>
                        <th class="p-5">Total Harga</th>
                        <th class="p-5">Status</th>
                        <th class="p-5 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 text-sm text-gray-300">
                    @forelse($bookings as $booking)
                        <tr class="hover:bg-white/[0.02] transition">
                            <td class="p-5">
                                <div class="font-bold text-white">#{{ $booking->id }} - {{ $booking->customer_name }}</div>
                                <div class="text-xs text-gray-400 mt-0.5">{{ $booking->customer_phone }}</div>
                            </td>
                            <td class="p-5">
                                @foreach($booking->details as $detail)
                                    <div class="font-medium text-white">{{ $detail->court->name ?? 'Lapangan Dihapus' }}</div>
                                    <div class="text-xs text-gray-400 mt-0.5">
                                        {{ $booking->booking_date }} | {{ $detail->start_time }} ({{ $detail->duration_hours }} Jam)
                                    </div>
                                @endforeach
                            </td>
                            <td class="p-5 font-semibold text-gold">
                                Rp {{ number_format($booking->total_price, 0, ',', '.') }}
                            </td>
                            <td class="p-5">
                                @php
                                    $statusClasses = [
                                        'Pending' => 'bg-amber-500/10 text-amber-400 border-amber-500/30',
                                        'Lunas'   => 'bg-emerald-500/10 text-emerald-400 border-emerald-500/30',
                                        'Batal'   => 'bg-red-500/10 text-red-400 border-red-500/30',
                                    ];
                                @endphp
                                <span class="px-3 py-1 rounded-full text-xs font-semibold border {{ $statusClasses[$booking->status] ?? 'bg-gray-500/10 text-gray-400 border-gray-500/30' }}">
                                    {{ $booking->status }}
                                </span>
                            </td>
                            <td class="p-5 text-center">
                                <form action="{{ route('admin.bookings.updateStatus', $booking->id) }}" method="POST" class="inline-flex items-center gap-2">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" onchange="this.form.submit()" class="bg-[#181818] border border-white/10 rounded-lg px-3 py-1.5 text-xs text-white focus:outline-none focus:border-gold">
                                        <option value="Pending" {{ $booking->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="Lunas" {{ $booking->status == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                                        <option value="Batal" {{ $booking->status == 'Batal' ? 'selected' : '' }}>Batal</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-10 text-center text-gray-500">
                                Belum ada data riwayat pemesanan lapangan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-6 border-t border-white/10">
            {{ $bookings->links() }}
        </div>
    </div>
</div>
@endsection