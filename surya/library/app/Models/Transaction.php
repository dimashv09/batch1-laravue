<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    public function members()
    {
        return $this->hasMany('App\Models\Member', 'member_id');
    }

    public function transaction_details()
    {
        return $this->hasMany('App\Models\DetailTransaction', 'transaction_id');
    }
}
