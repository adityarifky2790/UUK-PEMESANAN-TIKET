<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;

class AdminLaporanController extends Controller
{
    public function index()
{
    $pesanan = Pemesanan::with(['user', 'tiket'])
                ->latest() 
                ->get();

    return view('admin.laporan', compact('pesanan'));
}

}
