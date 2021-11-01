@extends('layouts.app')

@section('content')
<h1 style="text-align:center">ご注文履歴　詳細</h1>

<h2 style="margin-top:30px;">ご注文ありがとうございました。是非、再びご利用下さい。</h2>
@foreach($details as $detail)
<div><img src="/upload/{{$detail->image}}"></div>
<p>商品名：{{ $detail->name }}</p>
<p>金額：{{ $detail->price }}円</p>
<p>購入数量：{{ $detail->quantity }}個</p>
<p>この商品のお支払金額：{{ $detail->price * $detail->quantity}}円</p>

@endforeach
@endsection