<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Get the Member that owns the Transaction
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    // Get the Transaction Detail for the Transaction
    public function transactionDeatils()
    {
        return $this->hasMany(TransactionDeatil::class, 'transaction_id');
    }
}
