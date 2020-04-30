@extends('layouts.admin')

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
    <div class="table-container admin">
    <table>
        @csrf 
        <input type="hidden" name="id" value="{{$form->id}}">
        <tr>
            <th>商品名: </th>
            <td>
                @foreach ($products as $product)
                    <label><input type="radio" name="product_id" value="{{$product->id}}" {{($product->id == $form->product_id)? 'checked="checked"' : ''}} >{{$product->name}}</label><br>
                @endforeach
            </td>
        </tr>
        <tr>
            <th>色: </th>
            <td>
                @foreach ($colors as $color)
                    <label><input type="radio" name="color_id" value="{{$color->id}}" {{($color->id == $form->color_id)? 'checked="checked"' : ''}}>{{$color->name}}</label><br>
                @endforeach
            </td>
        </tr>
        <tr><th>個数： </th><td><input type="text" name="quantity" value="{{$form->quantity}}"></td></tr>
        <tr>
            <th>画像：　</th>
            <td>
                @if($form->images)
                    @foreach($form->images as $image)
                    <img src="{{asset('/storage/img/'.$image->path)}}" width="100" height="100">

                        <input type="hidden" name="image_id" value="{{$image->id}}">
                        <input type="submit" value="画像削除" name="del_photo">
                    
                    @endforeach
                @endif 
                <input type="file" name="files[][photo]" multiple>
            </td>
        </tr>
        <tr><th></th><td><input type="submit" value="送信" name="update"></td></tr>
    </table>
    </div>
    </form>
@endsection


