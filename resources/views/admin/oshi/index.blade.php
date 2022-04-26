@extends('layouts.admin')
@section('title', 'オシカネ オシタチ')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mx-auto">
                <h2>
                    推したち
                </h2>
                <form action="{{ action('Admin\OshiController@index') }}" method="get">
                    <div class="form-row justify-content-end">
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}" placeholder="推しの名前">
                            <input type="hidden" name="user_id" value="{{ $user_id }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-outline-dark bg-{color} btn-sm" value="検索">
                        </div>
                    </div>
                </form>
                @foreach($oshis as $oshi)
                    <div class="box">
                        @if (Auth::check() && Auth::user()->id === $oshi->user_id)
                        <div align="right">
                            <a href="{{ action('Admin\OshiController@edit', ['id' => $oshi->id]) }}">
                                編集
                            </a>
                            <a href="{{ action('Admin\OshiController@delete', ['id' => $oshi->id]) }}">
                                削除
                            </a>
                        </div>
                        @endif
                        <h2>
                            {{ $oshi->oshi_name }}
                        </h2>
                        <div class="row row-cols-auto align-items-center">
                            <div class="col">
                                @if(Auth::check() && Auth::user()->id === $oshi->user_id)
                                    <div class="profile_icon_memory">
                                        <img src="{{ asset('/storage/image/'.$oshi->user->profile_image_path) }}">
                                    </div>
                                @else
                                    <div class="profile_icon_memory">
                                        <form action="{{ action('Admin\MainController@profile') }}" method="get">
                                            <input type="hidden" name="id" value="{{ $oshi->user->id }}">
                                            <button type="submit" id="heart">
                                                <img src="{{ asset('/storage/image/'.$oshi->user->profile_image_path) }}">
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>
                            <div class="col">
                                <p>
                                    投稿者: {{ $oshi->user->nickname }}
                                </p>
                            </div>
                            @if($oshi->user->id != Auth::id() )
                                <div class="col">
                                    <button type="button" class="btn btn-outline-dark bg-{color} btn-sm" data-bs-toggle="modal" data-bs-target="#modal1{{ $oshi->user->id }}">
                                        @if(in_array($oshi->user->id, $followee))
                                            フォロー中
                                        @else
                                            フォロー
                                        @endif
                                    </button>
                                    <div class="modal fade" id="modal1{{ $oshi->user->id }}" tabindex="-1" aria-labelledby="modal1label{{ $oshi->user->id }}">
                                        <div class="modal-dialog modal-sm modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modal1label{{ $oshi->user->id }}">
                                                        推しともになる？
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @if(in_array($oshi->user->id, $followee))
                                                        <a class="btn btn-outline-info bg-{color}" href="{{ action('Admin\FollowerController@delete', ['id' => $oshi->user->id]) }}" role="botton">
                                                            ともだち解除
                                                        </a>
                                                    @else
                                                        <form action="{{ action('Admin\FollowerController@store') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="followee_id" value="{{ $oshi->user->id }}">
                                                            <input type="hidden" name="follower_id" value="{{ Auth::id() }}">
                                                            <button type="submit" class="btn btn-primary">
                                                                なる！
                                                            </button>
                                                        </form>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                            ならない
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="image" align="center">
                            <img src="/storage/image/{{$oshi->image_path}}" class="img-fluid rounded mx-auto d-block">
                        </div>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        生年月日
                                    </th>
                                    <td>
                                        {{ \Str::limit($oshi->birthday_y, 20) }}年{{ \Str::limit($oshi->birthday_m, 20) }}月{{ \Str::limit($oshi->birthday_d, 20)}}日
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        血液型
                                    </th>
                                    <td>
                                        {{ \Str::limit($oshi->blood, 20) }}型
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        身長
                                    </th>
                                    <td>
                                        {{ \Str::limit($oshi->oshi_height, 20) }}cm
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        体重
                                    </th>
                                    <td>
                                        {{ \Str::limit($oshi->oshi_weight, 20) }}kg
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        グループ
                                    </th>
                                    <td>
                                        {{ \Str::limit($oshi->oshi_group, 20) }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        推し歴
                                    </th>
                                    <td>
                                        {{ \Str::limit($oshi->history_y, 20) }}年{{ \Str::limit($oshi->history_m, 20) }}月{{ \Str::limit($oshi->history_d, 20) }}日
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        愛情度
                                    </th>
                                    <td>
                                        {{ \Str::limit($oshi->tentacles, 20) }}%
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        メモ
                                    </th>
                                    <td>
                                        {{ \Str::limit($oshi->oshi_memo, 200) }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row justify-content-end">
                            @if (Auth::check() && Auth::user()->id === $oshi->user_id)
                                @if($oshi->text_history == null)
                                    <div class="col-md-2">
                                        <form action="{{ action('Admin\NotifyController@add') }}" method="get">
                                            <input type="hidden" name="id" value="{{ $oshi->id }}">
                                            <button type="submit" id="heart">
                                                <img src="{{ asset('/storage/images/memo2.png') }}" width="30" height="30">
                                                <br>
                                                布教をつくる
                                            </button>
                                        </form>    
                                    </div>
                                @endif
                            @endif
                            @if($oshi->text_history != null)
                                <div class="col-md-2">
                                    <form action="{{ action('Admin\NotifyController@index') }}" method="get">
                                        <input type="hidden" name="id" value="{{ $oshi->id }}">
                                        <button type="submit" id="heart">
                                            <img src="{{ asset('/storage/images/heart2.png') }}" width="30" height="30">
                                            <br>
                                            布教をみる
                                        </button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <div style="text-align: center;">
        <button type="button" class="btn btn-outline-dark bg-{color} btn-lg" onClick="history.back()">戻る</button>
    </div>
@endsection