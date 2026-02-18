<x-filament-widgets::widget>
    <x-filament::section>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <x-filament::button 
                href="{{ route('filament.admin.resources.products.create') }}" 
                tag="a" 
                icon="heroicon-m-plus-circle" 
                color="info"
                size="lg">
                Tambah Produk
            </x-filament::button>

            <x-filament::button 
                href="{{ route('filament.admin.resources.portfolios.create') }}" 
                tag="a" 
                icon="heroicon-m-camera" 
                color="success"
                size="lg">
                Tambah Portofolio
            </x-filament::button>

            <x-filament::button 
                href="{{ route('filament.admin.resources.services.create') }}" 
                tag="a" 
                icon="heroicon-m-wrench-screwdriver" 
                color="warning"
                size="lg">
                Tambah Layanan
            </x-filament::button>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>