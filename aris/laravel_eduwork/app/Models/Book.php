<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

     public function publisher()
    {
        return $this->belongsTo('App\Models\Publisher', 'publisher_id');
    }
     public function transactiondetail()
    {
        return $this->belongsTo('App\Model\TransationDetail', 'book_id');
    }
    public function author()
    {
        return $this->belongsTo('App\Models\Author', 'author_id');
    }
    public function catalog()
    {
        return $this->belongsTo('App\Models\Book', 'catalog_id');
    }
}
