@extends('layouts.admin')

@section('page_title', 'Kelola Tiket')

@section('content')

<div class="admin-card">

    <div class="bg-white p-6 rounded-xl shadow-lg border">

        <div class="flex items-center justify-between mb-5">
            <h3 class="text-2xl font-bold text-[#0A1A61]">Daftar Semua Tiket</h3>
        </div>

        @if($tiket->count() > 0)

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($tiket as $item)

            <div class="rounded-xl overflow-hidden shadow-lg border hover:shadow-2xl transition duration-300 bg-white">

                <div class="h-48 w-full relative overflow-hidden">
                    @if($item->gambar)
                        <img src="{{ asset('storage/'.$item->gambar) }}"
                             class="w-full h-full object-cover hover:scale-110 transition duration-500">
                    @else
                        <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-500">
                            No Image
                        </div>
                    @endif

                    <div class="absolute top-3 left-3 bg-[#0A1A61] text-white px-3 py-1 rounded-lg text-xs font-semibold shadow">
                        {{ optional($item->tanggal_event)->format('d M Y') }}
                    </div>
                </div>

                <div class="p-4 space-y-3">

                    <h2 class="text-xl font-bold text-[#0A1A61] leading-tight">
                        {{ $item->nama_event }}
                    </h2>

                    <p class="text-sm text-gray-600 font-medium">
                        {{ $item->lokasi }}
                    </p>

                    <p class="text-lg font-bold text-green-700">
                        Rp{{ number_format($item->harga, 0, ',', '.') }}
                    </p>

                    <p class="text-sm text-gray-700">Stok:
                        <span class="font-semibold">{{ $item->stok }}</span>
                    </p>

                    <div class="flex gap-2 pt-3">

                        <a href="{{ route('tiket.edit', $item->id) }}"
                           class="flex-1 text-center bg-blue-600 text-white py-2 rounded-lg text-sm hover:bg-blue-500 transition shadow">
                            Edit
                        </a>

                        <a href="{{ route('tiket.show', $item->id) }}"
                           class="flex-1 text-center bg-purple-600 text-white py-2 rounded-lg text-sm hover:bg-purple-500 transition shadow">
                            View
                        </a>

                        <form action="{{ route('tiket.destroy', $item->id) }}" method="POST" class="flex-1">
                            @csrf
                            @method('DELETE')
                            <button class="w-full bg-red-600 text-white py-2 rounded-lg text-sm hover:bg-red-500 transition shadow"
                                    onclick="return confirm('Yakin mau hapus event ini?')">
                                Hapus
                            </button>
                        </form>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

        @else

            <div class="py-10 text-center text-gray-500">
                Belum ada event.
            </div>

        @endif

        <div class="mt-4">
            {{ $tiket->links() }}
        </div>

    </div>

</div>

@endsection
