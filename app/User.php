<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','address','postal_code','phone_number',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function carts(){
        return $this->hasMany(Cart::class);
    }
    
    public function orders(){
        return $this->hasMany(Order::class);
    }
    
    public function favorites(){
        return $this->belongsToMany(Product::class,'favorites','user_id','product_id');
    }
    
    
    public function favorite($productId){
        $exist = $this->is_favoriting($productId);
        
        if($exist){
            return false;
        }
        else{
            $this->favorites()->attach($productId);
            return true;
        }
    }
    
    public function unfavorite($productId){
        $exist = $this->is_favoriting($productId);
        
        if($exist){
            $this->favorites()->detach($productId);
            return true;
        }
        else{
            return false;
        }
    }
    
    public function is_favoriting($productId){
        return $this->favorites()->where('product_id',$productId)->exists();
    }
    
    public function loadRelationshipCounts(){
        $this->loadCount('favorites');
    }
}
