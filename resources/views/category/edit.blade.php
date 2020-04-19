@extends('layouts.sarah')

@section('title', 'カテゴリー 編集')

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
    <form action="/category/edit" method="post" enctype="multipart/form-data">
    <table>
        @csrf 
        <input type="hidden" name="id" value="{{$form->id}}">
        <tr><th>name: </th><td><input type="text" name="name" value="{{$form->name}}"></td></tr>
        <tr>
            <th>画像：　</th>
            <td>
                @if($form->img_name)
                    <img src="{{asset('/storage/cat_img/'.$form->img_name)}}" width="100" height="100">
                @endif 
                <input type="file" name="photo">
            </td>
        </tr>
        <tr><th></th><td><input type="submit" value="send"></td></tr>
    </table>
    </form>
@endsection


