<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Project - {{ $settings['site_name'] ?? 'PT Fatih Jaya Film' }}</title>
    
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
                            dark: '#0f172a'
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

    <section class="bg-brand-dark text-white py-16 border-b-4 border-brand-primary">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-5xl font-black uppercase tracking-tight mb-4">Galeri Pekerjaan</h1>
            <p class="text-gray-400 max-w-2xl mx-auto text-lg">
                Kumpulan hasil pemasangan kaca film kami. Transparansi kualitas adalah prioritas utama kami.
            </p>
        </div>
    </section>

    <main class="container mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($portfolios as $portfolio)
            <div class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition duration-500 border border-gray-100">
                <div class="relative h-72 overflow-hidden">
                    <img src="{{ asset('storage/' . $portfolio->image_path) }}" 
                         alt="{{ $portfolio->title }}" 
                         class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                    
                    <div class="absolute top-4 left-4">
                        <span class="bg-white/90 backdrop-blur text-brand-dark text-[10px] font-black px-3 py-1 rounded-full uppercase tracking-widest shadow-sm">
                            {{ $portfolio->service->name ?? 'General' }}
                        </span>
                    </div>
                </div>

                <div class="p-8">
                    <h3 class="font-extrabold text-xl text-brand-dark mb-3 group-hover:text-brand-primary transition duration-300">
                        {{ $portfolio->title }}
                    </h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-6 italic">
                        "{{ $portfolio->description }}"
                    </p>
                    <div class="pt-4 border-t border-gray-50 flex justify-between items-center text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                        <span>Fatih Jaya Film</span>
                        <span>{{ $portfolio->created_at->format('M Y') }}</span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-20 text-center">
                <p class="text-gray-400 italic">Belum ada foto pekerjaan yang diunggah.</p>
            </div>
            @endforelse
        </div>

        <div class="mt-20">
            {{ $portfolios->links() }}
        </div>
    </main>

    <section class="bg-white border-t border-gray-100 py-12">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-black text-brand-dark mb-4">INGIN HASIL SEPERTI INI?</h2>
            <p class="text-gray-500 mb-10">Konsultasikan kebutuhan kaca film Anda secara gratis dengan tim ahli kami.</p>
            <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '' }}" 
               class="inline-flex items-center gap-4 bg-brand-primary text-brand-dark font-black px-10 py-5 rounded-2xl hover:bg-brand-dark hover:text-white transition duration-500 shadow-xl shadow-green-100 uppercase tracking-widest text-sm">
                Hubungi via WhatsApp
            </a>
        </div>
    </section>

</body>
</html>