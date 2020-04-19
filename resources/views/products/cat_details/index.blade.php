@extends('layouts.sarah')

@section('title', 'ONLINE SHOP')

@section('content')
    <style>
    .login {text-align: right;}
    .login span { background-color: orange; margin-right: 40px;}
    th {background-color: #999; color:fff; padding: 5px 10px;}
    td {border: solid 1px #aaa; color:#999; padding: 5px 10px;}
    .product-wrapper {display: flex; align-item: stretch; background-color: #eeeeee; padding: 10px; justify-content: center;
                        flex-wrap: wrap; margin: 60px 100px; border-radius:5px;}
    .product-item {background-color: #ffffff; margin: 10px; border-radius:5px; width: 28%; justify-content: center;}
    .image {text-align: center; margin: 10px;}
    .product-item p {text-align: center;}¥
    .img {width: 100%; height: auto;}
    </style>
    <p>Sarahの商品は、オンラインでも販売をしております。</p>
    <div class="login">
        <span>ログイン</span>
    </div>
    <h2>{{$category->name}} カテゴリー　｜ 商品一覧</h2>
    @if ($products !== null)
        <div class="product-wrapper">
        @foreach($products as $product)
            <div class="product-item"> 
                <a href="/products/category/{{$category->id}}/{{$product->id}}">
                    <div class="image">
                    @if(isset($product->stocks->first()->img_name))
                        <img src="{{asset('/storage/img/'.$product->stocks->first()->img_name)}}" width="100" height="100">
                    @else 
                        <img src="{{asset('/storage/no-image.png')}}" width="200" height="200">
                    @endif 
                    </div>

                    <p>{{$product->name}}</p>
                    <p>¥{{$product->price}}</p>
                </a>
            </div>
        @endforeach
        </div>
    @endif


@endsection