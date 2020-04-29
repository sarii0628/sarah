@extends('layouts.sarah')

@section('title','お問い合わせ')

@section('content')
    <p>下記のフォームよりお問い合わせください。</p> 

    <form method="post" action="{{route('contact.confirm')}}" class="form-horizontal">
        @csrf 

        <div class="form-group">
            <label for="" class="col-md-4 control-label">メールアドレス</label>
            <div class="col-md-8">
                <input type="text" name="email" id="" value="{{old('email')}}">
                @if($errors->has('email'))
                    <p class="error-message">{{$errors->first('email')}}</p>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-md-4 control-label">タイトル</label>
            <div class="col-md-8">
                <input type="text" name="title" id="" value="{{old('title')}}">
                @if($errors->has('title'))
                    <p class="error-message">{{$errors->first('title')}}</p>
                @endif 
            </div>
        </div>

        <div class="form-group">
            <label for="" class="col-md-4 control-label">お問い合わせ内容</label>
            <div class="col-md-8">
                <textarea name="body" id="" cols="30" rows="10">{{old('body')}}</textarea>
                @if($errors->has('body'))
                    <p class="error-message">{{$errors->first('body')}}</p>
                @endif 
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-4 col-sm-8">
                <button type="submit" class="btn btn-info">入力内容確認</button>
            </div>
        </div>
            
 
    </form>
@endsection