@extends('layouts.petugas')

@section('page_title', 'Edit Event')

@section('content')

<div class="bg-white p-6 rounded-xl shadow-md border">

    <h3 class="text-xl font-semibold text-[#0A1A61] mb-4">Edit Event</h3>

    <form action="{{ route('petugas.tiket.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div>
                <label class="font-semibold">Nama Event</label>
                <input type="text" name="nama_event" value="{{ $item->nama_event }}" class="form-input w-full mt-1" required>
            </div>

            <div>
                <label class="font-semibold">Tanggal Event</label>
                <input type="date" name="tanggal_event" value="{{ $item->tanggal_event }}" class="form-input w-full mt-1" required>
            </div>

            <div>
                <label class="font-semibold">Lokasi</label>
                <input type="text" name="lokasi" value="{{ $item->lokasi }}" class="form-input w-full mt-1" required>
            </div>

            <div>
                <label class="font-semibold">Harga</label>
                <input type="number" name="harga" value="{{ $item->harga }}" class="form-input w-full mt-1" required>
            </div>

            <div>
                <label class="font-semibold">Stok</label>
                <input type="number" name="stok" value="{{ $item->stok }}" class="form-input w-full mt-1" required>
            </div>

            <div>
                <label class="font-semibold">Poster Event</label>
                <input type="file" name="gambar" class="form-input w-full mt-1">

                @if($item->gambar)
                    <img src="{{ asset('storage/'.$item->gambar) }}"
                         class="h-20 w-36 object-cover rounded-lg mt-3 shadow">
                @endif
            </div>

        </div>

        <button class="bg-blue-600 text-white mt-6 px-4 py-2 rounded-lg shadow hover:bg-blue-500">
            Update Event
        </button>

    </form>

</div>

@endsection
