@extends('layouts.admin')
@section('title', 'オシカネ ワタシの編集')
@section('header_sub')
    
@endsection
@section('content')

    <div class="container">
        <div class="row　justify-content-center">
            <div class="col-md-12 mx-auto">
                <h2>わたしを編集する</h2>
                <form action="{{ action('Admin\UserController@update') }}" method="post" entype="multipart/form-data">
                    @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <br>
                    <div class="box_pro">
                        <div class="d-flex justify-content-center">
                            <label class="col-md-9" style="text-align: center;">なまえと推しをかえる</label>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label class="col-md-2">わたしのなまえ</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="name" value="{{ $user_form->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">わたしのあだな</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="nickname" value="{{ $user_form->nickname }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">いち推し</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="oshi" value="{{ $user_form->oshi }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">メールアドレス</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="email" value="{{ $user_form->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">パスワード</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="password" value="{{ $user_form->password }}">
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{ optional($user_form)->id }}">
                        {{ csrf_field() }}
                        <div style="text-align: center;">
                            <input type="submit" class="btn btn-outline-dark bg-{color}" value="更　新">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
               