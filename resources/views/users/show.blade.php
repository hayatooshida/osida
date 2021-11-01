@extends('layouts.app')

@section('content')



{{ $user->name }}
{{ $user->address }}
{{ $user->postal_code }}
{{ $user->phone_number }}

{!! link_to_route('order.index','注文履歴を見る',['order' => $user->id],['class' => 'btn btn-warning']) !!}
@endsection