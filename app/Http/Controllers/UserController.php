<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
class UserController extends Controller
{
    public function show($id){
        $user = User::findOrFail($id);
        
        return view('users.show',[
            'user' => $user,
        ]);
    }
    
    public function favorites($id){
        $user = User::findOrFail($id);
        
        $user->loadRelationshipCounts();
        
        $favorites = $user->favorites()->paginate(5);
    
    
    return view('users.favorites',[
        'user' => $user,
        'product' => $favorites,
    ]);
    
    }
}
