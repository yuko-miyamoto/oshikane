@extends('layouts.admin')
@section('title', 'オシカネ ワタシの編集')
@section('content')
    <div class="container">
        <div class="row　justify-content-center">
            <div class="col-md-12 mx-auto">
                <h2>わたしを編集する</h2>
                <form action="{{ action('Admin\UserController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <br>
                    <div class="box_pro">
                        <div align="center">
                            <span><h3>わたしのこと</h3></span>
                            <img id="preview" src="{{ asset('/storage/image/'.$user_form->profile_image_path) }}" width="100" height="100">
                            <div class="form-text text-info">
                                設定中
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label class="col-md-3" for="image">画像</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control-file" name="profile_image">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3">わたしのなまえ</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="name" value="{{ $user_form->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3">わたしのあだな</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="nickname" value="{{ $user_form->nickname }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3">いち推し</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="oshi" value="{{ $user_form->oshi }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3">メールアドレス</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="email" value="{{ $user_form->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3">パスワード</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="password" value="{{ $user_form->password }}">
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{ $user_form->id }}">
                        {{ csrf_field() }}
                        <div style="text-align: center;">
                            <input type="submit" class="btn btn-outline-dark bg-{color}" value="更　新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(function(){
            $("[name='profile_image']").on('change', function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#preview").attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            })
        })
    </script>
@endsection
@section('footer')
    <div style="text-align: center;">
        <button type="button" class="btn btn-outline-dark bg-{color} btn-lg" onClick="history.back()">戻る</button>
    </div>
@endsection
               