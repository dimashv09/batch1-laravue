<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

   protected $fillable = ['isbn','title','year','qty','price'];

    public function peminjaman()
    {
        return $this->hasOne('App\Models\Peminjaman', 'id_buku');
    }
}
