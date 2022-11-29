<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['date_start', 'date_end', 'member_id', 'qty'];

    public function transaction_details()
    {
        return $this->hasMany('App\Models\TransactionDetail', 'transaction_id');
    }
    public function member()
    {
        return $this->belongsTo('App\Models\Member', 'member_id');
    }
}
