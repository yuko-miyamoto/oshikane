@extends('layouts.admin')
@section('title', 'オシカネ オシトモサガシ')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mx-auto">
                <h2>推しともを探す</h2>
                <form action="{{ action('Admin\UserController@search') }}" method="get">
                    <div class="form-row justify-content-end">
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}" placeholder="推しの名前">
                            {{ csrf_field() }}
                        </div>
                        <div class="col-md-2">
                            <input type="submit" class="btn btn-outline-dark bg-{color} btn-sm" value="検索">
                        </div>
                    </div>
                </form>
                <div class="box_pro">
                    @if($users->isEmpty())
                        <p align="center">推しともは見つかりませんでした。</p>
                    @endif
                    <table class="list_table">
                        <thead>
                            <th scope="row" colspan="2">
                                推しとも検索結果
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    なまえ
                                </td>
                                <td>
                                    いち推し
                                </td>
                            </tr>
                            @if(Auth::check() )
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <div class="profile_icon_top">
                                                <img src="{{ $user->profile_image_path }}">    
                                            </div>
                                            {{ \Str::limit($user->nickname, 20) }}
                                        </td>
                                        <td>
                                            {{ \Str::limit($user->oshi, 20) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            @if(in_array($user->id, $followee))
                                                <div class="d-grid gap-2 d-md-block">
                                                    <button type="button" class="btn btn-outline-dark bg-{color} btn-sm" data-bs-toggle="modal" data-bs-target="#modal1{{ $user->id }}">
                                                        さよなら
                                                    </button>
                                                </div>
                                            @else
                                                <div class="d-grid gap-2 d-md-block">
                                                    <button type="button" class="btn btn-outline-dark bg-{color} btn-sm" data-bs-toggle="modal" data-bs-target="#modal1{{ $user->id }}">
                                                        こんにちは
                                                    </button>
                                                </div>
                                            @endif
                                            <div class="modal fade" id="modal1{{ $user->id }}" tabindex="-1" aria-labelledby="modal1label{{ $user->id }}">
                                                <div class="modal-dialog modal-sm modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modal1label{{ $user->id }}">推しともになる？</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            @if(in_array($user->id, $followee))
                                                                <a class="btn btn-outline-info bg-{color}" href="{{ action('Admin\FollowerController@delete', ['id' => $user->id]) }}" role="botton">
                                                                    ともだち解除
                                                                </a>
                                                            @else
                                                                <form action="{{ action('Admin\FollowerController@store') }}" method="POST">
                                                                    @csrf
                                                                    <input type="hidden" name="followee_id" value="{{ $user->id }}">
                                                                    <input type="hidden" name="follower_id" value="{{ Auth::id() }}">
                                                                    <button type="submit" class="btn btn-primary">
                                                                        なる！
                                                                    </button>
                                                                </form>
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ならない</button>
                                                            @endif
                                                        </div>
                                                        <div class="modal-footer"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>    
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <div style="text-align: center;">
        <button type="button" class="btn btn-outline-dark bg-{color} btn-lg" onClick="history.back()">戻る</button>
    </div>
@endsection