<?php

namespace App\Http\Controllers;

use App\Models\Court;
use App\Models\Booking;
use App\Models\BookingDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    // ========================================================
    // A. SISI PELANGGAN (CUSTOMER)
    // ========================================================

    /**
     * 1. Halaman Depan / Katalog Lapangan Padel
     */
    public function index()
    {
        $courts = Court::all();
        return view('home', compact('courts'));
    }

    /**
     * 2. Form Reservasi Lapangan
     */
    public function create(Request $request)
    {
        $courts = Court::all();
        $selectedCourtId = $request->query('court_id');

        return view('booking.create', compact('courts', 'selectedCourtId'));
    }

    /**
     * 3. Menyimpan Pengajuan Reservasi Pelanggan (Database Transaction)
     */
    public function store(Request $request)
    {
        // Validasi input pemesanan
        $validated = $request->validate([
            'customer_name'  => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'booking_date'   => 'required|date|after_or_equal:today',
            'court_id'       => 'required|exists:courts,id',
            'start_time'     => 'required',
            'duration_hours' => 'required|integer|min:1|max:8',
        ]);

        // Mengambil tarif lapangan
        $court = Court::findOrFail($validated['court_id']);

        // Menghitung Subtotal & Total Harga (Diperbaiki operator perkaliannya)
        $totalPrice = $court->price_per_hour * $validated['duration_hours'];

        // Menggunakan Database Transaction agar kedua tabel wajib berhasil tersimpan bersamaan
        $booking = DB::transaction(function () use ($validated, $totalPrice) {
            
            // 1. Simpan Header Transaksi (Tabel bookings - TANPA court_id)
            $newBooking = Booking::create([
                'customer_name'  => $validated['customer_name'],
                'customer_phone' => $validated['customer_phone'],
                'booking_date'   => $validated['booking_date'],
                'total_price'    => $totalPrice,
                'status'         => 'Pending', // Status awal selalu Pending
            ]);

            // 2. Simpan Detail Transaksi (Tabel booking_details - Menyimpan court_id & jam)
            BookingDetail::create([
                'booking_id'     => $newBooking->id,
                'court_id'       => $validated['court_id'],
                'start_time'     => $validated['start_time'],
                'duration_hours' => $validated['duration_hours'],
                'subtotal'       => $totalPrice,
            ]);

            return $newBooking;
        });

        return redirect()->route('booking.success', $booking->id);
    }

    /**
     * 4. Halaman Konfirmasi / Bukti Booking Sukses
     */
    public function success($id)
    {
        $booking = Booking::with('details.court')->findOrFail($id);
        return view('booking.success', compact('booking'));
    }


    // ========================================================
    // B. SISI ADMIN
    // ========================================================

    /**
     * 5. Menampilkan semua riwayat pesanan booking pelanggan
     */
    public function adminIndex()
    {
        $bookings = Booking::with('details.court')->latest()->paginate(10);
        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * 6. Menampilkan detail spesifik satu transaksi booking
     */
    public function adminShow(Booking $booking)
    {
        $booking->load('details.court');
        return view('admin.bookings.show', compact('booking'));
    }

    /**
     * 7. Mengubah Status Pembayaran Booking (Pending -> Lunas / Batal)
     */
    public function updateStatus(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'status' => 'required|in:Pending,Lunas,Batal',
        ]);

        $booking->update([
            'status' => $validated['status']
        ]);

        return redirect()->back()->with('success', 'Status booking berhasil diubah menjadi: ' . $validated['status']);
    }
}