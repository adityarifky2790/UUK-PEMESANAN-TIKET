<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetugasController extends Controller
{
    // DASHBOARD PETUGAS
    public function dashboard()
    {
        $totalTiket = \App\Models\Tiket::count();
        $totalPemesanan = \App\Models\Pemesanan::count();
        $totalUser = \App\Models\User::count();

    //  tabel pemesanan di dashboard
    $pemesanan = \App\Models\Pemesanan::with('user', 'tiket')
                    ->latest()
                    ->take(5)
                    ->get();

    return view('petugas.dashboard', compact(
        'totalTiket',
        'totalPemesanan',
        'totalUser',
        'pemesanan'
        ));
    }

    public function tiketIndex()
    {
        $tiket = Tiket::paginate(10);
        return view('petugas.tiket.index', compact('tiket'));
    }

    public function tiketCreate()
    {
        return view('petugas.tiket.create');
    }

    public function tiketStore(Request $request)
    {
        $request->validate([
            'nama_event' => 'required',
            'tanggal_event' => 'required',
            'lokasi' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ]);

        Tiket::create($request->all());

        return redirect()->route('petugas.tiket.index')
            ->with('success', 'Event berhasil ditambahkan');
    }

    public function tiketShow($id)
    {
        $item = Tiket::findOrFail($id);
        return view('petugas.tiket.show', compact('item'));
    }

    public function tiketEdit($id)
    {
        $item = Tiket::findOrFail($id);
        return view('petugas.tiket.edit', compact('item'));
    }

    public function tiketUpdate(Request $request, $id)
    {
        $item = Tiket::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('petugas.tiket.index')
            ->with('success', 'Event berhasil diperbarui');
    }

    public function tiketDestroy($id)
    {
        Tiket::findOrFail($id)->delete();

        return redirect()->route('petugas.tiket.index')
            ->with('success', 'Event dihapus');
    }

    // PEMESANAN

    public function pemesananIndex()
{
    $pemesanan = Pemesanan::with('tiket')->latest()->paginate(10); // <-- Paginator
    return view('petugas.pemesanan.index', compact('pemesanan'));
}


    public function pemesananShow($id)
    {
         $pemesanan = Pemesanan::with('tiket')->findOrFail($id);

        return view('petugas.pemesanan.show', compact('pemesanan'));
    }

    public function pemesananDestroy($id)
    {
        Pemesanan::findOrFail($id)->delete();

        return redirect()->route('petugas.pemesanan.index')
            ->with('success', 'Pemesanan berhasil dihapus');
    }


    public function pesanForm($id)
    {
        $tiket = Tiket::findOrFail($id);
        return view('petugas.tiket.pesan', compact('tiket'));
    }



    public function pesanStore(Request $request, $id)
{
    $request->validate([
        'nama_pemesan' => 'required',
        'jumlah' => 'required|integer|min:1'
    ]);

    $tiket = Tiket::findOrFail($id);

    // hitung total
    $total = $tiket->harga * $request->jumlah;

    // SIMPAN
    Pemesanan::create([
        'tiket_id'      => $tiket->id,
        'jumlah'        => $request->jumlah,
        'total_harga'   => $total,
        'nama_pemesan'  => $request->nama_pemesan,
        'user_id' => Auth::id(),
    ]);

    return redirect()->route('petugas.pemesanan.index')
                     ->with('success', 'Pemesanan berhasil dibuat!');
}

public function pemesananEdit($id)
{
    $pemesanan = Pemesanan::findOrFail($id);
    return view('petugas.pemesanan.edit', compact('pemesanan'));
}

public function pemesananUpdate(Request $request, $id)
{
    $pemesanan = Pemesanan::findOrFail($id);
    // Contoh update, sesuaikan field
    $pemesanan->status = $request->status;
    $pemesanan->save();

    return redirect()->route('petugas.pemesanan.index')->with('success', 'Pemesanan berhasil diupdate');
}





}
