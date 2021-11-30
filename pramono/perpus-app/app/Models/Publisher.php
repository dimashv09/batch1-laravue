<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    use HasFactory;

    // satu penerbit dapat menerbitkan banyak buku.
        # one to many
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
