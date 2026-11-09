<?php

namespace App\Http\Controllers;

use App\Models\Court;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourtController extends Controller
{
    /**
     * 1. Menampilkan daftar semua lapangan padel (Tabel Admin).
     */
    public function index()
    {
        $courts = Court::latest()->paginate(10);
        return view('admin.courts.index', compact('courts'));
    }

    /**
     * 2. Menampilkan form tambah lapangan baru.
     */
    public function create()
    {
        return view('admin.courts.create');
    }

    /**
     * 3. Menyimpan data lapangan baru ke database (disertai upload foto).
     */
    public function store(Request $request)
    {
        // Validasi input form
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'type'           => 'required|in:Indoor,Outdoor,Panoramic',
            'price_per_hour' => 'required|numeric|min:0',
            'description'    => 'required|string',
            'image'          => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Max 2MB
        ]);

        // Upload gambar jika ada
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('courts', 'public');
        }

        Court::create($validated);

        return redirect()->route('admin.courts.index')
                         ->with('success', 'Lapangan padel berhasil ditambahkan!');
    }

    /**
     * 4. Menampilkan detail spesifik satu lapangan.
     */
    public function show(Court $court)
    {
        return view('admin.courts.show', compact('court'));
    }

    /**
     * 5. Menampilkan form edit data lapangan.
     */
    public function edit(Court $court)
    {
        return view('admin.courts.edit', compact('court'));
    }

    /**
     * 6. Memperbarui data lapangan (dan mengganti gambar lama jika ada upload baru).
     */
    public function update(Request $request, Court $court)
    {
        // Validasi input form
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'type'           => 'required|in:Indoor,Outdoor,Panoramic',
            'price_per_hour' => 'required|numeric|min:0',
            'description'    => 'required|string',
            'image'          => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Jika ada upload gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama dari storage jika sebelumnya sudah ada
            if ($court->image && Storage::disk('public')->exists($court->image)) {
                Storage::disk('public')->delete($court->image);
            }

            // Simpan gambar baru
            $validated['image'] = $request->file('image')->store('courts', 'public');
        }

        $court->update($validated);

        return redirect()->route('admin.courts.index')
                         ->with('success', 'Data lapangan berhasil diperbarui!');
    }

    /**
     * 7. Menghapus data lapangan beserta filenya dari storage.
     */
    public function destroy(Court $court)
    {
        // Hapus file gambar dari storage jika ada
        if ($court->image && Storage::disk('public')->exists($court->image)) {
            Storage::disk('public')->delete($court->image);
        }

        $court->delete();

        return redirect()->route('admin.courts.index')
                         ->with('success', 'Lapangan padel berhasil dihapus!');
    }
}
