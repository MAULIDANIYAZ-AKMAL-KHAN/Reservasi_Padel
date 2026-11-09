@extends('layouts.app')

@section('content')
<!-- ========================================== -->
<!-- SPLASH SCREEN / ANIMASI PEMBUKA (5 DETIK) -->
<!-- ========================================== -->
<div id="splash-screen" class="fixed inset-0 z-50 bg-[#070707] flex flex-col items-center justify-center transition-opacity duration-1000">
    <div class="relative text-center px-6">
        <!-- Efek Cahaya Belakang Logo -->
        <div class="absolute -inset-10 bg-gold/10 rounded-full blur-3xl animate-pulse"></div>

        <!-- Logo / Teks Mewah -->
        <div class="relative z-10 space-y-3">
            <span class="text-gold uppercase tracking-[0.3em] text-xs font-semibold animate-pulse">
                Exclusive Padel Sanctuary
            </span>
            <h1 class="font-luxury text-4xl md:text-6xl font-bold tracking-widest text-white uppercase opacity-0 animate-[fadeIn_1.5s_ease-out_forwards]">
                Prestige <span class="text-gold">Padel</span>
            </h1>
            <div class="w-24 h-[2px] bg-gradient-to-r from-transparent via-gold to-transparent mx-auto mt-4 animate-[pulse_1s_infinite]"></div>
        </div>

        <!-- Bar Loading Mewah -->
        <div class="w-48 h-1 bg-white/10 rounded-full mx-auto mt-8 overflow-hidden relative z-10">
            <div id="loading-bar" class="h-full bg-gradient-to-r from-amber-300 via-gold to-amber-600 w-0 transition-all duration-[4500ms] ease-out"></div>
        </div>
    </div>
</div>

<!-- Script Pengatur Durasi 5 Detik -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const splashScreen = document.getElementById("splash-screen");
        const loadingBar = document.getElementById("loading-bar");

        // Picu animasi bar loading berjalan penuh
        setTimeout(() => {
            loadingBar.style.width = "100%";
        }, 100);

        // Hilangkan splash screen setelah tepat 5 detik (5000ms)
        setTimeout(() => {
            splashScreen.style.opacity = "0";
            setTimeout(() => {
                splashScreen.style.display = "none";
            }, 1000); // Waktu transisi fade-out
        }, 5000);
    });
</script>

<!-- Tambahan Keyframes Animasi Masuk -->
<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>


