<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Müşteri Yönetimi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                           <!-- Başarı Mesajı -->
                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded" role="alert">
                            <p>{{ session('success') }}</p>
                        </div>
                    @endif
                    <div class="flex justify-end mb-4">
                        <a href="{{ route('customers.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Yeni Müşteri Ekle
                        </a>
                    </div>
             
                     <!-- Burası bizim tablomuz olacak -->
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Müşteri Adı</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">E-posta</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Telefon</th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Düzenle</span>
                                </th>
                            </tr>
                        </thead>
                        
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($customers as $customer)
    <tr>
        <td class="px-6 py-4 whitespace-nowrap">{{ $customer->name }}</td>
        <td class="px-6 py-4 whitespace-nowrap">{{ $customer->email }}</td>
        <td class="px-6 py-4 whitespace-nowrap">{{ $customer->phone }}</td>
        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <a href="{{ route('customers.show', $customer) }}" class="text-blue-600 hover:text-blue-900">Detaylar</a> 
           <br> <a href="{{ route('customers.edit', $customer) }}" class="text-indigo-600 hover:text-indigo-900">Düzenle</a>
             <form method="POST" action="{{ route('customers.destroy', $customer) }}" onsubmit="return confirm('Bu müşteriyi silmek istediğinizden emin misiniz? Tüm randevuları ve pet bilgileri de silinebilir!');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:text-red-900">Sil</button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="4" class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">
            Henüz hiç müşteri eklenmemiş.
        </td>
    </tr>
@endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
