@extends('layouts.admin')
@section('title', 'オシカネ メモリー投稿')
@section('header_sub')
    <li class="nav-item"><a class="nav-link" aria-current="page" href="{{ action('Admin\MemoryController@add') }}">メモリー<br>投稿</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ action('Admin\MemoryController@index') }}">メモリー<br>一覧</a></li>
@endsection
@section('content')
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto">
                <h2>メモリー投稿</h2>
                <!-- タブ部分 -->
                <ul id="myTab" class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button type="button"  class="nav-link active" data-bs-toggle="tab" data-bs-target="#stage" role="tab" aria-controls="stage" aria-selected="true">演劇</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button type="button"  class="nav-link" data-bs-toggle="tab" data-bs-target="#concert" role="tab" aria-controls="concert" aria-selected="false">コンサート</button>
                    </li>
                </ul>
                <!-- パネル部分 -->
                <div id="myTabContent" class="tab-content">
                    <div id="stage" class="tab-pane active" role="tabpanel" aria-labelledby="stage-tab">
                        <div class="box_me_c">
                            <form action="{{ action('Admin\MemoryController@create') }}" method="post" enctype="multipart/form-data">
                                @if (count($errors) > 0)
                                <ul>
                                    @foreach($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                                @endif
                                <div class="form-group">
                                    <label class="col-2">公演名</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" name="stage_name" value="{{ old('stage_name') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-2">アーティスト</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" name="artist" value="{{ old('artist') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-2">会場</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" name="place" value="{{ old('place') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-2">チケット</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" name="ticket" value="{{ old('ticket') }}">
                                    </div>
                                </div>
                                <div class="form group">
                                    <label class="col-2">メモ</label>
                                    <div class="col-10">
                                        <textarea class="form-control" name="stage_memo" rows="20">{{ old('stage_memo') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-2">画像</label>
                                    <div class="col-6">
                                        <input type="file" class="form-control-file" name="stage_image">
                                    </div>
                                </div>
                                {{ csrf_field() }}
                                <br>
                                <div style="text-align: center;">
                                    <input type="submit" class="btn btn-outline-dark bg-{color} btn-lg" value="投　稿">
                                    <br><br>
                                </div>
                                <input type="hidden" name="event" value="stage">
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            </form>
                        </div>
                    </div>
                    <div id="concert" class="tab-pane" role="tabpanel" aria-labelledby="concert-tab">
                        <div class="box_me_c">
                            <form action="{{ action('Admin\MemoryController@create') }}" method="post" enctype="multipart/form-data">
                            @if (count($errors) > 0)
                                <ul>
                                    @foreach($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="form-group">
                                <label class="col-2">公演名</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" name="stage_name" value="{{ old('stage_name') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-2">アーティスト</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" name="artist" value="{{ old('artist') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-2">会場</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" name="place" value="{{ old('place') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-2">チケット</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" name="ticket" value="{{ old('ticket') }}">
                                </div>
                            </div>
                                <div class="form-group">
                                    <label class="col-2">セットリスト</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" name="s_list_01" value="{{ old('s_list_01') }}" placeholder="曲名を入力">
                                    </div>
                                    <div class="col-10">
                                        <input type="text" class="form-control" name="s_list_02" value="{{ old('s_list_02') }}"　placeholder="曲名を入力">
                                    </div>
                                    <div class="col-10">
                                        <input type="text" class="form-control" name="s_list_03" value="{{ old('s_list_03') }}"　placeholder="曲名を入力">
                                    </div>
                                        <div class="col-10">
                                            <input type="text" class="form-control" name="s_list_04" value="{{ old('s_list_04') }}"　placeholder="曲名を入力">
                                        </div>
                                        <div class="col-10">
                                            <input type="text" class="form-control" name="s_list_05" value="{{ old('s_list_05') }}"　placeholder="曲名を入力">
                                        </div>
                                        <div class="col-10">
                                            <input type="text" class="form-control" name="s_list_06" value="{{ old('s_list_06') }}"　placeholder="曲名を入力">
                                        </div>
                                        <div class="col-10">
                                            <input type="text" class="form-control" name="s_list_07" value="{{ old('s_list_07') }}"　placeholder="曲名を入力">
                                        </div>
                                        <div class="col-10">
                                            <input type="text" class="form-control" name="s_list_08" value="{{ old('s_list_08') }}"　placeholder="曲名を入力">
                                        </div>
                                        <div class="col-10">
                                            <input type="text" class="form-control" name="s_list_09" value="{{ old('s_list_09') }}"　placeholder="曲名を入力">
                                        </div>
                                        <div class="col-10">
                                            <input type="text" class="form-control" name="s_list_10" value="{{ old('s_list_10') }}"　placeholder="曲名を入力">
                                        </div>
                                    </div>
                                    <div class="form group">
                                        <label class="col-2">メモ</label>
                                        <div class="col-10">
                                            <textarea class="form-control" name="stage_memo" rows="20">{{ old('stage_memo') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-2">画像</label>
                                        <div class="col-6">
                                            <input type="file" class="form-control-file" name="stage_image">
                                        </div>
                                    </div>
                                    {{ csrf_field() }}
                                    <br>
                                    <div style="text-align: center;">
                                        <input type="submit" class="btn btn-outline-dark bg-{color} btn-lg" value="投　稿">
                                    <br><br>
                                    </div>
                                    <input type="hidden" name="event" value="concert">
                                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

