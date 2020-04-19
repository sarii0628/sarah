@extends('layouts.sarah')

@section('title', 'カテゴリー一覧')

@section('content')
    <style>
    .table-container {text-align: center;}
    .table-container table {margin: 20px auto;}
    table th:first-child {width: 300px;}
    </style>
    <div class="table-container">
    <table >
    <tr><th>category</th><th>image</th><th>button</th></tr>
    @foreach ($items as $item)
        <tr>
            <td>{{$item->getData()}}</td>
            
            {{--
            <td>
            @if ($item->products != null)
                <table width="100%">
                @foreach ($item->products as $obj)
                    <tr><td>{{$obj->getData()}}</td></tr>
                @endforeach
                </table>
            @endif
            </td>
            --}}        
           <td>
            @if(isset($item->img_name))
            <img src="{{asset('/storage/cat_img/'.$item->img_name)}}" width="150" height="150">
            @endif 
            </td>

            <td>
                <a href="/category/edit?id={{$item->id}}">
                    <button type="button">編集</button>
                </a>
                <a href="/category/del?id={{$item->id}}">
                    <button type="button">削除</button>    
                </a>
            </td>
        </tr>
    @endforeach
    <tr><td style="text-align: center;">追加　→</td><td></td><td><a href="/category/add"><button type="button">追加</button></a></td></tr>
    </table>
    </div>
@endsection


