@extends('layouts.pelanggan')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">

    <h2 class="text-3xl font-bold mb-8 text-[#0A1A61]">Pesanan Saya</h2>

    @if($pesanan->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($pesanan as $item)
            <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300 border overflow-hidden">

                {{-- Poster mini --}}
                <div class="h-40 w-full relative overflow-hidden">
                    @if($item->tiket->gambar)
                        <img src="{{ asset('storage/'.$item->tiket->gambar) }}"
                             class="w-full h-full object-cover hover:scale-105 transition duration-500">
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-500">
                            No Image
                        </div>
                    @endif

                    {{-- Ribbon tanggal --}}
                    <div class="absolute top-3 left-3 bg-[#0A1A61] text-white px-3 py-1 rounded-xl text-xs font-semibold shadow">
                        {{ optional($item->tiket->tanggal_event)->format('d M Y') }}
                    </div>
                </div>

                {{-- Konten --}}
                <div class="p-4 flex flex-col justify-between h-52">
                    <div class="space-y-2">
                        <h3 class="text-lg font-bold text-[#0A1A61] truncate">
                            {{ $item->tiket->nama_event }}
                        </h3>

                        <p class="text-gray-600 text-sm">
                            Jumlah: <span class="font-semibold">{{ $item->jumlah }}</span>
                        </p>

                        <p class="text-green-700 font-bold text-lg">
                            Rp{{ number_format($item->total_harga, 0, ',', '.') }}
                        </p>

                        <p class="text-sm">
                            Status:
                            @if($item->status === 'success')
                                <span class="text-white bg-green-600 px-2 py-1 rounded-full text-xs font-semibold">Sukses</span>
                            @elseif($item->status === 'pending')
                                <span class="text-white bg-yellow-500 px-2 py-1 rounded-full text-xs font-semibold">Menunggu</span>
                            @else
                                <span class="text-white bg-red-600 px-2 py-1 rounded-full text-xs font-semibold">{{ ucfirst($item->status) }}</span>
                            @endif
                        </p>
                    </div>

                    <a href="{{ route('pelanggan.cetak', $item->id) }}"
                       target="_blank"
                       class="mt-3 block text-center bg-blue-600 text-white py-2 rounded-xl hover:bg-blue-700 transition shadow">
                        Cetak Struk
                    </a>
                </div>

            </div>
            @endforeach

        </div>

        <div class="mt-6">
            {{ $pesanan->links() }}
        </div>
    @else
        <div class="py-20 text-center text-gray-500 text-lg">
            Belum ada pesanan.
        </div>
    @endif

</div>
@endsection
