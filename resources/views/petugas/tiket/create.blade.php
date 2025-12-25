@extends('layouts.petugas')

@section('page_title', 'Tambah Event')

@section('content')

<div class="bg-white p-6 rounded-xl shadow-md border">

    <h3 class="text-xl font-semibold text-[#0A1A61] mb-4">Tambah Event Baru</h3>

    <form action="{{ route('petugas.tiket.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div>
                <label class="font-semibold">Nama Event</label>
                <input type="text" name="nama_event" class="form-input w-full mt-1" required>
            </div>

            <div>
                <label class="font-semibold">Tanggal Event</label>
                <input type="date" name="tanggal_event" class="form-input w-full mt-1" required>
            </div>

            <div>
                <label class="font-semibold">Lokasi</label>
                <input type="text" name="lokasi" class="form-input w-full mt-1" required>
            </div>

            <div>
                <label class="font-semibold">Harga</label>
                <input type="number" name="harga" class="form-input w-full mt-1" required>
            </div>

            <div>
                <label class="font-semibold">Stok</label>
                <input type="number" name="stok" class="form-input w-full mt-1" required>
            </div>

            <div>
                <label class="font-semibold">Poster Event</label>
                <input type="file" name="gambar" class="form-input w-full mt-1">
            </div>

        </div>

        <button class="bg-green-600 text-white mt-6 px-4 py-2 rounded-lg shadow hover:bg-green-500">
            Simpan Event
        </button>

    </form>

</div>

@endsection
