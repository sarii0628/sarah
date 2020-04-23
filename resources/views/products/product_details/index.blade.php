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
                
                    <div class="slider">
                        <div class="slides">
                        @if(isset($images))
                            @php
                                $count = 1; 
                            @endphp 
                            
                            @foreach($images as $id => $img_name)
                                <div id="slide-{{$count}}">
                                    <img src="{{asset('/storage/img/'.$img_name)}}" width="400" height="400">
                                </div>
                                @php 
                                    $count ++;
                                @endphp
                            @endforeach
                            
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

                        <a href="/cart/add/{{$category->id}}/{{$product->id}}"><button type="button" class="btn btn-warning"><i class="fas fa-cart-arrow-down fa-2x faa-wrench animated"></i></button></a>
                    </div>
                
            </div>
        
        </div>
    @endif


@endsection