@extends('layouts.sarah')

@section('title', 'ONLINE SHOP')

@section('content')
    <style>
    .login {text-align: right;}
    .login span { background-color: orange; margin-right: 40px;}
    th {background-color: #999; color:fff; padding: 5px 10px;}
    td {border: solid 1px #aaa; color:#999; padding: 5px 10px;}
    </style>
    <p>Sarahの商品は、オンラインでも販売をしております。</p>
    <div class="login">
        <span>ログイン</span>
    </div>
    <h2>商品カテゴリー一覧</h2>
    <ul>
        <li><a href="#">＊ ベビー用品</a></li>
        <li><a href="#">＊ バッグ・手提げ</a></li>
        <li><a href="#">＊ 小物ケース</a></li>
        <li><a href="#">＊ アクセサリー</a></li>
    </ul>

    <table>
    <tr><th>Name</th><th>Category</th></tr>
    @foreach ($items as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->category}}</td>
        </tr>
    @endforeach
    </table>

@endsection