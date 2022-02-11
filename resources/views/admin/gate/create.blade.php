@extends('layouts.admin')
@section('title', 'オシカネ 推し布教')
@section('header_sub')
    <li class="nav-item"><a class="nav-link" aria-current="page" href="{{ action('Admin\OshiController@add') }}">推し<br>登録</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ action('Admin\OshiController@index') }}">推し<br>一覧</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ action('Admin\GateController@add') }}">推し<br>布教</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ action('Admin\GateController@index') }}">布教<br>一覧</a></li>
@endsection
@section('content')
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto">
                <h2>推しを布教 -テンプレ- </h2>
                <form action="{{ action('Admin\GateController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <div class="box">
                        <h1 class="title" align="center">推しをプレゼンしたい!</h1>
                        <div class="form-group">
                            <label class="col-2">①</label>
                            <div class="col-10">
                                <select  class="form-control_02" name="id" style="display: inline; width: 30%;">
                                    <option>推しを選択する</option>
                                    @foreach($posts as $oshi)
                                    <option value="{{ $oshi->id }}">{{ $oshi->oshi_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form group">
                                <label class="col-2">② 推しの歴史など</label>
                                <div class="col-10">
                                    <textarea class="form-control" name="text_history" rows="6" cols="10">{{ old('text_history') }}</textarea>
                                </div>
                            </div>
                            <div class="form group">
                                <label class="col-2">③ いち推しなところ</label>
                                <div class="col-10">
                                    <textarea class="form-control" name="text_point" rows="6" cols="10">{{ old('text_point') }}</textarea>
                                </div>
                            </div>
                            <div class="form group">
                                <label class="col-2">④ 推しの導入方法</label>
                                <div class="col-10">
                                    <textarea class="form-control" name="text_input" rows="6" cols="10">{{ old('text_input') }}</textarea>
                                </div>
                            </div>
                            <div class="form group">
                                <label class="col-2">⑤ 推しの近況など</label>
                                <div class="col-10">
                                    <textarea class="form-control" name="text_now" rows="6" cols="10">{{ old('text_now') }}</textarea>
                                </div>
                            </div>
                            {{ csrf_field() }}
                            <br>
                            <div style="text-align: center;">
                                <input type="submit" class="btn btn-outline-dark bg-{color} btn-lg" value="作　成">
                                <br><br>
                            </div>
                        </div>
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

