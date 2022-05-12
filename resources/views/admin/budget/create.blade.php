@extends('layouts.admin')
@section('title', 'オシカネ ヨサントウロク')
@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mx-auto">
                    <h2>月の予算・カテゴリ予算の登録</h2>
                    <form action="{{ action('Admin\BudgetController@create') }}" method="post" name="budget_form" id="budget_form" enctype="multipart/form-data">
                        @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                        @endif
                        <div class="box_yo">
                            <div class="row">
                                <label class="col-md-3">総予算</label>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="total_budget" id="total_budget" value="{{ old('total_budget') }}">
                                </div>
                                <div class="col-md-2 d-flex align-items-center">円</div>
                            </div>
                            <div class="row">
                                <label class="col-md-4">カテゴリ別 予算</label>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label class="col-md-3">演劇</label>
                                <div class="col-md-4">
                                    <input type="text" class="cat form-control" name="stage" id="stage" value="{{ old('stage') }}">
                                </div>
                                <div class="col-md-2 d-flex align-items-center">円</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">コンサート</label>
                                <div class="col-md-4">
                                    <input type="text" class="cat form-control" name="concert" id="concert" value="{{ old('concert') }}">
                                </div>
                                <div class="col-md-2 d-flex align-items-center">円</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">配信</label>
                                <div class="col-md-4">
                                    <input type="text" class="cat form-control" name="web" id="web" value="{{ old('web') }}">
                                </div>
                                <div class="col-md-2 d-flex align-items-center">円</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">映画</label>
                                <div class="col-md-4">
                                    <input type="text" class="cat form-control" name="movie" id="movie" value="{{ old('movie') }}">
                                </div>
                                <div class="col-md-2 d-flex align-items-center">円</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">CD</label>
                                <div class="col-md-4">
                                    <input type="text" class="cat form-control" name="cd" id="cd" value="{{ old('cd') }}">
                                </div>
                                <div class="col-md-2 d-flex align-items-center">円</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">DVD</label>
                                <div class="col-md-4">
                                    <input type="text" class="cat form-control" name="dvd" id="dvd" value="{{ old('dvd') }}">
                                </div>
                                <div class="col-md-2 d-flex align-items-center">円</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">雑誌</label>
                                <div class="col-md-4">
                                    <input type="text" class="cat form-control" name="magazine" id="magazine" value="{{ old('magazine') }}">
                                </div>
                                <div class="col-md-2 d-flex align-items-center">円</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">交通費</label>
                                <div class="col-md-4">
                                    <input type="text" class="cat form-control" name="train" id="train" value="{{ old('train') }}">
                                </div>
                                <div class="col-md-2 d-flex align-items-center">円</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">宿泊費</label>
                                <div class="col-md-4">
                                    <input type="text" class="cat form-control" name="travel" id="travel" value="{{ old('travel') }}">
                                </div>
                                <div class="col-md-2 d-flex align-items-center">円</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">ガチャ</label>
                                <div class="col-md-4">
                                    <input type="text" class="cat form-control" name="toy" id="toy" value="{{ old('toy') }}">
                                </div>
                                <div class="col-md-2 d-flex align-items-center">円</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">その他</label>
                                <div class="col-md-4">
                                    <input type="text" class="cat form-control" name="others" id="others" value="{{ old('others') }}">
                                </div>
                                <div class="col-md-2 d-flex align-items-center">円</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">予算の登録年月</label>
                                <div class="col-md-3">
                                    <select  class="form-control" name="register_year">
                                        <option value="{{ $date->year }}">{{ $date->year }}年</option>
                                        
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control" name="register_month" id="register_month">
                                        @for ($i = 1; $i <= 12; $i++)
                                        <option value="{{ $i }}"@if(old('register_month') == $i) selected @endif>{{ $i }}月</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            {{ csrf_field() }}
                            <br>
                            <div style="text-align: center;">
                                <input type="submit" id="submit-btn" class="btn btn-outline-dark bg-{color} btn-lg" value="登　録">
                            </div>
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    $(function() {
        $("input[type='text']").on('input', function() {
            let value = $(this).val();
            value = value
            .replace(/[０-９]/g, function(s) {
            return String.fromCharCode(s.charCodeAt(0) - 65248);
            })
            .replace(/[^0-9]/g, '');
            $(this).val(value);
        });
        $('#budget_form').submit(function() {
            const register_month = $('#register_month').val();
            let month = 0;
            const check_month = @json($check_month);
            $.each(check_month, function(index, value) {
                month = value;
            });
            if(month == register_month){
                alert('選択した月の予算は既に登録されています。');
                return false;
            } else if(register_month < month) {
                alert('選択した月より前の月の予算は登録できません。');
                return false;
            }
            console.log(month);
            const sum = $(".cat").get().reduce((s, e) => +e.value + s, 0);
            if ($("input[name='total_budget']").val() == "") {
                alert('総予算が入力されていません。');
                console.log($("input[name='total_budget']").val());
                return false;
            } else if (Number($("input[name='total_budget']").val() ) < Number($("input[name='stage']").val() ) ) {
                alert('総予算を超えています。');
                return false;
            } else if (Number($("input[name='total_budget']").val() ) < Number($("input[name='concert']").val() ) ) {
                alert('総予算を超えています。');
                return false;
            } else if (Number($("input[name='total_budget']").val() ) < Number($("input[name='web']").val() ) ) {
                alert('総予算を超えています。');
                return false;
            } else if (Number($("input[name='total_budget']").val() ) < Number($("input[name='movie']").val() ) ) {
                alert('総予算を超えています。');
                return false;
            } else if (Number($("input[name='total_budget']").val() ) < Number($("input[name='cd']").val() ) ) {
                alert('総予算を超えています。');
                return false;
            } else if (Number($("input[name='total_budget']").val() ) < Number($("input[name='dvd']").val() ) ) {
                alert('総予算を超えています。');
                return false;
            } else if (Number($("input[name='total_budget']").val() ) < Number($("input[name='magazine']").val() ) ) {
                alert('総予算を超えています。');
                return false;
            } else if (Number($("input[name='total_budget']").val() ) < Number($("input[name='train']").val() )  ){
                alert('総予算を超えています。');
                return false;
            } else if (Number($("input[name='total_budget']").val() ) < Number($("input[name='travel']").val() ) ) {
                alert('総予算を超えています。');
                return false;
            } else if (Number($("input[name='total_budget']").val() ) < Number($("input[name='toy']").val() ) ) {
                alert('総予算を超えています。');
                return false;
            } else if (Number($("input[name='total_budget']").val() ) < Number($("input[name='others']").val() ) ) {
                alert('総予算を超えています。');
                return false;
            } else if (Number($("input[name='total_budget']").val() ) < sum ) {
                alert('カテゴリ予算の合計が総予算を超えています。');
                return false;
            } else {
                return $('#budget_form').submit();
            }
        });
    });
    </script>
@endsection
