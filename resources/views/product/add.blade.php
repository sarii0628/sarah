@extends('layouts.admin')

@section('title', '商品 追加')

@section('content')
    @if (count($errors) > 0)
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="/product/add" method="post">
    <div class="table-container">
    <table>
        @csrf 
        <tr>
            <th>商品名: </th><td><input type="text" name="name" value="{{old('name')}}"></td>
        </tr>
        <tr>
            <th>値段: </th><td><input type="text" name="price" value="{{old('price')}}"></td>
        </tr>
        <tr>
            <th>カテゴリー: </th>
            <td>
                @foreach ($categories as $category)
                    <input type="radio" name="category_id" value="{{$category->id}}">{{$category->name}}<br>
                @endforeach
            </td>
        </tr>
        <tr>
            <th>素材: </th><td><input type="text" name="material" value="{{old('material')}}"></td>
        </tr>
        <tr>
            <th>サイズ: </th><td><input type="text" name="size_cm" value="{{old('size_cm')}}"></td>
        </tr>
        <tr>
            <th>ハンドメイド？: </th>
            <td>
                <input type="radio" name="is_handmade" value="1">YES
                <input type="radio" name="is_handmade" value="0">NO
            </td>
        </tr>
        <tr>
            <th>輸入品？: </th>
            <td>
                <input type="radio" name="is_imported" value="1">YES
                <input type="radio" name="is_imported" value="0">NO
            </td>
        </tr>
        <tr>
            <th>詳細情報：</th>
            <td><textarea name="description"></textarea></td>
        </tr>
        
        <tr><th></th><td><input type="submit" value="send"></td></tr>
    </table>
    </div>
    </form>
@endsection


