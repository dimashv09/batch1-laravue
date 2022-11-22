<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone_Number', 'address'];

    public function Books()

    {
        return $this->hasMany( 'App\Models\Book', 'author_id');
    }
}
