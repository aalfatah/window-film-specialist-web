@extends('layouts.app')
@section('title', $service->name . ' - ' . __('message.specialist_title'))

@section('content')

{{-- 1. HERO SECTION WITH BACKGROUND IMAGE --}}
<div class="relative h-[60vh] min-h-[500px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="{{ $service->image ? asset('storage/' . $service->image) : 'https://images.unsplash.com/photo-1619642751034-765dfdf7c58e?q=80&w=1974&auto=format&fit=crop' }}" 
             alt="{{ $service->name }}" 
             class="w-full h-full object-cover">
        {{-- Gradient Overlay --}}
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/80 to-slate-900/40"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10 pt-6">
        <div class="max-w-4xl">
            <div class="flex items-center gap-3 mb-6">
                <span class="bg-brand-primary text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow-[0_0_15px_rgba(59,130,246,0.5)]">
                    {{ __('message.services')}}
                </span>
                <span class="text-slate-300 text-sm font-medium tracking-wide">/ {{ $service->category->name ?? 'Automotive' }}</span>
            </div>
            <h1 class="text-4xl md:text-6xl font-black text-white mb-6 leading-tight">
                {{ $service->name }}
            </h1>
            <p class="text-slate-300 text-lg md:text-xl leading-relaxed max-w-2xl mb-10 border-l-4 border-brand-primary pl-6">
                {{ $service->subtitle }}
            </p>
            
            {{-- Quick Stats Buttons --}}
            <div class="flex flex-wrap gap-4">
                <a href="#booking-card" class="bg-brand-primary hover:bg-blue-600 text-white font-bold py-3 px-8 rounded-full transition-all transform hover:-translate-y-1 shadow-lg shadow-blue-500/30">
                    {{ __('message.servicedetail_button') }}
                </a>
                <a href="#portfolio-section" class="bg-white/10 backdrop-blur-md border border-white/20 text-white font-semibold py-3 px-8 rounded-full hover:bg-white/20 transition-all">
                    {{ __('message.buttonview_hero') }}
                </a>
            </div>
        </div>
    </div>
</div>

{{-- 2. TRUST BAR (INFO STRIP) --}}
<div class="bg-white border-b border-gray-100 relative z-10 -mt-8 mx-4 md:mx-auto md:max-w-6xl rounded-xl shadow-xl p-6 md:p-8">
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center divide-x divide-gray-100">
        <div class="flex flex-col items-center gap-2">
            <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-brand-primary">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div>
                <span class="block text-xs text-gray-400 uppercase tracking-widest">{{ __('message.trust_product')}}</span>
                <span class="font-bold text-slate-800">{{ __('message.trust_product_val')}}</span>
            </div>
        </div>
        <div class="flex flex-col items-center gap-2">
            <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-brand-primary">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div>
                <span class="block text-xs text-gray-400 uppercase tracking-widest">{{ __('message.trust_process')}}</span>
                <span class="font-bold text-slate-800">{{ __('message.trust_process_val')}}</span>
            </div>
        </div>
        <div class="flex flex-col items-center gap-2">
            <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-brand-primary">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            </div>
            <div>
                <span class="block text-xs text-gray-400 uppercase tracking-widest">{{ __('message.services')}}</span>
                <span class="font-bold text-slate-800">{{ $service->service_type }}</span>
            </div>
        </div>
        <div class="flex flex-col items-center gap-2">
            <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-brand-primary">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
            </div>
            <div>
                <span class="block text-xs text-gray-400 uppercase tracking-widest">{{ __('message.trust_warranty')}}</span>
                <span class="font-bold text-slate-800">{{ __('message.trust_warranty_val')}}</span>
            </div>
        </div>
    </div>
</div>

