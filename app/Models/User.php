<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
    'nama',
    'email',
    'password',
    'role',
    'no_hp',
    'alamat',
];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }
}
