<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    protected $table = 'tiket';
    
    protected $casts = [
    'tanggal_event' => 'date',
];


    protected $fillable = [
        'kode_tiket',
        'nama_event',
        'gambar',
        'lokasi',
        'tanggal_event',
        'harga',
        'stok',
        'deskripsi'
    ];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }
}
