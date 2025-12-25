<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('page_title')</title>

    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 text-gray-900">

   <nav class="bg-[#0A1A61] text-white py-3 shadow-md relative">

    <div class="max-w-7xl mx-auto px-4 flex items-center justify-between">

        {{-- LOGO (KIRI) --}}
        <img src="/img/gigstix.png"
             alt="logo"
             class="h-14 md:h-16 w-auto object-contain drop-shadow-lg">

        {{-- MENU (TENGAH ABSOLUTE) --}}
        <ul class="hidden md:flex space-x-6 text-sm font-semibold absolute left-1/2 transform -translate-x-1/2">
            <li><a href="{{ route('pelanggan.dashboard') }}" class="hover:text-blue-300">Dashboard</a></li>
            <li><a href="{{ route('pelanggan.event-list') }}" class="hover:text-blue-300">Event</a></li>
            <li><a href="{{ route('pelanggan.pesanan') }}" class="hover:text-blue-300">Pesanan Saya</a></li>
        </ul>

        {{-- LOGOUT (KANAN) --}}
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm shadow-md hover:bg-red-500">
                Logout
            </button>
        </form>

    </div>

</nav>


    <main class="@yield('')">
    @yield('content')
    </main>

</body>
</html>
