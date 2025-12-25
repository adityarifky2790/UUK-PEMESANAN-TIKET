@extends('layouts.pelanggan')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-12">

    <h2 class="text-3xl font-extrabold text-gray-800 mb-10 tracking-tight text-center">
        Daftar Event
    </h2>

    {{-- GRID EVENT CARD --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

        @forelse($tiket as $item)
        <div class="rounded-2xl overflow-hidden shadow-md
                    bg-[#F3F4F6] border border-gray-300
                    hover:-translate-y-1 hover:shadow-xl
                    transition-all duration-300">

            {{-- GAMBAR --}}
            <div class="relative h-52 w-full overflow-hidden">
                <img src="{{ $item->gambar ? asset('storage/'.$item->gambar) : '/img/noimage.png' }}"
                     class="w-full h-full object-cover transition duration-500 group-hover:scale-105">

                {{-- TANGGAL --}}
                <div class="absolute bottom-0 right-0 bg-black/60 text-white px-3 py-1 text-xs font-semibold rounded-tl-lg">
                    {{ \Carbon\Carbon::parse($item->tanggal_event)->format('d F Y') }}
                </div>
            </div>

            {{-- KONTEN --}}
            <div class="p-5 space-y-3">

                <h3 class="text-xl font-bold text-gray-900 truncate">
                    {{ $item->nama_event }}
                </h3>

                <p class="text-sm text-gray-600 font-medium">
                    Harga:
                    <span class="text-green-700 font-bold">
                        Rp{{ number_format($item->harga,0,',','.') }}
                    </span>
                </p>

                {{-- STOK --}}
                <p class="text-sm font-medium">
                    Stok:
                    @if($item->stok > 10)
                        <span class="text-blue-700 font-bold">{{ $item->stok }}</span>
                    @elseif($item->stok > 0)
                        <span class="text-yellow-600 font-bold">Sisa {{ $item->stok }}</span>
                    @else
                        <span class="text-red-600 font-bold">Habis</span>
                    @endif
                </p>

                {{-- BUTTON --}}
                <button
                    onclick="window.location='{{ route('pelanggan.event-detail', $item->id) }}'"
                    class="mt-4 w-full bg-gray-800 hover:bg-gray-900
                           text-white font-semibold py-2.5 rounded-lg transition duration-300 shadow">
                    Detail & Pesan
                </button>

            </div>
        </div>

        @empty
            <p class="col-span-full text-center text-gray-500 text-lg py-10">
                Belum ada event.
            </p>
        @endforelse

    </div>

    {{-- PAGINATION --}}
    <div class="mt-10 text-gray-800">
        {{ $tiket->links() }}
    </div>
</div>
@endsection
