<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    public function anggota()
    {
        return $this->hasOne('App\Models\Peminjaman', 'id_anggota');
    }

    public function buku()
    {
        return $this->hasMany('App\Models\Buku', 'id');
    }
}
