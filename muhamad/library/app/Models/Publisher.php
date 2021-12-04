<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    // Publisher has many Books
    public function books()
    {
        return $this->hasMany(Book::class, 'publisher_id');
    }
}
