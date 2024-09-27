<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    protected $fillable = ['book_id', 'transaction_id', 'qty'];

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
?>