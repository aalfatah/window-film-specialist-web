@extends('layouts.app')
@section('title', 'Galeri Pekerjaan')

@section('content')
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
                <a href="{{ route('portfolio.show', $portfolio->slug) }}" class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl transition duration-500 border border-gray-100 flex flex-col">
                    <div class="relative h-72 overflow-hidden">
                        <img src="{{ asset('storage/' . $portfolio->image_path) }}" 
                            alt="{{ $portfolio->title }}"
                            class="w-full h-full object-cover transition duration-700 group-hover:scale-110" loading="lazy">
                        
                        <div class="absolute top-4 left-4">
                            <span class="bg-white/90 backdrop-blur text-brand-dark text-[10px] font-black px-3 py-1 rounded-full uppercase tracking-widest shadow-sm">
                                {{ $portfolio->service->name ?? 'General' }}
                            </span>
                        </div>
                    </div>

                    <div class="p-8 flex-grow">
                        <h3 class="font-extrabold text-xl text-brand-dark mb-3 group-hover:text-brand-primary transition duration-300 leading-tight">
                            {{ $portfolio->title }}
                        </h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-6">
                            {{ Str::limit(strip_tags($portfolio->description), 100) }}
                        </p>
                    </div>
                    
                    <div class="px-8 pb-8 flex justify-between items-center text-[10px] font-bold text-gray-400 uppercase tracking-widest border-t border-gray-50 pt-4">
                        <span>Fatih Jaya Film</span>
                        <span>{{ $portfolio->created_at->format('M Y') }}</span>
                    </div>
                </a>
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
            <a href="{{ route('whatsapp.redirect') }}" 
               class="inline-flex items-center gap-4 bg-brand-primary text-brand-dark font-black px-10 py-5 rounded-2xl hover:bg-brand-dark hover:text-white transition duration-500 shadow-xl shadow-green-100 uppercase tracking-widest text-sm">
                Hubungi via WhatsApp
            </a>
        </div>
    </section>
@endsection