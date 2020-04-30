@extends('layouts.sarah')

@section('title', 'ONLINE SHOP')

@section('breadcrumbs', Breadcrumbs::render('products', $category))

@section('login-nav')
    @include('components.login-nav')
@endsection

@section('search-form')
    @include('components.search-form', ['page_name' => 'products/category/' .$category->id])
@endsection

@section('content')
    <p>Sarahの商品は、オンラインでも販売をしております。</p>
    
    <h2>{{$category->name}} カテゴリー　｜ 商品一覧</h2>
    @if ($items !== null)
        <div class="products-wrapper">
        @foreach($items as $product)
            <div class="products-item"> 
                <a href="/products/category/{{$category->id}}/{{$product->id}}">
                    <div class="image">
                    @if(isset($product->stocks->first()->images))
                        <img src="{{asset('/storage/img/'.$product->stocks->first()->images->first()->path)}}" width=100% height=100%>
                    @else 
                        <img src="{{asset('/storage/no-image.png')}}" width=100% height=100%>
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