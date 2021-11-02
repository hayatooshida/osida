@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">美味しかったボタンを押した商品</h1>
<h2>美味しかった商品の数：{{ $user->favorites_count }}個</h2>
@foreach($product as $products)
<div><img src="/upload/{{$products->image}}"></div>
<p>商品名：{{ $products->name }}</p>
<p>価格：{{ $products->price }}円</p>

@endforeach
{{ $product->links() }}
@endsection