@extends('layouts.sarah')

@section('title', 'ONLINE SHOP')

@section('breadcrumbs', Breadcrumbs::render('product', $category, $product))

@section('login-nav')
    @include('components.login-nav')
@endsection

@section('content')
    <p>Sarahの商品は、オンラインでも販売をしております。</p>
   
    <h2>{{$category->name}} カテゴリー　｜ {{$product->name}}</h2>
    @if ($product !== null)
        <div class="product-wrapper">
        
            <div class="product-item"> 
                
                    <div class="slider-container">
                        <div class="slides">
                        @if(isset($images))

                            <ul class="slider">
                            @foreach($images as $stock_id => $image)
                                
                                @foreach($image as $image_id => $path)
                                    <div class="img_block"><li><img src="{{asset('/storage/img/'.$path)}}" width="400" height="400"></li></div>
                                @endforeach
                            @endforeach
                            </ul>
                        @else 
                            <img src="{{asset('/storage/no-image.png')}}" width="400" height="400">
                        @endif 
                        </div>
                        
                    </div>
                    
                    <div class="desc">
                        <table>
                        <tr><th>商品名：</th><td>{{$product->name}}</td></tr>
                        <tr><th>値段：</th><td>¥{{$product->price}}</td></tr>
                        <tr><th>素材：</th><td>{{$product->material}}</td></tr>
                        @if(isset($product->size_cm))
                        <tr><th>サイズ(cm)：</th><td>{{$product->size_cm}}</td></tr>
                        @endif
                        <tr>
                            <th>詳細説明：</th>
                            <td>
                                @if($product->is_handmade)
                                ハンドメイド<br>
                                @endif
                                @if($product->is_imported)
                                輸入品<br>
                                @endif    
                                @if($product->descpriton)
                                {{$product->description}}
                                @endif
                            </td>
                        </tr>
                        </table>

                        <div id="cart-input">

                            <form action="/cart/add" method="post" >
                            @csrf
                            <input type="hidden" name="category_id" value="{{$category->id}}">
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <div class="row" id="selects">
                                @if(isset($colors))  
                                <div class="col-md-7 col-md-offset-1 col-xs-6 col-xs-offset-1" id="color-selects">
                                    @foreach ($colors as $stock_id => $color)
                
                                        <label><input type="radio" name="stock_id" value="{{$stock_id}}" id="color-select" >{{$color->name}}
                                        <i class="fas fa-paint-brush fa-lg " style="color: {{$color->code}};"></i></label><br>
                                    
                                    @endforeach
                                </div>
                                @endif
                                <div class="col-md-3 col-xs-3 num-select-wrapper">
                                    <input type="number" name="qty" value="1" id="num-select" place-holder="個数">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <button type="submit" class="btn btn-warning" id="cart-button">
                                        <i class='fas fa-cart-arrow-down fa-2x faa-wrench animated'></i>
                                    </button>
                                </div>
                            </div>
                                
                            

                            </form>

                        </div>
                        
                    </div>
                
            </div>
        
        </div>
    @endif


@endsection