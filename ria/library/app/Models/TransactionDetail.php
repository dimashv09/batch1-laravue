<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = ['transaction_id', 'book_id'];

    // public function books()
    // {
    //     return $this->hasMany('App\Models\Book', 'book_id');
    // }

    public function books()
    {
        return $this->hasMany('App\Models\Book', 'book_id');
    }
    // public function books()
    // {
    //     return $this->hasMany('App\Models\Book', 'catalog_id');
    // }

    // public function transaction()
    // {
    //     return $this->belongsTo('App\Models\Transaction', 'transaction_id');
    // }
}
