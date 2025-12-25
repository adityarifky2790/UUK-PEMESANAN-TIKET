@extends('layouts.admin')

@section('page_title','Tambah Tiket')

        @section('content')
        <div class="admin-card">
        <form action="{{ route('tiket.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium">Kode Tiket</label>
                <input type="text" name="kode_tiket" value="{{ old('kode_tiket') }}" class="w-full p-2 border rounded" />
            </div>

            <div>
                <label class="block text-sm font-medium">Nama Event</label>
                <input type="text" name="nama_event" value="{{ old('nama_event') }}" class="w-full p-2 border rounded" required />
            </div>

            <div>
                <label class="block text-sm font-medium">Lokasi</label>
                <input type="text" name="lokasi" value="{{ old('lokasi') }}" class="w-full p-2 border rounded" />
            </div>

            <div>
                <label class="block text-sm font-medium">Tanggal Event</label>
                <input type="date" name="tanggal_event" value="{{ old('tanggal_event') }}" class="w-full p-2 border rounded" />
            </div>

            <div>
                <label class="block text-sm font-medium">Harga</label>
                <input type="number" step="0.01" name="harga" value="{{ old('harga') }}" class="w-full p-2 border rounded" />
            </div>

            <div>
                <label class="block text-sm font-medium">Stok</label>
                <input type="number" name="stok" value="{{ old('stok', 0) }}" class="w-full p-2 border rounded" />
            </div>

            <div class="col-span-2">
                <label class="block text-sm font-medium">Deskripsi</label>
                <textarea name="deskripsi" class="w-full p-2 border rounded">{{ old('deskripsi') }}</textarea>
            </div>

            <div class="col-span-2">
                <label class="block text-sm font-medium">Gambar Event</label>
                <input type="file" name="gambar" class="w-full p-2 border rounded" />
            </div>
            </div>

            <button class="mt-4 bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
        </form>
        </div>
        @endsection
