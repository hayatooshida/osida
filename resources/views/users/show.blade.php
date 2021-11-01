@extends('layouts.app')

@section('content')



{{ $user->name }}
{{ $user->address }}
{{ $user->postal_code }}
{{ $user->phone_number }}


@endsection