<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['member_id', 'date_start','date_end', 'created_at', 'updated_at'];

    public function members()
    {
        return $this->hasMany('App\Models\Member', 'member_id');
    }
}
