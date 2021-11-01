<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderDetail;
class OrderDetailController extends Controller
{
    public function show($id){
        $detail = OrderDetail::select('order_details.*','products.name','products.price','products.image','products.id')
        ->where('order_id',$id)
        ->join('products','products.id','=','order_details.product_id')
        ->get();
        
        return view('detail.show',[
            'details' => $detail,
        ]);
    }
}
