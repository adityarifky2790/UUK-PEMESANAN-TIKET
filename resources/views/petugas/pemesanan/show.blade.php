@extends('layouts.petugas')

@section('page_title', 'Detail Pemesanan')

@section('content')

<h3 class="text-xl font-semibold text-[#0A1A61] mb-6">
    Detail Pemesanan
</h3>

<div class="bg-white p-6 rounded-xl shadow-md border">

    {{-- NAMA PEMESAN --}}
    <div class="mb-4">
        <h4 class="font-semibold text-gray-700">Nama Pemesan:</h4>
        <p class="text-lg">{{ $pemesanan->user->nama }}</p>
    </div>

    {{-- EVENT --}}
    <div class="mb-4">
        <h4 class="font-semibold text-gray-700">Event:</h4>
        <p class="text-lg">{{ $pemesanan->tiket->nama_event }}</p>
    </div>

    {{-- JUMLAH --}}
    <div class="mb-4">
        <h4 class="font-semibold text-gray-700">Jumlah Tiket:</h4>
        <p class="text-lg">{{ $pemesanan->jumlah }}</p>
    </div>

    {{-- TOTAL HARGA --}}
    <div class="mb-4">
        <h4 class="font-semibold text-gray-700">Total Harga:</h4>
        <p class="text-lg text-green-700 font-bold">
            Rp{{ number_format($pemesanan->total_harga, 0, ',', '.') }}
        </p>
    </div>

    {{-- TANGGAL PEMESANAN --}}
    <div class="mb-4">
        <h4 class="font-semibold text-gray-700">Tanggal Pemesanan:</h4>
        <p class="text-lg">{{ $pemesanan->created_at->format('d F Y - H:i') }}</p>
    </div>

    {{-- BUTTON --}}
    <div class="flex gap-3 mt-6">
        <a href="{{ route('petugas.pemesanan.index') }}"
           class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-500">
            Kembali
        </a>

        <form action="{{ route('petugas.pemesanan.destroy', $pemesanan->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <button onclick="return confirm('Yakin ingin menghapus pemesanan ini?')"
                class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-500">
                Hapus Pemesanan
            </button>
        </form>
    </div>

</div>

@endsection
