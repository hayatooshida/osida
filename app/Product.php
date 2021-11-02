<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function carts(){
        return $this->hasMany(Cart::class);
    }
    
    public function order_details(){
        return $this->hasMany(OrderDetail::class);
    }
    
    public function favorite_users(){
        return $this->belongsToMany(User::class,'favorites','product_id','user_id');
    }
    
    
}
