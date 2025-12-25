@extends('layouts.pelanggan')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-12">

    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">

        <!-- IMAGE -->
        <div class="h-72 w-full">
            <img
                src="{{ $tiket->gambar ? asset('storage/'.$tiket->gambar) : '/img/noimage.png' }}"
                class="w-full h-full object-cover"
            >
        </div>

        <!-- CONTENT -->
        <div class="p-8 space-y-6">

            <!-- TITLE -->
            <h2 class="text-3xl font-semibold text-gray-900 tracking-tight">
                {{ $tiket->nama_event }}
            </h2>

            <!-- DATE + PRICE -->
            <div class="flex items-center justify-between">
                <p class="text-gray-600 text-lg">
                    {{ \Carbon\Carbon::parse($tiket->tanggal_event)->format('d F Y') }}
                </p>

                <p class="text-2xl font-bold text-blue-700">
                    Rp{{ number_format($tiket->harga, 0, ',', '.') }}
                </p>
            </div>

            <!-- DESCRIPTION -->
            <p class="text-gray-700 leading-relaxed">
                {{ $tiket->deskripsi ?? 'Tidak ada deskripsi.' }}
            </p>

            <!-- STOCK -->
            <p class="text-sm text-gray-500">
                Stok tersedia:
                <span class="font-semibold text-gray-700">{{ $tiket->stok }}</span>
            </p>

            <!-- FORM PESAN -->
            <form action="{{ route('pelanggan.pesan-tiket', $tiket->id) }}" method="POST" class="space-y-4">
                @csrf

                <!-- Jumlah Tiket -->
                <div>
                    <label for="jumlah" class="block text-sm font-medium text-gray-700">
                        Jumlah Tiket
                    </label>
                    <input
                        type="number"
                        name="jumlah"
                        id="jumlah"
                        min="1"
                        max="{{ $tiket->stok }}"
                        value="1"
                        class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-300 focus:outline-none"
                        required
                    >
                </div>


                <div>
                    <label for="catatan" class="block text-sm font-medium text-gray-700">
                        Catatan
                    </label>
                    <textarea
                        name="catatan"
                        id="catatan"
                        rows="3"
                        placeholder="Tulis catatan tambahan, misal permintaan khusus atau informasi lain..."
                        class="w-full mt-1 px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-300 focus:outline-none resize-none"
                    ></textarea>
                </div>

                <!-- Tombol Pesan -->
                <button
                    type="submit"
                    class="w-full bg-blue-600 text-white py-3 rounded-xl font-semibold
                    hover:bg-blue-700 transition-all shadow-sm hover:shadow-md"
                >
                    Pesan Sekarang
                </button>
            </form>

        </div>
    </div>
</div>
@endsection
