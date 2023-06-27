<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    
    protected $table = 'category';
    protected $guraded = [];
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}