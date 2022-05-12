@extends('layouts.admin')
@section('title', 'オシカネ　メインページ')
@section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 mx-auto">
                    <div class="box">
                        <h2>みんなの推し</h2>
                        <div class="row row-cols-1 row-cols-md-3 g-2">
                            @foreach($oshis as $oshi)
                            <div class="col">
                                <div class="card">
                                    <img src="{{ $oshi->image_path }}" class="card-img-top" alt="card-grid-image">
                                    <div class="card-body">
                                        <P class="card-text">
                                            <form action="{{ action('Admin\MainController@profile') }}" method="get">
                                                <input type="hidden" name="id" value="{{ $oshi->user->id }}">
                                                <button type="sbmit" id="heart">
                                                    <div class="profile_icon_top">
                                                        <img src="{{ $oshi->user->profile_image_path }}">
                                                    </div>
                                                    投稿者：{{ $oshi->user->nickname }}
                                                </button>
                                            </form>
                                        </p>
                                        <h5 class="card-title">
                                            推しのなまえ
                                            <br>
                                            {{ \Str::limit($oshi->oshi_name, 20) }}
                                        </h5>
                                        <p class="card-text">
                                            めも
                                            <br>
                                            {{ \Str::limit($oshi->oshi_memo, 100) }}
                                        </p>
                                        <P class="card-text">
                                            <button type="button" class="btn btn-outline-dark bg-{color} btn-sm" style="position: absolute; left: 10px; bottom: 10px" data-bs-toggle="modal" data-bs-target="#modal1{{ $oshi->user->id }}">
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
                                                            <h5 class="modal-title" id="modal1label{{ $oshi->user->id }}">推しともになる？</h5>
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
                                        </P>
                                        <p class="card-text"><br></p>
                                        <p class="card-text">
                                            <form action="{{ action('Admin\OshiController@index') }}" method="get">
                                                <input type="hidden" name="user_id" value="{{ $oshi->user->id }}">
                                                <input type="hidden" name="id" value="{{ $oshi->id }}">
                                                <button type="submit" id="heart" style="position: absolute; right: 10px; bottom: 10px">
                                                    <img src="https://oshikane.s3.ap-northeast-1.amazonaws.com/heart.png" width="30" height="30">
                                                    <br>
                                                    みる
                                                </button>
                                            </form>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="box_ma">
                        <h2>みんなのメモリー</h2>
                        <div class="row row-cols-1 row-cols-md-3 g-2">
                            @foreach($memories as $memory)
                            <div class="col">
                                <div class="card">
                                    <img src="{{ $memory->image_path }}" class="card-img-top" alt="card-grid-image">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <form action="{{ action('Admin\MainController@profile') }}" method="get">
                                                <input type="hidden" name="id" value="{{ $memory->user->id }}">
                                                <button type="sbmit" id="heart">
                                                    <div class="profile_icon_top">
                                                        <img src="{{ $memory->user->profile_image_path }}">
                                                    </div>
                                                    投稿者：{{ $memory->user->nickname }}
                                                </button>
                                            </form>
                                        </p>
                                        <h5 class="card-title">
                                            {{ \Str::limit($memory->stage_name, 30) }}
                                        </h5>
                                        <p class="card-text">
                                            {{ \Str::limit($memory->artist, 20) }}
                                        </p>
                                        <p class="card-text">
                                            {{ \Str::limit($memory->stage_memo, 100) }}
                                        </p>
                                        <p class="card-text">
                                            <button type="button" class="btn btn-outline-dark bg-{color} btn-sm" style="position: absolute; left: 10px; bottom: 10px" data-bs-toggle="modal" data-bs-target="#modal1{{ $memory->user->id }}">
                                                @if(in_array($memory->user->id, $followee))
                                                    フォロー中
                                                    @else
                                                    フォロー
                                                @endif
                                            </button>
                                            <div class="modal fade" id="modal1{{ $memory->user->id }}" tabindex="-1" aria-labelledby="modal1label{{ $memory->user->id }}">
                                                <div class="modal-dialog modal-sm modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modal1label{{ $memory->user->id }}">
                                                                どうする？
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if(in_array($memory->user->id, $followee))
                                                            <a class="btn btn-outline-info bg-{color}" href="{{ action('Admin\FollowerController@delete', ['id' => $memory->user->id]) }}" role="botton">
                                                                ともだち解除
                                                            </a>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">どうもしない</button>
                                                            @else
                                                            <form action="{{ action('Admin\FollowerController@store') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="followee_id" value="{{ $memory->user->id }}">
                                                                <input type="hidden" name="follower_id" value="{{ Auth::id() }}">
                                                                <button type="submit" class="btn btn-primary">
                                                                    推しともになる！
                                                                </button>
                                                            </form>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                                どうもしない
                                                            </button>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </p>
                                        <p class="card-text">
                                            <br>
                                        </p>
                                        <p class="card-text">
                                            <form action="{{ action('Admin\MemoryController@index') }}" method="get">
                                                <input type="hidden" name="user_id" value="{{ $memory->user->id }}">
                                                <input type="hidden" name="id" value="{{ $memory->id }}">
                                                <button type="submit" id="heart" style="position: absolute; right: 10px; bottom: 10px">
                                                    <img src="https://oshikane.s3.ap-northeast-1.amazonaws.com/memo.png" width="30" height="30">
                                                    <br>
                                                    みる
                                                </button>
                                            </form>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection