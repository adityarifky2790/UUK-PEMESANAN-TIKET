@extends('layouts.petugas')

@section('page_title', 'Pemesanan Tiket')

@section('content')

<h3 class="text-xl font-semibold text-[#0A1A61] mb-4">Daftar Pemesanan Tiket</h3>

{{-- TABLE --}}
<div class="overflow-x-auto">
    <table class="w-full border-collapse text-left admin-table">
        <thead class="bg-[#0A1A61] text-white">
            <tr>
                <th class="py-3 px-4">Nama Pemesan</th>
                <th class="py-3 px-4">Event</th>
                <th class="py-3 px-4">Jumlah</th>
                <th class="py-3 px-4">Total Harga</th>
                <th class="py-3 px-4">Tanggal Pesan</th>
                <th class="py-3 px-4">Status</th>
                <th class="py-3 px-4 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody class="bg-white">
            @forelse($pemesanan as $item)
                <tr class="border-b hover:bg-gray-50 transition">

                    {{-- NAMA PEMESAN --}}
                    <td class="py-3 px-4 font-semibold">
                        {{ $item->user->nama }}
                    </td>

                    {{-- EVENT --}}
                    <td class="py-3 px-4">
                        {{ $item->tiket->nama_event }}
                    </td>

                    {{-- JUMLAH --}}
                    <td class="py-3 px-4">
                        {{ $item->jumlah }}
                    </td>

                    {{-- TOTAL HARGA --}}
                    <td class="py-3 px-4">
                        Rp{{ number_format($item->total_harga, 0, ',', '.') }}
                    </td>

                    {{-- TANGGAL PESAN --}}
                    <td class="py-3 px-4">
                        {{ $item->created_at->format('d F Y') }}
                    </td>

                    {{-- STATUS --}}
                    <td class="py-3 px-4">
                        @if($item->status == 'success')
                            <span class="text-green-600 font-semibold">Success</span>
                        @else
                            <span class="text-yellow-600 font-semibold">{{ ucfirst($item->status ?? 'Pending') }}</span>
                        @endif
                    </td>

                    {{-- ACTION --}}
                    <td class="py-3 px-4 flex gap-2 justify-center">

                        {{-- Detail --}}
                        <a href="{{ route('petugas.pemesanan.show', $item->id) }}"
                           class="bg-purple-600 text-white px-3 py-2 rounded-md text-sm hover:bg-purple-500 shadow">
                            Detail
                        </a>

                        {{-- Edit --}}
                        <a href="{{ route('petugas.pemesanan.edit', $item->id) }}"
                           class="bg-blue-600 text-white px-3 py-2 rounded-md text-sm hover:bg-blue-500 shadow">
                            Edit
                        </a>

                        {{-- Hapus --}}
                        <form action="{{ route('petugas.pemesanan.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin ingin menghapus pemesanan ini?')"
                                class="bg-red-600 text-white px-3 py-2 rounded-md text-sm hover:bg-red-500 shadow">
                                Hapus
                            </button>
                        </form>

                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center py-6 text-gray-500">
                        Belum ada pemesanan.
                    </td>
                </tr>
            @endforelse
        </tbody>

    </table>
</div>

<div class="mt-4">
    {{ $pemesanan->links() }}
</div>

@endsection