<!-- ========================================== -->
<!-- KONTEN UTAMA HALAMAN -->
<!-- ========================================== -->
<div class="min-h-screen bg-[#0a0a0a] text-white overflow-hidden relative">
    <!-- Background Animated Elements -->
    <div class="absolute inset-0 pointer-events-none overflow-hidden z-0">
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#ffffff03_1px,transparent_1px),linear-gradient(to_bottom,#ffffff03_1px,transparent_1px)] bg-[size:5rem_5rem] [mask-image:radial-gradient(ellipse_80%_50%_at_50%_20%,#000_30%,transparent_100%)]"></div>
        
        <div class="absolute top-12 left-5 w-[600px] h-[600px] bg-gold/20 rounded-full blur-[160px] animate-pulse pointer-events-none"></div>
        <div class="absolute top-1/4 right-5 w-[550px] h-[550px] bg-amber-500/15 rounded-full blur-[150px] animate-pulse delay-700 pointer-events-none"></div>
        <div class="absolute top-2/3 left-1/3 w-[700px] h-[700px] bg-amber-600/15 rounded-full blur-[180px] pointer-events-none"></div>
        <div class="absolute bottom-10 right-1/4 w-[600px] h-[600px] bg-gold/15 rounded-full blur-[150px] pointer-events-none"></div>
    </div>

    <!-- Hero Section -->
    <section class="relative pt-20 pb-32 px-6 lg:px-12 overflow-hidden border-b border-white/10 z-10">
        <div class="max-w-6xl mx-auto text-center relative z-10">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-gold/10 border border-gold/30 text-gold text-xs uppercase tracking-[0.25em] font-semibold mb-6 animate-pulse shadow-[0_0_25px_rgba(212,175,55,0.3)]">
                <span>⭐ The Ultimate Padel Experience</span>
            </div>
            
            <h1 class="font-luxury text-4xl md:text-6xl lg:text-7xl font-extrabold tracking-tight text-white mb-6 leading-tight">
                Redefining <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-200 via-gold to-amber-500 drop-shadow-[0_5px_20px_rgba(212,175,55,0.4)]">Luxury Padel Sports</span>
            </h1>
            
            <p class="text-gray-300 text-base md:text-lg max-w-2xl mx-auto mb-10 font-light leading-relaxed">
                Nikmati fasilitas lapangan padel kelas dunia dengan standar turnamen internasional, pencahayaan eksklusif, lounge VIP, dan kenyamanan paripurna.
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('booking.create') }}" class="w-full sm:w-auto px-8 py-4 bg-gradient-to-r from-amber-300 via-gold to-amber-600 text-black font-bold uppercase tracking-wider rounded-xl shadow-[0_0_35px_rgba(212,175,55,0.5)] hover:shadow-[0_0_50px_rgba(212,175,55,0.7)] hover:opacity-95 transition transform hover:-translate-y-0.5 text-sm text-center">
                    Mulai Reservasi Sekarang
                </a>
                <a href="#katalog" class="w-full sm:w-auto px-8 py-4 bg-[#181818]/80 backdrop-blur-md border border-white/15 text-white font-medium uppercase tracking-wider rounded-xl hover:bg-white/10 hover:border-gold/50 transition text-sm text-center">
                    Jelajahi Katalog Arena
                </a>
            </div>

            <!-- Quick Stats Bar -->
            <div class="grid grid-cols-2 md:grid-cols-3 gap-6 mt-20 pt-10 border-t border-white/10 max-w-4xl mx-auto">
                <div class="text-center">
                    <div class="font-luxury text-3xl font-bold text-gold drop-shadow-[0_0_10px_rgba(212,175,55,0.3)]">04+</div>
                    <div class="text-xs uppercase tracking-wider text-gray-400 mt-1">Professional Courts</div>
                </div>
                <div class="text-center">
                    <div class="font-luxury text-3xl font-bold text-gold drop-shadow-[0_0_10px_rgba(212,175,55,0.3)]">24/7</div>
                    <div class="text-xs uppercase tracking-wider text-gray-400 mt-1">Lounge & Facilities</div>
                </div>
                <div class="text-center col-span-2 md:col-span-1">
                    <div class="font-luxury text-3xl font-bold text-gold drop-shadow-[0_0_10px_rgba(212,175,55,0.3)]">100%</div>
                    <div class="text-xs uppercase tracking-wider text-gray-400 mt-1">World-Class Turf</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Katalog Section -->
    <section id="katalog" class="py-24 px-6 lg:px-12 max-w-7xl mx-auto relative z-10">
        <div class="text-center mb-16">
            <span class="text-gold uppercase tracking-[0.2em] text-xs font-semibold">Eksklusif & Berstandar Internasional</span>
            <h2 class="font-luxury text-3xl md:text-4xl font-bold text-white mt-2">Koleksi Lapangan Eksklusif</h2>
            <p class="text-gray-400 text-sm mt-2 max-w-lg mx-auto">Pilih arena terbaik yang dirancang khusus untuk performa maksimal dan pengalaman bermain kelas atas.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($courts as $court)
                <div class="bg-[#121212]/90 backdrop-blur-md border border-white/10 rounded-3xl overflow-hidden shadow-2xl group hover:border-gold/50 transition duration-300 flex flex-col justify-between">
                    <div>
                        <!-- Image Container -->
                        <div class="relative h-64 overflow-hidden bg-[#181818]">
                            @if($court->image)
                                <img src="{{ asset('storage/' . $court->image) }}" alt="{{ $court->name }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-600 font-medium">Prestige Arena Padel</div>
                            @endif
                            <div class="absolute top-4 right-4 bg-black/70 backdrop-blur-md border border-white/10 px-3 py-1.5 rounded-full text-gold text-xs font-semibold tracking-wide">
                                Rp {{ number_format($court->price_per_hour, 0, ',', '.') }} / jam
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <h3 class="font-luxury text-xl font-bold text-white mb-2 group-hover:text-gold transition">{{ $court->name }}</h3>
                            <p class="text-gray-400 text-sm leading-relaxed line-clamp-2 mb-4">{{ $court->description ?? 'Lapangan premium dengan rumput sintetis standar internasional dan pencahayaan optimal.' }}</p>
                        </div>
                    </div>

                    <!-- Action Button -->
                    <div class="p-6 pt-0">
                        <a href="{{ route('booking.create', ['court_id' => $court->id]) }}" class="block w-full text-center py-3.5 bg-[#181818] border border-white/10 text-white font-semibold uppercase tracking-wider text-xs rounded-xl hover:bg-gold hover:text-black hover:border-gold transition duration-300">
                            Pilih & Reservasi Sesi
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-20 bg-[#121212] border border-white/10 rounded-3xl">
                    <p class="text-gray-400 text-sm">Belum ada katalog lapangan yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- Luxury Footer -->
    <footer class="bg-[#0e0e0e] border-t border-white/10 pt-16 pb-12 mt-20 relative z-10">
        <div class="max-w-7xl mx-auto px-6 lg:px-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-10 mb-12">
                <!-- Brand Info -->
                <div class="md:col-span-2 space-y-4">
                    <div class="font-luxury text-2xl font-bold tracking-widest text-white uppercase">
                        Prestige <span class="text-gold">Padel Club</span>
                    </div>
                    <p class="text-gray-400 text-sm max-w-sm leading-relaxed">
                        Destinasi utama bagi para pencinta olahraga padel yang mendambakan kemewahan, fasilitas berstandar dunia, dan pelayanan eksklusif tanpa kompromi.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-gold uppercase tracking-wider text-xs font-semibold mb-4">Navigasi Utama</h4>
                    <ul class="space-y-2.5 text-sm text-gray-400">
                        <li><a href="{{ route('home') }}" class="hover:text-gold transition">Beranda</a></li>
                        <li><a href="#katalog" class="hover:text-gold transition">Katalog Arena</a></li>
                        <li><a href="{{ route('booking.create') }}" class="hover:text-gold transition">Formulir Reservasi</a></li>
                        @auth
                            <li><a href="{{ route('admin.bookings.index') }}" class="hover:text-gold transition">Panel Admin</a></li>
                        @endauth
                    </ul>
                </div>

                <!-- Contact / Location -->
                <div>
                    <h4 class="text-gold uppercase tracking-wider text-xs font-semibold mb-4">Pusat Layanan</h4>
                    <ul class="space-y-2.5 text-sm text-gray-400">
                        <li>📍 Kawasan Elite Padel, Indonesia</li>
                        <li>📞 +62 812-3456-7890</li>
                        <li>✉️ concierge@prestigepadel.id</li>
                        <li>⏰ Setiap Hari: 07:00 - 23:00 WIB</li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Copyright -->
            <div class="pt-8 border-t border-white/5 flex flex-col sm:flex-row items-center justify-between text-xs text-gray-500 gap-4">
                <p>&copy; {{ date('Y') }} Prestige Padel Club. Hak Cipta Dilindungi Undang-Undang.</p>
                <div class="flex space-x-6">
                    <span class="hover:text-gold transition cursor-pointer">Kebijakan Privasi</span>
                    <span class="hover:text-gold transition cursor-pointer">Syarat & Ketentuan Layanan</span>
                </div>
            </div>
        </div>
    </footer>
</div>
@endsection