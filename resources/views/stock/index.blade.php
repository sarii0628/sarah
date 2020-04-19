@extends('layouts.sarah')

@section('title', '在庫　一覧')

@section('content')
    <table>
    <tr><th>Stock</th><th>image</th><th>button</th></tr>
    @foreach ($items as $item)
        <tr>
            <td>{{$item->getData()}}</td>
            <td>
            @if(isset($item->img_name))
            <img src="{{asset('/storage/img/'.$item->img_name)}}" width="100" height="100">
            @endif 
            </td>
            <td>
                <a href="/stock/edit?id={{$item->id}}">
                    <button type="button">編集</button>
                </a>
                <a href="/stock/del?id={{$item->id}}">
                    <button type="button">削除</button>    
                </a>
            </td>
        </tr>
    @endforeach
    <tr><td></td><td style="text-align: center;">追加　→</td><td><a href="/stock/add"><button type="button">追加</button></a></td></tr>
    </table>
    
@endsection


