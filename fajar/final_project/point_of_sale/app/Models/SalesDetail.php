<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product(){
        return $this->hasOne(Product::class, 'id' , 'product_id');
    }


    public function member(){
        return $this->hasOne(Member::class, 'id' , 'member_id');
    }
}
