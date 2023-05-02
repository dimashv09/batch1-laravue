<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'gender', 'email', 'phone_number', 'address', 'updated_at'];

    public function books()
    {
        return $this->hasMany('App\Models\Book', 'publisher_id');
    }
}
