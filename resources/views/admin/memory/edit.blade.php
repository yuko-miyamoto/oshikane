@extends('layouts.admin')
@section('title', 'オシカネ メモリーヘンシュウ')
@section('header_sub')
　　
@endsection
@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mx-auto">
                <h2>メモリー編集</h2>
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
                            <form action="{{ action('Admin\MemoryController@update') }}" method="post" enctype="multipart/form-data">
                                @if (count($errors) > 0)
                                <ul>
                                    @foreach($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                                @endif
                                <div class="form-group">
                                    <label class="col-md-3">公演名</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="stage_name" value="{{ $memory_form->stage_name }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">アーティスト</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="artist" value="{{ $memory_form->artist }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">会場</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="place" value="{{ $memory_form->place }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">チケット</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="ticket" value="{{ $memory_form->ticket }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">メモ</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="stage_memo" rows="20">{{ $memory_form->stage_memo }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">画像</label>
                                    <div class="col-md-6">
                                        <input type="file" class="form-control-file" name="stage_image">
                                        <div class="form-text text-info">
                                            設定中： {{ $memory_form->image_path }}
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="remove" value="true">画像削除
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-10">
                                        <input type="hidden" name="id" value="{{ $memory_form->id }}">
                                        {{ csrf_field() }}
                                        <div style="text-align: center;">
                                            <input type="submit" class="btn btn-outline-dark bg-{color} btn-lg" value="編　集">
                                            <br><br>
                                        </div>
                                    </div>
                                </div>
                                <br>
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
                                <label class="col-md-3">公演名</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="stage_name" value="{{ $memory_form->stage_name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3">アーティスト</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="artist" value="{{ $memory_form->artist }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3">会場</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="place" value="{{ $memory_form->place }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3">チケット</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="ticket" value="{{ $memory_form->ticket }}">
                                </div>
                            </div>
                                <div class="form-group">
                                    <label class="col-md-3">セットリスト</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="s_list_01" value="{{ $memory_form->s_list_01 }}" placeholder="曲名を入力">
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="s_list_02" value="{{ $memory_form->s_list_02 }}"　placeholder="曲名を入力">
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="s_list_03" value="{{ $memory_form->s_list_03 }}"　placeholder="曲名を入力">
                                    </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="s_list_04" value="{{ $memory_form->s_list_04 }}"　placeholder="曲名を入力">
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="s_list_05" value="{{ $memory_form->s_list_05 }}"　placeholder="曲名を入力">
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="s_list_06" value="{{ $memory_form->s_list_06 }}"　placeholder="曲名を入力">
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="s_list_07" value="{{ $memory_form->s_list_07 }}"　placeholder="曲名を入力">
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="s_list_08" value="{{ $memory_form->s_list_08 }}"　placeholder="曲名を入力">
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="s_list_09" value="{{ $memory_form->s_list_09 }}"　placeholder="曲名を入力">
                                        </div>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="s_list_10" value="{{ $memory_form->s_list_10 }}"　placeholder="曲名を入力">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3">メモ</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" name="stage_memo" rows="20">{{ $memory_form->stage_memo }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3">画像</label>
                                        <div class="col-md-6">
                                            <input type="file" class="form-control-file" name="stage_image">
                                            <div class="form-text text-info">
                                            設定中： {{ $memory_form->image_path }}
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="remove" value="true">画像削除
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-10">
                                        <input type="hidden" name="id" value="{{ $memory_form->id }}">
                                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                        {{ csrf_field() }}
                                        <div style="text-align: center;">
                                            <input type="submit" class="btn btn-outline-dark bg-{color} btn-lg" value="編　集">
                                        </div>
                                    </div>
                                    <br><br>
                                </div>
                                    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
