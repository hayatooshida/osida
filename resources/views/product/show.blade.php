<!DOCTYPE html>
<html lang="ja">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

{{ $product->name }}



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
</body>
</html>