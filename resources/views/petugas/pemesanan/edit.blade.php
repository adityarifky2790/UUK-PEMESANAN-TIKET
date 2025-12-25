@extends('layouts.petugas')

@section('page_title', 'Edit Pemesanan')

@section('content')

<h3 class="text-xl font-semibold text-[#0A1A61] mb-4">Edit Pemesanan</h3>

<div class="max-w-lg bg-white p-6 rounded-lg shadow">
    <form action="{{ route('petugas.pemesanan.update', $pemesanan->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Status (opsional) --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Status</label>
            <select name="status" class="w-full border px-3 py-2 rounded-md">
                <option value="pending" {{ $pemesanan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="success" {{ $pemesanan->status == 'success' ? 'selected' : '' }}>Success</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-500">
            Simpan Perubahan
        </button>
        <a href="{{ route('petugas.pemesanan.index') }}"
           class="ml-2 text-gray-600 hover:underline">Batal</a>
    </form>
</div>

@endsection
