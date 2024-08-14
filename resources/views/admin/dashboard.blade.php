<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-5 justify-items-center">
                <div class="bg-slate-300 shadow-lg w-44 h-20 rounded-lg flex items-center justify-center">
                    <span class="text-md">Produk : {{$countProduct}}</span>
                </div>
                <div class="bg-slate-300 shadow-lg w-44 h-20 rounded-lg flex items-center justify-center">
                    <span class="text-md">Pengguna : {{$countUser}}</span>
                </div>
                <div class="bg-slate-300 shadow-lg w-44 h-20 rounded-lg flex items-center justify-center">
                    <span class="text-md">Produk Aktif : {{$countProductActive}}</span>
                </div>
                <div class="bg-slate-300 shadow-lg w-44 h-20 rounded-lg flex items-center justify-center">
                    <span class="text-md">Pengguna Aktif : {{$countUserActive}}</span>
                </div>
                <div class="bg-slate-300 shadow-lg w-44 h-20 rounded-lg flex items-center justify-center">
                    <span class="text-md">Kategori : {{$countCategory}}</span>
                </div>
            </div>

            <div class="px-9">
                <h1 class="text-2xl font-semibold text-gray-800 mt-10">List Produk Terbaru</h1>
                <div class="relative overflow-x-auto py-5 rounded-md">
                    <table class="w-full text-sm rtl:text-right text-gray-500 dark:text-gray-400 text-center">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No.
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Gambar
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Produk
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Harga Produk
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Deskripsi
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Stok
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Kategori
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td>
                                    {{$loop->iteration}}
                                </td>
                                <td class="px-6 py-4">
                                    <img src="{{ asset('storage/' . $item->path_img) }}" alt="Gambar" class="w-20 h-auto object-cover">
                                </td>
                                <th scope="row" class="px-6 py-4 max-w-20 truncate font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$item->name}}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$item->price}}
                                </th>
                                <th scope="row" class="px-6 py-4 truncate max-w-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$item->description}}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$item->stock}}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$item->status}}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$item->category->category_name}}
                                </th>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>