@extends('layouts.admin')
@section('title', 'Myプロフィール')

@section('content')
    　　   <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <h1>profile作成画面</h1>
                    <form action="{{
                    action('Admin\ProfileController@create') }}"
                    method="post" enctype="multipart/form-data">
                        
                        @if (count($errors) > 0)
                            <ul>
                                @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <div class="form-group row">
                            <label class="col-md-2">氏名</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">性別</label>
                            <div class="radio-button-container">
                                <div class="radio-buttons">
                                <input type="radio" name="gender" value="male">男性</button>
                                </div>
                                <div class="radio-buttons">
                                <input type="radio" name="gender" value="male">女性</button>
                                </div>
                                <div class="radio-buttons">
                                <input type="radio" name="gender" value="female">その他</button>
                                </div>
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
                        <div class="form-group row">
                            <label class="col-md-2">写真</label>
                            <div class="col-md-10">
                                <input type="file" class="form-control-file" name="image">
                            </div>
                        </div>
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-primary" value="更新">
                    </form>
                </div>
    　　      </div>
　　　　@endsection
</html>
