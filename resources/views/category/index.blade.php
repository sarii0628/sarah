@extends('layouts.sarah')

@section('title', 'カテゴリー一覧')

@section('content')
    <table>
    <tr><th>category</th><th>product</th><th>button</th></tr>
    @foreach ($items as $item)
        <tr>
            <td>{{$item->getData()}}</td>
            <td>
            @if ($item->products != null)
                <table width="100%">
                @foreach ($item->products as $obj)
                    <tr><td>{{$obj->getData()}}</td></tr>
                @endforeach
                </table>
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
    <tr><td></td><td style="text-align: center;">追加　→</td><td><a href="/category/add"><button type="button">追加</button></a></td></tr>
    </table>
@endsection


