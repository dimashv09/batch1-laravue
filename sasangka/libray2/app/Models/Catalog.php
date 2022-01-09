<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    use HasFactory;

	protected $fillable = ['name'];
	//cara ke 2 create data

	public function books() {
		return $this->hasMany(Book::class, 'catalog_id');
	}
}