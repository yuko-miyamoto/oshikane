@extends('layouts.admin')
@section('title', 'オシカネ 布教一覧')
@section('header_sub')
    <li class="nav-item"><a class="nav-link" aria-current="page" href="{{ action('Admin\OshiController@add') }}">推し<br>登録</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ action('Admin\OshiController@index') }}">推し<br>一覧</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ action('Admin\GateController@add') }}">推し<br>布教</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ action('Admin\GateController@index') }}">布教<br>一覧</a></li>
@endsection
@section('content')
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-6">
            <h2>推しのいいところ</h2>
            </div>
            <div class="col-6" align="right">
                <form action="{{ action('Admin\GateController@index') }}" method="get">
                    <input type="text" class="form-control_oshi" name="cond_title" value="{{ $cond_title }}" placeholder="推しの名前">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-outline-dark bg-{color}" value="検索">
                </form>
            </div>
            <br><br>
           
            @foreach($posts as $oshi)
            
            <div class="box">
                <div align="right">
                        <a href="{{ action('Admin\OshiController@edit', ['user_id' => $oshi->id]) }}">編集</a>
                        <a href="{{ action('Admin\OshiController@delete', ['user_id' => $oshi->id]) }}">削除</a>
                </div>
                <div class="gate">
                    <img src="{{ secure_asset('storage/image/' .$oshi->image_path) }}">
                    <p class="title_01">推し</p>
                    <p class="name">{{ $oshi->oshi_name }}</p>
                    <p class="title_02">歴史</p>
                    <P class="history">{{ $oshi->text_history }}</P>
                    <p class="title_03">いち推し！</p>
                    <P class="point">{{ $oshi->text_point }}</P>
                    <p class="title_04">導入方法</p>
                    <p class="input">{{ $oshi->text_input }}</p>
                    <p class="title_05">近況</p>
                    <P class="now">{{ $oshi->text_now }}</P>
                </div>
            </div>
            @endforeach
        </div>
       
@endsection