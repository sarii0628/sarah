@extends('layouts.sarah')

@section('title', '商品 削除')

@section('content')
    <form action="/product/del" method="post">
    <table>
        @csrf 
        <input type="hidden" name="id" value="{{$form->id}}">
        <tr>
            <th>商品名: </th><td>{{$form->name}}</td>
        </tr>
        <tr>
            <th>値段: </th><td>{{$form->price}}</td>
        </tr>
        <tr>
            <th>カテゴリー: </th>
            <td>
                {{$form->category->name}}
            </td>
        </tr>
        <tr>
            <th>素材: </th><td>{{$form->material}}</td>
        </tr>
        <tr>
            <th>サイズ: </th><td>{{$form->size_cm}}</td>
        </tr>
        <tr>
            <th>ハンドメイド？: </th>
            <td>{{$form->is_handmade}}</td>
        </tr>
        <tr>
            <th>輸入品？: </th>
            <td>{{$form->is_imported}}</td>
        </tr>
        <tr>
            <th>詳細情報：</th>
            <td>{{$form->description}}</td>
        </tr>
        <tr><th></th><td><input type="submit" value="send"></td></tr>
    </table>
    </form>
@endsection


