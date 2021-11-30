<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // transaksi ini milik anggota ...
        # many to one
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    // transaksi memiliki banyak detail transaksi
        # many to many
    public function book()
    {
        return $this->belongsToMany(Book::class, 'transaction_details');
    }
}
