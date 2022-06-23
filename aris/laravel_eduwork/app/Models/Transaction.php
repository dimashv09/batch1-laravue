<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // public function transactiondetail()
    // {
    //     return $this->hasOne('App\Models\TransactionDetail', 'transaction_id');
    // }
    protected $fillable = ['member_id','date_start','date_end','status'];
    public function member()
    {
        return $this->belongsTo('App\Models\Member', 'member_id');
    }

    // public function book()
    // {
    //     return $this->belongsTo('App\Models\Book', 'book_id');
    // }

    public function transactiondetails()
    {
        return $this->hasMany('App\Models\TransactionDetail', 'transaction_id');
    }

    public function details()
    {
        return $this->hasMany('App\Models\TransactionDetail', 'id','book_id');
    }
}

