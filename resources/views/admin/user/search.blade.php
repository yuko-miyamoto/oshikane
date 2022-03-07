@extends('layouts.admin')
@section('title', 'オシカネ 推しともをさがす')
@section('header_sub')
    
@endsection
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