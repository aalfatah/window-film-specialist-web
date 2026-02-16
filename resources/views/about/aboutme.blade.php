@extends('layouts.app')

@section('title', 'Tentang Kami - CV Fatih Jaya Film')

@section('content')

<section class="py-12 bg-slate-800 text-white">
    <div class="container mx-auto px-6">
        <div class="flex flex-col lg:flex-row items-center px-6 gap-12">

            <div class="w-full lg:w-1/2 order-2 lg:order-1">
                <div class="container mx-auto relative z-10">
                    <div class="max-w-3xl">
                        <span class="text-brand-primary font-bold tracking-[0.2em] uppercase text-sm mb-4 block">Tentang Kami</span>
                        <h1 class="text-4xl md:text-5xl font-bold text-white mb-6 leading-tight">
                            Profil Perusahaan
                        </h1>
                        <div class="h-1 w-20 bg-brand-primary mb-6"></div>
                    </div>
                </div>
                <h2 class="text-2xl font-bold mb-6 text-white leading-relaxed">
                    CV Fatih Jaya Film adalah spesialis kaca film
                    <span class="text-brand-primary">Mobil dan Bangunan.</span>
                </h2>
                
                <div class="space-y-5 text-gray-300 leading-relaxed text-base">
                    <p>
                        Didirikan dengan semangat memberikan perlindungan terbaik, <strong class="text-white">CV Fatih Jaya Film</strong> hadir sebagai spesialis pemasangan kaca film untuk otomotif dan arsitektur di wilayah Jabodetabek.
                    </p>
                    <p>
                        Kami bermitra dengan merek global terkemuka seperti <span class="text-white">3M™, Solar Gard, Wincos</span>, dan brand premium lainnya untuk memastikan Anda mendapatkan spesifikasi yang jujur dan akurat.
                    </p>
                    
                    <div class="flex flex-wrap gap-3 mt-6">
                        <div class="flex items-center gap-3">
                            <span class="text-brand-primary text-xl">✔</span>
                            <span class="font-bold">Kaca Film Mobil</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="text-brand-primary text-xl">✔</span>
                            <span class="font-bold">Kaca Film Gedung</span>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center gap-6 mt-10">
                        <div class="flex items-center gap-4 bg-slate-800 p-4 rounded-xl shadow-lg border border-slate-700 min-w-[240px]">
                            <div class="text-3xl font-black text-brand-primary-500">100%</div>
                            <div class="text-white text-xs font-bold uppercase tracking-wider leading-tight">
                                Jaminan Produk <br>Original Resmi
                            </div>
                        </div>
                        
                        <a href="{{ route('whatsapp.redirect') }}" 
                        class="inline-flex items-center justify-center px-8 py-4 bg-blue-800 hover:bg-blue-900 text-white rounded-xl font-bold transition-all duration-300 shadow-lg hover:-translate-y-1">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12.031 6.172c-3.181 0-5.767 2.586-5.767 5.767 0 1.258.405 2.422 1.091 3.373l-1.141 4.162 4.259-1.117a5.736 5.736 0 0 0 3.558 1.22c3.181 0 5.767-2.586 5.767-5.767 0-3.181-2.586-5.738-5.767-5.738zm0 10.511a4.726 4.726 0 0 1-2.422-.667l-.174-.102-2.541.667.68-2.479-.115-.183a4.73 4.73 0 0 1-.722-2.511c0-2.618 2.13-4.748 4.748-4.748 2.618 0 4.748 2.13 4.748 4.748 0 2.618-2.13 4.748-4.748 4.748z"/>
                            </svg>
                            HUBUNGI KAMI
                        </a>
                    </div>
                </div>
            </div>

            <div class="w-full lg:w-1/2 order-1 lg:order-2 px-4 md:px-0">
                <div class="relative md:pt-24">
                    <div class="absolute top-0 left-0 right-0 z-10 grid grid-cols-2 gap-4 px-4 md:px-8 transform -translate-y-1/4">
                        <div class="relative group">
                            <img src="{{ isset($randomPortfolios[0]) ? asset('storage/' . $randomPortfolios[0]->image_path) : 'https://images.unsplash.com/photo-1552519507-da3b142c6e3d?q=80&w=2070&auto=format&fit=crop' }}" 
                                class="rounded-xl border-4 border-blue-800 shadow-2xl h-32 md:h-44 w-full object-cover transition-transform duration-500 group-hover:scale-105" 
                                alt="Proses 1">
                            <div class="absolute inset-0 rounded-xl bg-blue-500/10 group-hover:bg-transparent transition-colors"></div>
                        </div>
                        
                        <div class="relative group">
                            <img src="{{ isset($randomPortfolios[1]) ? asset('storage/' . $randomPortfolios[1]->image_path) : asset('images/about.webp') }}" 
                                class="rounded-xl border-4 border-blue-800 shadow-2xl h-32 md:h-44 w-full object-cover transition-transform duration-500 group-hover:scale-105" 
                                alt="Proses 2">
                            <div class="absolute inset-0 rounded-xl bg-blue-500/10 group-hover:bg-transparent transition-colors"></div>
                        </div>
                    </div>

                    <div class="relative z-5 rounded-[0.5rem] overflow-hidden shadow-[0_20px_50px_rgba(0,0,0,0.3)]">
                        <img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?q=80&w=2070&auto=format&fit=crop" 
                            class="w-full h-auto object-cover" 
                            alt="Main Car">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#0a161d]/60 to-transparent"></div>
                    </div>

                    <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-blue-500/20 blur-3xl rounded-full -z-10"></div>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="pb-12 bg-slate-50">
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            {{-- Card Visi --}}
            <div class="bg-white p-10 rounded-3xl shadow-sm border border-slate-100 hover:shadow-md transition-all">
                <div class="w-14 h-14 bg-blue-50 rounded-xl flex items-center justify-center text-blue-600 mb-6">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-4">Visi Kami</h3>
                <p class="text-slate-600 leading-relaxed">
                    Menjadi vendor kaca film terdepan di Indonesia yang dikenal karena kejujuran produk, kualitas pemasangan standar pabrikan, dan pelayanan purna jual yang responsif.
                </p>
            </div>

            {{-- Card Misi --}}
            <div class="bg-white p-10 rounded-3xl shadow-sm border border-slate-100 hover:shadow-md transition-all">
                <div class="w-14 h-14 bg-orange-50 rounded-xl flex items-center justify-center text-brand-primary mb-6">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-slate-900 mb-4">Misi Kami</h3>
                <ul class="space-y-3 text-slate-600">
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-brand-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span>Menyediakan produk original dengan garansi resmi distributor.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-brand-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span>Memberikan edukasi spesifikasi kaca film secara transparan.</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-brand-primary mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        <span>Layanan Home Service yang tepat waktu dan profesional.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="py-12 bg-slate-900 text-white relative overflow-hidden">
    
    <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-brand-primary/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-96 h-96 bg-blue-600/10 rounded-full blur-3xl"></div>

    <div class="container mx-auto px-6 relative z-10">
        <div class="text-center mb-16">
            <span class="text-brand-primary font-bold uppercase tracking-widest text-sm">Our Values</span>
            <h2 class="text-3xl md:text-4xl font-bold mt-2">Mengapa Memilih Kami?</h2>
            <p class="text-slate-400 mt-4 max-w-2xl mx-auto">Komitmen kami terhadap kualitas adalah alasan utama ribuan pelanggan mempercayakan kendaraannya kepada Fatih Jaya Film.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="bg-slate-800/50 backdrop-blur border border-white/5 p-8 rounded-2xl hover:bg-slate-800 transition-colors group">
                <div class="w-12 h-12 bg-slate-700 rounded-lg flex items-center justify-center text-brand-primary mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h4 class="text-xl font-bold mb-3">100% Original</h4>
                <p class="text-slate-400 text-sm leading-relaxed">Jaminan keaslian produk. Kami anti barang palsu/KW. Garansi uang kembali jika terbukti tidak asli.</p>
            </div>

            <div class="bg-slate-800/50 backdrop-blur border border-white/5 p-8 rounded-2xl hover:bg-slate-800 transition-colors group">
                <div class="w-12 h-12 bg-slate-700 rounded-lg flex items-center justify-center text-brand-primary mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                </div>
                <h4 class="text-xl font-bold mb-3">Teknisi Ahli</h4>
                <p class="text-slate-400 text-sm leading-relaxed">Pemasangan dilakukan oleh tim profesional yang terlatih menangani berbagai jenis mobil mewah (CBU/CKD).</p>
            </div>

            <div class="bg-slate-800/50 backdrop-blur border border-white/5 p-8 rounded-2xl hover:bg-slate-800 transition-colors group">
                <div class="w-12 h-12 bg-slate-700 rounded-lg flex items-center justify-center text-brand-primary mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </div>
                <h4 class="text-xl font-bold mb-3">Home Service</h4>
                <p class="text-slate-400 text-sm leading-relaxed">Tidak sempat ke bengkel? Kami datang ke rumah atau kantor Anda. Gratis biaya kunjungan area Jabodetabek.</p>
            </div>

            <div class="bg-slate-800/50 backdrop-blur border border-white/5 p-8 rounded-2xl hover:bg-slate-800 transition-colors group">
                <div class="w-12 h-12 bg-slate-700 rounded-lg flex items-center justify-center text-brand-primary mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </div>
                <h4 class="text-xl font-bold mb-3">Garansi Resmi</h4>
                <p class="text-slate-400 text-sm leading-relaxed">Anda mendapatkan kartu garansi fisik/e-warranty yang bisa diklaim di seluruh jaringan dealer resmi Indonesia.</p>
            </div>
        </div>
    </div>
