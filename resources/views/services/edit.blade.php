<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hizmeti Düzenle') }}: {{ $service->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Form Başlangıcı -->
                    <form method="POST" action="{{ route('services.update', $service) }}">
                        @csrf <!-- Laravel Güvenlik Kodu -->
                        @method('PUT') <!-- Güncelleme isteği için PUT metodunu belirt -->

                        <!-- Hizmet Adı -->
                        <div>
                            <x-input-label for="name" :value="__('Hizmet Adı')" />
<x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $service->name)" required autofocus />
                        </div>

                        <!-- Kategori (Bir sonraki adımda bunu daha da güzelleştireceğiz) -->
                        <div class="mt-4">
                            <x-input-label for="category" :value="__('Kategori')" />
                            <x-text-input id="category" class="block mt-1 w-full" type="text" name="category" :value="old('category', $service->category)" required />
                        </div>

                        <!-- Temel Fiyat -->
                        <div class="mt-4">
                            <x-input-label for="base_price" :value="__('Temel Fiyat (TL)')" />
                            <x-text-input id="base_price" class="block mt-1 w-full" type="number" step="0.01" name="base_price" :value="old('base_price', $service->base_price)" required />
                        </div>

                         <!-- Süre -->
                        <div class="mt-4">
                            <x-input-label for="duration_minutes" :value="__('Tahmini Süre (Dakika)')" />
                            <x-text-input id="duration_minutes" class="block mt-1 w-full" type="number" name="duration_minutes" :value="old('duration_minutes', $service->duration_minutes)" required />
                        </div>

                         <!-- Açıklama -->
                         <div class="mt-4">
                            <x-input-label for="description" :value="__('Açıklama (İsteğe Bağlı)')" />
                            <textarea name="description" id="description" rows="4" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('description', $service->description) }}</textarea>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Hizmeti Kaydet') }}
                            </x-primary-button>
                        </div>
                    </form>
                    <!-- Form Sonu -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>