<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Padel Club Prestige - Eksklusivitas & Kemewahan</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        gold: {
                            DEFAULT: '#D4AF37',
                            light: '#F3E5AB',
                            dark: '#AA8C2C',
                        }
                    }
                }
            }
        }
    </script>
    <!-- Google Fonts: Playfair Display & Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-luxury { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-[#0b0b0b] text-gray-100 antialiased selection:bg-gold selection:text-black">
    <!-- Navbar Mewah -->
    <nav class="border-b border-white/10 bg-[#0b0b0b]/80 backdrop-blur-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <!-- Brand / Logo -->
            <a href="{{ route('home') }}" class="font-luxury text-2xl tracking-wider text-gold font-bold flex items-center gap-2">
                <span>PRESTIGE</span> <span class="text-white text-sm font-sans tracking-widest uppercase font-light border-l border-white/20 pl-2">Padel Club</span>
            </a>

            <!-- Menu Navigasi & Aksi Kanan -->
            <div class="flex items-center gap-4 lg:gap-6">
                <a href="{{ route('home') }}" class="text-sm tracking-wide hover:text-gold transition hidden sm:inline">Katalog</a>
                
                <a href="{{ route('booking.create') }}" class="bg-gradient-to-r from-amber-300 via-gold to-amber-600 text-black font-semibold text-xs lg:text-sm px-5 py-2.5 rounded-xl shadow-lg hover:opacity-90 transition transform hover:-translate-y-0.5">
                    Reservasi Sekarang
                </a>

                @auth
                    <!-- Jika Sudah Login -->
                    <div class="flex items-center gap-3 pl-2 border-l border-white/10">
                        <!-- Tombol Kelola Booking Khusus Admin -->
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('admin.bookings.index') }}" class="px-4 py-2 bg-gold/10 border border-gold/40 text-gold hover:bg-gold hover:text-black rounded-xl text-xs font-semibold uppercase tracking-wider transition">
                                Kelola Booking
                            </a>
                        @endif

                        <span class="text-xs text-gray-300 hidden md:inline">Halo, <strong class="text-gold">{{ Auth::user()->name }}</strong></span>
                        
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-red-950/40 border border-red-500/40 text-red-300 hover:bg-red-900/50 rounded-xl text-xs font-semibold uppercase tracking-wider transition">
                                Logout
                            </button>
                        </form>
                    </div>
                @else
                    <!-- Jika Belum Login -->
                    <a href="{{ route('login') }}" class="px-5 py-2.5 bg-[#181818] border border-white/10 text-gray-200 hover:text-gold font-bold text-xs uppercase tracking-[0.2em] rounded-xl shadow-lg hover:bg-white/5 transition">
                        Login
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="border-t border-white/10 py-12 mt-20 text-center text-gray-500 text-sm bg-[#090909]">
        <p>&copy; {{ date('Y') }} PRESTIGE Padel Club. Hak Cipta Dilindungi. Kemewahan dalam Setiap Ayunan.</p>
    </footer>
</body>
</html>