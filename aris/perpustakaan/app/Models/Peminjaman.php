<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    public function anggota()
    {
        return $this->hasOne('App\Models\Anggota', 'id_anggota');
    }
}
