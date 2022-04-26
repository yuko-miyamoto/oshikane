@extends('layouts.admin')
@section('title', 'オシカネ オシヘンシュウ')
@section('content')
    <div class="container">
        <div class="row  justify-content-center">
            <div class="col-md-12 mx-auto">
                <h2>推しなおし</h2>
                <form action="{{ action('Admin\OshiController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="box">
                        <div class="form-group">
                            <label class="col-md-3">名前</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="oshi_name" value="{{ $oshi_form->oshi_name }}">
                            </div>
                        </div>
                        <label class="col-md-3">生年月日</label><br>
                        <select  class="form-control" name="birthday_y" style="display: inline; width: 20%;">
                            @for ($i = 1980; $i <= 2005; $i++)
                                <option value="{{ $i }}"@if( $oshi_form->birthday_y) == $i) selected @endif>{{ $i }}年</option>
                            @endfor
                        </select>
                        <select class="form-control" name="birthday_m" style="display: inline; width: 20%;">
                            @for ($i = 1; $i <= 12; $i++) {
                                <option value="{{ $i }}"@if($oshi_form->birthday_m) == $i) selected @endif>{{ $i }}月</option>
                            @endfor
                        </select>
                        <select class="form-control" name="birthday_d" style="display: inline; width: 20%;">
                            @for ($i = 1; $i <= 31; $i++)
                                <option value="{{ $i }}"@if($oshi_form->birthday_d) == $i) selected @endif>{{ $i }}日</option>
                            @endfor
                        </select>
                        <br>
                        <label class="col-md-3">血液型</label><br>
                        <select class="form-control" name="blood" style="display: inline; width: 20%;">
                            <option value="{{ $oshi_form->blood }}">{{ $oshi_form->blood }}型</option>
                            <option value="A" @if(old('A')=='A')selected @endif>A型</option>
                            <option value="B" @if(old('B')=='B')selected @endif>B型</option>
                            <option value="O" @if(old('O')=='O')selected @endif>O型</option>
                            <option value="AB" @if(old('AB')=='AB')selected @endif>AB型</option>
                        </select>
                        <div class="form-group">
                            <label class="col-md-3">身長</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="oshi_height" value="{{ $oshi_form->oshi_height }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">体重</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="oshi_weight" value="{{ $oshi_form->oshi_weight }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">グループ</label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="oshi_group" value="{{ $oshi_form->oshi_group }}">
                            </div>
                        </div>
                        <label class="col-md-3">推し歴</label><br>
                        <select  class="form-control" name="history_y" style="display: inline; width: 20%;">
                            @for ($i = 1990; $i <= 2022; $i++)
                                <option value="{{ $i }}"@if($oshi_form->history_y) == $i) selected @endif>{{ $i }}年</option>
                            @endfor
                        </select>
                        <select class="form-control" name="history_m" style="display: inline; width: 20%;">
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}"@if($oshi_form->history_m) == $i) selected @endif>{{ $i }}月</option>
                            @endfor
                        </select>
                        <select class="form-control" name="history_d" style="display: inline; width: 20%;">
                            @for ($i = 1; $i <= 31; $i++)
                                <option value="{{ $i }}"@if($oshi_form->history_y) == $i) selected @endif>{{ $i }}日</option>
                            @endfor
                        </select>
                        <br>
                        <label class="col-md-3">愛情度</label>
                        <br>
                        <input type="number" id="tentacles" name="tentacles" step="10" min="10" max="100" placeholder="%" value="{{ $oshi_form->tentacles }}">
                        <div class="form-group">
                            <label class="col-md-3">メモ</label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="oshi_memo" rows="20">{{ $oshi_form->oshi_memo }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">画像</label>
                            <div class="col-6">
                                <input type="file" class="form-control-file" name="oshi_image">
                                <div class="form-text text-info">
                                    設定中: {{ $oshi_form->image_path }}
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
                                <input type="hidden" name="id" value="{{ $oshi_form->id }}">
                                {{ csrf_field() }}
                                <div style="text-align: center;">
                                    <input type="submit" class="btn btn-outline-dark bg-{color} btn-lg" value="推しなおし">
                                    <br><br>
                                </div>
                            </div>
                        </div><br>
                    </div>
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
               </form>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <div style="text-align: center;">
        <button type="button" class="btn btn-outline-dark bg-{color} btn-lg" onClick="history.back()">戻る</button>
    </div>
@endsection

