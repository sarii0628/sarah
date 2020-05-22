@extends('layouts.admin')

@section('title', '在庫 削除')

@section('content')
    <form action="/stock/del" method="post">
    <div class="table-container">
    <table>
        @csrf 
        <input type="hidden" name="id" value="{{$form->id}}">
        <tr>
            <th>商品名: </th>
            <td>
                {{$form->product->name}}
            </td>
        </tr>
        <tr>
            <th>色: </th>
            <td>
                {{$form->color->name}}
            </td>
        </tr>
        <tr><th>個数： </th><td>{{$form->quantity}}</td></tr>
        <tr><th></th><td><input type="submit" value="send"></td></tr>
    </table>
    </div>
    </form>
@endsection


