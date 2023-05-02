<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    // Get User for the Member
    public function user()
    {
        return $this->hasOne(User::class, 'member_id');
    }

    // Get the Transaction for the Member
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'member_id');
    }
}
