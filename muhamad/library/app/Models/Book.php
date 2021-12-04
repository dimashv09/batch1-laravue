<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Book has one Publisher
    public function publisher()
    {
        return $this->belongsTo(Publisher::class, 'publisher_id');
    }

    // Book has one Author
    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    // Book has one Catalog
    public function catalog()
    {
        return $this->belongsTo(Catalog::class, 'catalog_id');
    }
}
