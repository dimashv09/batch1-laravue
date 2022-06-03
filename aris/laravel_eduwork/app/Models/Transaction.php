<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function transactiondetail()
    {
        return $this->hasOne('App\Models\TransactionDetail', 'transaction_id');
    }

    public function member()
    {
        return $this->belongsTo('App\Models\Member', 'member_id');
    }

    public function book()
    {
        return $this->belongsTo('App\Models\Book', 'book_id');
    }

}

