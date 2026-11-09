<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourtController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes - Sistem Reservasi Lapangan Padel
|--------------------------------------------------------------------------
*/

// ==========================================
// 1. RUTE AUTENTIKASI (LOGIN & REGISTER)
// ==========================================
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Proses Logout (Membutuhkan akses login)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


// ==========================================
// 2. RUTE PELANGGAN (PUBLIC / CUSTOMER)
// ==========================================
// Halaman utama (Katalog Lapangan)
Route::get('/', [BookingController::class, 'index'])->name('home');

// Form Pemesanan Lapangan & Proses Simpan
Route::get('/booking', [BookingController::class, 'create'])->name('booking.create');
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

// Halaman Konfirmasi / Bukti Booking Berhasil
Route::get('/booking/success/{id}', [BookingController::class, 'success'])->name('booking.success');


// ==========================================
// 3. RUTE ADMIN (DIPROTEKSI KETAT: AUTH & ADMIN)
// ==========================================
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // CRUD Master Lapangan (index, create, store, show, edit, update, destroy)
    Route::resource('courts', CourtController::class);

    // Manajemen Transaksi Booking
    Route::get('/bookings', [BookingController::class, 'adminIndex'])->name('bookings.index');
    Route::get('/bookings/{booking}', [BookingController::class, 'adminShow'])->name('bookings.show');
    
    // Update Status Pembayaran (Pending -> Lunas / Batal)
    Route::patch('/bookings/{booking}/status', [BookingController::class, 'updateStatus'])->name('bookings.updateStatus');
});