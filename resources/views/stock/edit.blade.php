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
    <form action="/stock/edit" method="post">
    <table>
        @csrf 
        <input type="hidden" name="id" value="{{$form->id}}">
        <tr>
            <th>商品名: </th>
            <td>
                @foreach ($products as $product)
                    @if ($product->id == $form->product_id)
                        <input type="radio" name="product_id" value="{{$product->id}}" checked="checked">{{$product->name}}<br>
                    @else
                        <input type="radio" name="product_id" value="{{$product->id}}">{{$product->name}}<br>
                    @endif
                @endforeach
            </td>
        </tr>
        <tr>
            <th>色: </th>
            <td>
                @foreach ($colors as $color)
                    @if ($color->id == $form->color_id)
                        <input type="radio" name="color_id" value="{{$color->id}}" checked="checked">{{$color->name}}<br>
                    @else
                        <input type="radio" name="color_id" value="{{$color->id}}">{{$color->name}}<br>
                    @endif
                @endforeach
            </td>
        </tr>
        <tr><th>個数： </th><td><input type="text" name="quantity" value="{{$form->quantity}}"></td></tr>
        <tr><th></th><td><input type="submit" value="send"></td></tr>
    </table>
    </form>
@endsection


