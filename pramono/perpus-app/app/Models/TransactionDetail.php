<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }


    public function book()
    {
        return $this->hasMany(Book::class);
    }
}
