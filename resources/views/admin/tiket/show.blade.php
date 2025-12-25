@extends('layouts.admin')

@section('page_title', 'Detail Tiket')

@section('content')

<div class="admin-card">

    <h2 class="text-2xl font-bold text-[#0A1A61] mb-4">Detail Tiket</h2>

    <div class="grid grid-cols-2 gap-4">

        <div>
            <label class="text-sm font-semibold">Kode Tiket</label>
            <p class="p-2 border rounded bg-gray-50">{{ $tiket->kode_tiket }}</p>
        </div>

        <div>
            <label class="text-sm font-semibold">Nama Event</label>
            <p class="p-2 border rounded bg-gray-50">{{ $tiket->nama_event }}</p>
        </div>

        <div>
            <label class="text-sm font-semibold">Lokasi</label>
            <p class="p-2 border rounded bg-gray-50">{{ $tiket->lokasi }}</p>
        </div>

        <div>
            <label class="text-sm font-semibold">Tanggal Event</label>
            <p class="p-2 border rounded bg-gray-50">
                {{ \Carbon\Carbon::parse($tiket->tanggal_event)->format('d F Y') }}
            </p>
        </div>

        <div>
            <label class="text-sm font-semibold">Harga</label>
            <p class="p-2 border rounded bg-gray-50">Rp {{ number_format($tiket->harga, 0, ',', '.') }}</p>
        </div>

        <div>
            <label class="text-sm font-semibold">Stok</label>
            <p class="p-2 border rounded bg-gray-50">{{ $tiket->stok }}</p>
        </div>

        <div class="col-span-2">
            <label class="text-sm font-semibold">Deskripsi</label>
            <p class="p-2 border rounded bg-gray-50 whitespace-pre-line">{{ $tiket->deskripsi }}</p>
        </div>

        <div class="col-span-2">
            <label class="text-sm font-semibold">Poster Event</label>
            <div class="mt-2">
                @if ($tiket->gambar)
                    <img src="{{ asset('storage/' . $tiket->gambar) }}" class="w-64 rounded shadow">
                @else
                    <p class="text-gray-500">Tidak ada gambar</p>
                @endif
            </div>
        </div>

    </div>

    <div class="mt-6">
        <a href="{{ route('admin-dashboard') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-500">Kembali</a>
    </div>

</div>

@endsection
