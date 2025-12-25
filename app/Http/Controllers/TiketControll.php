<?php

namespace App\Http\Controllers;
use App\Models\Tiket;
use App\Models\Pemesanan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class TiketControll extends Controller
{
    /**
     * Display a listing of the resource.
     */

        public function index()
    {
        $tiket = Tiket::orderBy('created_at', 'desc')->paginate(10);
        $totalTiket = Tiket::count();
        $totalPemesanan = Pemesanan::count();
        $totalUser = User::count();

        return view('admin.dashboard', compact(
            'tiket',
            'totalTiket',
            'totalPemesanan',
            'totalUser'
        ));
    }



    public function create()
    {
        return view('admin.tiket.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_tiket' => 'nullable|string|max:255',
            'nama_event' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            'lokasi' => 'nullable|string|max:255',
            'tanggal_event' => 'nullable|date',
            'harga' => 'nullable|numeric',
            'stok' => 'nullable|integer',
            'deskripsi' => 'nullable|string',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('tiket', 'public');
            $data['gambar'] = $path;
        }

        Tiket::create($data);

        return redirect()->route('admin-dashboard')->with('success', 'Tiket berhasil dibuat.');
    }

    public function edit($id)
    {
        $tiket = Tiket::findOrFail($id);
        return view('admin.tiket.edit', compact('tiket'));
    }

  public function update(Request $request, $id)
{
    $tiket = Tiket::findOrFail($id);

    $data = $request->validate([
        'kode_tiket' => 'nullable|string|max:255',
        'nama_event' => 'required|string|max:255',
        'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        'lokasi' => 'nullable|string|max:255',
        'tanggal_event' => 'nullable|date',
        'harga' => 'nullable|numeric',
        'stok' => 'nullable|integer',
        'deskripsi' => 'nullable|string',
    ]);

    if ($request->hasFile('gambar')) {
        if ($tiket->gambar && Storage::disk('public')->exists($tiket->gambar)) {
            Storage::disk('public')->delete($tiket->gambar);
        }
        $data['gambar'] = $request->file('gambar')->store('tiket', 'public');
    } else {
        unset($data['gambar']);
    }


    if (!$request->filled('tanggal_event')) {
        unset($data['tanggal_event']);
    }

    $tiket->update($data);

    return redirect()->route('admin-dashboard')->with('success', 'Tiket berhasil diperbarui.');
}


    public function destroy($id)
    {
        $tiket = Tiket::findOrFail($id);

        if ($tiket->gambar && Storage::disk('public')->exists($tiket->gambar)) {
            Storage::disk('public')->delete($tiket->gambar);
        }

        $tiket->delete();

        return redirect()->route('admin-dashboard')->with('success', 'Tiket berhasil dihapus.');
    }

    public function show($id)
    {
        $tiket = Tiket::findOrFail($id);
        return view('admin.tiket.show', compact('tiket'));

    }
    public function viewAll()
{
    $tiket = Tiket::orderBy('created_at', 'desc')->paginate(20);
    return view('admin.view-all', compact('tiket'));
}

}
