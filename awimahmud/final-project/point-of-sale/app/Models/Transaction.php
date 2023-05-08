<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'cashier_id', 'customer_id', 'invoice', 'cash', 'change', 'discount', 'grand_total'
    ];

    public function details()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function cashier()
    {
        return $this->belongsTo(User::class, 'cashier_id');
    }

    public function profits()
    {
        return $this->hasMany(Profit::class);
    }
    

    protected function createdAt(): Attribute
    {
        return Attribute::make(
          get: fn ($value) => Carbon::parse($value)->format('d-M-Y H:i:s'),  
        );
    }
}