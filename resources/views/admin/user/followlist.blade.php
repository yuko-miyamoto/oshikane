@extends('layouts.admin')
@section('title', 'オシカネ 推しとも一覧')
@section('header_sub')
    
@endsection
@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mx-auto">
                <h2>推しとも一覧</h2>
                <div class="box_pro">
                    <br>
                    <div class="d-flex justify-content-center">
                        <label class="col-md-9" style="text-align: center;">推しとも一覧</label>
                    </div>
                    <br>
                    <table class="table">
                        <tbody>
                            <tr align="center">
                                <th scope="row">推しとものなまえ</th>
                                <th>推しとものいち推し</th>
                                <th>ともだちのへや</th>
                                <th>おわかれする</th>
                            </tr>
                            @foreach($followers as $follow)
                            <tr>
                                <td scope="row" align="center">{{ \Str::limit($follow->user->nickname, 20) }}</td>
                                <td align="center">{{ \Str::limit($follow->user->oshi, 20) }}</td>
                                <td align="center">
                                    <form action="{{ action('Admin\MainController@profile') }}" method="get">
                                        <input type="hidden" name="id" value="{{ $follow->user->id }}">
                                        <button type="submit" class="btn btn-outline-success bg-{color} btn-sm">
                                            おじゃまする
                                        </button>
                                    </form>
                                </td>
                                <td align="center">
                                    <button type="button" class="btn btn-outline-dark bg-{color} btn-sm" data-bs-toggle="modal" data-bs-target="#modal1{{ $follow->followee_id }}">さよなら</button>
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
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">しない</button>
                                                    </div>
                                                    <div class="modal-footer"></div>
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