<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Transaction extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function orders()
    {
        return $this->belongsTo('App\Models\Order', 'order_id');
    }

    public function users()
    {
        return $this->hasOne('App\Models\User', 'id','user_id');
    }
}
