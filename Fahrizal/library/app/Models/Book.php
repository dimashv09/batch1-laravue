<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['isbn', 'tittle', 'year', 'publisher_id', 'author_id', 'catalog_id', 'qty', 'price'];

    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }

    public function catalog()
    {
        return $this->belongsTo(Publisher::class, 'catalog_id');
    }

    public function author()
    {
        return $this->belongsTo(Publisher::class, 'author_id');
    }

    public function transactionDtails()
    {
        return $this->hasMany(TransactionDtail::class, 'book_id');
    }
}