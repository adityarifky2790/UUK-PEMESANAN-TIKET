<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Tiket;

class PelangganController extends Controller
{
    // Dashboard pelanggan
    public function dashboard()
{
    // Gunakan paginate agar links() berfungsi
    $tiket = Tiket::orderBy('created_at', 'desc')->paginate(6);

    return view('pelanggan.dashboard', compact('tiket'));
}

    // Daftar semua event
    public function listEvent()
    {
        $tiket = Tiket::paginate(9);
        return view('pelanggan.event-list', compact('tiket'));
    }

    // Detail event
    public function showEvent($id)
    {
        $tiket = Tiket::findOrFail($id);
        return view('pelanggan.event-detail', compact('tiket'));
    }

    // Pesan tiket
    public function pesanTiket(Request $request, $id)
    {
        // Validasi jumlah tiket
        $request->validate([
            'jumlah' => 'required|integer|min:1'
        ]);

        $tiket = Tiket::findOrFail($id);

        // Simpan pemesanan
        $total = $tiket->harga * $request->jumlah;
        auth()->user()->pemesanan()->create([
            'tiket_id' => $tiket->id,
            'jumlah' => $request->jumlah,
            'catatan' => $request->catatan,
            'total_harga' => $total,
            'status' => 'pending'
        ]);

        return redirect()->route('pelanggan.pesanan')
            ->with('success', 'Tiket berhasil dipesan.');
    }

    // Riwayat pesanan
   public function pesanan()
{
    $pesanan = Pemesanan::where('user_id', auth()->id())->paginate(10);

    return view('pelanggan.pesanan', compact('pesanan'));
}
public function cetakStruk($id)
{
    // Ambil pesanan beserta tiket dan user
    $pesanan = Pemesanan::with(['tiket', 'user'])
                ->where('id', $id)
                ->where('user_id', auth()->id())
                ->firstOrFail();

    $user = $pesanan->user->nama; // ambil nama user dari relasi

    return view('pelanggan.struk', compact('pesanan', 'user'));
}

public function acc($id)
{
    $pemesanan = Pemesanan::findOrFail($id);
    $pemesanan->status = 'success';
    $pemesanan->save();

    return redirect()->back()->with('success', 'Pemesanan telah di-ACC.');
}

}
