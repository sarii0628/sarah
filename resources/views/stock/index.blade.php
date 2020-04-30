@extends('layouts.admin')

@section('title', '在庫　管理')

@section('search-form')
    @include('components.search-form', ['page_name' => 'stock'])
@endsection

@section('content')
    <div class="table-container">
    <table>
    <tr><th>Stock</th><th>image</th><th>button</th></tr>
    <tr><td></td><td style="text-align: center;">追加　→</td><td><a href="/stock/add"><button type="button">追加</button></a></td></tr>
    @foreach ($items as $item)
        <tr>
            <td>{{$item->getData()}}</td>
            <td>
            @if($item->images != null)
            @foreach ($item->images as $img)
            <img src="{{asset('/storage/img/'.$img->path)}}" width="100" height="100">
            @endforeach
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
    </table>
    </div>
    
@endsection


