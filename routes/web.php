<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TiketControll;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\AdminLaporanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// ROUTE PROFILE (Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    // Form register admin
    Route::get('/admin/register', [RegisteredUserController::class, 'create'])->name('register.create');

    // Simpan user baru (oleh admin)
    Route::post('/admin/register', [RegisteredUserController::class, 'store'])->name('register.store');


    Route::get('/admin/dashboard', [TiketControll::class, 'index'])->name("admin-dashboard");
    Route::get('/admin/create', [TiketControll::class, 'create'])->name("tiket.create");
    Route::post('/admin/store', [TiketControll::class, 'store'])->name("tiket.store");
    Route::get('/admin/edit/{id}', [TiketControll::class, 'edit'])->name("tiket.edit");
    Route::put('/admin/update/{id}', [TiketControll::class, 'update'])->name("tiket.update");
    Route::get('/admin/view/{id}', [TiketControll::class, 'show'])->name("tiket.show");
    Route::delete('/admin/destroy/{id}', [TiketControll::class, 'destroy'])->name("tiket.destroy");
    Route::get('/admin/view-all', [TiketControll::class, 'viewAll'])->name("tiket.view-all");

    Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/laporan', [\App\Http\Controllers\AdminLaporanController::class, 'index'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.laporan');

    Route::get('/admin/kelola-pengguna', function () {
        $users = \App\Models\User::orderBy('created_at', 'desc')->get();
        return view('admin.kelola-pengguna', compact('users'));
    })->name('admin.kelola-pengguna');
    });

});

Route::middleware(['auth', 'role:petugas'])
    ->prefix('petugas')
    ->name('petugas.')
    ->group(function () {


    // Dashboard
    Route::get('/dashboard', [PetugasController::class, 'dashboard'])
        ->name('dashboard');

    // CRUD Tiket (index, create, store, show, edit, update, destroy)
    Route::get('/tiket', [PetugasController::class, 'tiketIndex'])->name('tiket.index');
    Route::get('/tiket/create', [PetugasController::class, 'tiketCreate'])->name('tiket.create');
    Route::post('/tiket', [PetugasController::class, 'tiketStore'])->name('tiket.store');
    Route::get('/tiket/{id}', [PetugasController::class, 'tiketShow'])->name('tiket.show');
    Route::get('/tiket/{id}/edit', [PetugasController::class, 'tiketEdit'])->name('tiket.edit');
    Route::put('/tiket/{id}', [PetugasController::class, 'tiketUpdate'])->name('tiket.update');
    Route::delete('/tiket/{id}', [PetugasController::class, 'tiketDestroy'])->name('tiket.destroy');


     Route::get('/tiket/{id}/pesan', [PetugasController::class, 'pesanForm'])->name('tiket.pesan');
    Route::post('/tiket/{id}/pesan', [PetugasController::class, 'pesanStore'])->name('tiket.pesan.store');

    // PEMESANAN
    Route::get('/pemesanan', [PetugasController::class, 'pemesananIndex'])->name('pemesanan.index');
    Route::get('/pemesanan/{id}', [PetugasController::class, 'pemesananShow'])->name('pemesanan.show');
    Route::delete('/pemesanan/{id}', [PetugasController::class, 'pemesananDestroy'])->name('pemesanan.destroy');
     Route::get('pemesanan/{id}', [PemesananController::class, 'show'])->name('pemesanan.show');
    Route::get('pemesanan', [PetugasController::class, 'pemesananIndex'])->name('pemesanan.index');
    Route::get('pemesanan/{id}', [PetugasController::class, 'pemesananShow'])->name('pemesanan.show');
    Route::get('pemesanan/{id}/edit', [PetugasController::class, 'pemesananEdit'])->name('pemesanan.edit');
    Route::put('pemesanan/{id}', [PetugasController::class, 'pemesananUpdate'])->name('pemesanan.update');
});



Route::middleware(['auth', 'role:pelanggan'])->group(function () {
    // Dashboard pelanggan (mengirim data tiket)
    Route::get('/pelanggan/dashboard', [PelangganController::class, 'dashboard'])
        ->name('pelanggan.dashboard');

    // Lihat semua event
    Route::get('/pelanggan/event-list', [PelangganController::class, 'listEvent'])
        ->name('pelanggan.event-list');

    // Detail event & pesan tiket
    Route::get('/pelanggan/event/{id}', [PelangganController::class, 'showEvent'])
        ->name('pelanggan.event-detail');

    Route::post('/pelanggan/event/{id}/pesanan', [PelangganController::class, 'pesanTiket'])
        ->name('pelanggan.pesan-tiket');

    // Riwayat pesanan
    Route::get('/pelanggan/pesanan', [PelangganController::class, 'pesanan'])
        ->name('pelanggan.pesanan');
});
    Route::get('/pesanan/cetak/{id}', [PelangganController::class, 'cetakStruk'])
        ->name('pelanggan.cetak');

// Route::resource('/admin/tiket', TiketController::class);

require __DIR__ . '/auth.php';
