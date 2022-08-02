<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function member(){
        return $this->hasOne(Member::class, 'member_id' , 'member_id');
    }
    public function user(){
        return $this->hasOne(User::class, 'id' , 'user_id');
    }
}