</section>

<section class="py-12 bg-white border-b border-gray-100">
    <div class="container mx-auto px-6">

        <div class="container mx-auto px-4 mb-10 text-center">
            <span class="text-blue-600 font-semibold tracking-widest uppercase text-sm">Authorized Dealer & Installer</span>
            <h2 class="text-4xl font-extrabold text-gray-900 mt-2">Daftar Pilihan Merk Kaca Film</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach (\App\Models\Partner::all() as $showPartner)
                <a href="{{ route('brand.detail', ['id' => $showPartner->id, 'slug' => Str::slug($showPartner->name)]) }}" 
                   class="group bg-white border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col overflow-hidden">
                    
                    <div class="flex-grow flex items-center justify-center p-8 min-h-[180px]">
                        @if($showPartner->logo_path)
                            <img src="{{ asset('storage/' . $showPartner->logo_path) }}" 
                                 class="max-h-20 w-auto object-contain transition-transform duration-500 group-hover:scale-110" 
                                 alt="{{ $showPartner->name }}">
                        @else
                            <span class="text-xl font-bold text-gray-300 uppercase tracking-tighter italic">
                                {{ $showPartner->name }}
                            </span>
                        @endif
                    </div>

                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 py-3 px-4">
                        <p class="text-white text-center text-xs font-bold uppercase tracking-widest">
                            MERK {{ $showPartner->name }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>

<section class="py-12 bg-brand-primary relative overflow-hidden">
    <div class="absolute inset-0 bg-black/10"></div>
    <div class="container mx-auto px-6 relative z-10 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Konsultasikan Kebutuhan Anda Sekarang</h2>
        <p class="text-white/90 max-w-2xl mx-auto mb-10 text-lg">
            Bingung memilih spesifikasi VLT atau TSER yang pas? Tim kami siap membantu memberikan rekomendasi terbaik sesuai budget dan jenis mobil Anda.
        </p>
        <div class="flex flex-col md:flex-row justify-center gap-4">
            <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '' }}" target="_blank" 
               class="bg-white text-brand-primary font-bold px-8 py-4 rounded-full shadow-lg hover:shadow-xl hover:bg-gray-50 transition-all transform hover:-translate-y-1 flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                Chat WhatsApp
            </a>
            <a href="{{ route('portfolio.index') }}" 
               class="bg-transparent border-2 border-white text-white font-bold px-8 py-4 rounded-full hover:bg-white/10 transition-colors flex items-center justify-center">
                Lihat Portfolio
            </a>
        </div>
    </div>
</section>

@endsection