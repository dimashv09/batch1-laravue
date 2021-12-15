<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // Get the Publisher that owns the Book
    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }

    // Get the Author that owns the Book
    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    // Get the Catalog that owns the Book
    public function catalog()
    {
        return $this->belongsTo(Catalog::class, 'catalog_id');
    }

    // Get the Transaction Detail for the Book
    public function transactionDetail()
    {
        return $this->hasOne(TransactionDetail::class, 'book_id');
    }
}
