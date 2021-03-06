@extends('layouts.admin')
@section('title', 'オシカネ メモリートウコウ')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mx-auto">
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
                                    <label class="col-md-3">公演名</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="stage_name" value="{{ old('stage_name') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">アーティスト</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="artist" value="{{ old('artist') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">会場</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="place" value="{{ old('place') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">チケット</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="stage" value="{{ old('stage') }}">
                                    </div>
                                </div>
                                <div class="form group">
                                    <label class="col-md-3">メモ</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="stage_memo" rows="20">{{ old('stage_memo') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">画像</label>
                                    <div class="col-md-6">
                                        <input type="file" class="form-control-file" name="stage_image">
                                    </div>
                                </div>
                                {{ csrf_field() }}
                                <br>
                                <div style="text-align: center;">
                                    <input type="submit" class="btn btn-outline-dark bg-{color} btn-lg" value="投　稿">
                                    <br><br>
                                </div>
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
                                    <label class="col-md-3">公演名</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="stage_name" value="{{ old('stage_name') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">アーティスト</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="artist" value="{{ old('artist') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">会場</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="place" value="{{ old('place') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">チケット</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="concert" value="{{ old('concert') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                   <label class="col-md-3">セットリスト</label>
                                   <div class="col-md-10">
                                        <label for="s_list_01">1.</label>
                                        <input type="text" class="form-control" name="s_list_01" value="{{ old('s_list_01') }}" placeholder="セットリスト1を入力">
                                    </div>
                                    <div class="col-md-10">
                                        <label for="s_list_02">2.</label>
                                        <input type="text" class="form-control" name="s_list_02" value="{{ old('s_list_02') }}" placeholder="セットリスト2を入力">
                                    </div>
                                    <div class="col-md-10">
                                        <label for="s_list_03">3.</label>
                                        <input type="text" class="form-control" name="s_list_03" value="{{ old('s_list_03') }}" placeholder="セットリスト3を入力">
                                    </div>
                                    <div class="col-md-10">
                                        <label for="s_list_04">4.</label>
                                        <input type="text" class="form-control" name="s_list_04" value="{{ old('s_list_04') }}" placeholder="セットリスト4を入力">
                                    </div>
                                    <div class="col-md-10">
                                        <label for="s_list_05">5.</label>
                                        <input type="text" class="form-control" name="s_list_05" value="{{ old('s_list_05') }}" placeholder="セットリスト5を入力">
                                    </div>
                                    <div class="col-md-10">
                                        <label for="s_list_06">6.</label>
                                        <input type="text" class="form-control" name="s_list_06" value="{{ old('s_list_06') }}" placeholder="セットリスト6を入力">
                                    </div>
                                    <div class="col-md-10">
                                        <label for="s_list_07">7.</label>
                                        <input type="text" class="form-control" name="s_list_07" value="{{ old('s_list_07') }}" placeholder="セットリスト7を入力">
                                    </div>
                                    <div class="col-md-10">
                                        <label for="s_list_08">8.</label>
                                        <input type="text" class="form-control" name="s_list_08" value="{{ old('s_list_08') }}" placeholder="セットリスト8を入力">
                                    </div>
                                    <div class="col-md-10">
                                        <label for="s_list_09">9.</label>
                                        <input type="text" class="form-control" name="s_list_09" value="{{ old('s_list_09') }}" placeholder="セットリスト9を入力">
                                    </div>
                                    <div class="col-md-10">
                                        <label for="s_list_10">10.</label>
                                        <input type="text" class="form-control" name="s_list_10" value="{{ old('s_list_10') }}" placeholder="セットリスト10を入力">
                                    </div>
                                </div>
                                <div class="form group">
                                    <label class="col-md-3">メモ</label>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="stage_memo" rows="20">{{ old('stage_memo') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3">画像</label>
                                    <div class="col-md-6">
                                        <input type="file" class="form-control-file" name="stage_image">
                                    </div>
                               </div>
                               {{ csrf_field() }}
                               <br>
                               <div style="text-align: center;">
                                    <input type="submit" class="btn btn-outline-dark bg-{color} btn-lg" value="投　稿">
                                    <br><br>
                                </div>
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

