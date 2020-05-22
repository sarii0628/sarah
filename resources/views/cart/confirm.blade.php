@extends('layouts.sarah')

@section('title', 'ONLINE SHOP')


@section('login-nav')
    @include('components.login-nav')
@endsection

@section('content')
<div id="confirm">
<h2>購入確認画面</h2>
<div class="container-md">
    <div class="row">
        <div class="col-md-8">
        @if(isset($items))
            <table class="table table-bordered">
                <tr><th>商品名</th><th>値段</th><th>個数</th><th>小計</th>
                @foreach($items as $item)
                <tr><td>{{$item->name}}</td><td>{{$item->price}}円</td><td>{{$item->quantity}}個</td><td>{{$item->price * $item->quantity}}円</td></tr>
                @endforeach
            </table>
        @endif
        </div>
    </div>
</div>
<p>合計金額は <span class="look">{{$total}}</span> 円です。</p>
<p><span class="look">銀行振込</span>でお願いいたします。</p>  
<div class="container-md mb-5" id="cart-content">
    <div class="row">
        <div class="col-md-8">
            <table class="table table-bordered">
                <tr><th>銀行名</th><th>店番号</th><th>口座番号</th></tr>
                <tr><td>○○銀行</td><td>XXX</td><td>XXXXXXXX</td></tr>
            </table>
        </div>
    </div>
</div>
<p>{{ Auth::user()->name }}さんのメールアドレスに購入確認・お支払い案内のメールをお送りしました。</p>
<p>ご確認をお願いします。</p>
</div>
@endsection