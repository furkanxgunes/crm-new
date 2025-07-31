<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Müşteri Detay: {{ $customer->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <!-- Müşteri Bilgileri Kartı -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <h3 class="text-lg font-medium text-gray-900">Müşteri Bilgileri</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        <strong>E-posta:</strong> {{ $customer->email }}<br>
                        <strong>Telefon:</strong> {{ $customer->phone ?? 'N/A' }}<br>
                        <strong>Adres:</strong> {{ $customer->address ?? 'N/A' }}
                    </p>
                </div>
            </div>

            <!-- Evcil Hayvanlar Listesi Kartı -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-full">
                    <div class="flex justify-between items-center">
                        <h3 class="text-lg font-medium text-gray-900">Evcil Hayvanları</h3>
                        <!-- Başarı Mesajı -->
        @if (session('success'))
            <div class="p-4 bg-green-100 border border-green-400 text-green-700 rounded" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif
                        <a href="{{ route('pets.create', $customer) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border rounded-md font-semibold text-xs text-white uppercase hover:bg-gray-700">
                            Yeni Pet Ekle
                        </a>
                        
                    </div>
                    
                    <div class="mt-6">
                       <table class="min-w-full divide-y divide-gray-200">
                           <thead class="bg-gray-50">
                               <tr>
                                   <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Adı</th>
                                   <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tür</th>
                                   <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Irk</th>
                                   <th class="relative px-6 py-3"><span class="sr-only">İşlemler</span></th>
                               </tr>
                           </thead>
                           <tbody class="bg-white divide-y divide-gray-200">
                               @forelse ($customer->pets as $pet)
                                   <tr>
                                       <td class="px-6 py-4 whitespace-nowrap">{{ $pet->name }}</td>
                                       <td class="px-6 py-4 whitespace-nowrap">{{ $pet->species }}</td>
                                       <td class="px-6 py-4 whitespace-nowrap">{{ $pet->breed }}</td>
                                       <td class="px-6 py-4 whitespace-nowrap text-right">
                                           <a href="#" class="text-indigo-600 hover:text-indigo-900">Düzenle</a>
                                       </td>
                                   </tr>
                               @empty
                                   <tr>
                                       <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-500">
                                           Bu müşteriye ait evcil hayvan bulunamadı.
                                       </td>
                                   </tr>
                               @endforelse
                           </tbody>
                       </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>