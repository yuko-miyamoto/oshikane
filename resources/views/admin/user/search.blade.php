@extends('layouts.admin')
@section('title', 'オシカネ 推しともをさがす')
@section('header_sub')
    <li class="nav-item2"><a class="nav-link" aria-current="page" href="{{ action('Admin\UserController@add') }}">なまえ<br>登録</a></li>
    <li class="nav-item2"><a class="nav-link" href="{{ action('Admin\UserController@search') }}">推しとも<br>検索</a></li>
@endsection
@section('content')
    <hr>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 mx-auto">
                <h2>推しともを探す</h2>
                <div class="form-group row" align="right">
                    <form action="{{ action('Admin\UserController@search') }}" method="get">
                        <input type="text" class="form-control_search" name="cond_title" value="{{ $cond_title }}" placeholder="推しの名前">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-outline-dark bg-{color} btn-sm" value="検索">
                    </form>
                </div>
                <div class="box_pro">
                    <br>
                    <div class="d-flex justify-content-center">
                        <label class="col-md-9" style="text-align: center;">推しとも検索結果</label>
                    </div>
                    <br>
                    @if($users->isEmpty())
                    <p align="center">推しともは見つかりませんでした。</p>
                    @endif
                    <table class="table">
                        <tbody>
                            <tr align="center">
                                <th scope="row">推しとものなまえ</th>
                                <th>推しとものいち推し</th>
                                <th>ともだちになる</th>
                            </tr>
                            @if(Auth::check() )
                                @foreach($users as $user)
                                <tr>
                                    <td scope="row" align="center">{{ \Str::limit($user->nickname, 20) }}</td>
                                    <td align="center">{{ \Str::limit($user->oshi, 20) }}</td>
                                    <td align="center">
                                        <button type="button" class="btn btn-outline-dark bg-{color} btn-sm" data-bs-toggle="modal" data-bs-target="#modal1{{ $user->id }}">こんにちは</button>
                                        <div class="modal fade" id="modal1{{ $user->id }}" tabindex="-1" aria-labelledby="modal1label{{ $user->id }}">
                                            <div class="modal-dialog modal-sm modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modal1label{{ $user->id }}">推しともになる？</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if(array_intersect($other_user,$followee))
                                                        <a class="btn btn-outline-info bg-{color}" href="{{ action('Admin\FollowerController@delete', ['id' => $user->id]) }}" role="botton">
                                                            ともだち解除
                                                        </a>
                                                        @else
                                                        <form action="{{ action('Admin\FollowerController@store') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="followee_id" value="{{ $user->id }}">
                                                            <input type="hidden" name="follower_id" balue="{{ Auth::id() }}">
                                                            <button type="submit" class="btn btn-primary">
                                                                なる！
                                                            </button>
                                                        </form>
                                                        @endif
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ならない</button>
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
                    @if($users->isEmpty())
                    <div style="text-align: center;">
                        <button type="button" class="btn btn-outline-dark"><a href="{{ action('Admin\UserController@search') }}">もどる</a></button>
                    </div>
                    @endif
                    @if(($cond_title) === null)
                    <div style="text-align: center;">
                        <button type="button" class="btn btn-outline-dark"><a href="{{ action('Admin\UserController@profile_create') }}">もどる</a></button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    @endsection