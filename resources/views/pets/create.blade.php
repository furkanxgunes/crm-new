<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-orange-800 leading-tight">
            {{ $customer->name }} için Yeni Pet Ekliyorsun
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('pets.store', $customer) }}">
                        @csrf
                        
                        <!-- Pet Adı -->
                        <div>
                            <x-input-label for="name" :value="__('Pet Adı')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Tür (Select Box ile daha şık) -->
                        <div class="mt-4">
                            <x-input-label for="species" :value="__('Tür')" />
                            <select name="species" id="species" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="Köpek">Köpek</option>
                                <option value="Kedi">Kedi</option>
                            </select>
                            <x-input-error :messages="$errors->get('species')" class="mt-2" />
                        </div>
                        
                        <!-- Irk -->
                        <div class="mt-4">
                            <x-input-label for="breed" :value="__('Irk')" />
                            <x-text-input id="breed" class="block mt-1 w-full" type="text" name="breed" :value="old('breed')" />
                            <x-input-error :messages="$errors->get('breed')" class="mt-2" />
                        </div>
                           <!-- Cinsiyet (Select Box ile daha şık) -->
                        <div class="mt-4">
                            <x-input-label for="gender" :value="__('Cinsiyet')" />
                            <select name="gender" id="gender" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="Erkek">Erkek</option>
                                <option value="Dişi">Dişi</option>
                            </select>
                            <x-input-error :messages="$errors->get('species')" class="mt-2" />
                        </div>
                        <!-- Doğum Tarihi -->
                         <div class="mt-4">
                            <x-input-label for="age" :value="__('Yaş')" />
                            <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age')" />
                            <x-input-error :messages="$errors->get('age')" class="mt-2" />
                        </div>
                         <div class="mt-4">
                            <x-input-label for="weight_kg" :value="__('Kilo')" />
                            <x-text-input id="weight_kg" class="block mt-1 w-full" type="number" name="weight_kg" :value="old('weight_kg')" />
                            <x-input-error :messages="$errors->get('weight_kg')" class="mt-2" />
                        </div>
                          <div class="mt-4">
                            <x-input-label for="medical_notes" :value="__('Medikal Notlar')" /> 
                            <!-- Textarea olmalı -->
                            <textarea id="medical_notes" class="block mt-1 w-full" name="medical_notes" :value="old('medical_notes')" ></textarea>
                            <x-input-error :messages="$errors->get('medical_notes')" class="mt-2" />
                        </div>
                        <!-- Cinsiyet, Kilo, Notlar... Diğer alanları da bu şekilde ekleyebilirsin -->

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button>
                                {{ __('Pet\'i Kaydet') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>