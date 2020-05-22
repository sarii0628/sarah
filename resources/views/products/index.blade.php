@extends('layouts.sarah')

@section('title', 'ONLINE SHOP')

@section('breadcrumbs', Breadcrumbs::render('categories'))

@section('login-nav')
    @include('components.login-nav')
@endsection

@section('content')
    
    <p>Sarahの商品は、オンラインでも販売をしております。</p>

    <h2>商品カテゴリー一覧</h2>
    <div class="category-wrapper">
    @foreach($categories as $category)
        <div class="category-item">
            <a href="/products/category/{{$category->id}}">
                <div class="image">
                @if(isset($category->img_name))
                    <img src="{{asset('/storage/cat_img/'.$category->img_name)}}" width=100% height=100%>
                @else 
                    <img src="{{asset('/storage/no-image.png')}}" width=100% height=100%>
                @endif
                </div>
                <p>{{$category->name}}</p>
            </a>
        </div>
    @endforeach 
    </div>
@endsection