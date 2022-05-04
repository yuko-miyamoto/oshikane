@extends('layouts.admin')
@section('title', 'オシカネ　ユーザーページ')
@section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 mx-auto">
                    <div class="box_me_v">
                        <div class="row row-cols-auto align-items-center">
                            
                            <div class="col">
                                <img src="{{ asset('/storage/images/hito.png') }}" width="50" height="50">
                            </div>
                            <div class="col">
                                <h2>
                                    {{ $users->nickname }}
                                </h2>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-outline-dark bg-{color} btn-sm" data-bs-toggle="modal" data-bs-target="#modal1{{ $users->id }}">
                                    @if(in_array($users->id, $followee))
                                        フォロー中
                                        @else
                                        フォロー
                                    @endif
                                </button>
                                <div class="modal fade" id="modal1{{ $users->id }}" tabindex="-1" aria-labelledby="modal1label{{ $users->id }}">
                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modal1label{{ $users->id }}">
                                                    推しともになる？
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                @if(in_array($users->id, $followee))
                                                <a class="btn btn-outline-info bg-{color}" href="{{ action('Admin\FollowerController@delete', ['id' => $users->id]) }}" role="botton">
                                                    ともだち解除
                                                </a>
                                                @else
                                                <form action="{{ action('Admin\FollowerController@store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="followee_id" value="{{ $users->id }}">
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
                        </div>
                    </div>
                    <div class="box">
                        <div class="row align-items-center justify-content-between">
                            <div class="col">
                                <h2>
                                    {{ $users->nickname }}の推し
                                </h2>
                            </div>
                            <div class="col justify-content-end">
                                <form action="{{ action('Admin\OshiController@index') }}" method="get">
                                    <input type="hidden" name="user_id" value="{{ $users->id }}">
                                    <div class="d-grid gap-2 d-md-block"><div class="d-grid gap-2 d-md-block">
                                        <button type="submit" class="btn btn-outline-dark bg-{color}">
                                            推し一覧
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @foreach($users->oshis as $oshi)
                        <div class="image" align="center">
                            <img src="/storage/image/{{$oshi->image_path}}" class="img-fluid rounded mx-auto d-block">
                        </div>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        なまえ
                                    </th>
                                    <td>
                                        {{ \Str::limit($oshi->oshi_name, 20) }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        めも
                                    </th>
                                    <td>
                                        {{ \Str::limit($oshi->oshi_memo, 100) }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @endforeach
                    </div>
                    <div class="box_ma">
                        <div class="row align-items-center justify-content-between">
                            <div class="col">
                                <h2>
                                    {{ $users->nickname }}のメモリー
                                </h2>
                            </div>
                            <div class="col justify-content-end">
                                <form action="{{ action('Admin\MemoryController@index') }}" method="get">
                                    <input type="hidden" name="user_id" value="{{ $users->id }}">
                                    <div class="d-grid gap-2 d-md-block"><div class="d-grid gap-2 d-md-block">
                                        <button type="submit" class="btn btn-outline-dark bg-{color}">
                                            メモリー一覧
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-3 g-2">
                            @foreach($users->memories as $memory)
                            <div class="col">
                                <div class="card">
                                    <img src="/storage/image/{{$memory->image_path}}" class="card-img-top" alt="card-grid-image">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            {{ \Str::limit($memory->stage_name, 20) }}
                                        </h5>
                                        <p class="card-text">
                                            {{ \Str::limit($memory->artist, 20) }}
                                        </p>
                                        <p class="card-text">
                                            {{ \Str::limit($memory->stage_memo, 100) }}
                                        </p>
                                        <p class="card-text">
                                            <br>
                                        </p>
                                        <p class="card-text">
                                            <form action="{{ action('Admin\MemoryController@index') }}" method="get">
                                                <input type="hidden" name="user_id" value="{{ $memory->user->id }}">
                                                <input type="hidden" name="id" value="{{ $memory->id }}">
                                                <button type="submit" id="heart" style="position: absolute; right: 10px; bottom: 10px">
                                                    <img src="{{ asset('/storage/images/memo.png') }}" width="30" height="30">
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
                    <div class="box_mo_c">
                        <div class="wrap-chart">
                            <div class="chart-container_expenseChart" style="position: relative; width: 100%; height: 95%;">
                                <canvas id="expenseChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="box_mo_c">
                        <div class="wrap-chart">
                            <div class="chart-container_savingCart" style="position: relative; width: 100%; height: 95%;">
                                <canvas id="savingCart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection