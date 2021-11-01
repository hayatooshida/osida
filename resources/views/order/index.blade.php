@extends('layouts.app')

@section('content')
<h1 style="text-align:center;">ご注文履歴</h1>
@foreach($order as $orders)

<h2>購入者：{{ $orders->user->name }}様</h2>
<h2>ご注文日時：{{ $orders->created_at }}</h2>
<h2>合計金額：{{ $orders->total_price }}円</h2>
<p>住所：{{ $orders->user->address }}</p>
<p>郵便番号：{{ $orders->user->postal_code }}</p>

<p>{!! link_to_route('order.details','注文詳細を見る',['detail' => $orders->id],['class' => 'btn btn-info']) !!}</p>
@endforeach
@endsection