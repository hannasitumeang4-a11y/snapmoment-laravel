<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SnapMoment | Fotobooth Modern</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .hero-slide {
            transition: opacity 1s ease-in-out;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800 scroll-smooth">

    {{-- NAVBAR --}}
    <nav class="fixed top-0 left-0 w-full bg-white/90 backdrop-blur-lg border-b border-slate-100 z-50">
        <div class="max-w-7xl mx-auto flex items-center justify-between px-8 py-4">

            <div class="text-2xl font-black italic tracking-tighter">
                <span class="text-indigo-600">SNAP</span>MOMENT.
            </div>

            <div class="hidden md:flex items-center gap-8 font-semibold text-xs uppercase tracking-widest">
                <a href="#home" class="hover:text-indigo-600 transition">Home</a>
                <a href="#packages" class="hover:text-indigo-600 transition">Price List</a>
                <a href="#gallery" class="hover:text-indigo-600 transition">Gallery</a>
                <a href="#how" class="hover:text-indigo-600 transition">How It Works</a>
                <a href="#testimoni" class="hover:text-indigo-600 transition">Testimonials</a>
            </div>

            <div class="flex items-center gap-3">
                @if(session('user_id'))
                    <a href="/profile" class="px-5 py-2 rounded-xl bg-slate-900 text-white text-xs font-bold hover:bg-slate-800 transition">
                        Profile
                    </a>
                    <a href="/logout" class="px-5 py-2 rounded-xl bg-red-500 text-white text-xs font-bold hover:bg-red-600 transition">
                        Logout
                    </a>
                @else
                    <a href="/login" class="px-5 py-2 rounded-xl bg-indigo-600 text-white text-xs font-bold hover:bg-indigo-700 transition">
                        Login
                    </a>
                @endif
            </div>
        </div>
    </nav>

    {{-- HERO SECTION WITH SLIDER --}}
    <section id="home" class="relative min-h-screen flex items-center justify-center overflow-hidden">
        
        <div id="slider" class="absolute inset-0 z-0">
            <div class="hero-slide absolute inset-0 opacity-100">
                <img src="https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover">
            </div>
            <div class="hero-slide absolute inset-0 opacity-0">
                <img src="https://images.unsplash.com/photo-1513151233558-d860c5398176?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover">
            </div>
            <div class="hero-slide absolute inset-0 opacity-0">
                <img src="https://images.unsplash.com/photo-1527529482837-4698179dc6ce?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover">
            </div>
        </div>

        <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-[1px] z-10"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent z-10"></div>

        <div class="relative max-w-5xl mx-auto text-center z-20 px-6">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 backdrop-blur-md border border-white/20 mb-6">
                <div class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></div>
                <span class="text-xs font-bold text-white uppercase tracking-widest">Fotobooth Modern #1 di Medan</span>
            </div>

            <h1 class="text-4xl md:text-6xl font-black leading-tight mb-6 text-white">
                Abadikan <span class="text-indigo-400">Momen Terbaik</span><br>
                Bersama SnapMoment.
            </h1>

            <p class="max-w-2xl mx-auto text-slate-200 text-lg leading-relaxed mb-10">
                Layanan fotobooth premium dengan hasil foto aesthetic, 
                cetak instan kualitas studio, dan properti paling kekinian.
            </p>

            <div class="flex justify-center gap-4 flex-wrap">
                <a href="#packages" class="px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold shadow-2xl hover:bg-indigo-700 transition duration-300 transform hover:-translate-y-1">
                    Booking Sekarang
                </a>
                <a href="#gallery" class="px-8 py-4 bg-white/10 backdrop-blur-md border border-white/30 text-white rounded-2xl font-bold hover:bg-white/20 transition duration-300">
                    Lihat Gallery
                </a>
            </div>

            <div class="mt-16 grid grid-cols-2 md:grid-cols-3 gap-4">
                <div class="p-4 bg-white/5 backdrop-blur-md rounded-2xl border border-white/10">
                    <div class="text-2xl font-black text-white">500+</div>
                    <div class="text-[10px] text-slate-300 uppercase font-bold tracking-widest">Event Selesai</div>
                </div>
                <div class="p-4 bg-white/5 backdrop-blur-md rounded-2xl border border-white/10">
                    <div class="text-2xl font-black text-white">100%</div>
                    <div class="text-[10px] text-slate-300 uppercase font-bold tracking-widest">Unlimited Print</div>
                </div>
                <div class="hidden md:block p-4 bg-white/5 backdrop-blur-md rounded-2xl border border-white/10">
                    <div class="text-2xl font-black text-white">24/7</div>
                    <div class="text-[10px] text-slate-300 uppercase font-bold tracking-widest">Fast Response</div>
                </div>
            </div>
        </div>
    </section>

    {{-- PACKAGES --}}
    <section id="packages" class="py-24 px-6 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-black mb-3 text-slate-900">Paket Fotobooth</h2>
                <div class="h-1 w-20 bg-indigo-600 mx-auto rounded-full mb-4"></div>
                <p class="text-slate-500 text-sm">Pilih paket sesuai kebutuhan event kamu.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 items-center">
                <div class="bg-slate-50 rounded-[2.5rem] p-8 border border-slate-100 hover:shadow-xl transition-all">
                    <h3 class="text-xl font-black mb-1">Basic Package</h3>
                    <p class="text-slate-400 text-xs mb-6 font-medium uppercase tracking-wider">Birthday & Gathering</p>
                    <div class="text-4xl font-black text-indigo-600 mb-8">Rp500K <span class="text-sm font-normal text-slate-400">/ 2 Jam</span></div>
                    <ul class="space-y-4 text-sm text-slate-600 mb-10">
                        <li><i class="fa-solid fa-circle-check text-green-500 mr-2"></i> Unlimited Print</li>
                        <li><i class="fa-solid fa-circle-check text-green-500 mr-2"></i> Properti Lucu</li>
                        <li><i class="fa-solid fa-circle-check text-green-500 mr-2"></i> Digital Softcopy</li>
                    </ul>
                    <a href="/booking?paket_id=1" class="block text-center py-4 rounded-2xl border-2 border-indigo-600 text-indigo-600 font-bold hover:bg-indigo-600 hover:text-white transition-all">Pilih Paket</a>
                </div>

                <div class="bg-slate-900 text-white rounded-[2.5rem] p-10 shadow-2xl scale-105 relative border-4 border-indigo-500/30">
                    <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-indigo-600 px-4 py-1 rounded-full text-[10px] font-black uppercase">Most Favorite</div>
                    <h3 class="text-xl font-black mb-1">Premium Package</h3>
                    <p class="text-slate-400 text-xs mb-6 font-medium uppercase tracking-wider">Corporate & Big Event</p>
                    <div class="text-4xl font-black text-indigo-400 mb-8">Rp900K <span class="text-sm font-normal text-slate-500">/ 4 Jam</span></div>
                    <ul class="space-y-4 text-sm text-slate-300 mb-10">
                        <li><i class="fa-solid fa-star text-yellow-400 mr-2"></i> Custom Template Layout</li>
                        <li><i class="fa-solid fa-star text-yellow-400 mr-2"></i> Backdrop Premium</li>
                        <li><i class="fa-solid fa-star text-yellow-400 mr-2"></i> 1 Fotografer & 1 Crew</li>
                    </ul>
                    <a href="/booking?paket_id=2" class="block text-center py-4 rounded-2xl bg-indigo-600 text-white font-bold hover:bg-indigo-700 shadow-xl transition-all">Pilih Paket</a>
                </div>

                <div class="bg-slate-50 rounded-[2.5rem] p-8 border border-slate-100 hover:shadow-xl transition-all">
                    <h3 class="text-xl font-black mb-1">Wedding Package</h3>
                    <p class="text-slate-400 text-xs mb-6 font-medium uppercase tracking-wider">Exclusive Wedding</p>
                    <div class="text-4xl font-black text-pink-500 mb-8">Rp1.5JT <span class="text-sm font-normal text-slate-400">/ 6 Jam</span></div>
                    <ul class="space-y-4 text-sm text-slate-600 mb-10">
                        <li><i class="fa-solid fa-heart text-pink-400 mr-2"></i> Guestbook Exclusive</li>
                        <li><i class="fa-solid fa-heart text-pink-400 mr-2"></i> All Premium Features</li>
                        <li><i class="fa-solid fa-heart text-pink-400 mr-2"></i> QR Code Download</li>
                    </ul>
                    <a href="/booking?paket_id=3" class="block text-center py-4 rounded-2xl border-2 border-pink-500 text-pink-500 font-bold hover:bg-pink-500 hover:text-white transition-all">Pilih Paket</a>
                </div>
            </div>
        </div>
    </section>

    {{-- HOW IT WORKS --}}
    <section id="how" class="py-24 px-6 bg-slate-50">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-black mb-3">How It Works</h2>
                <div class="h-1 w-20 bg-indigo-600 mx-auto rounded-full mb-4"></div>
                <p class="text-slate-500 text-sm">Proses booking yang mudah dan cepat.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-10 rounded-[2.5rem] text-center shadow-sm border border-slate-100 hover:shadow-lg transition-all group">
                    <div class="w-16 h-16 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center text-3xl mx-auto mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-all">
                        <i class="fa-solid fa-box-open"></i>
                    </div>
                    <h3 class="font-black text-lg mb-3">1. Pilih Paket</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">
                        Tentukan paket fotobooth yang paling sesuai dengan kebutuhan dan budget event kamu.
                    </p>
                </div>

                <div class="bg-white p-10 rounded-[2.5rem] text-center shadow-sm border border-slate-100 hover:shadow-lg transition-all group">
                    <div class="w-16 h-16 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center text-3xl mx-auto mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-all">
                        <i class="fa-solid fa-calendar-check"></i>
                    </div>
                    <h3 class="font-black text-lg mb-3">2. Booking & Bayar</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">
                        Isi form pesanan dengan detail lokasi dan tanggal, lalu selesaikan pembayaran via QRIS atau Cash.
                    </p>
                </div>

                <div class="bg-white p-10 rounded-[2.5rem] text-center shadow-sm border border-slate-100 hover:shadow-lg transition-all group">
                    <div class="w-16 h-16 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center text-3xl mx-auto mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-all">
                        <i class="fa-solid fa-camera-retro"></i>
                    </div>
                    <h3 class="font-black text-lg mb-3">3. Datang & Foto</h3>
                    <p class="text-slate-500 text-sm leading-relaxed">
                        Team kami akan stand-by di lokasi dan tamu kamu bisa langsung menikmati keseruan fotobooth!
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- GALLERY --}}
    <section id="gallery" class="py-24 px-6 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-black mb-3">Gallery Momen</h2>
                <p class="text-slate-500 text-sm">Hasil jepretan terbaik dari berbagai event di Medan.</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <img src="https://images.unsplash.com/photo-1522673607200-164d1b6ce486?q=80&w=600" class="rounded-3xl h-64 w-full object-cover shadow-md hover:scale-95 transition duration-500">
                <img src="https://images.unsplash.com/photo-1511285560929-80b456fea0bc?q=80&w=600" class="rounded-3xl h-64 w-full object-cover shadow-md hover:scale-95 transition duration-500">
                <img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?q=80&w=600" class="rounded-3xl h-64 w-full object-cover shadow-md hover:scale-95 transition duration-500">
                <img src="https://images.unsplash.com/photo-1519741497674-611481863552?q=80&w=600" class="rounded-3xl h-64 w-full object-cover shadow-md hover:scale-95 transition duration-500">
            </div>
        </div>
    </section>

    {{-- TESTIMONI --}}
    <section id="testimoni" class="py-24 px-6 bg-slate-50">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-black mb-3 text-slate-900">What They Say</h2>
                <p class="text-slate-500 text-sm">Cerita kebahagiaan dari para pelanggan setia kami.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                @forelse($testimonials as $t)
                    <div class="p-8 rounded-[2.5rem] bg-white border border-slate-100 relative shadow-sm">
                        <div class="text-yellow-400 text-xs mb-4">
                            @for($i = 1; $i <= $t->rating; $i++) ⭐ @endfor
                        </div>
                        <p class="text-slate-600 text-sm leading-relaxed mb-6 italic italic">"{{ $t->pesan }}"</p>
                        <h4 class="font-black text-indigo-600 text-sm">{{ $t->nama }}</h4>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-12 text-slate-400 text-sm italic">Belum ada testimonial.</div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="bg-slate-900 text-white py-16 text-center">
        <div class="max-w-4xl mx-auto px-6">
            <div class="text-2xl font-black italic mb-6 tracking-tighter">
                <span class="text-indigo-400">SNAP</span>MOMENT.
            </div>
            <div class="flex justify-center gap-6 mb-8 text-slate-400 text-sm font-semibold">
                <a href="#" class="hover:text-white transition uppercase tracking-widest text-[10px]">Instagram</a>
                <a href="#" class="hover:text-white transition uppercase tracking-widest text-[10px]">WhatsApp</a>
                <a href="#" class="hover:text-white transition uppercase tracking-widest text-[10px]">Email</a>
            </div>
            <p class="text-slate-500 text-[10px] uppercase tracking-[0.2em]">
                &copy; 2026 SnapMoment Fotobooth. Crafted with Passion in Medan.
            </p>
        </div>
    </footer>

    {{-- SLIDER SCRIPT --}}
    <script>
        let slides = document.querySelectorAll('.hero-slide');
        let currentSlide = 0;

        function nextSlide() {
            slides[currentSlide].style.opacity = 0;
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].style.opacity = 1;
        }

        setInterval(nextSlide, 5000); 
    </script>

</body>
</html>