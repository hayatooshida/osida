<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{
    public function index(){
    $product = Product::all();
    return view('product.index',[
        'products' => $product,
    ]);
    }
    
    public function show($id)
    {
         return view('product.show')
             ->with('product', Product::find($id));
    }
     
    public function create(){
        $product = new Product;
        return view('product.create',[
        'product' => $product,
    ]);
    }
    
    public function store(Request $request){
        $file = $request->file('image');
        if(!empty($file)){
            $filename = $file->getClientOriginalName();
            $move = $file->move('../upload/',$filename);
        }
        else{
            $filename = "";
        }
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->image = $filename;
        $product->description = $request->description;
        $product->save();
        return redirect('/');
        
    }
}
