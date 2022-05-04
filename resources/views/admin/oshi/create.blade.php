@extends('layouts.admin')
@section('title', 'オシカネ オシトウコウ')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mx-auto">
                <h2>推しを登録</h2>
                <form action="{{ action('Admin\OshiController@create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="box">
                        <div class="form-group">
                            <label class="col-md-3">
                                名前
                            </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="oshi_name" value="{{ old('oshi_name') }}">
                            </div>
                        </div>
                        <label class="col-md-3">
                            生年月日
                        </label>
                        <div class="col-md-10">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <select  class="form-control" name="birthday_y">
                                        //for文を使用して西暦、月、日をループさせる
                                        @for ($i = 1980; $i <= 2005; $i++)
                                            <option value="{{ $i }}"@if(old('birthday_y') == $i) selected @endif>{{ $i }}年</option>
                                        @endfor
                                    </select>    
                                </div>
                                <div class="form-group col-md-3">
                                    <select class="form-control" name="birthday_m">
                                        @for ($i = 1; $i <= 12; $i++) {
                                            <option value="{{ $i }}"@if(old('birthday_m') == $i) selected @endif>{{ $i }}月</option>
                                        @endfor
                                    </select>    
                                </div>
                                <div class="form-group col-md-3">
                                    <select class="form-control" name="birthday_d">
                                        @for ($i = 1; $i <= 31; $i++)
                                            <option value="{{ $i }}"@if(old('birthday_d') == $i) selected @endif>{{ $i }}日</option>
                                        @endfor
                                    </select>    
                                </div>
                            </div>
                        </div>
                        <label class="col-md-3">
                            血液型
                        </label>
                        <div class="col-md-10">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <select class="form-control" name="blood">
                                        <option value="">選択▼</option>
                                        <option value="A" @if(old('A')=='A')selected @endif>A型</option>
                                        <option value="B" @if(old('B')=='B')selected @endif>B型</option>
                                        <option value="O" @if(old('O')=='O')selected @endif>O型</option>
                                        <option value="AB" @if(old('AB')=='AB')selected @endif>AB型</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">
                                身長
                            </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="oshi_height" value="{{ old('oshi_height') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">
                                体重
                            </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="oshi_weight" value="{{ old('oshi_weight') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">
                                グループ
                            </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="oshi_group" value="{{ old('oshi_group') }}">
                            </div>
                        </div>
                        <label class="col-md-3">
                            推し歴
                        </label>
                        <div class="col-md-10">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <select  class="form-control" name="history_y">
                                        @for ($i = 1990; $i <= 2022; $i++)
                                            <option value="{{ $i }}"@if(old('history_y') == $i) selected @endif>{{ $i }}年</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <select class="form-control" name="history_m">
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ $i }}"@if(old('history_m') == $i) selected @endif>{{ $i }}月</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <select class="form-control" name="history_d">
                                        @for ($i = 1; $i <= 31; $i++)
                                            <option value="{{ $i }}"@if(old('history_d') == $i) selected @endif>{{ $i }}日</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <label class="col-md-3">
                            愛情度
                        </label>
                        <div class="col-md-10">
                            <input type="number" id="tentacles" name="tentacles" step="10" min="10" max="100" placeholder="%" value="{{ old('tentacles')}}">
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">
                                メモ
                            </label>
                            <div class="col-md-10">
                                <textarea class="form-control" name="oshi_memo" rows="20">{{ old('oshi_memo') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">
                                画像
                            </label>
                            <div class="col-md-6">
                                <input type="file" class="form-control-file" name="oshi_image">
                            </div>
                        </div>
                        {{ csrf_field() }}
                        <br>
                        <div style="text-align: center;">
                            <input type="submit" class="btn btn-outline-dark bg-{color} btn-lg" value="推　す">
                        <br><br>
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                </form>
            </div>
        </div>
    </div>
@endsection

