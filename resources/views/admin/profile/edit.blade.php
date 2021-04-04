@extends('layouts.admin')
@section('title', 'プロフィール編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール編集</h2>
                <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                            <label class="col-md-2" for="name">氏名</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="name" value="{{ $form->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2" for="gender">性別</label>
                            <div class="radio-button-container">
                                <div class="radio-buttons">
                                <input type="radio" name="gender" value="male" 
                                @if($form->gender == "male") 
                                checked="checked"
                                @endif
                                >男性</button>
                                
                                </div>
                                <div class="radio-buttons">
                                <input type="radio" name="gender" value="female"
                                @if($form->gender == "female") 
                                checked="checked"
                                @endif>女性</button>
                                </div>
                                <div class="radio-buttons">
                                <input type="radio" name="gender" value="other"
                                @if($form->gender == "other") 
                                checked="checked"
                                @endif>その他</button>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2" for="hobby">趣味</label>
                            <div class="col-md-10">
                            <textarea class="form-control" name="hobby" rows="10">{{ $form->hobby }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                        <label class="col-md-2" for="introduction">自己紹介欄</label>
                            <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="20">{{ $form->introduction }}</textarea>
                            </div>
                        </div>
                         <input type="hidden" name="id" value="{{ $form->id }}">
                         <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                        {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($form->histories !=NULL)
                                @foreach($form->histories as $history)
                                    <li class="list-group-item">{{ $history->edited_at }}</li>
                                @endforeach
                            @endif
            </div>
        </div>
    </div>
@endsection
