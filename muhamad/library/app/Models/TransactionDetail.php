<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    // Get the Transaction that owns the Transaction Detail
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }
}
