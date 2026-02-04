@extends('layouts.app')

@section('title', $portfolio->title . ' - Project Details')

@section('content')
<div class="bg-gray-50 border-b border-gray-100 mb-4">
    <div class="container mx-auto px-5 py-10">
        <nav class="flex items-center gap-3 text-sm text-gray-400 mb-6">
            <a href="{{ route('home') }}" class="hover:text-brand-primary transition">Home</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"></path></svg>
            <a href="{{ route('portfolio.index') }}" class="hover:text-brand-primary transition">Portfolio</a>
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"></path></svg>
            <span class="text-slate-900 font-medium">{{ Str::limit($portfolio->title, 30) }}</span>
        </nav>

        <h1 class="text-3xl md:text-5xl font-extrabold text-slate-900 leading-tight max-w-4xl">
            {{ $portfolio->title }}
        </h1>
    </div>
</div>

<div class="container mx-auto px-6 mb-12">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
        
        <div class="lg:col-span-8">
            <div class="relative w-full rounded-[2rem] overflow-hidden shadow-2xl mb-10 bg-gray-100">
                <div class="w-full h-[300px] md:h-[500px]"> 
                    <img src="{{ asset('storage/' . $portfolio->image_path) }}" 
                        alt="{{ $portfolio->title }}" loading="lazy" 
                        class="w-full h-full object-cover object-center"
                        loading="eager"> </div>
            </div>

            <div class="rich-content prose prose-lg prose-slate max-w-none">
                <div class="flex items-center gap-4 mb-8">
                    <span class="h-px flex-1 bg-gray-100"></span>
                    <span class="text-xs font-bold uppercase tracking-[0.2em] text-gray-400">Deskripsi Project</span>
                    <span class="h-px flex-1 bg-gray-100"></span>
                </div>
                
                {!! $portfolio->description !!}
            </div>

            <div class="mt-10 p-8 bg-brand-surface rounded-[2rem] border border-brand-primary/10 relative overflow-hidden">
                <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
                    <div>
                        <h4 class="text-2xl font-bold text-slate-900 mb-2">Tertarik dengan hasil pengerjaan ini?</h4>
                        <p class="text-slate-600">Dapatkan konsultasi gratis dan estimasi biaya untuk kendaraan atau gedung Anda sekarang.</p>
                    </div>
                    <a href="{{ route('whatsapp.redirect') }}?text={{ urlencode('Halo Fatih Jaya, saya tertarik dengan project ' . $portfolio->title . '. Bisa info estimasi harganya?') }}" 
                    class="whitespace-nowrap bg-brand-primary text-white px-8 py-4 rounded-full font-bold hover:shadow-xl hover:shadow-brand-primary/30 transition-all flex items-center gap-2">
                        Konsultasi Sekarang
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
                <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-brand-primary/5 rounded-full blur-3xl"></div>
            </div>

            <div class="flex items-center gap-4 py-6 border-y border-gray-100 my-8">
                <span class="text-xs font-bold uppercase tracking-widest text-gray-400">Bagikan:</span>
                <div class="flex gap-2">
                    <a href="https://wa.me/?text={{ urlencode($portfolio->title . ' - ' . url()->current()) }}" target="_blank" class="w-10 h-10 rounded-full bg-green-50 text-green-600 flex items-center justify-center hover:bg-green-600 hover:text-white transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z"/></svg>
                    </a>
                    <button onclick="window.print()" class="w-10 h-10 rounded-full bg-slate-100 text-slate-600 flex items-center justify-center hover:bg-brand-dark hover:text-white transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="lg:col-span-4">
            <div class="sticky top-20 space-y-6">
                <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 border border-gray-100 p-8">
                    <h3 class="font-bold text-xl text-slate-900 mb-8 flex items-center gap-3">
                        <span class="w-2 h-6 bg-brand-primary rounded-full"></span>
                        Project Info
                    </h3>
                    
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-brand-surface flex items-center justify-center text-brand-primary shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Kategori</p>
                                <p class="text-slate-900 font-bold">{{ $portfolio->service->name ?? 'General' }}</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div class="w-10 h-10 rounded-xl bg-brand-surface flex items-center justify-center text-brand-primary shrink-0">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 00-2 2z"></path></svg>
                            </div>
                            <div>
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-1">Selesai Pada</p>
                                <p class="text-slate-900 font-bold">{{ $portfolio->created_at->format('d F Y') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <a href="{{ route('whatsapp.redirect') }}?text={{ urlencode('Halo Fatih Jaya, saya tertarik konsultasi mengenai project ' . $portfolio->title) }}" 
                           class="group flex items-center justify-center gap-3 w-full bg-brand-dark text-white py-5 rounded-2xl font-bold hover:bg-slate-800 transition-all shadow-xl shadow-slate-200">
                            <span>Tanya Project Ini</span>
                            <svg class="w-5 h-5 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>

                @if($otherPortfolios->count() > 0)
                <div class="px-4">
                    <h4 class="font-bold text-slate-900 mb-6 flex items-center justify-between">
                        Project Lainnya
                        <a href="{{ route('portfolio.index') }}" class="text-xs text-brand-primary hover:underline">Lihat Semua</a>
                    </h4>
                    <div class="space-y-5">
                        @foreach($otherPortfolios as $item)
                        <a href="{{ route('portfolio.show', $item->slug ?? $item->id) }}" class="flex gap-4 group items-center">
                            <div class="relative w-24 h-24 shrink-0 rounded-2xl overflow-hidden shadow-md bg-gray-50">
                                <img src="{{ asset('storage/' . $item->image_path) }}" 
                                    class="w-full h-full object-cover object-center transition duration-500 group-hover:scale-110">
                            </div>
                            
                            <div class="flex-1 min-w-0">
                                <h5 class="text-sm font-bold text-slate-800 group-hover:text-brand-primary transition line-clamp-2">
                                    {{ $item->title }}
                                </h5>
                                <p class="text-[10px] text-gray-400 mt-1 font-bold uppercase tracking-widest">
                                    {{ $item->service->name ?? 'Project' }}
                                </p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>

    </div>
</div>


@endsection