@extends('layouts.app')
@section('title', 'Home - ' . __('message.specialist_title'))
@section('description', $settings['site_description'] ?? 'Layanan pemasangan kaca film mobil dan gedung spesialis di Banten. Tersedia layanan home service, tolak panas maksimal, garansi resmi.')
@section('keywords', 'kaca film banten, kaca film mobil serang, kaca film cilegon, pasang kaca film panggilan')

@section('content')
    <section class="relative h-screen flex items-center justify-center text-center px-6 overflow-hidden -mt-20">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('images/hero.webp') }}" fetchpriority="high" 
                 width="1920" height="1080" class="w-full h-full object-cover" alt="Background Mobil Mewah">
            <div class="absolute inset-0 bg-brand-dark/80 mix-blend-multiply"></div>
        </div>

        <div class="relative z-10 max-w-4xl mx-auto text-white">
            <span class="bg-brand-primary/20 text-brand-primary px-4 py-1 rounded-full text-sm font-bold uppercase tracking-wider mb-4 inline-block backdrop-blur-sm border border-brand-primary/30">
                {{ __('message.hero_subtitle')}}
            </span>
            <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight">
                {{ __('message.hero_title1') }}, <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-primary to-brand-accent">{{ __('message.hero_title2') }}.</span>
            </h1>
            <p class="text-gray-300 text-lg md:text-xl mb-10 max-w-2xl mx-auto">
                {{ __('message.description_hero') }}
            </p>
            <div class="flex flex-col md:flex-row gap-4 justify-center">
                <a href="{{ route('whatsapp.redirect') }}?text={{ urlencode('Halo Fatih Jaya, saya tertarik pasang kaca film') }}" 
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
        
        <div class="flex overflow-hidden group">
            <div class="flex items-center w-max animate-marquee">
                @for ($j = 0; $j < 2; $j++)
                    <div class="flex items-center">
                        @foreach ($partners as $partner)
                            <div class="flex items-center justify-center px-10">
                                <div class="w-32 h-16 flex items-center justify-center">
                                    <img src="{{ $partner->logo_path ? asset('storage/' . $partner->logo_path) : asset('images/logo.webp') }}" 
                                    alt="Logo {{ $partner->name }}" width="128" height="64" 
                                    class="max-h-12 w-auto object-contain filter grayscale opacity-50 hover:opacity-100 hover:grayscale-0 transition-all duration-500"
                                    onerror="this.src='{{ asset('images/logo.webp') }}'">
                                </div>
                                <div class="w-1.5 h-1.5 bg-gray-200 rounded-full ml-10"></div>
                            </div>
                        @endforeach
                    </div>
                @endfor
            </div>
        </div>
    </section>

    <section id="tentang" class="py-12 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="relative">
                    <div class="absolute -top-4 -left-4 w-24 h-24 bg-brand-primary/20 rounded-full z-0"></div>
                    <img src="{{ asset('images/about-me.webp') }}" loading="lazy" 
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
                            <span class="font-semibold text-slate-700 text-sm">{{ __('message.consultation') }}</span>
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

    <section id="advantage" class="py-20 bg-brand-dark relative overflow-hidden">
        <div class="absolute top-10 left-10 w-32 h-32 bg-blue-500/10 rounded-full blur-2xl animate-pulse"></div>
        <div class="absolute bottom-10 right-10 w-40 h-40 bg-brand-primary/10 rounded-full blur-2xl animate-bounce" style="animation-duration: 5s"></div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">{{ __('message.advantage_title') }}</h2>
                <div class="w-24 h-1 bg-brand-primary mx-auto rounded-full"></div>
            </div>
            @php
                $highestTser = $partners->flatMap->products->max('max_tser') ?? 79;
                $highestIrr = $partners->flatMap->products->max('max_irr') ?? 79;
                // $highestVlt = $partners->flatMap->products->max('max_vlt') ?? 79;
            @endphp
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8">
                
                <div class="group relative p-8 bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl hover:bg-brand-primary/10 hover:border-brand-primary/50 transition-all duration-500 animate-float" style="animation-delay: 0s">
                    <div class="absolute -top-4 -right-4 w-12 h-12 bg-yellow-400/20 rounded-full blur-xl group-hover:blur-2xl transition-all"></div>
                    <div class="text-4xl md:text-5xl font-extrabold text-yellow-400 mb-4 tracking-tighter">{{ $highestIrr }}%</div>
                    <h3 class="text-sm md:text-base font-bold uppercase tracking-widest text-white mb-2">UV Protection</h3>
                    <p class="text-xs md:text-sm text-gray-400 group-hover:text-gray-200 transition">{{ __('message.advantage_grid1') }}</p>
                </div>
                    
                <div class="group relative p-8 bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl hover:bg-brand-primary/10 hover:border-brand-primary/50 transition-all duration-500 animate-float" style="animation-delay: 0.5s">
                    <div class="absolute -top-4 -right-4 w-12 h-12 bg-brand-primary/20 rounded-full blur-xl group-hover:blur-2xl transition-all"></div>
                    
                    <div class="text-4xl md:text-5xl font-extrabold text-brand-primary mb-4 tracking-tighter">{{ $highestTser }}%</div>
                    <h3 class="text-sm md:text-base font-bold uppercase tracking-widest text-white mb-2">Heat Rejection</h3>
                    <p class="text-xs md:text-sm text-gray-400 group-hover:text-gray-200 transition">{{ __('message.advantage_grid2') }}</p>
                </div>

                <div class="group relative p-8 bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl hover:bg-brand-primary/10 hover:border-brand-primary/50 transition-all duration-500 animate-float" style="animation-delay: 0.2s">
                    <div class="absolute -top-4 -right-4 w-12 h-12 bg-green-400/20 rounded-full blur-xl group-hover:blur-2xl transition-all"></div>
                    <div class="text-4xl md:text-5xl font-extrabold text-green-400 mb-4 tracking-tighter">5 Thn</div>
                    <h3 class="text-sm md:text-base font-bold uppercase tracking-widest text-white mb-2">Garansi Resmi</h3>
                    <p class="text-xs md:text-sm text-gray-400 group-hover:text-gray-200 transition">{{ __('message.advantage_grid3') }}</p>
                </div>

                <div class="group relative p-8 bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl hover:bg-brand-primary/10 hover:border-brand-primary/50 transition-all duration-500 animate-float" style="animation-delay: 0.7s">
                    <div class="absolute -top-4 -right-4 w-12 h-12 bg-purple-400/20 rounded-full blur-xl group-hover:blur-2xl transition-all"></div>
                    <div class="text-4xl md:text-5xl font-extrabold text-purple-400 mb-4 tracking-tighter">80%</div>
                    <h3 class="text-sm md:text-base font-bold uppercase tracking-widest text-white mb-2">Glare Reduction</h3>
                    <p class="text-xs md:text-sm text-gray-400 group-hover:text-gray-200 transition">{{ __('message.advantage_grid4') }}</p>
                </div>

            </div>
        </div>
    </section>

    <section id="feature" class="py-10 bg-white overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center gap-12">
                
                <div class="w-full md:w-1/2">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="w-10 h-[2px] bg-brand-primary"></span>
                        <span class="text-brand-primary font-bold uppercase tracking-widest text-sm">{{ __('message.features_title')}}</span>
                    </div>
                    <h2 class="text-4xl font-extrabold text-slate-900 mb-8 leading-tight">
                        {!! __('message.features_subtitle')!!}
                    </h2>

                    <div class="space-y-8">
                        @if($about && $about->values)
                            @foreach($about->values as $item)
                            <div class="flex gap-3">
                                <div class="flex-shrink-0">
                                    <div class="w-12 h-12 bg-brand-primary/10 rounded-lg flex items-center justify-center text-brand-primary">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <h3 class="text-xl font-bold text-slate-900">{{ $item['title'] ?? 'Judul' }}</h3>
                                    <p class="text-slate-600 leading-relaxed text-sm">
                                        {{ $item['description'] ?? 'Deskripsi layanan terbaik kami untuk Anda.' }}
                                    </p>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <div class="w-full md:w-1/2 relative">
                    <div class="absolute -top-12 -left-12 w-40 h-40 bg-orange-200/40 -z-10 rounded-3xl animate-pulse"></div>
                    <div class="absolute top-20 -right-10 w-20 h-20 bg-brand-primary/10 -z-10 rounded-full animate-bounce" style="animation-duration: 3s;"></div>
                    
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl z-10 group border-8 border-white">
    
                        <img src="{{ ($about && $about->main_image) ? asset('storage/' . $about->main_image) : ($portfolioImage ? asset('storage/' . $portfolioImage->image_path) : asset('images/about.webp')) }}" 
                            alt="{{ $about->heading ?? 'Fatih Jaya Film' }}" 
                            class="w-full h-[500px] object-cover transform group-hover:scale-110 transition duration-1000" 
                            fetchpriority="high">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                        
                        @if(!($about && $about->main_image) && $portfolioImage)
                            <div class="absolute top-5 left-5 z-10">
                                <span class="bg-brand-primary text-white text-[10px] px-3 py-1 rounded-full font-bold uppercase tracking-wider shadow-lg">
                                    {{ $portfolioImage->service->name ?? 'Kaca Film' }}
                                </span>
                            </div>
                        @endif
                    </div>

                    <div class="absolute inset-0 z-10 pointer-events-none">
                        @foreach($randomPartners as $index => $p)
                            @php
                                // Atur posisi berbeda untuk tiap popup
                                $positions = [
                                    0 => "top-10 -right-6",   
                                    1 => "bottom-20 -left-8", 
                                    2 => "bottom-10 right-10"
                                ];
                                $delay = [0 => "0s", 1 => "1s", 2 => "2s"];
                            @endphp
                            
                            <div class="absolute {{ $positions[$index] }} bg-white/90 backdrop-blur-md p-3 rounded-xl shadow-lg border border-gray-100 flex items-center gap-3 animate-float pointer-events-auto"
                                style="animation-delay: {{ $delay[$index] }}">
                                <div class="w-10 h-10 bg-gray-50 rounded-lg flex items-center justify-center overflow-hidden">
                                    @if($p->logo_path)
                                        <img src="{{ asset('storage/' . $p->logo_path) }}" class="w-full h-full object-contain p-1" alt="Logo">
                                    @else
                                        <span class="text-[10px] font-bold text-gray-400">FJ</span>
                                    @endif
                                </div>
                                <div class="pr-2">
                                    <p class="text-[10px] text-gray-500 font-semibold uppercase tracking-tighter">Official Partner</p>
                                    <p class="text-xs font-bold text-slate-800">{{ $p->name }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="absolute -bottom-8 -right-8 w-32 h-32 bg-brand-primary/10 -z-10 rounded-sm rotate-12"></div>
                </div>

            </div>
        </div>
    </section>

    <section id="layanan" class="py-10 bg-white">
        <div class="container mx-auto px-6">
            
            <div class="flex flex-col lg:flex-row lg:items-end justify-between mb-12 gap-8">
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <span class="w-10 h-[2px] bg-brand-primary"></span>
                        <span class="text-brand-primary font-bold uppercase tracking-widest text-sm">{{ __('message.services_title')}}</span>
                    </div>
                    <h2 class="text-4xl font-extrabold text-slate-900">{{ __('message.services_subtitle')}}</h2>
                </div>

                <div class="flex flex-wrap gap-2">
                    <button onclick="filterService('all', this)" class="filter-btn active-filter px-5 py-2 rounded-full border border-gray-200 text-sm font-bold transition-all">
                        Semua
                    </button>
                    @foreach($categories as $cat)
                        <button onclick="filterService('cat-{{ $cat->id }}', this)" class="filter-btn px-5 py-2 rounded-full border border-gray-200 text-sm font-bold transition-all">
                            {{ $cat->name }}
                        </button>
                    @endforeach
                </div>

                <div class="hidden lg:flex gap-3">
                    <button aria-label="Slide Sebelumnya" class="nav-prev w-12 h-12 rounded-full border border-gray-200 flex items-center justify-center hover:bg-brand-primary hover:text-white transition-all shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    </button>
                    <button aria-label="Slide Selanjutnya" class="nav-next w-12 h-12 rounded-full border border-gray-200 flex items-center justify-center hover:bg-brand-primary hover:text-white transition-all shadow-sm">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </button>
                </div>
            </div>

            <div class="swiper service-swiper overflow-visible">
                <div class="swiper-wrapper">
                    @foreach($services as $service)
                    <div class="swiper-slide service-item cat-{{ $service->category_id }}">
                        <div class="group flex flex-col h-full bg-white rounded-2xl p-4 border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-500">
                            <div class="relative h-60 rounded-xl overflow-hidden mb-6">
                                <img src="{{ $service->image ? asset('storage/' . $service->image) : 'https://images.unsplash.com/photo-1619642751034-765dfdf7c58e?q=80&w=1974&auto=format&fit=crop&w=800' }}" alt="Layanan {{ $service->name }}" width="400" height="300" loading="lazy" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                                <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm px-3 py-1 rounded-md text-[10px] font-bold uppercase text-slate-800">
                                    {{ $service->category->name }}
                                </div>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 mb-2 group-hover:text-brand-primary transition-colors">
                                {{ $service->name }}
                            </h3>
                            <p class="text-slate-500 text-sm line-clamp-2 mb-2">{{ strip_tags($service->subtitle) }}</p>
                            
                            <div class="mt-auto pt-4 border-t flex items-center justify-between">
                                <div class="flex flex-col">
                                    <span class="text-[10px] text-gray-400 uppercase font-bold tracking-wider">{{ __('message.service_price_from')}}</span>
                                    <span class="text-lg font-extrabold text-slate-900">
                                        @if($service->price >= 1000000)
                                            Rp {{ number_format($service->price / 1000000, 1, ',', '.') }}jt
                                        @else
                                            Rp {{ number_format($service->price / 1000, 0) }}k
                                        @endif
                                    </span>
                                </div>
                                
                                <a href="{{ route('service.show', $service->slug) }}" aria-label="Lihat detail layanan {{ $service->name }}" class="w-12 h-12 bg-slate-900 group-hover:bg-brand-primary text-white rounded-full flex items-center justify-center transition-all duration-300 transform group-hover:rotate-45 shadow-lg shadow-slate-200">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-pagination !static mt-10 lg:hidden"></div>
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

    @if($testimonials->count() > 0)
    <section class="py-10 bg-white overflow-hidden">
        <div class="container mx-auto px-4 mb-10 text-center">
            <span class="text-blue-600 font-semibold tracking-widest uppercase text-sm">{{ __('message.testimonials_title') }}</span>
            <h2 class="text-4xl font-extrabold text-gray-900 mt-2">{{ __('message.testimonials_subtitle') }}</h2>
        </div>

        <div class="testimonial-wrapper group">
            <div class="marquee-container">
                <div class="marquee-content">
                    @foreach($displayItems as $item)
                    <div class="testimonial-card">
                        <div>
                            <div class="flex gap-1 text-yellow-400 mb-6">
                                @for($i = 0; $i < $item->rating; $i++)
                                    <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                @endfor
                            </div>

                            <div class="testimonial-text text-gray-600 text-lg leading-relaxed">
                                {{ (strip_tags($item->content)) }}
                            </div>
                        </div>

                        <div class="flex items-center mt-8">
                            <img class="h-12 w-12 rounded-full object-cover ring-2 ring-blue-50" 
                                src="{{ $item->avatar ? asset('storage/'.$item->avatar) : 'https://ui-avatars.com/api/?name='.urlencode($item->name).'&background=3b82f6&color=fff' }}" 
                                alt="">
                            <div class="ml-4">
                                <p class="text-base font-bold text-gray-900">{{ $item->name }}</p>
                                <p class="text-sm text-blue-600 font-medium">{{ $item->profession }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @endif

    <section class="py-10 bg-brand-dark relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-brand-primary/10 rounded-full blur-3xl -mr-20 -mt-20"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl -ml-20 -mb-20"></div>

        <div class="container mx-auto px-6 relative z-10 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-6">{{ __('message.offer_title') }}</h2>
            <p class="text-gray-400 text-lg mb-10 max-w-2xl mx-auto">
                {{ __('message.offer_subtitle') }}
            </p>
            <a href="{{ route('whatsapp.redirect') }}" class="inline-flex items-center gap-3 bg-brand-primary text-brand-dark font-bold px-10 py-5 rounded-full hover:bg-white hover:scale-105 transition duration-300 shadow-2xl shadow-emerald-900/50">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                {{ __('message.offer_button') }}
            </a>
        </div>
    </section>
@endsection
@push('scripts')
    <script type="application/ld+json">
        {
        "@context": "https://schema.org",
        "@type": "AutoBodyShop",
        "name": "CV Fatih Jaya Film",
        "description": "{{ __('message.description_hero') }}",
        "image": "{{ asset('images/hero.webp') }}",
        "telephone": "+6283805060813"
        }
    </script>
@endpush
