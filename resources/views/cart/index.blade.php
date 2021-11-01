@extends('layouts.app')

@section('content')

@foreach($cart as $carts)
{{ $carts->name }}
{{ $carts->price }}
{{ $carts->quantity }}
<div><img src="/upload/{{$carts->image}}"></div>
<form method="POST" action="/cart/{{ $carts->id }}">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger">カートから削除する</button>
</form>
@endforeach


合計金額:{{ $total_price }}円

<button onClick="location.href='{{ route('cart.checkout') }}'" class="cart__purchase btn btn-success">
    購入する
</button>
@endsection