@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-16">
    <div class="bg-[#121212] border border-white/10 rounded-3xl overflow-hidden shadow-2xl relative">
        <div class="h-80 overflow-hidden bg-neutral-900 relative">
            @if($court->image)
                <img src="{{ asset('storage/' . $court->image) }}" alt="{{ $court->name }}" class="w-full h-full object-cover">
            @else
                <div class="w-full h-full flex items-center justify-center text-gray-600 font-luxury italic">
                    Preview Tidak Tersedia
                </div>
            @endif
            <div class="absolute top-6 left-6">
                <a href="{{ route('admin.courts.index') }}" class="bg-black/70 backdrop-blur-md border border-white/10 text-white px-4 py-2 rounded-xl text-xs font-semibold uppercase tracking-wider hover:bg-gold hover:text-black transition">
                    &larr; Kembali
                </a>
            </div>
            <div class="absolute top-6 right-6 bg-black/70 backdrop-blur-md border border-white/10 text-gold text-xs px-4 py-2 rounded-xl uppercase tracking-wider font-semibold">
                {{ $court->type }}
            </div>
        </div>

        <div class="p-10 space-y-6">
            <div>
                <span class="text-xs text-gray-500 uppercase tracking-widest block mb-1">ID Arena #{{ $court->id }}</span>
                <h1 class="font-luxury text-3xl font-bold text-white">{{ $court->name }}</h1>
            </div>

            <div>
                <span class="text-xs uppercase tracking-wider text-gray-400 block mb-1 font-medium">Tarif Sewa per Jam</span>
                <span class="text-gold font-bold text-2xl">Rp {{ number_format($court->price_per_hour, 0, ',', '.') }}</span>
            </div>

            <div>
                <span class="text-xs uppercase tracking-wider text-gray-400 block mb-2 font-medium">Deskripsi & Fasilitas</span>
                <p class="text-gray-300 text-sm leading-relaxed bg-[#181818] border border-white/5 p-5 rounded-2xl">{{ $court->description }}</p>
            </div>

            <div class="flex items-center gap-4 pt-4 border-t border-white/10">
                <a href="{{ route('admin.courts.edit', $court->id) }}" class="bg-gold text-black px-6 py-3 rounded-xl text-xs font-bold uppercase tracking-wider hover:opacity-90 transition">
                    Edit Lapangan Ini
                </a>
                <form action="{{ route('admin.courts.destroy', $court->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus lapangan ini?');" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="border border-red-500/30 text-red-400 px-6 py-3 rounded-xl text-xs font-semibold uppercase tracking-wider hover:bg-red-950/40 transition">
                        Hapus Lapangan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection