<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    
    public function user()
    {
        return $this->hasOne('App\Models\User', 'member_id');
    }

    protected $fillable = ['name','gender','phone_number','address','email'];
    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction', 'member_id');
    }
}