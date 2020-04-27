@extends('layouts.sarah')

@section('title', 'ONLINE SHOP')


@section('login-nav')
    @include('components.login-nav')
@endsection

@section('content')
<div id="confirm">
<h2>購入確認画面</h2> 
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
</div>
@endsection