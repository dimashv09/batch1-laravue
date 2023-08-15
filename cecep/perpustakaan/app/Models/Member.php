<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    public function transaction()
    {
        return $this->hasone('App\Models\Transaction', 'member_id');
    }
}
