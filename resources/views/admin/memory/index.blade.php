@extends('layouts.admin')
@section('title', 'オシカネ メモリーイチラン')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mx-auto">
                @if(!empty($memory_id) && !empty($user_id))
                    <h2>{{ $detail }}</h2>
                @else
                    <h2>{{ $index }}</h2>
                @endif
                <div class="row">
                    <form action="{{ action('Admin\MemoryController@index') }}" method="get">
                        <div class="form-row justify-content-end">
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}" placeholder="アーティスト名,場所">
                                <input type="hidden" name="user_id" value="{{ $user_id }}">
                            </div>
                            <div class="col-md-2">
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-outline-dark bg-{color} btn-sm" value="検索">
                            </div>
                        </div>
                    </form>
                </div>
                @foreach($memories as $memory)
                    <div class="box_me_v">
                        @if (Auth::check() && Auth::user()->id === $memory->user_id)
                            <div align="right">
                                <a href="{{ action('Admin\MemoryController@edit', ['id' => $memory->id]) }}">
                                    編集
                                </a>
                                <a href="{{ action('Admin\MemoryController@delete', ['id' => $memory->id]) }}">
                                    削除
                                </a>
                            </div>
                        @endif
                        <h2 class="m_title">
                            {{ $memory->stage_name }}
                        </h2>
                        <div class="row row-cols-auto align-items-center">
                            <div class="col">
                                @if(Auth::check() && Auth::user()->id === $memory->user_id)
                                    <div class="profile_icon_memory">
                                        <img src="{{ $memory->user->profile_image_path }}">
                                    </div>
                                @else
                                    <div class="profile_icon_memory">
                                        <form action="{{ action('Admin\MainController@profile') }}" method="get">
                                            <input type="hidden" name="id" value="{{ $memory->user->id }}">
                                            <button type="submit" id="heart">
                                                <img src="{{ $memory->user->profile_image_path }}">
                                            </button>
                                        </form>    
                                    </div>
                                @endif
                            </div>
                            <div class="col">
                                <p>
                                    投稿者: {{ $memory->user->nickname }}
                                </p>
                            </div>
                            @if($memory->user->id != Auth::id() )
                                <div class="col">
                                    <button type="button" class="btn btn-outline-dark bg-{color} btn-sm" data-bs-toggle="modal" data-bs-target="#modal1{{ $memory->user->id }}">
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
                                </div>
                            @endif
                        </div>
                        <div class="image" align="center">
                            <img src="{{ $memory->image_path }}" class="img-fluid rounded mx-auto d-block">
                        </div>
                        <table class="memory_table">
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        公演名
                                    </th>
                                    <td>
                                        {{ \Str::limit($memory->stage_name, 30) }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        出演者
                                    </th>
                                    <td>
                                        {{ \Str::limit($memory->artist, 30) }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        会場
                                    </th>
                                    <td>
                                        {{ \Str::limit($memory->place, 20) }}
                                    </td>
                                </tr>
                                @if($memory->stage != null )
                                    <tr>
                                        <th scope="row">
                                            チケット
                                        </th>
                                        <td>
                                            {{ \Str::limit($memory->stage, 30) }}円
                                        </td>
                                    </tr>
                                @endif
                                @if($memory->concert != null )
                                    <tr>
                                        <th scope="row">
                                            チケット
                                        </th>
                                        <td>
                                            {{ \Str::limit($memory->concert, 30) }}円
                                        </td>
                                    </tr>
                                @endif
                                @if($memory->s_list_01 != null )
                                    <tr>
                                        <th scope="row">
                                            セットリスト
                                        </th>
                                        <td>
                                            1.{{ \str::limit($memory->s_list_01, 30) }}
                                        </td>
                                    </tr>
                                @endif
                                @if($memory->s_list_02 != null )
                                    <tr>
                                        <th>
                                            <td>
                                                2.{{ \str::limit($memory->s_list_02, 30) }}
                                            </td>
                                        </th>
                                    </tr>
                                @endif
                                @if($memory->s_list_03 != null )
                                    <tr>
                                        <th>
                                            <td>
                                                3.{{ \str::limit($memory->s_list_03, 30) }}
                                            </td>
                                        </th>
                                    </tr>
                                @endif
                                @if($memory->s_list_04 != null )
                                    <tr>
                                        <th>
                                            <td>
                                                4.{{ \str::limit($memory->s_list_04, 30) }}
                                            </td>
                                        </th>
                                    </tr>
                                @endif
                                @if($memory->s_list_05 != null )
                                    <tr>
                                        <th>
                                            <td>
                                                5.{{ \str::limit($memory->s_list_05, 30) }}
                                            </td>
                                        </th>
                                    </tr>
                                @endif
                                @if($memory->s_list_06 != null )
                                    <tr>
                                        <th>
                                            <td>
                                                6.{{ \str::limit($memory->s_list_06, 30) }}
                                            </td>
                                        </th>
                                    </tr>
                                @endif
                                @if($memory->s_list_07 != null )
                                    <tr>
                                        <th>
                                            <td>
                                                7.{{ \str::limit($memory->s_list_07, 30) }}
                                            </td>
                                        </th>
                                    </tr>
                                @endif
                                @if($memory->s_list_08 != null )
                                    <tr>
                                        <th>
                                            <td>
                                                8.{{ \str::limit($memory->s_list_08, 30) }}
                                            </td>
                                        </th>
                                    </tr>
                                @endif
                                @if($memory->s_list_09 != null )
                                    <tr>
                                        <th>
                                            <td>
                                                9.{{ \str::limit($memory->s_list_09, 30) }}
                                            </td>
                                        </th>
                                    </tr>
                                @endif
                                @if($memory->s_list_10 != null )
                                    <tr>
                                        <th>
                                            <td>
                                                10.{{ \str::limit($memory->s_list_10, 30) }}
                                            </td>
                                        </th>
                                    </tr>
                                @endif
                                <tr>
                                    <th>
                                        メモ
                                    </th>
                                    <td>
                                        {{ \Str::limit($memory->stage_memo, 255) }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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