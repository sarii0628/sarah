@extends('layouts.sarah')

@section('title', 'ONLINE SHOP')


@section('login-nav')
    @include('components.login-nav')
@endsection

@section('content')
<h2>カートの中身</h2> 
<div class="container-md mb-5" id="cart-content">
    <div class="row">
        <div class="col-md-8">
        @if(isset($isEmpty) && $isEmpty)
        <h3>カートは空っぽです</h3>
        @else
            <table class="table table-striped text-center">
                <tr><th>購入商品</th><th>値段</th><th>個数</th><th>小計</th><th>削除</th></tr>
                @if(isset($items))
                @foreach($items as $item)
                <tr>
                    <td><p><img src="{{asset('/storage/img/'.$item->associatedModel->images->first()->path)}}" width="100" height="100"></p>{{$item->name}}</td>
                    <td>{{$item->price}}円</td>
                    <td>
                        {{$item->quantity}}個
                        <form action="/cart/plus" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <button type="submit" class="btn-circle btn-warning"><i class="fas fa-plus"></i></button> 
                        </form>
                        
                        <form action="/cart/minus" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <button type="submit" class="btn-circle btn-info"><i class="fas fa-minus"></i></button> 
                        </form>
                    </td>
                    <td>{{$item->price * $item->quantity}}円</td>
                    <td>
                        <div class="text-center">
                        <form action="/cart/remove" method="post">
                        @csrf 
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <button type="submit" class="btn-info"><i class="fas fa-trash"></i></button>    
                        </form>
                        </div>
                    </td>
                </tr>
                @endforeach
                @endif
            </table>
            <table class="table table-bordered">
                <tr><th>合計</th><td>{{$total}}円</td></tr>
            </table>
            @endif
            <div class="row">
                <div class="col-md-3 col-md-offset-3">
                    @if(preg_match( '/products/',  url()->previous() ))
                    <a href="{{url()->previous()}}">
                    @else
                    <a href="/products">
                    @endif
                    <button type="button" class="btn btn-warning">
                    買い物を続ける</button></a>
                </div>
                <div class="col-md-3">
                    <form action="/cart/confirm" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">購入確認画面</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection