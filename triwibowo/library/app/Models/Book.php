<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function transactionDetail()
    {
        return $this->belongsTo(TransactionDetail::class);
    }
}
