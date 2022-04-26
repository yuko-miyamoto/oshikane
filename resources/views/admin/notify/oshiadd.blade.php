@extends('layouts.admin')
@section('title', 'オシカネ オシフキョウ')
@section('content')
    <div class="container">
        <div class="row　 justify-content-center">
            <div class="col-md-12 mx-auto">
                <h2>推し布教 -テンプレ- </h2>
                <form action="{{ action('Admin\NotifyController@oshiadd') }}" method="post" enctype="multipart/form-data">
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
                            <label class="col-md-4">
                                ①布教する推し
                            </label>
                            <div class="col-md-10">
                                <select  class="form-control" name="id" style="display: inline; width: 30%;">
                                    <option value="{{ $oshi->id }}">
                                        {{ $oshi->oshi_name }}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4">
                                ②推しの歴史
                            </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="text_history" value="{{ old('text_history') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4">
                                ③いち推しなところ
                            </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="text_point" value="{{ old('text_point') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4">
                                ④推しの導入方法
                            </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="text_input" value="{{ old('text_input') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4">
                                ⑤推しの近況
                            </label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" name="text_now" value="{{ old('text_now') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10">
                                {{ csrf_field() }}
                                <div style="text-align: center;">
                                    <input type="submit" class="btn btn-outline-dark bg-{color} btn-lg" value="作　成">
                                    <br><br>
                                </div>
                            </div>
                        </div><br>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

