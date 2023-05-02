<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'gender','email', 'phone_number', 'address', 'updated_at'];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'member_id');
    }
}
