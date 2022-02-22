@extends('layouts.admin')
@section('title', 'オシカネ メモリー記事')
@section('header_sub')
    <li class="nav-item2"><a class="nav-link" aria-current="page" href="{{ action('Admin\MemoryController@add') }}">メモリー<br>投稿</a></li>
    <li class="nav-item2"><a class="nav-link" href="{{ action('Admin\MemoryController@index') }}">メモリー<br>一覧</a></li>
@endsection
@section('content')
    <hr>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 mx-auto">
                @if(isset($memory_id))
                <h2>{{ $detail }}</h2>
                @else(is_null($cond_title))
                <h2>{{ $index }}</h2>
                @endif
                <div class="form-group row" align="right">
                    <form action="{{ action('Admin\MemoryController@index') }}" method="get">
                        <input type="text" class="form-control_search" name="cond_title" value="{{ $cond_title }}" placeholder="アーティスト名,場所">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-outline-dark bg-{color}" value="検索">
                    </form>
                </div>
                @foreach($memories as $memory)
                <div class="box_me_v">
                    @if (Auth::check() && Auth::user()->id === $memory->user_id)
                    <div align="right">
                        <a href="{{ action('Admin\MemoryController@edit', ['id' => $memory->id]) }}">編集</a>
                        <a href="{{ action('Admin\MemoryController@delete', ['id' => $memory->id]) }}">削除</a>
                    </div>
                    @endif
                    <h2 class="m_title">{{ $memory->stage_name }}</h2>
                    投稿者: {{ $memory->user->name }}
                    <div class="image" align="center">
                        @if($memory->image_path == null)
                        <img src="/storage/noimage.png" class="rounded mx-auto d-block">
                        @else
                        <img src="/storage/image/{{ $memory->image_path }}" class="img-fluid rounded mx-auto d-block">
                        @endif
                    </div>
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th scope="row">公演名</th>
                                <td>{{ \Str::limit($memory->stage_name, 40) }}</td>
                            </tr>
                            <tr>
                                <th scope="row">出演者</th>
                                <td>{{ \Str::limit($memory->artist, 20) }}</td>
                            </tr>
                            <tr>
                                <th scope="row">会場</th>
                                <td>{{ \Str::limit($memory->place, 20) }}</td>
                            </tr>
                            @if($memory->stage != null )
                            <tr>
                                <th scope="row">チケット</th>
                                <td>{{ \Str::limit($memory->stage, 20) }}円</td>
                            </tr>
                            @endif
                            @if($memory->concert != null )
                            <tr>
                                <th scope="row">チケット</th>
                                <td>{{ \Str::limit($memory->concert, 20) }}円</td>
                            </tr>
                            @endif
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
    </div>
@endsection