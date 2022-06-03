<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamen';

    public function anggota()
    {
        return $this->belongsTo('App\Models\Anggota', 'id_anggota');
    }

    public function buku()
    {
        return $this->belongsTo('App\Models\Buku', 'id_buku');

    }
}
