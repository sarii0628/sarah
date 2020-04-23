@extends('layouts.admin')

@section('title', '在庫 追加')

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
    <form action="/stock/add" method="post" enctype="multipart/form-data">
    <div class="table-container">
    <table>
        @csrf 
        <tr>
            <th>商品名: </th>
            <td>
                @foreach ($products as $product)
                    <p>
                    <input type="radio" name="product_id" value="{{$product->id}}">{{$product->name}}
                    </p>
                @endforeach
            </td>
        </tr>
        <tr>
            <th>色: </th>
            <td>
                @foreach ($colors as $color)
                    <p>
                    <input type="radio" name="color_id" value="{{$color->id}}">{{$color->name}}
                    </p>
                @endforeach
            </td>
        </tr>
        <tr><th>個数： </th><td><input type="text" name="quantity" value="{{old('quantity')}}"></td></tr>
        <tr><th>画像：　</th><td><input type="file" name="photo"></td></tr>
        <tr><th></th><td><input type="submit" value="send"></td></tr>
    </table>
    </div>
    </form>
@endsection


