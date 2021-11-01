@extends('layouts.app')

@section('content')
<div class="container">
    <div class="product">
        <div><img src="/upload/{{ $product->image }}" width="300"></div>
        <div class="product__content-header text-center">
            <div class="product__name">
                {{ $product->name }}
            </div>
            <div class="product__price">
                ¥{{ number_format($product->price) }}
            </div>
        </div>
        {{ $product->description }}
    </div>
    
    <form method="POST" action="/cart/create" class="form-inline m-1">
         {{ csrf_field() }}
         <p>数量を入力して下さい</p>
         <input type="hidden" name="product_id" value="{{ $product->id }}">
         <div class="product__quantity">
             <input type="number" name="quantity" min="1" value="1" require/>
             
         </div>
         <button type="submit" class="btn btn-primary col-sm-2">カートに入れる</button>
    </form>
</div>
@endsection