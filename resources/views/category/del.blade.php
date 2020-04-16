@extends('layouts.sarah')

@section('title', 'カテゴリー 削除')

@section('content')
    <form action="/category/del" method="post">
    <table>
        @csrf 
        <input type="hidden" name="id" value="{{$form->id}}">
        <tr><th>name: </th><td>{{$form->name}}</td></tr>
        <tr><th></th><td><input type="submit" value="send"></td></tr>
    </table>
    </form>
@endsection


