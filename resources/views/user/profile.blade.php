<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <nav class="bg-white shadow-md sticky top-0">
        <div class="max-w-screen-xl flex flex-wrap gap-20  items-center justify-between mx-auto px-4 pt-4">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <span class="self-center text-3xl whitespace-nowrap text-orange-500 font-bold">Toko Nazma</span>
            </a>
            <div class="flex-grow bg-red-200 rounded-lg overflow-hidden">
                <input type="text" name="search" id="search" placeholder="Cari Produk..." class="w-full rounded-lg">
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
                <div class="relative mt-3 md:hidden">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="search-navbar" class="block w-full p-2 ps-10 text-sm  border border-gray-300 rounded-lg  bg-gray-700  placeholder-gray-400 text-white" placeholder="Search...">
                </div>
                <ul class="flex flex-col items-center p-4 md:p-0 mt-4 font-medium border rounded-lg  md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 ">
                    <li>
                        <a href={{route('home')}} class="block py-2 px-3 text-orange-500 bg-blue-700 rounded md:bg-transparent md:p-0 " aria-current="page">Home</a>
                    </li>
                    @auth
                    <div class="w-8 h-8 bg-orange-400 rounded-full flex items-center justify-center relative cursor-pointer" id="profile-toggle">
                        <i class="fa-solid fa-user text-white"></i>
                        <div class="absolute bg-orange-400 px-5 py-2 top-10 rounded-md hidden" id="profile">
                            <!-- hidden or show -->
                            <span class="text-slate-50 font-bold">{{ Auth::user()->name }}</span>
                            <hr>
                            <a href="{{route('profileuser.index')}}" class="block py-2 px-3 text-white hover:text-blue-300 bg-blue-700 rounded md:bg-transparent md:p-0" aria-current="page">Profile</a>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                @method('POST')
                                <button type="submit" class="block py-2 px-3 text-white hover:text-blue-300 bg-blue-700 rounded md:bg-transparent md:p-0" aria-current="page">Logout</button>
                            </form>
                        </div>
                    </div>
                    @else
                    <li class="list-none">
                        <a href="{{route('login')}}" class="block py-1 px-3 text-white bg-orange-500 hover:bg-orange-600 rounded" aria-current="page">Login</a>
                    </li>
                    <li class="list-none">
                        <a href="{{route('register')}}" class="block py-0.5 px-2 rounded-md border-orange-500 hover:bg-orange-500 hover:text-white border-2 text-orange-500" aria-current="page">Register</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
        <div class="w-full">
            <ul class="flex justify-center items-center gap-8">
                <li class="py-2">
                    <a href="" class="text-sm font-medium text-orange-500">
                        Semua Kategori
                    </a>
                </li>
                @foreach ($categories as $item )
                <li class="py-2">
                    <a href="" class="text-sm font-medium text-slate-900 hover:text-orange-500">
                        {{$item->category_name}}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </nav>

    <main class="container mx-auto w-full min-h-dvh px-56 pt-5 pb-10">
        <h1 class="text-2xl font-bold ">Profile</h1>
        <div class="py-5 w-full">
            <div class="bg-slate-200 shadow-lg w-full h-full rounded-lg p-6">
                <div class="mb-4">
                    <label for="name" class="block text-xl font-medium text-gray-700">Name</label>
                    <p id="name" class="mt-1 block w-full text-lg text-gray-800">{{ Auth::user()->name }}</p>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-xl font-medium text-gray-700">Email</label>
                    <p id="email" class="mt-1 block w-full text-lg text-gray-800">{{ Auth::user()->email }}</p>
                </div>

                <div class="mb-4">
                    <label for="no_telp" class="block text-xl font-medium text-gray-700">No. Telp</label>
                    <p id="no_telp" class="mt-1 block w-full text-lg text-gray-800">{{ Auth::user()->no_telp }}</p>
                </div>
                <button class="bg-green-500 px-3 py-2 rounded-md text-white">Update Profile</button>
            </div>
        </div>
    </main>

    <footer class="bg-orange-600 text-white text-center py-4">
        <p>&copy; 2021 Toko Nazma</p>
    </footer>

    <script>
        // Ambil elemen-elemen yang diperlukan
        const profileToggle = document.getElementById('profile-toggle');
        const profile = document.getElementById('profile');

        // Tambahkan event listener untuk klik
        profileToggle.addEventListener('click', function() {
            // Toggle kelas hidden dan block pada elemen profile
            profile.classList.toggle('hidden');
            profile.classList.toggle('block');
        });
    </script>
</body>

</html>