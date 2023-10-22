<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['qty', 'price', 'cashier_id', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}