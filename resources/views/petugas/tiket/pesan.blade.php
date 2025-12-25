@extends('layouts.petugas')

@section('page_title', 'Pesan Tiket')

@section('content')

<h2 class="text-xl font-semibold text-[#0A1A61] mb-4">
    Pesan Tiket: {{ $tiket->nama_event }}
</h2>

<form action="{{ route('petugas.tiket.pesan.store', $tiket->id) }}" method="POST">
    @csrf

    <div class="mb-4">
        <label class="font-semibold">Nama Pemesan</label>
        <input type="text" name="nama_pemesan" required
            class="w-full p-2 border rounded-lg" placeholder="Masukkan nama pemesan">
    </div>

    <div class="mb-4">
        <label class="font-semibold">Jumlah Tiket</label>
        <input type="number" name="jumlah" min="1" required
            class="w-full p-2 border rounded-lg">
    </div>

    <div class="mb-4">
        <label class="font-semibold">Harga per Tiket</label>
        <div class="p-2 bg-gray-100 rounded">
            Rp{{ number_format($tiket->harga,0,',','.') }}
        </div>
    </div>

    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-500">
        Simpan Pesanan
    </button>

</form>

@endsection
