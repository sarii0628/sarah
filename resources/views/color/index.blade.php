@extends('layouts.admin')

@section('title', '色　管理')

@section('search-form')
    @include('components.search-form', ['page_name' => 'color'])
@endsection

@section('content')
    <div class="table-container">
    <table>
    <tr><th>ID</th><th>Color Name</th><th>Color Code</th><th>button</th></tr>
    <tr><td></td><td></td><td style="text-align: center;">追加　→</td><td><a href="/color/add"><button type="button">追加</button></a></td></tr>
    @foreach ($items as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->code}}</td>
            
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
    </table>
    </div>
@endsection


