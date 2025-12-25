@extends('layouts.pelanggan')

@section('content')
<header class="relative bg-[#0A1330] pt-16 pb-36 overflow-hidden">


    <div class="absolute top-[-180px] right-[-160px] w-[420px] h-[420px] bg-blue-600/20 rounded-full blur-[150px]"></div>

    <div class="relative max-w-7xl mx-auto px-6 text-white">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">


            <div class="space-y-6">


                <p class="text-sm font-poppins uppercase tracking-widest text-blue-300/70">
                    Dashboard Pelanggan
                </p>


                <h1 class="font-poppins font-extrabold leading-tight
                           text-5xl md:text-6xl lg:text-7xl">
                    Selamat Datang,
                    <span class="text-blue-200 font-bold block lg:inline">
                        {{ auth()->user()->name }}
                    </span>
                </h1>


                <p class="text-lg md:text-xl max-w-xl text-blue-100/90 font-poppins leading-relaxed">
                    Rasakan pengalaman mengakses website pemesanan tiket ini dengan lebih leluasa setelah login.
                </p>


                <div class="w-28 h-[2px] bg-blue-300/40 rounded"></div>

            </div>


            <div class="flex justify-center lg:justify-end">
                <img src="/img/gigstix.png"
                    alt="Gigstix Logo"
                    class="w-64 md:w-80 lg:w-[420px] h-auto opacity-95 drop-shadow-xl">
            </div>

        </div>

    </div>
</header>


<section class="mt-14 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-20">


    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

        {{-- Card 1: Jelajahi Event --}}
        <a href="{{ route('pelanggan.event-list') }}"
           class="group bg-white rounded-xl p-8 border border-gray-200 shadow-md
                  hover:shadow-xl hover:border-blue-300 transition-all duration-300">

            <div class="flex flex-col">
                <div class="p-3 bg-blue-600 text-white rounded-md w-fit mb-4 shadow-md">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                </div>

                <h3 class="text-xl font-semibold text-gray-900 mb-2">
                    Jelajahi Event
                </h3>
                <p class="text-gray-600 text-sm flex-grow leading-relaxed">
                    Akses katalog lengkap event yang tersedia untuk pembelian.
                </p>

                <div class="mt-5 pt-3 border-t border-gray-200">
                    <span class="text-blue-700 group-hover:underline font-medium text-sm">
                        Lihat Semua →
                    </span>
                </div>
            </div>
        </a>

        {{-- Card 2: Pesanan Saya --}}
        <a href="{{ route('pelanggan.pesanan') }}"
           class="group bg-white rounded-xl p-8 border border-gray-200 shadow-md
                  hover:shadow-xl hover:border-green-300 transition-all duration-300">

            <div class="flex flex-col">
                <div class="p-3 bg-green-600 text-white rounded-md w-fit mb-4 shadow-md">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z">
                        </path>
                    </svg>
                </div>

                <h3 class="text-xl font-semibold text-gray-900 mb-2">
                    Tiket Saya
                </h3>
                <p class="text-gray-600 text-sm flex-grow leading-relaxed">
                    Cek status tiket, unduh E-ticket, dan kelola semua pesanan Anda.
                </p>

                <div class="mt-5 pt-3 border-t border-gray-200">
                    <span class="text-green-700 group-hover:underline font-medium text-sm">
                        Lihat Pesanan →
                    </span>
                </div>
            </div>
        </a>

    </div>
</section>

<section class="py-20 bg-gradient-to-b from-[#0A1A61] to-[#132E8A]">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- TITLE --}}
        <h2 class="text-3xl font-extrabold text-white text-center mb-2 uppercase tracking-wider drop-shadow-md">
            Event Terbaru
        </h2>
        <p class="text-center text-gray-200 text-lg mb-12">
            Jangan sampai terlewatkan—tiket terbatas!
        </p>

        {{-- GRID EVENT --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

            @forelse($tiket as $item)
                <div class="bg-white rounded-xl border border-gray-300 overflow-hidden shadow-md
                            hover:shadow-2xl hover:border-[#0A1A61] hover:-translate-y-1
                            transition-all duration-300 group">

                    {{-- GAMBAR --}}
                    <div class="h-48 w-full overflow-hidden relative border-b border-gray-200">
                        <img src="{{ asset('storage/'.$item->gambar) }}"
                             alt="{{ $item->nama_event }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-500">

                        {{-- TANGGAL --}}
                        <div class="absolute top-0 right-0 px-3 py-1 bg-[#0A1A61] text-white font-bold text-xs rounded-bl-lg shadow-lg">
                            @if(isset($item->tanggal_event))
                                {{ \Carbon\Carbon::parse($item->tanggal_event)->format('d F Y') }}
                            @else
                                Belum Ada Tanggal
                            @endif
                        </div>
                    </div>

                    {{-- BODY --}}
                    <div class="p-4">
                        <h3 class="text-lg font-extrabold text-[#0A1A61] mb-1 truncate">
                            {{ $item->nama_event }}
                        </h3>

                        <p class="text-sm font-medium text-gray-600 mb-3">
                            Harga:
                            <span class="text-green-700 font-bold">
                                Rp{{ number_format($item->harga,0,',','.') }}
                            </span>
                        </p>

                        <a href="{{ route('pelanggan.event-detail', $item->id) }}"
                           class="block text-center w-full mt-3 bg-[#0A1A61] text-white font-semibold
                                  px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                            LIHAT DETAIL
                        </a>
                    </div>

                </div>
            @empty
                <div class="col-span-full text-center py-10">
                    <div class="p-10 bg-white/10 backdrop-blur-xl rounded-xl border border-white/20">
                        <p class="text-xl text-white font-bold drop-shadow">Tidak ada event rekomendasi saat ini.</p>
                    </div>
                </div>
            @endforelse

        </div>
    </div>
</section>

@endsection
