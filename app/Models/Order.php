<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id')->select('id','name');
    }
    public function items()
    {
        return $this->hasMany(Cart::class,'order_id','id');
    }
}
