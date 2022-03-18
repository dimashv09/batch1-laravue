<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    public function book(){
        return $this->belongsTo('App\Models\Publisher', 'book_id');
    }
}
