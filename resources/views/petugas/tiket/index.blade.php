@extends('layouts.petugas')

@section('page_title', 'Daftar Event')

@section('content')

<div class="w-full">
    <div class="bg-white p-6 rounded-xl shadow-md border">

        <h3 class="text-xl font-semibold text-[#0A1A61] mb-4">Daftar Event</h3>

        <a href="{{ route('petugas.tiket.create') }}"
           class="bg-green-600 text-white px-4 py-2 rounded-md mb-4 inline-block hover:bg-green-500 shadow">
            + Tambah Event
        </a>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse text-left admin-table">
                <thead class="bg-[#0A1A61] text-white">
                    <tr>
                        <th class="py-3 px-4">Poster</th>
                        <th class="py-3 px-4">Nama Event</th>
                        <th class="py-3 px-4">Tanggal</th>
                        <th class="py-3 px-4">Lokasi</th>
                        <th class="py-3 px-4">Harga</th>
                        <th class="py-3 px-4">Stok</th>
                        <th class="py-3 px-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="bg-white">
                    @forelse($tiket as $item)
                        <tr class="border-b hover:bg-gray-50 transition">

                            <td class="py-3 px-4 text-center">
                                @if($item->gambar)
                                    <img src="{{ asset('storage/'.$item->gambar) }}"
                                         class="h-16 w-28 rounded-lg object-cover mx-auto shadow">
                                @else
                                    <div class="h-16 w-28 bg-gray-200 rounded-lg mx-auto flex items-center justify-center">
                                        No Image
                                    </div>
                                @endif
                            </td>

                            <td class="py-3 px-4 font-semibold">
                                {{ $item->nama_event }}
                            </td>

                            <td class="py-3 px-4">
                                {{ $item->tanggal_event->format('d F Y') }}
                            </td>

                            <td class="py-3 px-4">
                                {{ $item->lokasi }}
                            </td>

                            <td class="py-3 px-4">
                                Rp{{ number_format($item->harga,0,',','.') }}
                            </td>

                            <td class="py-3 px-4">
                                {{ $item->stok }}
                            </td>

                           <td class="py-3 px-4">
    <div class="flex items-center justify-center gap-2">

        <a href="{{ route('petugas.tiket.edit', $item->id) }}"
           class="bg-blue-600 text-white px-3 py-2 rounded-md text-sm hover:bg-blue-500 shadow">
            Edit
        </a>

        <a href="{{ route('petugas.tiket.show', $item->id) }}"
           class="bg-purple-600 text-white px-3 py-2 rounded-md text-sm hover:bg-purple-500 shadow">
            View
        </a>

        <a href="{{ route('petugas.tiket.pesan', $item->id) }}"
           class="bg-green-600 text-white px-3 py-2 rounded-md text-sm hover:bg-green-500 shadow">
            Pesan
        </a>

        <form action="{{ route('petugas.tiket.destroy', $item->id) }}"
              method="POST" onsubmit="return confirm('Yakin hapus event ini?')">
            @csrf
            @method('DELETE')

            <button
                class="bg-red-600 text-white px-3 py-2 rounded-md text-sm hover:bg-red-500 shadow">
                Hapus
            </button>
        </form>

    </div>
</td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-6 text-gray-500">
                                Belum ada event.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $tiket->links() }}
        </div>

    </div>
</div>

@endsection
