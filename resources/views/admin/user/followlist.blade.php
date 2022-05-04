@extends('layouts.admin')
@section('title', 'オシカネ オシトモタチ')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mx-auto">
                <h2>推しとも一覧</h2>
                <div class="box_pro">
                    <table class="list_table">
                        <thead>
                            <th scope="row" colspan="2">
                                推しとも一覧
                            </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>なまえ</td>
                                <td>いち推し</td>
                            </tr>
                            @foreach($followers as $follow)
                                <tr>
                                    <td>
                                        <div class="profile_icon_top">
                                            <img src="{{ asset('/storage/image/'.$follow->user->profile_image_path) }}">    
                                        </div>
                                        {{ \Str::limit($follow->user->nickname, 20) }}
                                    </td>    
                                    <td>
                                        {{ \Str::limit($follow->user->oshi, 20) }}
                                    </td>    
                                </tr>
                                <tr>
                                    <td>
                                        <form action="{{ action('Admin\MainController@profile') }}" method="get">
                                            <input type="hidden" name="id" value="{{ $follow->user->id }}">
                                            <div class="d-grid gap-2 d-md-block">
                                                <button type="submit" class="btn btn-outline-success bg-{color} btn-sm">
                                                    おじゃまする
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        <div class="d-grid gap-2 d-md-block">
                                            <button type="button" class="btn btn-outline-dark bg-{color} btn-sm" data-bs-toggle="modal" data-bs-target="#modal1{{ $follow->followee_id }}">
                                                さよなら
                                            </button>
                                            <div class="modal fade" id="modal1{{ $follow->followee_id }}" tabindex="-1" aria-labelledby="modal1label{{ $follow->followee_id }}">
                                                <div class="modal-dialog modal-sm modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modal1label{{ $follow->followee_id }}">さよならする？</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <a class="btn btn-outline-info bg-{color}" href="{{ action('Admin\FollowerController@delete', ['id' => $follow->followee_id]) }}" role="botton">
                                                                する
                                                            </a>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                                しない
                                                            </button>
                                                        </div>
                                                        <div class="modal-footer"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>    
                                </tr>
                            @endforeach
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