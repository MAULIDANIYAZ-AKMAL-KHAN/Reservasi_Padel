@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-6 py-16">
    <div class="bg-[#121212] border border-white/10 p-10 rounded-3xl shadow-2xl relative">
        <div class="mb-8">
            <a href="{{ route('admin.courts.index') }}" class="text-xs text-gray-400 hover:text-gold uppercase tracking-wider transition mb-2 inline-block">&larr; Kembali ke Daftar Lapangan</a>
            <h1 class="font-luxury text-3xl font-bold text-white mt-1">Edit Data Lapangan</h1>
            <p class="text-gray-400 text-sm mt-1">Perbarui informasi spesifikasi atau tarif lapangan.</p>
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

        <form action="{{ route('admin.courts.update', $court->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-xs uppercase tracking-wider text-gray-400 mb-2 font-medium">Nama Lapangan</label>
                <input type="text" name="name" value="{{ old('name', $court->name) }}" required 
                    class="w-full bg-[#181818] border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold transition">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs uppercase tracking-wider text-gray-400 mb-2 font-medium">Tipe Lapangan</label>
                    <select name="type" required class="w-full bg-[#181818] border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold transition">
                        <option value="Indoor" {{ old('type', $court->type) == 'Indoor' ? 'selected' : '' }}>Indoor</option>
                        <option value="Outdoor" {{ old('type', $court->type) == 'Outdoor' ? 'selected' : '' }}>Outdoor</option>
                        <option value="Panoramic" {{ old('type', $court->type) == 'Panoramic' ? 'selected' : '' }}>Panoramic</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs uppercase tracking-wider text-gray-400 mb-2 font-medium">Tarif per Jam (Rp)</label>
                    <input type="number" name="price_per_hour" value="{{ old('price_per_hour', $court->price_per_hour) }}" required min="0" 
                        class="w-full bg-[#181818] border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold transition">
                </div>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-gray-400 mb-2 font-medium">Deskripsi Fasilitas</label>
                <textarea name="description" rows="4" required 
                    class="w-full bg-[#181818] border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-gold transition">{{ old('description', $court->description) }}</textarea>
            </div>

            <div>
                <label class="block text-xs uppercase tracking-wider text-gray-400 mb-2 font-medium">Foto Saat Ini</label>
                @if($court->image)
                    <div class="mb-3 w-32 h-20 rounded-xl overflow-hidden border border-white/10 bg-neutral-900">
                        <img src="{{ asset('storage/' . $court->image) }}" alt="{{ $court->name }}" class="w-full h-full object-cover">
                    </div>
                @else
                    <p class="text-xs text-gray-500 italic mb-3">Belum ada foto yang diunggah.</p>
                @endif
                <label class="block text-xs uppercase tracking-wider text-gray-400 mb-2 font-medium">Ganti Foto Baru (Opsional)</label>
                <input type="file" name="image" accept="image/jpeg,image/png,image/jpg,image/webp" 
                    class="w-full bg-[#181818] border border-white/10 rounded-xl px-4 py-2 text-gray-400 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-semibold file:bg-gold file:text-black hover:file:opacity-90 transition">
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full bg-gradient-to-r from-gold-dark via-gold to-gold-light text-black font-bold uppercase tracking-wider py-4 rounded-xl shadow-xl hover:opacity-95 transition text-sm">
                    Perbarui Data Lapangan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection