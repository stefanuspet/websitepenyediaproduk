<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kategori Produk') }}
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
                    <h1 class="text-2xl font-semibold text-gray-800">Daftar Kategori Produk</h1>
                    <a href="{{route('category.create')}}" class="bg-green-600 px-2 py-1 rounded-md text-white">Tambah Kategori</a>
                </div>
                <div class="relative overflow-x-auto py-5 rounded-md">
                    <table class="w-full text-sm rtl:text-right text-gray-500 dark:text-gray-400 text-center">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nama Kategori Produk
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$item->category_name}}
                                </th>
                                <td class="px-6 py-4 flex justify-center gap-2">
                                    <a href="{{route('category.edit', $item->id)}}" class="bg-yellow-500 px-2 py-1 rounded-md text-white">Ubah</a>
                                    <form action="{{route('category.destroy', $item->id)}}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="bg-red-500 px-2 py-1 rounded-md text-white">Hapus</button>
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