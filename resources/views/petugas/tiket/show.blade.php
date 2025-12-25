@extends('layouts.petugas')

@section('page_title', 'Detail Event')

@section('content')

<div class="bg-white p-6 rounded-xl shadow-md border">

    <h3 class="text-2xl font-bold text-[#0A1A61] mb-4">Detail Event</h3>

    <div class="flex flex-col md:flex-row gap-6">

        {{-- POSTER --}}
        <div>
            @if($item->gambar)
                <img src="{{ asset('storage/'.$item->gambar) }}"
                     class="h-56 w-96 object-cover rounded-lg shadow">
            @else
                <div class="h-56 w-96 bg-gray-200 rounded-lg flex items-center justify-center text-gray-600">
                    No Poster
                </div>
            @endif
        </div>

        {{-- DETAIL --}}
        <div class="space-y-3 text-lg">

            <p><strong>Nama Event:</strong> {{ $item->nama_event }}</p>
            <p><strong>Lokasi:</strong> {{ $item->lokasi }}</p>
            <p><strong>Tanggal:</strong> {{ $item->tanggal_event->format('d F Y') }}</p>
            <p><strong>Harga:</strong> Rp{{ number_format($item->harga,0,',','.') }}</p>
            <p><strong>Stok:</strong> {{ $item->stok }} Tiket</p>

        </div>

    </div>

    <a href="{{ route('petugas.tiket.index') }}"
       class="mt-5 inline-block bg-[#0A1A61] text-white px-4 py-2 rounded-lg shadow hover:bg-[#132E8A]">
        Kembali
    </a>

</div>

@endsection
