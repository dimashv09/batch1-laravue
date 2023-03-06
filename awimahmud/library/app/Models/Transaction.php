<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    use HasFactory;
    protected $fillable = ['member_id','date_start','data_end','status','qty','title'];
    protected $guarded = [];
    
    public function member()
    {
        return $this->belongsTo('App\Models\Member', 'member_id');
    }
    public function books()
    {
        return $this->hasMany(Book::class, 'book_id');
    }
    public function details()
    {
        return $this->hasMany(TransactionDetail::class, 'transaction_id');
    }

}