<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Müşteri Düzenle') }}: {{ $customer->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Form Başlangıcı -->
                    <form method="POST" action="{{ route('customers.update', $customer) }}">
                        @csrf <!-- Laravel Güvenlik Kodu -->
                        @method('PUT') <!-- Güncelleme isteği için PUT metodunu belirt -->

                        <!-- Müşteri Adı -->
                        <div>
                            <x-input-label for="name" :value="__('Müşteri Adı')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $customer->name)" required autofocus />
                        </div>

                        <!-- Email (Bir sonraki adımda bunu daha da güzelleştireceğiz) -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $customer->email)" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />

                        </div>

                        <!-- Telefon Fiyat -->
                        <div class="mt-4">
                            <x-input-label for="phone" :value="__('Telefon')" />
                            <x-text-input id="phone" class="block mt-1 w-full" type="tel" name="phone" :value="old('phone', $customer->phone)" required />
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>

                         <!-- Adres -->
                        <div class="mt-4">
                            <x-input-label for="address" :value="__('Adres')" />
                            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address', $customer->address)" required />
                        </div>

                         <!-- Notlar -->
                         <div class="mt-4">
                            <x-input-label for="notes" :value="__('Notlar (İsteğe Bağlı)')" />
                            <textarea name="notes" id="notes" rows="4" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('notes', $customer->notes) }}</textarea>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Müşteri Bilgilerini Güncelle') }}
                            </x-primary-button>
                        </div>
                    </form>
                    <!-- Form Sonu -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>