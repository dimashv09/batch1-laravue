<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['date_start','date_end','member_id','book_id','status','id','qty'];

    public function transactionDetail(){
        return $this->hasOne('App\Models\TransactionDetail', 'transaction_id');
    }
}
