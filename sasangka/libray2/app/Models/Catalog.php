<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

    // protect all column that's not in this array against Mess-Assignment
    // protected $fillable = ['name'];
    // protect only this column against Mess-Assignment
    protected $guarded = ['id'];

    // Get the Books for the Catalog
    public function books()
    {
        return $this->hasMany(Book::class, 'catalog_id');
    }
}