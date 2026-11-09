🎾 Prestige Padel Club - System Reservasi Lapangan Padel

System Reservasi Lapangan Padel Eksklusif berbasis web yang dirancang dengan estetika Ultra-Luxury (Dark Theme & Gold Accent), dilengkapi dengan sistem autentikasi, otorisasi berbasis peran (RBAC / Role-Based Access Control), serta panel manajemen admin yang komprehensif.

✨ Fitur Utama

🌟 Sisi Pelanggan (Customer / Guest)

Luxury Aesthetic & Splash Screen: Desain eksklusif bertema hitam legam (#0a0a0a) dan aksen emas (#D4AF37) dilengkapi dengan animasi pembuka splash screen berdurasi 5 detik.

Katalog Lapangan Padel: Menampilkan pilihan arena padel (Indoor, Outdoor, Panoramic) beserta harga, fasilitas, dan deskripsi detail.

Form Reservasi Online: Kemudahan memesan lapangan padel dengan pemilihan tanggal dan durasi waktu secara dinamis.

Invoice & Status Booking: Ringkasan konfirmasi reservasi beserta rincian biaya dan status pembayaran.

🛡️ Sisi Admin (Admin Panel & Security)

Role-Based Access Control (RBAC): Proteksi rute menggunakan custom middleware IsAdmin untuk memisahkan hak akses user dan admin secara ketat.

Dynamic Navigation Bar: Tombol khusus "Kelola Booking" hanya akan muncul di navbar secara otomatis jika akun yang terautentikasi memiliki peran admin.

Manajemen Reservasi: Mengubah status transaksi secara langsung (Pending, Lunas, Batal).

Manajemen Katalog Arena: Fitur CRUD (Create, Read, Update, Delete) untuk mengelola data lapangan padel.

🛠️ Spesifikasi Teknologi (Tech Stack)

Framework Back-End: Laravel 12

Front-End Styling: Tailwind CSS (CDN / Vite)

Typography: Google Fonts (Playfair Display & Inter)

Database: MySQL

Environment: PHP 8.2+

🚀 Panduan Instalasi Proyek

Ikuti langkah-langkah berikut untuk menjalankan proyek di komputer lokal Anda:

1. Clone Repositori & Masuk ke Folder Proyek

git clone https://github.com/username/reservasi-padel.git
cd reservasi-padel


2. Install Dependensi PHP via Composer

composer install


3. Konfigurasi File Environment .env

Salin file .env.example menjadi .env:

cp .env.example .env


Buka file .env dan atur konfigurasi database MySQL Anda:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_reservasi_padel
DB_USERNAME=root
DB_PASSWORD=


4. Generate Application Key

php artisan key:generate


5. Eksekusi Migrasi & Database Seeder

Jalankan perintah ini untuk membuat tabel basis data beserta data awal master lapangan dan akun admin:

php artisan migrate:fresh --seed


6. Kredensial Akun Default

Role Admin:

Email: admin@gmail.com

Password: password123 (atau sesuai konfigurasi di DatabaseSeeder.php / Tinker)

Role User: Bisa mendaftar secara mandiri melalui menu Register.

7. Jalankan Server Lokal

php artisan serve


Akses aplikasi melalui browser di: http://127.0.0.1:8000

🔒 Konfigurasi Keamanan (Middleware & Access Control)

Rute admin diproteksi menggunakan gabungan middleware auth dan admin pada routes/web.php:

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('courts', CourtController::class);
    Route::get('/bookings', [BookingController::class, 'adminIndex'])->name('bookings.index');
    Route::patch('/bookings/{booking}/status', [BookingController::class, 'updateStatus'])->name('bookings.updateStatus');
});


📄 Lisensi

Hak Cipta © 2026 PRESTIGE Padel Club. Seluruh hak cipta dilindungi undang-undang.
