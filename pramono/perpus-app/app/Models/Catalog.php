<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    protected $guarded = [];

    // sebuah katalog dimiliki oleh banyak buku.
        #one to many
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
