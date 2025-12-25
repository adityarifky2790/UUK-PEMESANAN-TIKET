@extends('layouts.petugas')

@section('page_title', 'Dashboard Petugas')

@section('content')

<div class="w-full">

    {{-- CARD WRAPPER --}}
    <div class="bg-white p-6 rounded-xl shadow-md border mb-6">
        <h3 class="text-2xl font-semibold text-[#0A1A61] mb-4">
            Dashboard Petugas
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

    {{-- TOTAL EVENT --}}
            <div class="bg-[#0A1A61] text-white p-5 rounded-xl shadow">
                <h4 class="text-lg font-semibold">Total Event</h4>
                <p class="text-4xl font-bold mt-2">{{ $totalTiket }}</p>
            </div>

            {{-- TOTAL PEMESANAN --}}
            <div class="bg-green-600 text-white p-5 rounded-xl shadow">
                <h4 class="text-lg font-semibold">Total Pemesanan</h4>
                <p class="text-4xl font-bold mt-2">{{ $totalPemesanan }}</p>
            </div>

            {{-- TOTAL PELANGGAN --}}
            <div class="bg-yellow-500 text-white p-5 rounded-xl shadow">
                <h4 class="text-lg font-semibold">Total Pelanggan</h4>
                <p class="text-4xl font-bold mt-2">{{ $totalUser }}</p>
            </div>

        </div>

    </div>

    {{-- TABEL PEMESANAN --}}
    <div class="bg-white p-6 rounded-xl shadow-md border">

        <h3 class="text-xl font-semibold text-[#0A1A61] mb-4">Daftar Pemesanan Terbaru</h3>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse text-left admin-table">
                <thead class="bg-[#0A1A61] text-white">
                    <tr>
                        <th class="py-3 px-4">Pemesan</th>
                        <th class="py-3 px-4">Event</th>
                        <th class="py-3 px-4">Jumlah</th>
                        <th class="py-3 px-4">Total Harga</th>
                        <th class="py-3 px-4">Tanggal</th>
                        <th class="py-3 px-4 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="bg-white">
                    @forelse($pemesanan as $item)
                        <tr class="border-b hover:bg-gray-50 transition">

                            {{-- PEMESAN --}}
                            <td class="py-3 px-4 font-semibold">
                                {{ $item->user->nama ?? '-' }}
                            </td>

                            {{-- EVENT --}}
                            <td class="py-3 px-4">
                                {{ $item->tiket->nama_event ?? '-' }}
                            </td>

                            {{-- JUMLAH --}}
                            <td class="py-3 px-4">
                                {{ $item->jumlah }}
                            </td>

                            {{-- TOTAL --}}
                            <td class="py-3 px-4">
                                Rp{{ number_format($item->total_harga,0,',','.') }}
                            </td>

                            {{-- TANGGAL --}}
                            <td class="py-3 px-4">
                                {{ $item->created_at->format('d F Y') }}
                            </td>

                            {{-- ACTION --}}
                            <td class="py-3 px-4 text-center">
                                <a href="{{ route('petugas.pemesanan.show', $item->id) }}"
                                   class="bg-purple-600 text-white px-3 py-2 rounded-md text-sm hover:bg-purple-500 shadow">
                                    Detail
                                </a>
                            </td>

                        </tr>

                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-6 text-gray-500">
                                Belum ada pemesanan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

    </div>

</div>

@endsection
