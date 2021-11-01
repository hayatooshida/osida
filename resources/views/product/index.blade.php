 @extends('layouts.app')
 
  @section('title')
  商品一覧
  @endsection
  
  @section('content')


<div class="container">
   
    <div class="top__title text-center">
        All Products
    </div>
    @if(Auth::check())
     
     {!! link_to_route('users.show','ユーザー詳細情報',['user'=>Auth::user()->id],['class'=> 'btn btn-primary']) !!}
     {!! link_to_route('cart.index','カートの中身を見る',[],['class'=> 'btn btn-primary']) !!}
    
    @endif
    <div class="row">
        @foreach ($products as $product)
        <a href="{{ route('product.show', $product->id) }}" class="col-lg-4 col-md-6">
            <div class="card">
                <div><img src="/upload/{{ $product->image }}" width="300"></div>
                <div class="card-body">
                    <p class="card-title">{{ $product->name }}</p>
                    <p class="card-text">¥{{ number_format($product->price) }}</p>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>

  
  @endsection