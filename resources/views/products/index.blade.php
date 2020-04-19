@extends('layouts.sarah')

@section('title', 'ONLINE SHOP')

@section('content')
    <style>
    .login {text-align: right;}
    .login span { background-color: orange; margin-right: 40px;}
    th {background-color: #999; color:fff; padding: 5px 10px;}
    td {border: solid 1px #aaa; color:#999; padding: 5px 10px;}
    .category-wrapper {display: flex; align-item: stretch; background-color: #dddddd; padding: 10px; justify-content: center;
                        flex-wrap: wrap; margin: 60px 100px; border-radius:5px;}
    .category-item {background-color: white; margin: 10px; border-radius:5px; width: 28%; justify-content: center;}
    .image {text-align: center; margin: 10px;}
    .category-item p {text-align: center;}
    </style>
    <p>Sarahの商品は、オンラインでも販売をしております。</p>
    <div class="login">
        <span>ログイン</span>
    </div>
    <h2>商品カテゴリー一覧</h2>
    <div class="category-wrapper">
        @foreach($categories as $category)
        <div class="category-item">
            <a href="/products/category/{{$category->id}}">
                <div class="image">
                @if(isset($category->img_name))
                    <img src="{{asset('/storage/cat_img/'.$category->img_name)}}" width="200" height="200">
                @else 
                    <img src="{{asset('/storage/no-image.png')}}" width="200" height="200">
                @endif
                </div>
                
                <p>{{$category->name}}</p>
            </a>
        </div>
        @endforeach
    </div>

@endsection