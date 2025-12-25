<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Petugas | @yield('page_title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Poppins', sans-serif !important; }
        .sidebar { background: #0A1A61; }
        .sidebar a { transition: .3s; }
        .sidebar a:hover { background: rgba(255,255,255,0.15); }
    </style>
</head>

<body class="bg-gray-100 min-h-screen flex">

    <aside class="sidebar w-64 min-h-screen text-white p-6 flex flex-col shadow-xl fixed">
        <h1 class="text-2xl font-semibold mb-8">Petugas Panel</h1>

        <nav class="space-y-3 text-[15px] flex-1">

            <a href="{{ route('petugas.dashboard') }}"
               class="block px-4 py-2 rounded-lg">
               Dashboard
            </a>

            <a href="{{ route('petugas.tiket.index') }}"
               class="block px-4 py-2 rounded-lg">
               Kelola Event
            </a>

            <a href="{{ route('petugas.pemesanan.index') }}"
               class="block px-4 py-2 rounded-lg">
               Pemesanan
            </a>

        </nav>

        <div class="mt-auto">

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full bg-red-600 text-white px-4 py-2 rounded-lg text-sm shadow-md hover:bg-red-500 mb-4">
                    Logout
                </button>
            </form>

            <div class="bg-white/10 text-white p-4 rounded-lg">
                <p class="text-xs opacity-80">Login sebagai:</p>
                <p class="text-sm font-semibold">{{ Auth::user()->email }}</p>

                <p class="text-xs mt-2 opacity-80">Role:</p>
                <p class="text-sm font-semibold capitalize">
                    {{ Auth::user()->role ?? 'Tidak diketahui' }}
                </p>
            </div>

        </div>
    </aside>

    <main class="ml-64 w-full p-10">
        <div class="bg-white rounded-xl shadow-lg p-6 border">
            @yield('content')
        </div>
    </main>

</body>
</html>
