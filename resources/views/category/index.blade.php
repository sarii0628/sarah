@extends('layouts.admin')


@section('title', 'カテゴリー　管理')

@section('search-form')
    @include('components.search-form', ['page_name' => 'category'])
@endsection

@section('content')
    <div class="table-container">
        <table >
        <tr>
            <th><a href="/category?sort=name">name</a></th>
            <th>image</th>
            <th>button</th>
        </tr>
        <tr><td></td><td style="text-align: center;">追加　→</td><td><a href="/category/add"><button type="button">追加</button></a></td></tr>
        @foreach ($items as $item)
        <tr>
            <td>{{$item->getData()}}</td>
        
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
        </table>
    </div>
    

@endsection


