<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggotas';
    protected $fillable = ['name','gender','phone_number','address','email'];

    //  public function peminjaman()
    // {
    //     return $this->belongsTo('App\Models\Peminjaman', 'id_anggota');
    // }

}
