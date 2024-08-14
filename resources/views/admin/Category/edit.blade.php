<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Kategori Produk') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-44">
                <div class="flex w-full justify-between items-center mt-10">
                    <h1 class="text-2xl font-semibold text-gray-800">Edit Kategori Produk</h1>
                </div>
                <div class="relative overflow-x-auto py-5 rounded-md">
                    <form action="{{ route('category.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="category_name" class="block text-sm font-medium text-gray-700">Nama Kategori Produk</label>
                            <input type="text" name="category_name" id="category_name" value="{{ $category->category_name }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">

                            @error('category_name')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="w-full inline-flex justify-end">
                            <button type="submit" class="text-white bg-green-500 px-2 py-1 mt-2 rounded-md">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>