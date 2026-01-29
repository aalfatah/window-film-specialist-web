<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $service->name }} - {{ $settings['site_name'] ?? 'PT Fatih Jaya Film' }}</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Plus Jakarta Sans', 'sans-serif'] },
                    colors: {
                        brand: {
                            primary: '#10b981',
                            dark: '#0f172a',
                            accent: '#334155'
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 text-slate-800 font-sans antialiased">

    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-gray-100 py-4">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <a href="{{ route('home') }}" class="group flex items-center gap-2 text-slate-600 hover:text-brand-primary transition duration-300">
                <div class="p-2 rounded-full group-hover:bg-brand-primary/10 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                </div>
                <span class="font-medium">Beranda</span>
            </a>
            <img src="{{ asset('images/logo.png') }}" 
                    alt="Fatih Jaya Film" 
                    class="h-10 w-auto">
        </div>
    </nav>

    <header class="bg-brand-dark text-white py-16 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-1/3 h-full bg-brand-primary/10 skew-x-12 translate-x-20"></div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-3xl">
                <span class="bg-brand-primary text-brand-dark text-[10px] font-black uppercase tracking-[0.2em] px-3 py-1 rounded mb-4 inline-block">
                    Professional Installation
                </span>
                <h1 class="text-4xl md:text-5xl font-extrabold mb-6 leading-tight uppercase tracking-tight">
                    {{ $service->name }}
                </h1>
                <p class="text-gray-400 text-lg md:text-xl leading-relaxed">
                    Solusi perlindungan dan estetika terbaik dengan material berkualitas tinggi dan teknisi berpengalaman.
                </p>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-6 py-12">
        <div class="flex flex-col lg:flex-row gap-16">
            
            <div class="w-full lg:w-2/3">
                <section class="mb-10">
                    <h2 class="text-2xl font-bold text-brand-dark mb-4 flex items-center gap-3">
                        <span class="w-8 h-1 bg-brand-primary rounded-full"></span>
                        Detail Layanan
                    </h2>
                    <div class="prose prose-lg text-gray-600 leading-relaxed whitespace-pre-line bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                        {{ $service->description }}
                    </div>
                </section>

                @if($relatedPortfolios->count() > 0)
                <section>
                    <h2 class="text-2xl font-bold text-brand-dark mb-6 flex items-center gap-3">
                        <span class="w-8 h-1 bg-brand-primary rounded-full"></span>
                        Bukti Pengerjaan
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($relatedPortfolios as $portfolio)
                        <div class="group relative rounded-xl overflow-hidden shadow-lg h-60">
                            <img src="{{ asset('storage/' . $portfolio->image_path) }}" 
                                 alt="{{ $portfolio->title }}" 
                                 class="w-full h-full object-cover transition duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-brand-dark opacity-70"></div>
                            <div class="absolute bottom-4 left-4 right-4 text-white">
                                <p class="text-[10px] text-brand-primary font-bold uppercase mb-1">Project</p>
                                <h3 class="font-bold text-sm leading-tight">{{ $portfolio->title }}</h3>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </section>
                @endif
            </div>

            <aside class="w-full lg:w-1/3">
                <div class="sticky top-28">
                    <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 overflow-hidden border border-gray-100">
                        <div class="bg-brand-primary p-6 text-brand-dark">
                            <p class="text-xs font-bold uppercase tracking-widest opacity-80 mb-1">Estimasi Harga Mulai</p>
                            <h3 class="text-3xl font-black tracking-tighter">
                                Rp {{ number_format($service->price, 0, ',', '.') }}
                            </h3>
                        </div>
                        <div class="p-8">
                            <ul class="space-y-4 mb-8">
                                <li class="flex items-center gap-3 text-sm font-semibold text-slate-600">
                                    <svg class="w-5 h-5 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    Material Original 100%
                                </li>
                                <li class="flex items-center gap-3 text-sm font-semibold text-slate-600">
                                    <svg class="w-5 h-5 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    Garansi Pemasangan & Unit
                                </li>
                                <li class="flex items-center gap-3 text-sm font-semibold text-slate-600">
                                    <svg class="w-5 h-5 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    Tersedia Home Service
                                </li>
                            </ul>

                            <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '' }}?text=Halo%20Fatih%20Jaya,%20saya%20tertarik%20konsultasi%20mengenai%20layanan%20{{ urlencode($service->name) }}" 
                               class="flex items-center justify-center gap-3 w-full bg-brand-dark text-white py-4 rounded-2xl font-bold hover:bg-slate-800 transition duration-300 shadow-lg shadow-slate-300">
                                <svg class="w-5 h-5 text-brand-primary" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                Booking Sekarang
                            </a>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </main>

    <footer class="bg-white border-t border-gray-100 py-12 text-center text-slate-500 text-sm italic">
        <p>&copy; {{ date('Y') }} {{ $settings['site_name'] ?? 'PT Fatih Jaya Film' }}. All Rights Reserved.</p>
    </footer>

</body>
</html>