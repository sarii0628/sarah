@extends('layouts.sarah')

@section('title', '在庫 編集')

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
    <form action="/stock/edit" method="post"  enctype="multipart/form-data">
    <table>
        @csrf 
        <input type="hidden" name="id" value="{{$form->id}}">
        <tr>
            <th>商品名: </th>
            <td>
                @foreach ($products as $product)
                    <input type="radio" name="product_id" value="{{$product->id}}" {{($product->id == $form->product_id)? 'checked="checked"' : ''}} >{{$product->name}}<br>
                @endforeach
            </td>
        </tr>
        <tr>
            <th>色: </th>
            <td>
                @foreach ($colors as $color)
                    <input type="radio" name="color_id" value="{{$color->id}}" {{($color->id == $form->color_id)? 'checked="checked"' : ''}}>{{$color->name}}<br>
                @endforeach
            </td>
        </tr>
        <tr><th>個数： </th><td><input type="text" name="quantity" value="{{$form->quantity}}"></td></tr>
        <tr>
            <th>画像：　</th>
            <td>
                @if($form->img_name)
                    <img src="{{asset('/storage/img/'.$form->img_name)}}" width="100" height="100">
                @endif 
                <input type="file" name="photo">
            </td>
        </tr>
        <tr><th></th><td><input type="submit" value="send"></td></tr>
    </table>
    </form>
@endsection


