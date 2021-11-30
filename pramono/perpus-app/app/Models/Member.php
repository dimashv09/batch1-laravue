<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    // satu anggota memiliki satu user
        # one to one
    public function user()
    {
        return $this->hasOne(User::class);
    }

    // seorang anggota dapat memiliki banyak transaksi
        # one to many
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

}
