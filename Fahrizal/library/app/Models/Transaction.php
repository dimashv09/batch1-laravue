<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = ['member_id', 'date_start', 'date_end', 'status'];

    public function transactionDetail()
    {
        return $this->hasMany(TransactionDetail::class, 'transaction_id');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

// public function books()
// {
//     return $this->belongsToMany(Book::class, 'transaction_details')->withPivot('qty');
// }
}
?>