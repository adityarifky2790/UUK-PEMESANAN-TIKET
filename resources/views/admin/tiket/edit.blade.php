@extends('layouts.admin')

@section('page_title','Edit Tiket')

@section('content')
        <div class="admin-card">
        <form action="{{ route('tiket.update', $tiket->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-4">
            <div>
                <label>Kode Tiket</label>
                <input type="text" name="kode_tiket" value="{{ old('kode_tiket', $tiket->kode_tiket) }}" class="w-full p-2 border rounded" />
            </div>

            <div>
                <label>Nama Event</label>
                <input type="text" name="nama_event" value="{{ old('nama_event', $tiket->nama_event) }}" class="w-full p-2 border rounded" required />
            </div>

            <div>
                <label>Lokasi</label>
                <input type="text" name="lokasi" value="{{ old('lokasi', $tiket->lokasi) }}" class="w-full p-2 border rounded" />
            </div>

            <div>
                <label>Tanggal Event</label>
                <input type="date" name="tanggal_event" value="{{ old('tanggal_event', optional($tiket->tanggal_event)->format('Y-m-d')) }}" class="w-full p-2 border rounded" />
            </div>

            <div>
                <label>Harga</label>
                <input type="number" step="0.01" name="harga" value="{{ old('harga', $tiket->harga) }}" class="w-full p-2 border rounded" />
            </div>

            <div>
                <label>Stok</label>
                <input type="number" name="stok" value="{{ old('stok', $tiket->stok) }}" class="w-full p-2 border rounded" />
            </div>

            <div class="col-span-2">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="w-full p-2 border rounded">{{ old('deskripsi', $tiket->deskripsi) }}</textarea>
            </div>

            <div class="col-span-2">
                <label>Gambar Event</label>
                <input type="file" name="gambar" class="w-full p-2 border rounded" />
                @if($tiket->gambar)
                <img src="{{ asset('storage/'.$tiket->gambar) }}" class="h-32 mt-2 rounded" alt="">
                @endif
            </div>
            </div>

            <button class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">Update</button>
        </form>
        </div>
        @endsection
