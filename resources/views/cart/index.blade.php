@extends('layouts.sarah')

@section('title', 'ONLINE SHOP')


@section('login-nav')
    @include('components.login-nav')
@endsection

@section('content')
<h2>カートの中身</h2> 

<table>
    <tr><th>購入商品（画像と名前）</th><th>値段</th><th>個数</th><th>小計</th><th>（削除ボタン）</th></tr>
    @if(isset($items))
    @foreach($items as $item)
    <tr>
        <td><p><img src="{{asset('/storage/img/'.$item->associatedModel->img_name)}}" width="100" height="100"></p>{{$item->name}}</td>
        <td>{{$item->price}}円</td>
        <td><input type="number" name="qty" value="{{$item->quantity}}"></td>
        <td>{{$item->price * $item->quantity}}円</td>
        <td></td>
    </tr>
    @endforeach
    @endif
</table>
<a href="/products/category/{{$category_id}}/{{$product_id}}"><button type="button" class="btn btn-warning">買い物を続ける</button></a>
<a href="/cart/confirm"><button type="button" class="btn btn-warning">購入確認画面</button></a>
@endsection