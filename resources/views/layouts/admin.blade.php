<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <title>Admin | @yield('page_title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif !important; }
        .sidebar { background: #0A1A61; }
        .sidebar a { transition: .3s; color: white; }
        .sidebar a:hover { background: rgba(255,255,255,0.15); }
    </style>
</head>

<body class="bg-gray-100">
<div class="flex">

    <aside class="sidebar w-64 min-h-screen text-white p-6 fixed flex flex-col justify-between">

        <div>
            <h1 class="text-2xl font-semibold mb-8">Admin Panel</h1>

            <nav class="space-y-3 text-[15px]">
                <a href="{{ route('admin-dashboard') }}" class="block px-4 py-2 rounded-lg">Dashboard</a>
                <a href="{{ route('tiket.create') }}" class="block px-4 py-2 rounded-lg">Tambah Tiket</a>
                <a href="{{ route('tiket.view-all') }}" class="block px-4 py-2 rounded-lg">Kelola Event</a>
                <a href="register" class="block px-4 py-2 rounded-lg">Buat Akun</a>
                <a href="{{ route('admin.kelola-pengguna') }}" class="block px-4 py-2 rounded-lg">Kelola Pengguna</a>
                <a href="{{ route('admin.laporan') }}" class="block px-4 py-2 rounded-lg">Laporan</a>
            </nav>
        </div>

        <div class="mt-10">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-red-600 w-full text-white px-4 py-2 rounded-lg text-sm shadow-md hover:bg-red-500">
                    Logout
                </button>
            </form>

            <div class="mt-4 bg-white/10 text-white p-4 rounded-lg">
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
        <h2 class="text-3xl font-bold text-[#0A1A61] mb-10">@yield('page_title', 'Dashboard')</h2>

        @if(session('success'))
            <div class="mb-6 p-4 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
        @endif

        <div class="bg-white rounded-xl shadow-lg p-6 border">
            @yield('content')
        </div>
    </main>

</div>
</body>
</html>
