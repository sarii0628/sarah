@extends('layouts.sarah')

@section('title', '色 削除')

@section('content')
    <form action="/color/del" method="post">
    <table>
        @csrf
        <input type="hidden" name="id" value="{{$form->id}}">
        <tr><th>name: </th><td>{{$form->name}}</td></tr>
        <tr><th>code: </th><td>{{$form->code}}</td></tr>
        <tr><th></th><td><input type="submit" value="send"></td></tr>
    </table>
    </form>
@endsection


