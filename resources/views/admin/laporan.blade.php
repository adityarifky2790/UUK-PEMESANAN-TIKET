@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-10">

    <h1 class="text-3xl font-bold mb-8 tracking-tight text-gray-800">
        Laporan Pemesanan Tiket
    </h1>

    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">

        <table class="min-w-full border-collapse">
            <thead style="background-color: #0A1A61;" class="text-white">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Pemesan</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Event</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Jumlah</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Total Harga</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold">Tanggal Pemesanan</th>
                </tr>
            </thead>

            <tbody class="bg-white">
                @forelse($pesanan as $p)
                    <tr class="border-b border-gray-200 hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-gray-900">
                            {{ $p->user->nama }}
                        </td>

                        <td class="px-6 py-4 text-gray-700">
                            {{ $p->tiket->nama_event }}
                        </td>

                        <td class="px-6 py-4 font-medium text-gray-900">
                            {{ $p->jumlah }}
                        </td>

                        <td class="px-6 py-4 text-blue-600 font-semibold">
                            Rp{{ number_format($p->total_harga, 0, ',', '.') }}
                        </td>

                        <td class="px-6 py-4 text-gray-500">
                            {{ $p->created_at->format('d M Y, H:i') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-6 text-center text-gray-500">
                            Belum ada pemesanan.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>

    </div>

</div>
@endsection
