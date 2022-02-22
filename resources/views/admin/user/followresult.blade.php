@extends('layouts.admin')
@section('title', 'オシカネ 推しとも')
@section('header_sub')
    <li class="nav-item2"><a class="nav-link" aria-current="page" href="{{ action('Admin\ProfileController@add') }}">なまえ<br>登録</a></li>
    <li class="nav-item2"><a class="nav-link" href="{{ action('Admin\ProfileController@search') }}">推しとも<br>検索</a></li>
@endsection
@section('content')
    <hr>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 mx-auto">
                <h2>推しともができました！</h2>
                <div class="box_pro">
                    <br>
                    <div class="d-flex justify-content-center">
                    <label class="col-md-9" style="text-align: center;">新しい推しとも</label>
                    </div>
                    <br>
                    <table class="table">
                        <tbody>
                            <tr align="center">
                                <th scope="row">推しとものなまえ</th>
                                <th>推しとものいち推し</th>
                                <th></th>
                            </tr>
                            @foreach($posts2 as $followre)
                            <tr>
                                <td scope="row" align="center">{{ \Str::limit($followre->profile_name, 20) }}</td>
                                <td align="center">{{ \str::limit( $followre->profile_oshi, 20) }}</td>
                                <td align="center"><button type="button" class="btn btn-outline-danger bg-{color}">おじゃまする</button>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div style="text-align: center;">
                    <button type="button" class="btn btn-outline-dark"><a href="{{ action('Admin\ProfileController@search') }}">もどる</a></button>
                </div>
            </div>
        </div>
    </div>
@endsection