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
        
            <div class="product-item container-fluid"> 
                
                    <div class="slider-container col-md-6">
                        <div class="slides">
                        @if(isset($images))
                            @php
                                $count = 1; 
                            @endphp 
                            <ul class="slider">
                            @foreach($images as $id => $img_name)
                                
                                <div class="img_block"><li><img src="{{asset('/storage/img/'.$img_name)}}" width="400" height="400"></li></div>
                                
                                @php 
                                    $count ++;
                                @endphp
                            @endforeach
                            </ul>
                        @else 
                            <img src="{{asset('/storage/no-image.png')}}" width="400" height="400">
                        @endif 
                        </div>
                        
                    </div>
                    
                    <div class="desc col-md-5">
                        <table>
                        <tr><th>商品名：</th><td>{{$product->name}}</td></tr>
                        <tr><th>値段：</th><td>¥{{$product->price}}</td></tr>
                        <tr><th>素材：</th><td>{{$product->material}}</td></tr>
                        <tr><th>サイズ(cm)：</th><td>{{$product->size_cm}}</td></tr>
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
                                <div class="col-md-6 col-md-offset-1" id="color-selects">
                                    @foreach ($colors as $stock_id => $color)
                
                                        <input type="radio" name="stock_id" value="{{$stock_id}}" id="color-select" >{{$color->name}}
                                        <i class="fas fa-paint-brush fa-lg " style="color: {{$color->code}};"></i><br>
                                    
                                    @endforeach
                                </div>
                                @endif
                                <div class="col-md-3" >
                                    <input type="number" name="qty" value="1" id="num-select">
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