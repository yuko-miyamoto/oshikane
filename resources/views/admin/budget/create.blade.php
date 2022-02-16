@extends('layouts.admin')
@section('title', 'オシカネ 予算登録')
@section('header_sub')
    <li class="nav-item"><a class="nav-link" aria-current="page" href="{{ action('Admin\ExpenseController@add') }}">支出<br>登録</a></li>
    <li class="nav-item"><a class="nav-link" aria-current="page" href="{{ action('Admin\SavingController@add') }}">貯金<br>登録</a></li>
    <li class="nav-item"><a class="nav-link" aria-current="page" href="{{ action('Admin\ExpenseController@index') }}">お金<br>一覧</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ action('Admin\BudgetController@add') }}">予算<br>登録</a></li>
@endsection
@section('content')
    <hr>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 mx-auto">
                    <h2>予算・カテゴリ予算の登録</h2>
                    <form action="{{ action('Admin\BudgetController@create') }}" method="post" enctype="multipart/form-data">
                        @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                        @endif
                        <div class="box_yo">
                            <div class="form-group">
                                <label class="col-md-2">総予算</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="total_budget">
                                </div>
                            </div>
                            <br>
                            <label class="col-md-2">カテゴリ別 予算</label>
                            <br><br>
                            <div class="form-group row">
                                <label class="col-md-2">演劇</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="stage">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">コンサート</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="concert">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">配信</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="web">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">映画</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="movie">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">CD</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="cd">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">DVD</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="dvd">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">雑誌</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="magazine">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">交通費</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="train">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">宿泊費</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="travel">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">ガチャ</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="toy">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2">その他</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="others">
                                </div>
                            </div>
                            {{ csrf_field() }}
                            <br>
                            <div style="text-align: center;">
                                <input type="submit" id="submit-btn" class="btn btn-outline-dark bg-{color} btn-sm" value="登　録">
                            </div>
                                <br><br>
                                <input type="button" id="test" value="Exec">
                            </div>
                        </div>
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script language="javascript" type="text/javascript">
        document.getElementById("test").onclick = function() {
            target = document.getElementById("test");
            target.disabled = false;
        }
    </script>
@endsection
