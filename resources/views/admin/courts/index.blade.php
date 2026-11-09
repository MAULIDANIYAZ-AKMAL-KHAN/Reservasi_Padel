@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-16">
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 mb-10">
        <div>
            <span class="text-gold uppercase tracking-[0.2em] text-xs font-semibold">Admin Panel</span>
            <h1 class="font-luxury text-3xl font-bold text-white mt-1">Manajemen Master Lapangan Padel</h1>
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ route('admin.bookings.index') }}" class="border border-white/20 text-white px-5 py-2.5 rounded-xl text-xs font-semibold tracking-wider uppercase hover:bg-white/10 transition">
                Kelola Transaksi Booking
            </a>
            <a href="{{ route('admin.courts.create') }}" class="bg-gradient-to-r from-gold-dark via-gold to-gold-light text-black font-bold px-6 py-2.5 rounded-xl text-xs tracking-wider uppercase shadow-lg hover:opacity-90 transition">
                + Tambah Lapangan
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-emerald-950/40 border border-emerald-500/50 text-emerald-300 p-4 rounded-xl text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-[#121212] border border-white/10 rounded-3xl overflow-hidden shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-white/10 bg-[#181818] text-gray-400 text-xs uppercase tracking-wider">
                        <th class="p-5">Foto</th>
                        <th class="p-5">Nama Lapangan</th>
                        <th class="p-5">Tipe</th>
                        <th class="p-5">Tarif / Jam</th>
                        <th class="p-5 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5 text-sm">
                    @forelse($courts as $court)
                    <tr class="hover:bg-white/[0.02] transition">
                        <td class="p-5 w-24">
                            <div class="w-16 h-12 rounded-lg overflow-hidden bg-neutral-900 border border-white/10">
                                @if($court->image)
                                    <img src="{{ asset('storage/' . $court->image) }}" alt="{{ $court->name }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-[10px] text-gray-600 italic">No Img</div>
                                @endif
                            </div>
                        </td>
                        <td class="p-5">
                            <span class="font-bold text-white block">{{ $court->name }}</span>
                            <span class="text-gray-500 text-xs line-clamp-1">{{ $court->description }}</span>
                        </td>
                        <td class="p-5">
                            <span class="bg-white/5 border border-white/10 text-gold px-3 py-1 rounded-full text-xs font-semibold uppercase">
                                {{ $court->type }}
                            </span>
                        </td>
                        <td class="p-5 text-gold font-bold">Rp {{ number_format($court->price_per_hour, 0, ',', '.') }}</td>
                        <td class="p-5 text-center">
                            <div class="flex items-center justify-center gap-3">
                                <a href="{{ route('admin.courts.show', $court->id) }}" class="text-gray-400 hover:text-white text-xs font-semibold uppercase tracking-wider transition">Detail</a>
                                <a href="{{ route('admin.courts.edit', $court->id) }}" class="text-gold hover:underline text-xs font-semibold uppercase tracking-wider transition">Edit</a>
                                <form action="{{ route('admin.courts.destroy', $court->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus lapangan ini?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:text-red-300 text-xs font-semibold uppercase tracking-wider transition">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="p-8 text-center text-gray-500 italic">Belum ada data lapangan padel yang terdaftar.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-5 border-t border-white/10">
            {{ $courts->links() }}
        </div>
    </div>
</div>
@endsection