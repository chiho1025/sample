<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My news</title>
        @extends('layouts.profile')
　　　　{{-- profile.blade.phpの@yield('title')に'ニュースの新規作成'を埋め込む --}}
　　　　@section('title', 'Myプロフィール')
　　　　{{-- admin.blade.phpの@yield('content')に以下のタグを埋め込む --}}
　　　　@section('content')
    　　<div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>Myプロフィール</h2>
            </div>
        </div>
    　　</div>
　　　　@endsection
    </head>    
    <body>
        <h1>profile作成画面</h1>
        <form action="{{
        action('Admin\ProfileController@create') }}"
        method="post" enctype="multipart/form-data">
        <div class="form-group row">
            <label class="col-md-2">氏名</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2">性別</label>
                <div class="col-md-10">
                    <input type="radio" class="form-control" name="gender" value="male">男性 {{ old('gender') }}</button>
                    <input type="radio" class="form-control" name="gender" value="male">女性 {{ old('gender') }}</button>
                    <input type="radio" class="form-control" name="gender" value="female">その他 {{ old('gender') }}</button>
                </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2">趣味</label>
                <div class="col-md-10">
                    <textarea class="form-control" name="hobby" rows="10">{{ old('hobby') }}</textarea>
                </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2">自己紹介欄</label>
                <div class="col-md-10">
                    <textarea class="form-control" name="introduction" rows="20">{{ old('introduction') }}</textarea>
                </div>
        </div>
        {{ csrf_field() }}
        <input type="submit" class="btn btn-primary" value="更新">
    </body>
</html>
