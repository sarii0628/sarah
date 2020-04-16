@extends('layouts.sarah')

@section('title', '色 編集')

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
    <form action="/color/edit" method="post">
    <table>
        @csrf 
        <input type="hidden" name="id" value="{{$form->id}}">
        <tr><th>name: </th><td><input type="text" name="name" value="{{$form->name}}"></td></tr>
        <tr><th>code: </th><td><input type="text" name="code" value="{{$form->code}}"></td></tr>
        <tr><th></th><td><input type="submit" value="send"></td></tr>
    </table>
    </form>
@endsection


