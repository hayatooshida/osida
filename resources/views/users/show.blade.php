@extends('layouts.app')

@section('content')

<h1 style="text-align:center">お客様情報</h1>

<p>お名前：{{ $user->name }}様</p>
<p>住所：{{ $user->address }}</p>
<p>郵便番号：{{ $user->postal_code }}</p>
<p>電話番号：{{ $user->phone_number }}</p>
<p>メールアドレス： {{ $user->email }}</p>
<p>{!! link_to_route('order.index','注文履歴を見る',['order' => $user->id],['class' => 'btn btn-warning']) !!}</p>
@endsection