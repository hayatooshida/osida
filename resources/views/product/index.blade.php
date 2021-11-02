 @extends('layouts.app')
 
  @section('title')
  商品一覧
  @endsection
  
  @section('content')
<p>商品名で検索できます</p>
<p>桃、柿、梨はお手数ですが、漢字で入力して下さい</p>
<p>それ以外は、カタカナで検索して下さい</p>
<form method="GET" action="/">
    <input type="text" name="keyword">
    <input type="submit" value="商品検索">
</form>
<div class="container">
    @if(Auth::check())
     <h1 style="text-align:center">ようこそ、押田商店へ!!</h1>
     {!! link_to_route('users.show','お客様 詳細情報',['user'=>Auth::user()->id],['class'=> 'btn btn-primary']) !!}
     {!! link_to_route('cart.index','カートの中身を見る',[],['class'=> 'btn btn-success']) !!}
     {!! link_to_route('users.favorites','美味しかった商品',['favorites' => Auth::user()->id],['class' => 'btn btn-info']) !!}
    
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

  <div style="text-align:center">{{ $products->links() }}</div>
  @endsection