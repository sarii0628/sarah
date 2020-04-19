@extends('layouts.sarah')

@section('title', 'ONLINE SHOP')

@section('content')
    <style>
    .login {text-align: right;}
    .login span { background-color: orange; margin-right: 40px;}
    .desc th {color:#444444; padding: 5px 10px; border:none; background: none; text-align: right;}
    .desc td {color:#444444; padding: 5px 10px; border:none; background: none; text-align: left;}
    .product-item {display: flex; align-item: stretch; background-color:#eeeeee; padding: 20px; justify-content: center;
                        flex-wrap: wrap; margin: 60px 100px; border-radius:10px;}
    .image {text-align: center; margin: 10px;}
    .desc  {width: 400px; text-align: center; margin: 20px;}
    .slider {width: 300px; text-align: center; overflow: hidden;}
    .slides {display: flex; overflow-x: auto; scroll-snap-type: x mandatory; 
            scroll-behavior: smooth; -webkit-overflow-scrolling: touch; }
    .slides::-webkit-scrollbar { width: 10px; height: 10px;}
    .slides::-webkit-scrollbar-thumb {background: black; border-radius: 10px;}
    .slides::-webkit-scrollbar-track {background: transparent;}
    .slides > div {
        scroll-snap-align: start;
        flex-shrink: 0;
        width: 300px;
        height: 300px;
        margin-right: 50px;
        border-radius: 10px;
        background: #eee;
        transform-origin: center center;
        transform: scale(1);
        transition: transform 0.5s;
        position: relative;
        
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 100px;
    }
    img {
    object-fit: cover;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: auto;
    }
    
    .slider > a {
    display: inline-flex;
    width: 1.5rem;
    height: 1.5rem;
    background: white;
    text-decoration: none;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    margin: 0 0 0.5rem 0;
    position: relative;
    }
    .slider > a:active {
    top: 1px;
    }
    .slider > a:focus {
    background: #000;
    }
 
    </style>
    <p>Sarahの商品は、オンラインでも販売をしております。</p>
    <div class="login">
        <span>ログイン</span>
    </div>
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
                                <p>ハンドメイド</p>
                                @endif
                                @if($product->is_imported)
                                <p>輸入品</p>
                                @endif    
                                @if($product->descpriton)
                                <p>{{$product->description}}</p>
                                @endif
                            </td>
                        </tr>
                        </table>

                        <span style="background-color: yellow;">買い物カゴへ</span>
                    </div>
                
            </div>
        
        </div>
    @endif


@endsection