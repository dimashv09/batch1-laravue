<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['isbn', 'title', 'year', 'publisher', 'author', 'catalog', 'qty', 'price'];

    // public function Catalog()
    // {
    //     return $this->belongsTo('App\Models\Author', 'catalog_id');
    // }
}
