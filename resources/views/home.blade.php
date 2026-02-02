@extends('layouts.app')
@section('title', 'Home - Spesialis Kaca Film')

@section('content')
    <section class="relative h-screen flex items-center justify-center text-center px-6 overflow-hidden -mt-20">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/hero.webp') }}" loading="lazy" 
                 class="w-full h-full object-cover" alt="Background Mobil Mewah">
            <div class="absolute inset-0 bg-brand-dark/80 mix-blend-multiply"></div>
        </div>

        <div class="relative z-10 max-w-4xl mx-auto text-white">
            <span class="bg-brand-primary/20 text-brand-primary px-4 py-1 rounded-full text-sm font-bold uppercase tracking-wider mb-4 inline-block backdrop-blur-sm border border-brand-primary/30">
                Authorized Dealer & Installer
            </span>
            <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                {{ __('message.hero_title1') }}, <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-primary to-brand-accent">{{ __('message.hero_title2') }}.</span>
            </h1>
            <p class="text-gray-300 text-lg md:text-xl mb-10 max-w-2xl mx-auto">
                {{ __('message.description_hero') }}
            </p>
            <div class="flex flex-col md:flex-row gap-4 justify-center">
                <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '' }}?text=Halo%20Fatih%20Jaya,%20saya%20tertarik%20pasang%20kaca%20film" 
                   class="bg-brand-primary hover:bg-green-600 text-white font-bold py-4 px-8 rounded-full transition shadow-lg shadow-sky-500/30 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                    {{ __('message.buttonbooking_hero') }}
                </a>
                <a href="#portfolio" class="bg-white/10 hover:bg-white/20 backdrop-blur border border-white/30 text-white font-bold py-4 px-8 rounded-full transition flex items-center justify-center">
                    {{ __('message.buttonview_hero') }}
                </a>
            </div>
        </div>
    </section>

    <section class="bg-white py-8 border-b overflow-hidden">
        <div class="container mx-auto px-6 mb-6 text-center">
            <p class="text-sm font-semibold text-gray-400 uppercase tracking-widest">{{ __('message.section_partners') }}</p>
        </div>

        @php
            // Menghitung jumlah partner yang diinput di CMS
            $count = count($partners);            
            $repeat = $count > 0 ? ceil(12 / $count) : 1;
            // Pastikan minimal loop 2 kali untuk keperluan seamless animation
            if ($repeat < 2) $repeat = 2; 
        @endphp
        
        <div   div class="flex overflow-hidden group">
            <div class="flex items-center w-max animate-marquee">
                
                <div class="flex items-center">
                    @for ($i = 0; $i < $repeat; $i++)
                        @foreach ($partners as $partner)
                        <div class="flex items-center justify-center px-10">
                            <div class="w-32 h-16 flex items-center justify-center">
                                <img src="{{ asset('storage/' . $partner->logo_path) }}" loading="lazy" 
                                    alt="{{ $partner->name }}" 
                                    class="max-h-12 w-auto object-contain filter grayscale opacity-50 hover:opacity-100 hover:grayscale-0 transition-all duration-500">
                            </div>
                            <div class="w-1.5 h-1.5 bg-gray-200 rounded-full ml-10"></div>
                        </div>
                        @endforeach
                    @endfor
                </div>

                <div class="flex items-center">
                    @for ($i = 0; $i < $repeat; $i++)
                        @foreach ($partners as $partner)
                        <div class="flex items-center justify-center px-10">
                            <div class="w-32 h-16 flex items-center justify-center">
                                <img src="{{ asset('storage/' . $partner->logo_path) }}" 
                                    alt="{{ $partner->name }}" loading="lazy"
                                    class="max-h-12 w-auto object-contain filter grayscale opacity-50 hover:opacity-100 hover:grayscale-0 transition-all duration-500">
                            </div>
                            <div class="w-1.5 h-1.5 bg-gray-200 rounded-full ml-10"></div>
                        </div>
                        @endforeach
                    @endfor
                </div>

            </div>
        </div>
    </section>

    <section id="tentang" class="py-12 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="relative">
                    <div class="absolute -top-4 -left-4 w-24 h-24 bg-brand-primary/20 rounded-full z-0"></div>
                    <img src="{{asset('images/about.webp')}}" loading="lazy" 
                         alt="About CV Fatih Jaya" 
                         class="relative z-10 rounded-2xl shadow-2xl">
                    <div class="absolute -bottom-4 -right-4 md:-bottom-6 md:-right-6 bg-white p-6 rounded-xl shadow-xl z-10 border-l-4 border-brand-primary">
                        <p class="text-4xl font-bold text-brand-primary">{{ $experience }}+</p>
                        <p class="text-gray-600 text-sm">{{ __('message.about_experience') }}</p>
                    </div>
                </div>
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold mb-6 text-slate-800">{{ __('message.about_title1') }} <br> <span class="text-brand-primary">{{ __('message.about_title2') }}</span></h2>
                    <p class="text-gray-600 mb-4 leading-relaxed">
                        {{ __('message.about_description') }}
                    </p>
                    {{-- <ul class="space-y-4 mb-8">
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
                    </ul> --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 mb-8">
                        <div class="flex items-center gap-3 bg-white rounded-lg">
                            <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center text-sky-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <span class="font-semibold text-slate-700 text-sm">{{ __('message.about_span1') }}</span>
                        </div>
                        <div class="flex items-center gap-3 bg-white rounded-lg">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <span class="font-semibold text-slate-700 text-sm">{{ __('message.about_span2') }}</span>
                        </div>
                        <div class="flex items-center gap-3 bg-white rounded-lg">
                            <div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center text-purple-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <span class="font-semibold text-slate-700 text-sm">{{ __('message.about_span3') }}</span>
                        </div>
                        <div class="flex items-center gap-3 bg-white rounded-lg">
                            <div class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center text-sky-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <span class="font-semibold text-slate-700 text-sm">{{ __('message.about_span4') }}</span>
                        </div>
                        <div class="flex items-center gap-3 bg-white rounded-lg">
                            <div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center text-sky-500">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <span class="font-semibold text-slate-700 text-sm">{{ __('message.about_span5') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section id="tentang" class="py-24 bg-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-gray-50 rounded-full -mr-32 -mt-32 z-0"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-50/50 rounded-full -ml-48 -mb-48 z-0"></div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="flex flex-col lg:flex-row gap-16 items-center">
                
                <div class="w-full lg:w-1/2 relative">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl">
                        <img src="{{asset('images/about.png')}}" 
                            alt="Teknisi Profesional" 
                            class="w-full h-auto object-cover transform hover:scale-105 transition duration-700">
                        <div class="absolute bottom-0 left-0 bg-brand-dark text-white p-6 rounded-tr-2xl">
                            <span class="block text-4xl font-bold text-brand-primary">5+</span>
                            <span class="text-sm font-light tracking-wide">Tahun<br>Pengalaman</span>
                        </div>
                    </div>
                    <div class="absolute -z-10 top-6 -right-6 w-full h-full border-2 border-brand-primary/30 rounded-2xl"></div>
                </div>

                <div class="w-full lg:w-1/2">
                    <span class="text-brand-primary font-bold uppercase tracking-widest text-sm mb-2 block">Tentang Fatih Jaya Film</span>
                    <h2 class="text-4xl lg:text-5xl font-bold mb-6 text-slate-900 leading-tight">
                        Bukan Sekadar <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-primary to-brand-accent">Pemasangan Biasa.</span>
                    </h2>
                    <p class="text-gray-600 mb-6 text-lg leading-relaxed">
                        Kami memahami bahwa mobil dan gedung Anda adalah aset berharga. Oleh karena itu, PT Fatih Jaya Film menerapkan standar instalasi <span class="font-semibold text-slate-800">"Zero Dust Tolerance"</span> untuk memastikan hasil yang jernih, rapi, dan tahan lama.
                    </p>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                        <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg border border-gray-100">
                            <div class="w-8 h-8 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <span class="font-semibold text-slate-700 text-sm">Garansi Resmi Brand</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg border border-gray-100">
                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <span class="font-semibold text-slate-700 text-sm">Teknisi Bersertifikat</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg border border-gray-100">
                            <div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center text-orange-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <span class="font-semibold text-slate-700 text-sm">Home Service Gratis</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg border border-gray-100">
                            <div class="w-8 h-8 rounded-full bg-purple-100 flex items-center justify-center text-purple-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <span class="font-semibold text-slate-700 text-sm">Konsultasi Gratis</span>
                        </div>
                    </div>

                    <a href="#portfolio" class="inline-flex items-center gap-2 text-brand-primary font-bold hover:text-brand-dark transition group">
                        Lihat Bukti Kerja Kami 
                        <svg class="w-5 h-5 transform group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </section> --}}

    <section id="layanan" class="py-10 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-14">
                <span class="text-brand-primary font-bold uppercase tracking-wider text-sm">{{ __('message.services_title') }}</span>
                <h2 class="text-3xl md:text-4xl font-bold mt-2 text-slate-800">{{ __('message.services_subtitle') }}</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($services as $service)
                <div class="group bg-white p-8 rounded-3xl shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 border border-gray-100 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-1 bg-brand-primary scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></div>
                    
                    <div class="w-16 h-16 bg-brand-surface rounded-2xl flex items-center justify-center text-brand-primary mb-8 group-hover:bg-brand-primary group-hover:text-white transition-colors duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    
                    <h3 class="text-2xl font-bold text-slate-900 mb-3">{{ $service->name }}</h3>
                    <p class="text-gray-500 mb-6 line-clamp-2">
                        {{ Str::limit(strip_tags($service->description), 100) }}
                    </p>
                    
                    <div class="flex justify-between items-center pt-6 border-t border-gray-100">
                        <a href="{{ route('service.show', $service->slug) }}" class="inline-flex items-center justify-between w-full text-slate-800 font-semibold group hover:text-brand-primary transition">
                            <span class="text-sm font-bold text-slate-400">{{ __('message.service_price_from') }} Rp {{ number_format($service->price / 1000, 0) }}k</span>
                            <span class="text-brand-primary font-bold text-sm flex items-center gap-1 group-hover:gap-2 transition-all">
                                Detail <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </span>
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-3 text-center text-gray-400">Belum ada layanan yang diinput.</div>
                @endforelse
            </div>
        </div>
    </section>

    <section id="portfolio" class="py-10 bg-white">
        <div class="container mx-auto px-6">
            <div class="flex flex-col-1 md:flex-row-2 justify-between items-end mb-12">
                {{-- grid grid-cols-1 md:grid-cols-2 gap-12 items-center --}}
                <div>
                    <span class="text-brand-primary font-bold uppercase tracking-wider text-sm">{{ __('message.portfolio_title') }}</span>
                    <h2 class="text-3xl md:text-4xl font-bold mt-2 text-slate-800">{{ __('message.portfolio_subtitle') }}</h2>
                </div>
                <a href="{{ route('portfolio.index') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-full border border-gray-200 text-slate-700 font-bold hover:bg-brand-dark hover:text-white hover:border-brand-dark transition duration-300">
                    {{ __('message.view_all_portfolio') }}
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($portfolios as $portfolio)
                <div class="group block relative rounded-2xl overflow-hidden cursor-pointer">
                    
                    <div class="h-[400px] overflow-hidden relative">
                        <img src="{{ asset('storage/' . $portfolio->image_path) }}" 
                             alt="{{ $portfolio->title }}" 
                             loading="lazy"
                             class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700 ease-in-out">
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent opacity-80 group-hover:opacity-90 transition"></div>
                    </div>

                    <div class="absolute bottom-0 left-0 w-full p-8 transform translate-y-2 group-hover:translate-y-0 transition duration-300">
                        <span class="inline-block bg-brand-primary text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-3">
                            {{ $portfolio->service->name ?? 'Project' }}
                        </span>
                        <a href="{{ route('portfolio.show', $portfolio->slug ?? $portfolio->id) }}" class="block">
                            <h3 class="text-2xl font-bold text-white mb-2 leading-tight group-hover:text-brand-primary transition-colors">
                                {{ $portfolio->title }}
                            </h3>
                            
                            <p class="text-gray-300 text-sm line-clamp-2 opacity-0 group-hover:opacity-100 transition duration-300 delay-100">
                                {{ Str::limit(strip_tags($portfolio->description), 100) }}
                            </p>
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-3 py-20 text-center bg-gray-50 rounded-2xl border border-dashed border-gray-300">
                    <p class="text-gray-400">Belum ada portfolio yang ditampilkan.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="py-10 bg-brand-dark relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-brand-primary/10 rounded-full blur-3xl -mr-20 -mt-20"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl -ml-20 -mb-20"></div>

        <div class="container mx-auto px-6 relative z-10 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">{{ __('message.offer_title') }}</h2>
            <p class="text-gray-400 text-lg mb-10 max-w-2xl mx-auto">
                {{ __('message.offer_subtitle') }}
            </p>
            <a href="https://wa.me/{{ $settings['whatsapp_number'] ?? '' }}" class="inline-flex items-center gap-3 bg-brand-primary text-brand-dark font-bold px-10 py-5 rounded-full hover:bg-white hover:scale-105 transition duration-300 shadow-2xl shadow-emerald-900/50">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                {{ __('message.offer_button') }}
            </a>
        </div>
    </section>
@endsection
@push('styles')
    <style>
        [x-cloak] { display: none !important; }
        /* Hide scrollbar for neatness */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        ::selection {
            background-color: #00aeef;
            color: white;
        }
        .text-brand-gradient {
            background: linear-gradient(to right, #00aeef, #ffffff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
@endpush