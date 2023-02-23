<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDtails extends Model
{
    use HasFactory;
    protected $fillable = ['book_id', 'transaction_id', 'quantity'];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}