@extends('layouts.app')

@section('content')
@if($total_price >0)
<button onClick="location.href='{{ route('cart.checkout') }}'" class="cart__purchase btn btn-success">
    購入する
</button>
<h2>合計金額:{{ $total_price }}円</h2>
@foreach($cart as $carts)
<div><img src="/upload/{{$carts->image}}"></div>
<p>商品名：{{ $carts->name }}</p>
<p>価格：{{ $carts->price }}円</p>
<p>数量：{{ $carts->quantity }}個</p>

<form method="POST" action="/cart/{{ $carts->id }}">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger">カートから削除する</button>
</form>
@endforeach



@else
<h2>カートに商品は入っていません</h2>
@endif
@endsection