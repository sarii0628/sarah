@extends('layouts.sarah')

@section('title', '色　一覧')

@section('content')
    <table>
    <tr><th>ID</th><th>Color Name</th><th>Color Code</th><th>Stock</th><th>button</th></tr>
    @foreach ($items as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->code}}</td>
            <td>
            @if ($item->stocks != null)
            <table width='100%'>
                @foreach ($item->stocks as $obj)
                <tr><td>{{$obj->getData()}}</td></tr>
                @endforeach
            </table>
            @endif
            </td>
            <td>
                <a href="/color/edit?id={{$item->id}}">
                    <button type="button">編集</button>
                </a>
                <a href="/color/del?id={{$item->id}}">
                    <button type="button">削除</button>    
                </a>
            </td>
        </tr>
    @endforeach
    <tr><td></td><td></td><td></td><td style="text-align: center;">追加　→</td><td><a href="/color/add"><button type="button">追加</button></a></td></tr>
    </table>
@endsection


