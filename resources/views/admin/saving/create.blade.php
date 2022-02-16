@extends('layouts.admin')
@section('title', 'オシカネ 貯金登録')
@section('header_sub')
    <li class="nav-item2"><a class="nav-link" aria-current="page" href="{{ action('Admin\ExpenseController@add') }}">支出<br>登録</a></li>
    <li class="nav-item2"><a class="nav-link" aria-current="page" href="{{ action('Admin\SavingController@add') }}">貯金<br>登録</a></li>
    <li class="nav-item2"><a class="nav-link" href="{{ action('Admin\ExpenseController@index') }}">お金<br>一覧</a></li>
    <li class="nav-item2"><a class="nav-link" href="{{ action('Admin\BudgetController@add') }}">予算<br>登録</a></li>
@endsection
@section('content')
<hr>
<div class="container">
    <div class="row">
        <div class="col-10 mx-auto">
            <h2>推しへの貯金</h2>
            <div class="box_mo_c">
                <form action="{{ action('Admin\SavingController@create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <div class="form-row">
                        <label class="col-2">カテゴリ</label>
                        <lavel class="col-3" align="center">金額</lavel>
                        <lavel class="col-6" align="center">メモ</lavel>
                    </div>
                    <br>
                    <div class="form-row">
                        <label class="col-2">演劇</label>
                        <div class="form-group col-3">
                            <input type="text" class="form-control" name="stage">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" class="form-control" name="stage_memo">
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-2">コンサート</label>
                        <div class="form-group col-3">
                            <input type="text" class="form-control" name="concert">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" class="form-control" name="concert_memo">
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-2">配信</label>
                        <div class="form-group col-3">
                            <input type="text" class="form-control" name="web">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" class="form-control" name="web_memo">
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-2">映画</label>
                        <div class="form-group col-3">
                            <input type="text" class="form-control" name="movie">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" class="form-control" name="movie_memo">
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-2">CD</label>
                        <div class="form-group col-3">
                            <input type="text" class="form-control" name="cd">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" class="form-control" name="cd_memo">
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-2">DVD</label>
                        <div class="form-group col-3">
                            <input type="text" class="form-control" name="dvd">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" class="form-control" name="dvd_memo">
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-2">雑誌</label>
                        <div class="form-group col-3">
                            <input type="text" class="form-control" name="magazine">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" class="form-control" name="magazine_memo">
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-2">TV出演</label>
                        <div class="form-group col-3">
                            <input type="text" class="form-control" name="media">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" class="form-control" name="media_memo">
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-2">その他</label>
                        <div class="form-group col-3">
                            <input type="text" class="form-control" name="others">
                        </div>
                        <div class="form-group col-6">
                            <input type="text" class="form-control" name="others_memo">
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-2">日付</label>
                        <div class="form-group col-3">
                            <input name="stocked_at" type="date" />
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <label class="col-2">推し</label>
                        <select class="form-control" name="oshi_id" style="display: inline; width: 30%;">
                            <option>推しを選択 ▼</option>
                            @foreach($posts as $oshi)
                            <option value="{{ $oshi->id }}">{{ $oshi->oshi_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    {{ csrf_field() }}
                    <br>
                    <div style="text-align: center;">
                        <input type="submit" class="btn btn-outline-dark bg-{color} btn-lg" value="登　録">
                        <br><br>
                    </div>
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
