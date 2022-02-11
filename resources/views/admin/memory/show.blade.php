@extends('layouts.admin')
@section('title', 'オシカネ メモリー一覧')
@section('header_sub')
    <li class="nav-item"><a class="nav-link" aria-current="page" href="{{ action('Admin\MemoryController@add') }}">メモリー<br>投稿</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ action('Admin\MemoryController@index') }}">メモリー<br>一覧</a></li>
@endsection
@section('content')
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-6">
            <h2>メモリー一覧</h2>
            </div>
            <div class="col-6" align="right">
                <form action="{{ action('Admin\MainController@show') }}" method="get">
                    <input type="text" class="form-control_search" name="cond_title" value="{{ $cond_title }}" placeholder="アーティスト名,場所">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-outline-dark bg-{color}" value="検索">
                </form>
            </div>
            <br><br>
            @foreach($posts as $memory)
            <div class="box_me_v">
                <div align="right">
                    <a href="{{ action('Admin\MemoryController@edit', ['id' => $memory->id]) }}">編集</a>
                    <a href="{{ action('Admin\MemoryController@delete', ['id' => $memory->id]) }}">削除</a>
                </div>
                <h2 class="m_title">{{ $memory->stage_name }}</h2>
                <div class="image" align="center">
                    @if($memory->image_path == null)
                    <img src="/storage/noimage.png" class="rounded mx-auto d-block">
                    @else
                    <img src="/storage/image/{{ $memory->image_path }}" class="rounded mx-auto d-block">
                    @endif
                </div>
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th scope="row">公演名</th>
                            <td>{{ \Str::limit($memory->stage_name, 20) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">出演者</th>
                            <td>{{ \Str::limit($memory->artist, 20) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">会場</th>
                            <td>{{ \Str::limit($memory->place, 20) }}</td>
                        </tr>
                        <tr>
                            <th scope="row">チケット</th>
                            <td>{{ \Str::limit($memory->ticket, 20) }}円</td>
                        </tr>
                        @if($memory->s_list_01 != null )
                        <tr>
                            <th scope="row">セットリスト</th>
                                <td>1.{{ \str::limit($memory->s_list_01, 20) }}</td>
                        </tr>
                        @endif
                        @if($memory->s_list_02 != null )
                        <tr>
                            <th>
                                <td>2.{{ \str::limit($memory->s_list_02, 20) }}</td>
                            </th>
                        </tr>
                        @endif
                        @if($memory->s_list_03 != null )
                        <tr>
                            <th>
                                <td>3.{{ \str::limit($memory->s_list_03, 20) }}</td>
                            </th>
                        </tr>
                        @endif
                        @if($memory->s_list_04 != null )
                        <tr>
                            <th>
                                <td>4.{{ \str::limit($memory->s_list_04, 20) }}</td>
                            </th>
                        </tr>
                        @endif
                        @if($memory->s_list_05 != null )
                        <tr>
                            <th>
                                <td>5.{{ \str::limit($memory->s_list_05, 20) }}</td>
                            </th>
                        </tr>
                        @endif
                        @if($memory->s_list_06 != null )
                        <tr>
                            <th>
                                <td>6.{{ \str::limit($memory->s_list_06, 20) }}</td>
                            </th>
                        </tr>
                        @endif
                        @if($memory->s_list_07 != null )
                        <tr>
                            <th>
                                <td>7.{{ \str::limit($memory->s_list_07, 20) }}</td>
                            </th>
                        </tr>
                        @endif
                        @if($memory->s_list_08 != null )
                        <tr>
                            <th>
                                <td>8.{{ \str::limit($memory->s_list_08, 20) }}</td>
                            </th>
                        </tr>
                        @endif
                        @if($memory->s_list_09 != null )
                        <tr>
                            <th>
                                <td>9.{{ \str::limit($memory->s_list_09, 20) }}</td>
                            </th>
                        </tr>
                        @endif
                        @if($memory->s_list_10 != null )
                        <tr>
                            <th>
                                <td>10.{{ \str::limit($memory->s_list_10, 20) }}</td>
                            </th>
                        </tr>
                        @endif
                        <tr>
                            <th>メモ</th>
                                <td>{{ \Str::limit($memory->stage_memo, 200) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @endforeach
        </div>
    </div>
@endsection