<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function writer()
    {
        return $this->belongsTo(Writer::class);
    }

    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
