<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['member_id','date_start','data_end'];
    public function member()
    {
        return $this->belongsTo('App\Models\Member', 'member_id');
    }
}