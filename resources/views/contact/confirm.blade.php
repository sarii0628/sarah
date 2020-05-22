@extends('layouts.sarah')

@section('title','お問い合わせ')

@section('content')
<p>お問い合わせ内容確認</p>
<br>
<form action="{{route('contact.send')}}" method="post" class="form-horizontal">
    @csrf 
    <div class="form-group">
        <label for="" class="col-md-4 control-label">メールアドレス</label>
        <div class="col-md-8">
            {{$inputs['email']}}
            <input type="hidden" name="email" value="{{$inputs['email']}}">
        </div>
    </div>

    <div class="form-group">
        <label for="" class="col-md-4 control-label">タイトル</label>
        <div class="col-md-8">
            {{$inputs['title']}}
            <input type="hidden" name="title" value="{{$inputs['title']}}">
        </div>
    </div>

    <div class="form-group">
        <label for="" class="col-md-4 control-label">お問い合わせ内容</label>
        <div class="col-md-8">
            {!! nl2br(e($inputs['body'])) !!}
            <input type="hidden" name="body" value="{{$inputs['body']}}">
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-offset-4 col-sm-8">
            <button type="submit" name="action" value="back" class="btn btn-warning" >入力内容修正</button>
            <button type="submit" name="action" value="submit" class="btn btn-success">送信する</button>
        </div>
    </div>
</form>
@endsection