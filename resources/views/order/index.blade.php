@extends('layouts.app')

@section('content')

@foreach($order as $orders)

<p>{{ $orders->user->name }}</p>
<p>{{ $orders->total_price }}</p>

<p>{!! link_to_route('order.details','注文詳細を見る',['detail' => $orders->id],['class' => 'btn btn-info']) !!}</p>
@endforeach
@endsection