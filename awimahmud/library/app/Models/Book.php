<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
   
    protected $fillable = ['isbn','title','year','publisher_id','author_id','catalog_id','qty','price'];
    public function publisher()
    {
       return $this->belongsTo('App\Models\Publisher', 'publisher_id');
    }
    public function author()
    {
       return $this->belongsTo('App\Models\Author', 'author_id');
    }
    public function catalog()
    {
       return $this->belongsTo('App\Models\Catalog', 'catalog_id');
    }
    public function transaction_detail()
    {
       return $this->belongsTo('App\Models\TransactionDetail', 'book_id');
    }
    public function category()
    {
       return $this->belongsTo('App\Models\Category', 'category_id');
    }
}