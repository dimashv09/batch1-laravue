<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    use HasFactory;

    protected $guarded= [];

    // seorang penulis dapat menulis banyak buku.
        # one to many
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
