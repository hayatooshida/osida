@extends('layouts.app')

@section('content')

@foreach($details as $detail)
{{ $detail->name }}
{{ $detail->price }}
{{ $detail->quantity }}
<div><img src="/upload/{{$detail->image}}"></div>
@endforeach
@endsection