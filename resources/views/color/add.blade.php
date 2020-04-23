@extends('layouts.admin')

@section('title', '色 追加')

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
    <form action="/color/add" method="post">
    <div class="table-container">
    <table>
        @csrf 
        <tr><th>name: </th><td><input type="text" name="name" value="{{old('name')}}"></td></tr>
        <tr><th>code: </th><td><input type="text" name="code" value="{{old('code')}}"></td></tr>
        <tr><th></th><td><input type="submit" value="send"></td></tr>
    </table>
    </div>
    </form>
@endsection


