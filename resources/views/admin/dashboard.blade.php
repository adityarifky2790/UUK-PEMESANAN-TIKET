@extends('layouts.admin')

@section('page_title', 'Dashboard Admin')

@section('content')

<div class="w-full space-y-6">


    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">


        <div class="bg-[#0A1A61] text-white p-6 rounded-xl shadow-lg">
            <h4 class="text-lg font-semibold">Total Event</h4>
            <p class="text-4xl font-bold mt-2">{{ $totalTiket }}</p>
        </div>


        <div class="bg-green-600 text-white p-6 rounded-xl shadow-lg">
            <h4 class="text-lg font-semibold">Total Pemesanan</h4>
            <p class="text-4xl font-bold mt-2">{{ $totalPemesanan }}</p>
        </div>


        <div class="bg-yellow-500 text-white p-6 rounded-xl shadow-lg">
            <h4 class="text-lg font-semibold">Pengguna Terdaftar</h4>
            <p class="text-4xl font-bold mt-2">{{ $totalUser }}</p>
        </div>

    </div>


    <div class="bg-white p-6 rounded-xl shadow-lg border">


        <div class="flex items-center justify-between mb-4">
            <h3 class="text-xl font-semibold text-[#0A1A61]">Daftar Event</h3>
        </div>


        <div class="overflow-x-auto rounded-lg border">
            <table class="w-full border-collapse text-left">

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
                                    <div class="h-16 w-28 bg-gray-200 rounded-lg mx-auto flex items-center justify-center text-sm text-gray-500">
                                        No Image
                                    </div>
                                @endif
                            </td>


                            <td class="py-3 px-4 font-semibold">{{ $item->nama_event }}</td>


                            <td class="py-3 px-4">
                                {{ optional($item->tanggal_event)->format('d F Y') }}
                            </td>


                            <td class="py-3 px-4">{{ $item->lokasi }}</td>


                            <td class="py-3 px-4">
                                Rp{{ number_format($item->harga, 0, ',', '.') }}
                            </td>


                            <td class="py-3 px-4">{{ $item->stok }}</td>


                            <td class="py-3 px-4 flex gap-2 justify-center">


                                <a href="{{ route('tiket.edit', $item->id) }}"
                                   class="bg-blue-600 text-white px-3 py-2 rounded-md text-sm hover:bg-blue-500 shadow">
                                    Edit
                                </a>


                                <a href="{{ route('tiket.show', $item->id) }}"
                                   class="bg-purple-600 text-white px-3 py-2 rounded-md text-sm hover:bg-purple-500 shadow">
                                    View
                                </a>


                                <form action="{{ route('tiket.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        onclick="return confirm('Yakin mau hapus event ini?')"
                                        class="bg-red-600 text-white px-3 py-2 rounded-md text-sm hover:bg-red-500 shadow">
                                        Hapus
                                    </button>
                                </form>

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
