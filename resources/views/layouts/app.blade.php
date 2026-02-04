<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $settings['site_name'] ?? 'Fatih Jaya Film')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.webp') }}">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
    
    {{-- @stack('styles') --}}
</head>
<body class="bg-gray-50 text-slate-800 font-sans antialiased flex flex-col min-h-screen">

    <nav x-data="{ open: false, scrolled: false, serviceMenuOpen: false }" 
         @scroll.window="scrolled = (window.pageYOffset > 20)"
         :class="scrolled ? 'bg-white/100 backdrop-blur-md shadow-md py-3' : 'bg-transparent py-5'"
         class="fixed w-full top-0 z-20 transition-all duration-300">
        <div class="container mx-auto px-6 py-0 flex justify-between items-center">
            <a href="#" class="flex items-center gap-3">
                <img src="{{ asset('images/logo-brandname.webp') }}" loading="lazy" 
                    alt="Fatih Jaya Film" 
                    class="h-10 w-auto">
            </a>

            <div class="hidden md:flex items-center gap-8">
                <a href="#tentang" class="text-sm font-semibold text-gray-600 hover:text-brand-primary transition">{{ __('message.about') }}</a>
                {{-- <div class="relative" @mouseenter="serviceMenuOpen = true" @mouseleave="serviceMenuOpen = false">
                    <button class="flex items-center gap-1 text-sm font-semibold text-slate-600 hover:text-brand-primary transition tracking-wider">
                        Layanan 
                        <svg class="w-4 h-4 transition-transform" :class="serviceMenuOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div x-show="serviceMenuOpen" x-transition class="absolute left-0 mt-0 w-56 bg-white shadow-2xl rounded-2xl border border-gray-100 py-3 overflow-hidden">
                        @foreach(\App\Models\Service::where('is_featured', true)->get() as $navService)
                            <a href="{{ route('service.show', $navService->slug) }}" class="block px-5 py-2.5 text-sm text-slate-600 hover:bg-green-50 hover:text-brand-primary transition">
                                {{ $navService->name }}
                            </a>
                        @endforeach
                    </div>
                </div> --}}
                <a href="#layanan" class="text-sm font-semibold text-gray-600 hover:text-brand-primary transition">{{ __('message.services') }}</a>
                <a href="{{ route('portfolio.index') }}" class="text-sm font-semibold text-gray-600 hover:text-brand-primary transition">{{ __('message.portfolio') }}</a>
                <div class="flex items-center bg-gray-100 p-1 rounded-full border border-gray-200">
                    <a href="{{ route('lang.switch', 'id') }}" 
                       class="px-3 py-1 text-[10px] font-bold rounded-full transition {{ app()->getLocale() == 'id' ? 'bg-white shadow-sm text-brand-primary' : 'text-gray-400 hover:text-slate-600' }}">
                        ID
                    </a>
                    <a href="{{ route('lang.switch', 'en') }}" 
                       class="px-3 py-1 text-[10px] font-bold rounded-full transition {{ app()->getLocale() == 'en' ? 'bg-white shadow-sm text-brand-primary' : 'text-gray-400 hover:text-slate-600' }}">
                        EN
                    </a>
                </div>
                
                <a href="{{ route('whatsapp.redirect') }}" 
                class="bg-brand-dark text-white px-6 py-2.5 rounded-full text-sm font-bold hover:bg-brand-primary transition shadow-lg shadow-brand-primary/20">
                    {{ __('message.consultation') }}
                </a>
            </div>

            <button @click="open = !open" class="md:hidden text-brand-dark focus:outline-none">
                <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                <svg x-show="open" x-cloak class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>

        <div x-show="open" x-cloak @click.away="open = false" class="md:hidden bg-white border-t border-gray-100 shadow-xl">
            <div class="flex flex-col p-6 space-y-4">
                <a href="#tentang" @click="open = false" class="text-gray-600 font-semibold">{{ __('message.about') }}</a>
                <a href="#layanan" @click="open = false" class="text-gray-600 font-semibold">{{ __('message.services') }}</a>
                <a href="#portfolio" @click="open = false" class="text-gray-600 font-semibold">{{ __('message.portfolio') }}</a>
                <a href="#kontak" @click="open = false" class="text-gray-600 font-semibold">{{ __('message.contact') }}</a>
                <div class="flex items-center bg-gray-100 p-1 rounded-full border border-gray-200 w-max">
                    <a href="{{ route('lang.switch', 'id') }}" 
                       @click="open = false"
                       class="px-3 py-1 text-[10px] font-bold rounded-full transition {{ app()->getLocale() == 'id' ? 'bg-white shadow-sm text-brand-primary' : 'text-gray-400 hover:text-slate-600' }}">
                        ID
                    </a>
                    <a href="{{ route('lang.switch', 'en') }}" 
                       @click="open = false"
                       class="px-3 py-1 text-[10px] font-bold rounded-full transition {{ app()->getLocale() == 'en' ? 'bg-white shadow-sm text-brand-primary' : 'text-gray-400 hover:text-slate-600' }}">
                        EN
                    </a>
                </div>
                <a href="{{ route('whatsapp.redirect') }}" class="bg-brand-dark text-white text-center py-3 rounded-full font-bold">
                    {{ __('message.consultation') }}
                </a>
            </div>
        </div>
    </nav>

    <main class="flex-grow pt-20"> @yield('content')
    </main>

    <footer id="kontak" class="bg-brand-dark text-white pt-16 pb-6">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                
                <div class="md:col-span-1">
                    <div class="flex items-center gap-2 mb-6">
                        {{-- <div class="w-8 h-8 bg-brand-primary rounded flex items-center justify-center font-bold text-brand-dark">F</div> --}}
                        <span class="font-bold text-xl">CV Fatih Jaya<span class="text-brand-primary"> Film</span></span>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed mb-6">
                        {{ __('message.desc_footer') }}
                    </p>
                </div>

                <div>
                    <h4 class="font-bold text-lg mb-6">{{ __('message.menuquick_footer') }}</h4>
                    <ul class="space-y-3 text-gray-400 text-sm">
                        <li><a href="#tentang" class="hover:text-brand-primary transition">{{ __('message.about') }}</a></li>
                        <li><a href="#layanan" class="hover:text-brand-primary transition">{{ __('message.services') }}</a></li>
                        <li><a href="#portfolio" class="hover:text-brand-primary transition">{{ __('message.portfolio') }}</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-lg mb-6">{{ __('message.contact_footer') }}</h4>
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
                &copy; {{ date('Y') }} CV Fatih Jaya Film. All rights reserved.
            </div>
        </div>
    </footer>

    
    <a href="{{ route('whatsapp.redirect') }}" 
       target="_blank"
       class="fixed bottom-6 right-6 bg-green-500 text-white p-4 rounded-full shadow-2xl hover:bg-green-600 transition duration-300 z-50 animate-bounce">
        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
    </a>

    @stack('scripts')
</body>
</html>