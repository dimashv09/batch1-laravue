<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded = [];

    // buku ini diterbitkan oleh ...
        # one to many
    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    // buku ini ditulis oleh ...
        # one to many
    public function writer()
    {
        return $this->belongsTo(Writer::class);
    }

    // buku ini termasuk ke dalam katalog ...
        # one to many
    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
    }

    // satu buku dapat dipinjam berkali-kali
        # many to many
    public function transaction()
    {
        return $this->belongsToMany(Transaction::class, 'transaction_details');
    }


}
