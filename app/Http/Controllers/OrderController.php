<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
class OrderController extends Controller
{
    public function index($id){
        $order = Order::select('orders.*')->where('user_id',$id)->orderBy('created_at','desc')->paginate(5);
        
        return view('order.index',[
            'order' => $order,
        ]);
    }
}
