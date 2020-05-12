@extends('layouts.admin')

@section('title', '商品 編集')

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
    <form action="/product/edit" method="post">
    <div class="table-container admin">
    <table>
        @csrf 
        <input type="hidden" name="id" value="{{$form->id}}">
        <tr>
            <th>商品名: </th><td><input type="text" name="name" value="{{$form->name}}"></td>
        </tr>
        <tr>
            <th>値段: </th><td><input type="text" name="price" value="{{$form->price}}"></td>
        </tr>
        <tr>
            <th>カテゴリー: </th>
            <td>
                @foreach ($categories as $category)
                    <label><input type="radio" name="category_id" value="{{$category->id}}" {{($category->id == $form->category->id)? 'checked="checked"' : ''}}>{{$category->name}}</label><br>
                @endforeach
            </td>
        </tr>
        <tr>
            <th>素材: </th><td><input type="text" name="material" value="{{$form->material}}"></td>
        </tr>
        <tr>
            <th>サイズ: </th><td><input type="text" name="size_cm" value="{{$form->size_cm}}"></td>
        </tr>
        <tr>
            <th>ハンドメイド？: </th>
            <td>
                <label><input type="radio" name="is_handmade" value="1" {{($form->is_handmade)? 'checked="checked"' : ''}}>YES</label>
                <label><input type="radio" name="is_handmade" value="0" {{!($form->is_handmade)? 'checked="checked"' : ''}}>NO</label>
            </td>
        </tr>
        <tr>
            <th>輸入品？: </th>
            <td>
                <label><input type="radio" name="is_imported" value="1" {{($form->is_imported)? 'checked="checked"' : ''}}>YES</label>
                <label><input type="radio" name="is_imported" value="0" {{!($form->is_imported)? 'checked="checked"' : ''}}>NO</label>
            </td>
        </tr>
        <tr>
            <th>詳細情報：</th>
            <td><textarea name="description">{{$form->description}}</textarea></td>
        </tr>
        
        <tr><th></th><td><input type="submit" value="send"></td></tr>
    </table>
    </div>
    </form>
@endsection


