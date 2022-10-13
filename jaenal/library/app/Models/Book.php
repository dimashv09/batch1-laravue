<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
     
    public function Publisher()

    {
        return $this->belongsTo( 'App\Models\Publisher', 'publisher_id');
    }
    /*
    public function Author()

    {
        return $this->belongsTo( 'App\Models\Author', 'Author_id');
    }

    public function Catalog()

    {
        return $this->belongsTo( 'App\Models\Catalog', 'catalog_id');
    }
    */

}
