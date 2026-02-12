@extends('layouts.app')

@section('title', $partner->name . ' - Spesifikasi Lengkap')

@section('content')

    <div x-data="{ activeSeries: 0 }">
        
        <div class="relative bg-slate-900 pt-28 pb-16 overflow-hidden">
            <div class="absolute inset-0 z-0">
                <div class="absolute top-0 left-1/4 w-96 h-96 bg-brand-primary/10 rounded-full blur-[120px]"></div>
                <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-blue-500/10 rounded-full blur-[120px]"></div>
            </div>
            
            <div class="container mx-auto px-6 relative z-10">
                <div class="flex flex-col items-center text-center">
                    @if($partner->logo_path)
                    <div class="bg-white p-6 rounded-3xl shadow-2xl mb-8 transform -rotate-2 hover:rotate-0 transition duration-500">
                        <img src="{{ asset('storage/'.$partner->logo_path) }}" alt="{{ $partner->name }}" class="h-20 w-auto object-contain">
                    </div>
                    @endif
                    
                    <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6">
                        Kaca Film <span class="text-brand-primary">{{ $partner->name }}</span>
                    </h1>
                    <p class="text-gray-400 text-lg max-w-3xl leading-relaxed">
                        Authorized Dealer Resmi. Temukan perlindungan maksimal untuk kendaraan Anda dengan teknologi mutakhir dari {{ $partner->name }}. Dirancang untuk menolak panas, sinar UV, dan menjaga privasi Anda.
                    </p>
                </div>
            </div>
        </div>

        <section class="py-12 bg-white border-b border-gray-100">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <span class="text-brand-primary font-bold uppercase tracking-wider text-sm">Quick Comparison</span>
                    <h2 class="text-3xl font-bold text-slate-800 mt-2">Perbandingan Performa Series</h2>
                    <p class="text-gray-500 mt-2">Data spesifikasi tertinggi (Highest Specs) dari setiap series.</p>
                </div>

                <div class="bg-slate-800 rounded-[2.5rem] p-4 md:p-8 border border-white/5 shadow-2xl">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left border-separate border-spacing-y-2">
                            <thead>
                                <tr>
                                    <th class="px-6 py-5 font-bold text-slate-400 uppercase tracking-widest text-xs">Kriteria</th>
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
                                            VLT (Cahaya Masuk)
                                        </div>
                                    </td>
                                    @foreach($partner->products as $product)
                                        @php $maxVlt = collect($product->specifications ?? [])->max('vlt'); @endphp
                                        <td class="px-6 py-6 text-center text-xl font-black text-white">
                                            {{ $maxVlt ? $maxVlt.'%' : '-' }}
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
                                            IRR (Tolak Panas)
                                        </div>
                                    </td>
                                    @foreach($partner->products as $product)
                                        @php $maxIrr = collect($product->specifications ?? [])->max('irr'); @endphp
                                        <td class="px-6 py-6 text-center text-xl font-black text-white">
                                            {{ $maxIrr ? $maxIrr.'%' : '-' }}
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
                                        @php $maxTser = collect($product->specifications ?? [])->max('tser'); @endphp
                                        <td class="px-6 py-6 text-center text-2xl font-black text-white">
                                            {{ $maxTser ? $maxTser.'%' : '-' }}
                                        </td>
                                    @endforeach
                                </tr>
                                
                                <tr>
                                    <td></td>
                                    @foreach($partner->products as $idx => $product)
                                    <td class="px-6 py-6 text-center">
                                        <button @click="activeSeries = {{ $idx }}; document.getElementById('detail-section').scrollIntoView({behavior: 'smooth'})" 
                                                class="px-4 py-2 rounded-xl bg-white/5 hover:bg-white/10 text-brand-primary text-xs font-bold transition-all border border-white/5">
                                            Lihat Detail &darr;
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
                            <h2 class="text-3xl font-bold text-slate-900 mt-2">Memahami Spesifikasi Kaca Film</h2>
                            <p class="text-gray-500 mt-4 text-sm leading-relaxed">Jangan hanya melihat kegelapan, pahami angka di balik perlindungan kenyamanan Anda.</p>
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
                        @php
                            $glossary = [
                                ['label' => 'VLT', 'title' => 'Visible Light Transmission', 'desc' => 'Tingkat kegelapan. Semakin rendah angkanya, semakin gelap tampilan kacanya.', 'icon' => 'M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z'],
                                ['label' => 'TSER', 'title' => 'Total Solar Energy Rejected', 'desc' => 'Indikator paling akurat untuk tolak panas. Semakin tinggi, kabin semakin adem.', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'],
                                ['label' => 'IRR', 'title' => 'Infrared Rejection', 'desc' => 'Menolak radiasi infra merah yang menyebabkan rasa menyengat di kulit.', 'icon' => 'M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z'],
                                ['label' => 'UVR', 'title' => 'Ultra Violet Rejection', 'desc' => 'Menghalau 99% sinar UV agar interior tidak cepat pudar dan menjaga kesehatan kulit.', 'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z'],
                                ['label' => 'VLR', 'title' => 'Visible Light Reflectance', 'desc' => 'Tingkat pantulan seperti cermin. Angka rendah berarti pandangan keluar lebih jernih.', 'icon' => 'M15 12a3 3 0 11-6 0 3 3 0 016 0z'],
                                ['label' => 'GLARE', 'title' => 'Glare Reduction', 'desc' => 'Mengurangi silau lampu kendaraan dari lawan arah atau sinar matahari yang tajam.', 'icon' => 'M15 12a3 3 0 11-6 0 3 3 0 016 0z']
                            ];
                        @endphp

                        @foreach($glossary as $item)
                        <div class="group p-6 rounded-2xl bg-white border border-gray-100 hover:border-brand-primary hover:shadow-xl transition-all duration-500">
                            <div class="w-12 h-12 rounded-xl bg-slate-50 flex items-center justify-center text-brand-primary group-hover:bg-brand-primary group-hover:text-white transition-colors mb-4">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"></path>
                                </svg>
                            </div>
                            <h4 class="text-xl font-bold text-slate-800">{{ $item['label'] }}</h4>
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest block mb-2">{{ $item['title'] }}</span>
                            <p class="text-sm text-gray-500 leading-relaxed">{{ $item['desc'] }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <section id="detail-section" class="py-12 bg-slate-50">
            <div class="container mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-slate-900">Spesifikasi Tiap Series Kaca Film {{ $partner->name }}</h2>
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
                    <div class="w-full lg:w-3/4 p-8 md:p-12 min-h-[600px]">
                        @foreach($partner->products as $index => $product)
                        <div x-show="activeSeries === {{ $index }}" 
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform translate-x-4"
                            x-transition:enter-end="opacity-100 transform translate-x-0"
                            class="space-y-8">
                            
                            <div>
                                <h3 class="text-3xl font-semibold text-slate-800 mb-4">Series {{ $product->name }}</h3>
                                <div class="prose prose-slate max-w-none text-gray-600">
                                    {!! $product->description !!}
                                </div>
                            </div>

                            <div class="overflow-hidden border border-gray-200 rounded-xl shadow-sm">
                                <table class="w-full text-sm text-left">
                                    <thead class="bg-slate-50 text-slate-600 uppercase text-[11px] font-bold">
                                        <tr>
                                            <th class="px-6 py-4">Series</th>
                                            <th class="px-6 py-4 text-center">VLT</th>
                                            <th class="px-6 py-4 text-center">TSER</th>
                                            <th class="px-6 py-4 text-center">IRR</th>
                                            <th class="px-6 py-4 text-center">UVR</th>
                                            <th class="px-6 py-4 text-center bg-brand-primary/5 text-brand-primary">Glar. Red.</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100">
                                        @foreach($product->specifications as $spec)
                                        <tr class="hover:bg-slate-50 transition">
                                            <td class="px-6 py-4 font-bold text-slate-800">{{ $spec['type'] }}</td>
                                            <td class="px-6 py-4 text-center">{{ $spec['vlt'] }}%</td>
                                            <td class="px-6 py-4 text-center">{{ $spec['tser'] }}%</td>
                                            <td class="px-6 py-4 text-center">{{ $spec['irr'] }}%</td>
                                            <td class="px-6 py-4 text-center">{{ $spec['uvr'] }}%</td>
                                            <td class="px-6 py-4 text-center font-bold text-brand-primary bg-brand-primary/5">
                                                {{ $spec['glare_reduction'] ?? '0' }}%
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="bg-slate-50 p-6 rounded-2xl">
                                <h4 class="font-bold text-slate-800 mb-4 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-brand-primary" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                                    Keunggulan Utama {{ $product->name }}
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
                        Tips Memilih Kaca Film Original
                    </h2>
                    <div class="space-y-4">
                        <div class="flex gap-4 p-4 rounded-2xl bg-slate-50 border-l-4 border-brand-primary">
                            <div class="font-bold text-2xl text-slate-300">01</div>
                            <div>
                                <h4 class="font-bold text-slate-800">Cek Kartu Garansi Digital</h4>
                                <p class="text-sm text-gray-600">Pastikan Anda mendapatkan kartu garansi resmi yang bisa dicek online di website principal (seperti 3M, V-Kool, dll).</p>
                            </div>
                        </div>
                        <div class="flex gap-4 p-4 rounded-2xl bg-slate-50 border-l-4 border-brand-primary">
                            <div class="font-bold text-2xl text-slate-300">02</div>
                            <div>
                                <h4 class="font-bold text-slate-800">Uji dengan Alat Transmisi</h4>
                                <p class="text-sm text-gray-600">Dealer resmi selalu memiliki alat ukur (3 in 1 meter) untuk membuktikan nilai VLT, UVR, dan IRR sesuai spesifikasi.</p>
                            </div>
                        </div>
                        <div class="flex gap-4 p-4 rounded-2xl bg-slate-50 border-l-4 border-brand-primary">
                            <div class="font-bold text-2xl text-slate-300">03</div>
                            <div>
                                <h4 class="font-bold text-slate-800">Perhatikan Logo Grafir</h4>
                                <p class="text-sm text-gray-600">Kaca film original biasanya memiliki logo grafir halus (watermark) pada lapisan filmnya yang tidak mudah terkelupas.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/2">
                    <h2 class="text-3xl font-bold text-slate-900 mb-6">Pilihan Merk Lainnya</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                        @foreach(\App\Models\Partner::where('id', '!=', $partner->id)->get() as $otherPartner)
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
            <h2 class="text-3xl font-bold text-white mb-6">Bingung memilih series {{ $partner->name }} yang tepat?</h2>
            <p class="text-gray-400 mb-8 max-w-2xl mx-auto">Konsultasikan kebutuhan kaca film mobil atau bangunan Anda dengan tim ahli kami. Kami akan merekomendasikan kombinasi terbaik sesuai budget Anda.</p>
            <a href="{{ route('whatsapp.redirect') }}" class="inline-block bg-brand-primary text-white font-bold py-3 px-8 rounded-full shadow-lg shadow-brand-primary/30 hover:bg-green-600 transition">
                Konsultasi Gratis via WhatsApp
            </a>
        </div>
    </section>

@endsection