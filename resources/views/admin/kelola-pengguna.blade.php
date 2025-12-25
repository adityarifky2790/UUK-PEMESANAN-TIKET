@extends('layouts.admin')

@section('page_title', 'Kelola Pengguna')

@section('content')

<div class="admin-card">

    <div class="overflow-x-auto border rounded-xl shadow-lg">

        
        <div class="bg-[#0A1A61] text-white px-5 py-3 text-lg font-semibold rounded-t-xl">
            Daftar Pengguna Terdaftar
        </div>

        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-100 border-b">
                <tr>
                    <th class="py-3 px-4">No</th>
                    <th class="py-3 px-4">Email</th>
                    <th class="py-3 px-4">Nama</th>
                    <th class="py-3 px-4">Role</th>
                    <th class="py-3 px-4">Tanggal Daftar</th>
                </tr>
            </thead>

            <tbody class="bg-white">
                @foreach($users as $u)
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="py-3 px-4">{{ $loop->iteration }}</td>
                    <td class="py-3 px-4">{{ $u->email }}</td>
                    <td class="py-3 px-4">{{ $u->nama ?? '-' }}</td>
                    <td class="py-3 px-4 capitalize">{{ $u->role }}</td>
                    <td class="py-3 px-4">{{ $u->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</div>

@endsection
