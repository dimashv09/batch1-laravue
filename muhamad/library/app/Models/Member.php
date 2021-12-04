<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    // Member has one User
    public function user()
    {
        return $this->hasOne(User::class, 'member_id');
    }

    // Author has many Transactions
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'member_id');
    }
}
