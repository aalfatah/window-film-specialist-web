<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings['site_name'] ?? 'PT Fatih Jaya Film' }} - Spesialis Kaca Film</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Plus Jakarta Sans', 'sans-serif'] },
                    colors: {
                        brand: {
                            dark: '#0f172a', // Slate 900
                            primary: '#10b981', // Emerald 500
                            accent: '#0ea5e9', // Sky 500
                        }
                    },
                    animation: {
                        'marquee': 'marquee 40s linear infinite',
                    },
                    keyframes: {
                        marquee: {
                            '0%': { transform: 'translateX(0%)' },
                            '100%': { transform: 'translateX(-100%)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        /* Hide scrollbar for neatness */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-gray-50 text-slate-800 font-sans antialiased">

    <nav x-data="{ open: false, scrolled: false }" 
         @scroll.window="scrolled = (window.pageYOffset > 20)"
         :class="scrolled ? 'bg-white/90 backdrop-blur-md shadow-md py-3' : 'bg-transparent py-5'"
         class="fixed w-full top-0 z-50 transition-all duration-300">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <a href="#" class="flex items-center gap-2">
                <div class="w-10 h-10 bg-brand-primary rounded-lg flex items-center justify-center text-white font-bold text-xl">F</div>
                <span :class="scrolled ? 'text-slate-800' : 'text-white'" class="font-bold text-xl tracking-wide">
                    Fatih<span class="text-brand-primary">Jaya</span>
                </span>
            </a>

            <div class="hidden md:flex space-x-8">
                @foreach(['Tentang', 'Layanan', 'Portfolio', 'Kontak'] as $item)
                <a href="#{{ strtolower($item) }}" 
                   :class="scrolled ? 'text-slate-600 hover:text-brand-primary' : 'text-gray-300 hover:text-white'"
                   class="font-medium transition">{{ $item }}</a>
                @endforeach
            </div>

            <button @click="open = !open" class="md:hidden text-brand-primary focus:outline-none">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </div>

        <div x-show="open" @click.away="open = false" class="md:hidden bg-white shadow-lg absolute w-full top-full left-0">
            <div class="flex flex-col p-6 space-y-4">
                <a href="#tentang" class="text-slate-600 font-medium">Tentang</a>
                <a href="#layanan" class="text-slate-600 font-medium">Layanan</a>
                <a href="#portfolio" class="text-slate-600 font-medium">Portfolio</a>
                <a href="#kontak" class="text-brand-primary font-bold">Hubungi Kami</a>
            </div>
        </div>
    </nav>

    <section class="relative h-screen flex items-center justify-center text-center px-6 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/hero.png') }}" 
                 class="w-full h-full object-cover" alt="Background Mobil Mewah">
            <div class="absolute inset-0 bg-brand-dark/80 mix-blend-multiply"></div>
        </div>

        <div class="relative z-10 max-w-4xl mx-auto text-white">
            <span class="bg-brand-primary/20 text-brand-primary px-4 py-1 rounded-full text-sm font-bold uppercase tracking-wider mb-4 inline-block backdrop-blur-sm border border-brand-primary/30">
                Authorized Dealer & Installer
            </span>
            <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                Perlindungan Maksimal, <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-primary to-brand-accent">Tampilan Profesional.</span>
            </h1>
            <p class="text-gray-300 text-lg md:text-xl mb-10 max-w-2xl mx-auto">
                Spesialis pemasangan kaca film mobil dan gedung. Layanan <b>Home Service</b> gratis transport untuk area Jabodetabek. Bergaransi Resmi.
            </p>
            <div class="flex flex-col md:flex-row gap-4 justify-center">
                <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '' }}?text=Halo%20Fatih%20Jaya,%20saya%20tertarik%20pasang%20kaca%20film" 
                   class="bg-brand-primary hover:bg-green-600 text-white font-bold py-4 px-8 rounded-full transition shadow-lg shadow-green-500/30 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    Booking Jadwal Sekarang
                </a>
                <a href="#portfolio" class="bg-white/10 hover:bg-white/20 backdrop-blur border border-white/30 text-white font-bold py-4 px-8 rounded-full transition flex items-center justify-center">
                    Lihat Hasil Kerja
                </a>
            </div>
        </div>
    </section>

    <section class="bg-white py-10 border-b overflow-hidden">
        <div class="container mx-auto px-6 mb-4 text-center">
            <p class="text-sm font-semibold text-gray-400 uppercase tracking-widest">Brand Kaca Film Yang Tersedia</p>
        </div>
        <div class="relative w-full flex overflow-x-hidden group">
            <div class="animate-marquee whitespace-nowrap flex gap-16 items-center">
                @for ($i = 0; $i < 2; $i++)
                    @foreach ($partners as $partner)
                        <span class="text-3xl md:text-4xl font-bold text-gray-300 mx-4 uppercase font-mono hover:text-brand-primary transition cursor-default">
                            {{ $partner }}
                        </span>
                    @endforeach
                @endfor
            </div>
        </div>
    </section>

    <section id="tentang" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="relative">
                    <div class="absolute -top-4 -left-4 w-24 h-24 bg-brand-primary/20 rounded-full z-0"></div>
                    <img src="{{asset('images/about.png')}}" 
                         alt="About PT Fatih Jaya" 
                         class="relative z-10 rounded-2xl shadow-2xl">
                    <div class="absolute -bottom-6 -right-6 bg-white p-6 rounded-xl shadow-xl z-20 hidden md:block border-l-4 border-brand-primary">
                        <p class="text-4xl font-bold text-brand-primary">5+</p>
                        <p class="text-gray-600 text-sm">Tahun Pengalaman</p>
                    </div>
                </div>
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold mb-6 text-slate-800">Kami Mengutamakan <br> <span class="text-brand-primary">Kerapian & Kualitas</span></h2>
                    <p class="text-gray-600 mb-6 leading-relaxed">
                        PT Fatih Jaya Film hadir sebagai solusi bagi Anda yang menginginkan kenyamanan berkendara dan privasi di dalam gedung. Kami bukan sekadar tukang pasang kaca film, kami adalah teknisi bersertifikat yang mengerti karakteristik setiap jenis kaca film.
                    </p>
                    <ul class="space-y-4 mb-8">
                        <li class="flex items-center gap-3">
                            <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span class="text-gray-700">Jaminan Keaslian Produk 100%</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span class="text-gray-700">Teknisi Home Service Berpengalaman</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            <span class="text-gray-700">Pengerjaan Bebas Debu (Dust-Free Tech)</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="layanan" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <span class="text-brand-primary font-bold uppercase tracking-wider text-sm">Layanan Kami</span>
                <h2 class="text-3xl md:text-4xl font-bold mt-2 text-slate-800">Solusi Kaca Film Terlengkap</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($services as $service)
                <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-xl transition duration-300 border border-gray-100 group">
                    <div class="w-14 h-14 bg-blue-50 text-brand-primary rounded-full flex items-center justify-center mb-6 group-hover:bg-brand-primary group-hover:text-white transition">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-slate-800">{{ $service->name }}</h3>
                    <p class="text-gray-500 text-sm mb-4 leading-relaxed">{{ Str::limit($service->description, 100) }}</p>
                    <p class="text-brand-primary font-bold">Mulai Rp {{ number_format($service->price, 0, ',', '.') }}</p>
                </div>
                @empty
                <div class="col-span-3 text-center text-gray-400">Belum ada layanan yang diinput.</div>
                @endforelse
            </div>
        </div>
    </section>

    <section id="portfolio" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12">
                <div>
                    <span class="text-brand-primary font-bold uppercase tracking-wider text-sm">Galeri Real</span>
                    <h2 class="text-3xl md:text-4xl font-bold mt-2 text-slate-800">Hasil Pengerjaan Terkini</h2>
                </div>
                <a href="#" class="hidden md:inline-flex items-center gap-2 text-brand-primary font-semibold hover:underline mt-4 md:mt-0">
                    Lihat Semua Project <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @forelse($portfolios as $portfolio)
                <div class="group relative overflow-hidden rounded-xl cursor-pointer">
                    <img src="{{ asset('storage/' . $portfolio->image_path) }}" 
                         alt="{{ $portfolio->title }}" 
                         class="w-full h-64 object-cover transform group-hover:scale-110 transition duration-500">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex flex-col justify-end p-6">
                        <span class="text-xs font-bold text-brand-primary uppercase mb-1">{{ $portfolio->service->name ?? 'Project' }}</span>
                        <h3 class="text-white font-bold text-lg">{{ $portfolio->title }}</h3>
                        <p class="text-gray-300 text-xs mt-1">{{ $portfolio->description }}</p>
                    </div>
                </div>
                @empty
                <div class="col-span-3 py-10 text-center bg-gray-50 rounded border border-dashed border-gray-300">
                    <p class="text-gray-500">Belum ada portfolio yang diupload di Admin.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <footer id="kontak" class="bg-brand-dark text-white pt-20 pb-10">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                
                <div class="md:col-span-1">
                    <div class="flex items-center gap-2 mb-6">
                        <div class="w-8 h-8 bg-brand-primary rounded flex items-center justify-center font-bold text-brand-dark">F</div>
                        <span class="font-bold text-xl">Fatih<span class="text-brand-primary">Jaya</span></span>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed mb-6">
                        Solusi profesional untuk kebutuhan kaca film kendaraan dan properti Anda. Melayani area Jabodetabek dengan sistem Home Service.
                    </p>
                </div>

                <div>
                    <h4 class="font-bold text-lg mb-6">Menu Cepat</h4>
                    <ul class="space-y-3 text-gray-400 text-sm">
                        <li><a href="#tentang" class="hover:text-brand-primary transition">Tentang Kami</a></li>
                        <li><a href="#layanan" class="hover:text-brand-primary transition">Layanan Panggilan</a></li>
                        <li><a href="#portfolio" class="hover:text-brand-primary transition">Galeri Foto</a></li>
                        {{-- <li><a href="/admin" class="hover:text-white transition underline decoration-dotted">Login Staff</a></li> --}}
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-lg mb-6">Hubungi Kami</h4>
                    <ul class="space-y-4 text-gray-400 text-sm">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-brand-primary mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="leading-relaxed">{{ $settings['address'] ?? 'Alamat kantor belum diatur di Admin.' }}</span>
                        </li>

                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-brand-primary flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                            </svg>
                            <span>+{{ $settings['whatsapp_number'] ?? '62...' }}</span>
                        </li>
                    </ul>
                </div>

                <div class="h-48 rounded-xl overflow-hidden bg-gray-800">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126907.086603708!2d106.787498!3d-6.284221!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1ec2422b423%3A0xbc0c44d6219448ee!2sJakarta%2C%20Special%20Capital%20Region%20of%20Jakarta!5e0!3m2!1sen!2sid!4v1650000000000!5m2!1sen!2sid" 
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8 text-center text-gray-500 text-sm">
                &copy; {{ date('Y') }} PT Fatih Jaya Film. All rights reserved.
            </div>
        </div>
    </footer>

    <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '' }}" 
       target="_blank"
       class="fixed bottom-6 right-6 bg-green-500 text-white p-4 rounded-full shadow-2xl hover:bg-green-600 transition duration-300 z-50 animate-bounce">
        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
    </a>

</body>
</html>