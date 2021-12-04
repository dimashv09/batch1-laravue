<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Transaction has one Member
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
}
