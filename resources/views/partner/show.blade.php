@extends('layouts.app')

@section('title', $partner->name . ' - Spesifikasi Lengkap')

@section('content')

    <div x-data="{ activeSeries: 0 }">
        
        <div class="relative bg-slate-900 pt-28 pb-16 overflow-hidden">
            <div class="absolute inset-0 z-0 pointer-events-none" aria-hidden="true">
                <div class="absolute top-0 left-1/4 w-96 h-96 bg-brand-primary/10 rounded-full blur-[120px]"></div>
            </div>
            
            <div class="container mx-auto px-6 relative z-10">
                <div class="flex flex-col items-center text-center">
                    @if($partner->logo_path)
                        <div class="bg-white p-6 rounded-3xl shadow-2xl mb-8 transform -rotate-2 hover:rotate-0 transition duration-500">
                            <img src="{{ $partner->logo_path ? asset('storage/'.$partner->logo_path) : asset('images/logo.webp') }}" 
                                alt="logo {{ $partner->name }}" 
                                class="h-20 w-auto object-contain"
                                width="200" height="80"
                                fetchpriority="high"
                                onerror="this.src='{{ asset('images/logo.webp') }}'">
                        </div>
                    @endif
                    
                    <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6">
                        {{ __('message.brand_window_film')}} <span class="text-brand-primary">{{ $partner->name }}</span>
                    </h1>
                    <p class="text-gray-400 text-lg max-w-3xl leading-relaxed">
                        {{ __('message.brand_hero_desc', ['name' => $partner->name]) }}
                    </p>
                </div>
            </div>
        </div>

        <section class="py-12 bg-white border-b border-gray-100">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <span class="text-brand-primary font-bold uppercase tracking-wider text-sm">{{ __('message.brand_comparison_label')}}</span>
                    <h2 class="text-3xl font-bold text-slate-800 mt-2">{{ __('message.brand_comparison_title')}}</h2>
                    <p class="text-gray-500 mt-2">{{ __('message.brand_comparison_desc')}}</p>
                </div>

                <div class="bg-slate-800 rounded-[2.5rem] p-4 md:p-8 border border-white/5 shadow-2xl">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left border-separate border-spacing-y-2">
                            <thead>
                                <tr>
                                    <th class="px-6 py-5 font-bold text-slate-400 uppercase tracking-widest text-xs">{{ __('message.brand_criteria')}}</th>
                                    @foreach($partner->products as $product)
                                        <th class="px-6 py-5 font-black text-white text-center">
                                            <div class="bg-slate-700/50 py-3 rounded-2xl border border-white/5">
                                                <span class="text-brand-primary block text-xs mb-1">Series</span>
                                                {{ $product->name }}
                                            </div>
                                        </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5">
                                {{-- Row VLT --}}
                                <tr class="group">
                                    <td class="px-6 py-6 font-semibold text-slate-300">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-lg bg-blue-500/10 flex items-center justify-center text-blue-400">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                            </div>
                                            {{ __('message.vlt')}}
                                        </div>
                                    </td>
                                    @foreach($partner->products as $product)                        
                                        <td class="px-6 py-6 text-center text-xl font-black text-white">
                                            {{ $product->max_vlt ? $product->max_vlt . '%' : '-' }}
                                        </td>
                                    @endforeach
                                </tr>

                                {{-- Row IRR --}}
                                <tr class="group">
                                    <td class="px-6 py-6 font-semibold text-slate-300">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-lg bg-orange-500/10 flex items-center justify-center text-orange-400">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                            </div>
                                            {{ __('message.irr')}}
                                        </div>
                                    </td>
                                    @foreach($partner->products as $product)
                                        <td class="px-6 py-6 text-center text-xl font-black text-white">
                                            {{ $product->max_irr ? $product->max_irr . '%' : '-' }}
                                        </td>
                                    @endforeach
                                </tr>

                                {{-- Row TSER (The Hero Row) --}}
                                <tr class="bg-brand-primary/10 rounded-2xl">
                                    <td class="px-6 py-6 font-bold text-brand-primary">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-lg bg-brand-primary text-white flex items-center justify-center shadow-lg shadow-brand-primary/20">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                            </div>
                                            TSER (Total Heat Rejected)
                                        </div>
                                    </td>
                                    @foreach($partner->products as $product)
                                        <td class="px-6 py-6 text-center text-2xl font-black text-white">
                                            {{ $product->max_tser ? $product->max_tser . '%' : '-' }}
                                        </td>
                                    @endforeach
                                </tr>
                                
                                <tr>
                                    <td></td>
                                    @foreach($partner->products as $idx => $product)
                                    <td class="px-6 py-6 text-center">
                                        <button @click="activeSeries = {{ $idx }}; document.getElementById('detail-section').scrollIntoView({behavior: 'smooth'})" 
                                                class="px-4 py-2 rounded-xl bg-white/5 hover:bg-white/10 text-brand-primary text-xs font-bold transition-all border border-white/5">
                                            {{ __('message.brand_view_detail')}} &darr;
                                        </button>
                                    </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-slate-50">
            <div class="container mx-auto px-6">
                <div class="bg-white rounded-[3rem] p-2 md:p-6 shadow-sm border border-gray-100">
                    <div class="flex flex-col md:flex-row justify-between items-end mb-10 gap-4">
                        <div class="max-w-xl">
                            <span class="text-brand-primary font-bold tracking-widest text-sm uppercase">Technical Glossary</span>
                            <h2 class="text-3xl font-bold text-slate-900 mt-2">{{ __('message.brand_glossary_title')}}</h2>
                            <p class="text-gray-500 mt-4 text-sm leading-relaxed">{{ __('message.brand_glossary_desc')}}</p>
                        </div>
                        <div class="hidden md:block">
                            <div class="flex -space-x-3">
                                <div class="w-12 h-12 rounded-full border-4 border-white bg-brand-primary flex items-center justify-center text-white shadow-lg">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">                       
                        @foreach(config('glossary') as $item)
                            <div class="group p-6 rounded-2xl bg-white border border-gray-100 hover:border-brand-primary hover:shadow-xl transition-all duration-500">
                                <div class="w-12 h-12 rounded-xl bg-slate-50 flex items-center justify-center text-brand-primary group-hover:bg-brand-primary group-hover:text-white transition-colors mb-4">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"></path>
                                    </svg>
                                </div>
                                <h4 class="text-xl font-bold text-slate-800">{{ $item['label'] }}</h4>
                                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest block mb-2">{{ $item['title'] }}</span>
                                <p class="text-sm text-gray-500 leading-relaxed">{{ __($item['desc']) }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section id="detail-section" class="py-12 bg-slate-50">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-slate-900">{{ __('message.brand_spec_title', ['name' => $partner->name]) }}</h2>
                </div>

                <div class="flex flex-col lg:flex-row bg-white rounded-[2rem] shadow-2xl overflow-hidden border border-gray-100">
                    
                    {{-- Sidebar Tab --}}
                    <div class="w-full lg:w-1/4 bg-slate-900 flex flex-col">
                        @foreach($partner->products as $index => $product)
                        <button 
                            @click="activeSeries = {{ $index }}"
                            :class="activeSeries === {{ $index }} ? 'bg-brand-primary text-white' : 'text-gray-400 hover:bg-slate-800'"
                            class="flex items-center gap-4 px-6 py-5 text-left transition-all duration-300 border-b border-slate-800 last:border-0"
                        >
                            <img src="{{ asset('storage/'.$partner->logo_path) }}" class="h-6 w-auto object-contain opacity-50" alt="">
                            <span class="font-bold text-sm uppercase tracking-wider">{{ $product->name }}</span>
                            
                            <template x-if="activeSeries === {{ $index }}">
                                <div class="ml-auto">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                </div>
                            </template>
                        </button>
                        @endforeach
                    </div>

                    {{-- Content Tab --}}
                    <div class="w-full lg:w-3/4 p-8 md:p-12 min-h-[600px]" x-cloak>
                        @foreach($partner->products as $index => $product)
                        <div x-show="activeSeries === {{ $index }}"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform translate-x-4"
                            x-transition:enter-end="opacity-100 transform translate-x-0"
                            x-cloak
                            class="space-y-8">
                            
                            <div>
                                <h3 class="text-3xl font-semibold text-slate-800 mb-4">{{ __('message.brand_series', ['name' => $partner->name, 'name_series' => $product->name]) }}</h3>
                                <div class="prose prose-slate max-w-none text-gray-600">
                                    {!! $product->description !!}
                                </div>
                            </div>

                            <div class="overflow-x-auto overflow-y-hidden border border-gray-200 rounded-xl shadow-sm">
                                <table class="w-full text-sm text-left min-w-[500px] md:min-w-full">
                                    <thead class="bg-slate-50 text-slate-600 uppercase text-[11px] font-bold">
                                        <tr>
                                            <th class="px-4 py-4 sticky left-0 bg-slate-50 z-10">Series</th>
                                            <th class="px-4 py-4 text-center">VLT</th>
                                            <th class="px-4 py-4 text-center">TSER</th>
                                            <th class="px-4 py-4 text-center">IRR</th>
                                            <th class="px-4 py-4 text-center">UVR</th>
                                            <th class="px-4 py-4 text-center bg-brand-primary/5 text-brand-primary">Glar. Red.</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100">
                                        @foreach($product->specifications as $spec)
                                        <tr class="hover:bg-slate-50 transition">
                                            <td class="px-4 py-4 font-bold text-slate-800 sticky left-0 bg-white group-hover:bg-slate-50">{{ $spec['type'] }}</td>
                                            <td class="px-4 py-4 text-center">{{ $spec['vlt'] }}%</td>
                                            <td class="px-4 py-4 text-center">{{ $spec['tser'] }}%</td>
                                            <td class="px-4 py-4 text-center">{{ $spec['irr'] }}%</td>
                                            <td class="px-4 py-4 text-center">{{ $spec['uvr'] }}%</td>
                                            <td class="px-4 py-4 text-center font-bold text-brand-primary bg-brand-primary/5">
                                                {{ $spec['glare_reduction'] ?? '0' }}%
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="flex items-center justify-center gap-2 text-[10px] text-gray-400 md:hidden italic">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                <span>{{ __('message.mobile_instruction')}}</span>
                            </div>

                            @if($product->image_path)
                                <h2 class="text-3xl font-semibold text-slate-800">
                                    Window Film Simulator
                                </h2>
                                <div class="mb-6 w-full rounded-2xl overflow-hidden border border-gray-100 shadow-sm bg-gray-50">
                                    <img src="{{ asset('storage/' . $product->image_path) }}" 
                                        alt="Simulator {{ $product->name }}"
                                        loading="lazy"
                                        decoding="async"
                                        class="w-full h-auto object-contain hover:scale-105 transition-transform duration-500">
                                </div>
                            @endif

                            <div class="bg-slate-50 p-6 rounded-2xl">
                                <h4 class="font-bold text-slate-800 mb-4 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-brand-primary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                    {{ __('message.brand_main_advantage')}} {{ $product->name }}
                                </h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                    @if($product->features)
                                        @foreach($product->features as $feature)
                                        <div class="flex items-start gap-2 text-sm text-gray-600">
                                            <span class="text-brand-primary">•</span>
                                            <span>{{ $feature }}</span>
                                        </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="py-12 bg-white">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row gap-12">
                
                <div class="w-full lg:w-1/2">
                    <h2 class="text-3xl font-bold text-slate-900 mb-6 flex items-center gap-3">
                        <span class="p-2 bg-yellow-400 rounded-lg text-white">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </span>
                        {{ __('message.brand_tips_title')}}
                    </h2>
                    <div class="space-y-4">
                        @foreach (config('tips') as $item)
                            <div class="flex gap-4 p-4 rounded-2xl bg-slate-50 border-l-4 border-brand-primary">
                            <div class="font-bold text-2xl text-slate-300">{{ __($item['label']) }}</div>
                            <div>
                                <h4 class="font-bold text-slate-800">{{ __($item['title']) }}</h4>
                                <p class="text-sm text-gray-600">{{ __($item['desc']) }}</p>
                            </div>
                        </div>
                        @endforeach                        
                    </div>
                </div>

                <div class="w-full lg:w-1/2">
                    <h2 class="text-3xl font-bold text-slate-900 mb-6">{{ __('message.brand_other_brands')}}</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                        @foreach($allPartners as $otherPartner)
                        <a href="{{ route('brand.detail', ['id' => $otherPartner->id, 'slug' => \Illuminate\Support\Str::slug($otherPartner->name)]) }}" class="group p-4 bg-white border border-gray-200 rounded-2xl hover:border-brand-primary hover:shadow-xl transition-all duration-300 flex flex-col items-center justify-center text-center">
                            <img src="{{ asset('storage/'.$otherPartner->logo_path) }}" alt="{{ $otherPartner->name }}" class="h-10 w-auto grayscale group-hover:grayscale-0 transition mb-3">
                            <span class="text-xs font-bold text-gray-500 group-hover:text-brand-primary uppercase tracking-tighter">{{ $otherPartner->name }}</span>
                        </a>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="py-12 bg-brand-dark text-center relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-brand-dark to-slate-900"></div>
        <div class="relative z-10 container mx-auto px-6">
            <h2 class="text-3xl font-bold text-white mb-6">{{ __('message.brand_cta_question', ['name' => $partner->name]) }}</h2>
            <p class="text-gray-400 mb-8 max-w-2xl mx-auto">{{ __('message.brand_cta_desc')}}</p>
            <a href="{{ route('whatsapp.redirect') }}" class="inline-block bg-brand-primary text-white font-bold py-3 px-8 rounded-full shadow-lg shadow-brand-primary/30 hover:bg-green-600 transition">
                {{ __('message.brand_cta_button')}}
            </a>
        </div>
    </section>

@endsection