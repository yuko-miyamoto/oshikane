@extends('layouts.admin')
@section('title', 'オシカネ 推し一覧')
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
            <h2>推したちの管理</h2>
            </div>
            <div class="col-6" align="right">
                <form action="{{ action('Admin\OshiController@index') }}" method="get">
                    <input type="text" class="form-control_search" name="cond_title" value="{{ $cond_title }}" placeholder="推しの名前">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-outline-dark bg-{color} btn-sm" value="検索">
                </form>
            </div>
            <br><br>
            @foreach($posts as $oshi)
            
            <div class="box">
                
                <div align="right">
                <a href="{{ action('Admin\OshiController@edit', ['id' => $oshi->id]) }}">編集</a>
                <a href="{{ action('Admin\OshiController@delete', ['id' => $oshi->id]) }}">削除</a>
                </div>
                
                
                <h2>{{ \Str::limit($oshi->oshi_name, 20) }}</h2>
                <div class="image" align="center">
                    <img src="/storage/image/{{$oshi->image_path}}">
                </div>
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th scope="row">生年月日</th>
                            <td>{{ \Str::limit($oshi->birthday_y, 20) }}年{{ \Str::limit($oshi->birthday_m, 20) }}月{{ \Str::limit($oshi->birthday_d, 20)}}日</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th scope="row">血液型</th>
                            <td>{{ \Str::limit($oshi->blood, 20) }}型</td>
                        </tr>
                        <tr>
                            <th scope="row">身長</th>
                            <td>{{ \Str::limit($oshi->oshi_height, 20) }}cm</td>
                        </tr>
                        <tr>
                            <th scope="row">体重</th>
                            <td>{{ \Str::limit($oshi->oshi_weight, 20) }}kg</td>
                        </tr>
                        <tr>
                            <th scope="row">グループ</th>
                            <td>{{ \Str::limit($oshi->oshi_group, 20) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">推し歴</th>
                            <td>{{ \Str::limit($oshi->history_y, 20) }}年{{ \Str::limit($oshi->history_m, 20) }}月{{ \Str::limit($oshi->history_d, 20) }}日</td>
                        </tr>
                        <tr>
                            <th scope="row">愛情度</th>
                            <td>{{ \Str::limit($oshi->tentacles, 20) }}%</td>
                        </tr>
                        <tr>
                            <th scope="row">メモ</th>
                            <td>{{ \Str::limit($oshi->oshi_memo, 200) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @endforeach
        </div>
    </div>
@endsection