<main class="container mx-auto px-6 py-16">
    <div class="flex flex-col lg:flex-row gap-16">
        
        {{-- LEFT COLUMN: CONTENT --}}
        <div class="w-full lg:w-2/3">
            
            {{-- Deskripsi --}}
            <section class="mb-12">
                <h2 class="text-2xl font-bold text-slate-900 mb-6 flex items-center gap-3">
                    <span class="w-10 h-1 bg-brand-primary rounded-full"></span>
                    {{ __('message.servicedetail_h2_1') }}
                </h2>
                {{-- Typography plugin prose is highly recommended here --}}
                <div class="rich-content prose prose-lg prose-slate max-w-none text-slate-600 leading-loose">
                    {!! $service->description !!}
                </div>
            </section>

            {{-- INSERT SETELAH SECTION DESKRIPSI LAYANAN --}}
            <section class="mb-12">
                <h2 class="text-2xl font-bold text-slate-900 mb-8 flex items-center gap-3">
                    <span class="w-10 h-1 bg-brand-primary rounded-full"></span>
                    {{ __('message.servicedetail_h2_2') }}
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($service->packages as $package)
                    <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm hover:shadow-md transition-all">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-lg font-bold text-slate-800">{{ $package->name }}</h3>
                                <span class="text-brand-primary font-bold text-sm">{{ $package->price_label }}</span>
                            </div>
                            <div class="bg-blue-50 p-2 rounded-lg">
                                <svg class="w-5 h-5 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                            </div>
                        </div>
                        
                        <p class="text-slate-500 text-sm mb-6">{{ $package->description }}</p>
                        
                        <div class="space-y-3">
                            @if($package->features)
                                @foreach($package->features as $feature)
                                <div class="flex items-center gap-2 text-sm text-slate-600">
                                    <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                    {{ $feature }}
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>

            {{-- New: Workflow / Tahapan --}}
            <section class="mb-12">
                <h2 class="text-2xl font-bold text-slate-900 mb-8 flex items-center gap-3">
                    <span class="w-10 h-1 bg-brand-primary rounded-full"></span>
                    {{ __('message.servicedetail_h2_3') }}
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach (config('workflow') as $item )
                        <div class="flex gap-4 p-4 rounded-xl bg-slate-50 border border-slate-100 hover:border-brand-primary/30 transition-colors">
                        <span class="flex-shrink-0 w-8 h-8 rounded-full bg-brand-primary text-white flex items-center justify-center font-bold">{{ __($item['label']) }}</span>
                        <div>
                            <h4 class="font-bold text-slate-800">{{ __($item['title']) }}</h4>
                            <p class="text-sm text-slate-500 mt-1">{{ __($item['desc']) }}</p>
                        </div>
                    </div>
                    @endforeach                    
                </div>
            </section>

            {{-- Portfolio --}}
            @if($relatedPortfolios->count() > 0)
            <section id="portfolio-section" class="mb-12">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-2xl font-bold text-slate-900 flex items-center gap-3">
                        <span class="w-10 h-1 bg-brand-primary rounded-full"></span>
                        {{ __('message.portfolio_subtitle') }}
                    </h2>
                    <a href="{{ route('portfolio.index') }}" class="text-sm text-brand-primary font-bold hover:underline">{{ __('message.view_all_portfolio') }} &rarr;</a>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($relatedPortfolios as $portfolio)
                    <div class="group relative rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 bg-white border border-gray-100">
                        <div class="aspect-[4/3] overflow-hidden">
                            <img src="{{ asset('storage/' . $portfolio->image_path) }}" 
                                 alt="{{ $portfolio->title }}" 
                                 class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                        </div>
                        <div class="p-4 relative">
                            <a href="{{ route('portfolio.show', $portfolio->slug) }}">
                                <h3 class="font-bold text-slate-800 text-lg group-hover:text-brand-primary transition-colors">{{ $portfolio->title }}</h3>
                                <p class="text-xs text-slate-400 mt-1">{{ $portfolio->service->name ?? 'Mobil Customer' }}</p>
                            </a>
                        </div>                        
                    </div>
                    @endforeach
                </div>
            </section>
            @endif

            {{-- FAQ Simple Accordion --}}
            <section>
                <h2 class="text-2xl font-bold text-slate-900 mb-6">{{ __('message.servicedetail_h2_4') }}</h2>
                <div class="space-y-4">
                    <details class="group bg-white rounded-xl shadow-sm border border-gray-100 p-4 [&_summary::-webkit-details-marker]:hidden">
                        <summary class="flex items-center justify-between cursor-pointer">
                            <h3 class="font-semibold text-slate-700">{{ __('message.faq_q1')}}</h3>
                            <span class="ml-1.5 flex-shrink-0 bg-gray-100 rounded-full p-1.5 text-gray-900 sm:p-3 group-open:bg-brand-primary group-open:text-white transition">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-5 shrink-0 transition duration-300 group-open:-rotate-180" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </summary>
                        <p class="mt-4 leading-relaxed text-slate-500 text-sm">
                            {{ __('message.faq_a1')}}
                        </p>
                    </details>
                    {{-- Tambahkan FAQ lainnya sesuai kebutuhan --}}
                </div>
            </section>
        </div>

        {{-- RIGHT COLUMN: STICKY SIDEBAR --}}
        <aside class="w-full lg:w-1/3">
            <div id="booking-card" class="sticky top-28 space-y-8">
                
                {{-- 1. Main Price Card --}}
                <div class="bg-white rounded-3xl shadow-2xl shadow-blue-900/10 overflow-hidden border border-slate-100 relative">
                    <div class="absolute top-0 right-0 p-4 opacity-10">
                        <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm.31-8.86c-1.77-.45-2.34-.94-2.34-1.67 0-.84.79-1.43 2.1-1.43 1.38 0 1.9.66 1.94 1.64h1.71c-.05-1.34-.87-2.57-2.49-2.97V5H10.9v1.69c-1.51.32-2.72 1.3-2.72 2.81 0 1.79 1.49 2.69 3.66 3.21 1.95.46 2.34 1.15 2.34 1.87 0 .53-.39 1.39-2.1 1.39-1.6 0-2.23-.72-2.32-1.64H8.04c.1 1.7 1.36 2.66 2.86 2.97V19h2.34v-1.67c1.52-.29 2.72-1.16 2.73-2.77-.01-2.2-1.9-2.96-3.66-3.42z"/></svg>
                    </div>

                    <div class="p-8">
                        <p class="text-slate-500 font-medium text-sm mb-1 uppercase tracking-wider">{{ __('message.service_price_from') }}</p>
                        <div class="flex items-baseline gap-1 mb-6">
                            <span class="text-xs text-slate-500 font-bold">Rp</span>
                            <h3 class="text-4xl font-black text-slate-800 tracking-tight">
                                {{ number_format($service->price, 0, ',', '.') }}
                            </h3>
                        </div>

                        <hr class="border-dashed border-gray-200 mb-6">

                        <ul class="space-y-4 mb-8">
                            <li class="flex items-center gap-3 text-sm font-semibold text-slate-600">
                                <div class="w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                {{ __('message.about_span4') }}
                            </li>
                            <li class="flex items-center gap-3 text-sm font-semibold text-slate-600">
                                <div class="w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                {{ __('message.about_span1') }}
                            </li>
                            <li class="flex items-center gap-3 text-sm font-semibold text-slate-600">
                                <div class="w-6 h-6 rounded-full bg-green-100 text-green-600 flex items-center justify-center flex-shrink-0">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                {{ __('message.about_span2') }}
                            </li>
                        </ul>

                        <a href="{{ route('whatsapp.redirect') }}?text={{ urlencode('Halo, saya ingin booking layanan: ' . $service->name) }}" 
                           class="block w-full bg-brand-primary text-white text-center py-4 rounded-xl font-bold hover:bg-blue-700 transition duration-300 shadow-lg shadow-blue-500/30 mb-3">
                            {{ __('message.offer_button') }}
                        </a>
                        <p class="text-center text-xs text-slate-400">{{ __('message.servicedetail_response') }}</p>
                    </div>
                </div>

                {{-- 2. Promo Banner (Optional) --}}
                <div class="bg-slate-900 rounded-2xl p-6 text-center text-white relative overflow-hidden group cursor-pointer">
                    <div class="absolute inset-0 bg-brand-primary/20 group-hover:bg-brand-primary/30 transition-all"></div>
                    <div class="relative z-10">
                        <h4 class="font-bold text-xl mb-2">{{ __('message.servicedetail_promo') }}</h4>
                        <p class="text-slate-300 text-sm mb-4">{{ __('message.servicedetail_promodesc') }}</p>
                        <a href="{{ route('whatsapp.redirect') }}" class="inline-block text-xs font-bold border border-white/30 px-4 py-2 rounded-full hover:bg-white hover:text-slate-900 transition-all">{{ __('message.servicedetail_askpromo') }}</a>
                    </div>
                </div>

            </div>
        </aside>

    </div>
</main>
@endsection