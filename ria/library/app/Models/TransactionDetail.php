<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = ['id','transaction_id','book_id','qty'];

    public function book(){
        return $this->belongsTo('App\Models\Book', 'book_id');
    }
    public function transaction(){
        return $this->belongsTo('App\Models\Transaction', 'transaction_id');
    }
}
