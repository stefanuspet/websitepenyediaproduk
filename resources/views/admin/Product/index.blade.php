<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produk') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-9">
                @if (session('success'))
                <div class="bg-green-500 text-white px-4 py-2 rounded-md mb-4">
                    {{ session('success') }}
                </div>
                @endif
                @if (session('error'))
                <div class="bg-red-500 text-white px-4 py-2 rounded-md mb-4">
                    {{ session('error') }}
                </div>
                @endif
                <div class="flex w-full justify-between items-center mt-10 ">
                    <h1 class="text-2xl font-semibold text-gray-800">Daftar Produk</h1>
                    <a href="{{route('product.create')}}" class="bg-green-600 px-2 py-1 rounded-md text-white">Tambah Produk</a>
                </div>
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
                                <th scope="col" class="px-6 py-3 ">
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
                                <th scope="col" class="px-6 py-3">
                                    Aksi
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
                                <th scope="row" class="px-6 py-4 font-medium max-w-10 truncate text-gray-900 whitespace-nowrap dark:text-white">
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
                                <td class="px-6 py-8 flex justify-center items-center space-x-2 ">
                                    <a href="{{ route('product.edit', $item->id) }}" class="bg-yellow-500 px-2 py-1 rounded-md text-white">Ubah</a>
                                    <form action="{{ route('product.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 px-2 py-1 rounded-md text-white">Hapus</button>
                                    </form>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>