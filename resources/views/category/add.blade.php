@extends('layouts.sarah')

@section('title', 'カテゴリー 追加')

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
    <form action="/category/add" method="post">
    <table>
        @csrf 
        <tr><th>name: </th><td><input type="text" name="name" value="{{old('name')}}"></td></tr>
        <tr><th></th><td><input type="submit" value="send"></td></tr>
    </table>
    </form>
@endsection


