@extends('layouts.admin')
@section('title', 'オシカネ シシュツトウロク')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mx-auto">
            <h2>支出の登録</h2>
                <form action="{{ action('Admin\ExpenseController@create') }}" method="post" name="expense_form" id="expense_form" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="box_mo_c">
                        <div class="form-row">
                            <label class="col-md-3" for="date">日付</label>
                            <div class="form-group col-md-3">
                                <input type="date" name="paid_at" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-md-3">推し</label>
                            <div class="form-group col-md-3">
                                <select class="form-control" name="oshi_id" id="oshi_id">
                                    @if(!empty($oshis))
                                        <option value="">推しを選択</option>
                                        @foreach($oshis as $oshi)
                                            <option value="{{ $oshi->id }}" @if(old('oshi_name')=='oshi_name')selected @endif>{{ $oshi->oshi_name}}</option>
                                        @endforeach
                                    @else
                                        <option value="">推しを登録してください。</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col">カテゴリ</label>
                        </div>
                        <div class="row">
                            <lavel class="col-md-6" style="text-align:center;">金額</lavel>
                            <lavel class="col-md-6" style="text-align:center;">メモ</lavel>
                        </div>
                        <div class="form-row">
                            <label class="col-md-3">演劇</label>
                            <div class="form-group col-md-3">
                                <input type="text" class="cat form-control" name="stage" value="{{ old('stage') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="stage_memo" value="{{ old('stage_memo') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-md-3">コンサート</label>
                            <div class="form-group col-md-3">
                                <input type="text" class="cat form-control" name="concert" value="{{ old('concert') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="concert_memo" value="{{ old('concert_memo') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-md-3">配信</label>
                            <div class="form-group col-md-3">
                                <input type="text" class="cat form-control" name="web" value="{{ old('web') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="web_memo" value="{{ old('web_memo') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-md-3">映画</label>
                            <div class="form-group col-md-3">
                                <input type="text" class="cat form-control" name="movie" value="{{ old('movie') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="movie_memo" value="{{ old('movie_memo') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-md-3">CD</label>
                            <div class="form-group col-md-3">
                                <input type="text" class="cat form-control" name="cd" value="{{ old('cd') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="cd_memo" value="{{ old('cd_memo') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-md-3">DVD</label>
                            <div class="form-group col-md-3">
                                <input type="text" class="cat form-control" name="dvd" value="{{ old('dvd') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="dvd_memo" value="{{ old('dvd_memo') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-md-3">雑誌</label>
                            <div class="form-group col-md-3">
                                <input type="text" class="cat form-control" name="magazine" value="{{ old('magazine') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="magazine_memo" value="{{ old('magazine_memo') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-md-3">交通費</label>
                            <div class="form-group col-md-3">
                                <input type="text" class="cat form-control" name="train" value="{{ old('train') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="train_memo" value="{{ old('train_memo') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-md-3">宿泊費</label>
                            <div class="form-group col-md-3">
                                <input type="text" class="cat form-control" name="travel" value="{{ old('travel') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="travel_memo" value="{{ old('travel_memo') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-md-3">ガチャ</label>
                            <div class="form-group col-md-3">
                                <input type="text" class="cat form-control" name="toy" value="{{ old('toy') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="toy_memo" value="{{ old('toy_memo') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <label class="col-md-3">その他</label>
                            <div class="form-group col-md-3">
                                <input type="text" class="cat form-control" name="others" value="{{ old('others') }}">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="others_memo" value="{{ old('others_memo') }}">
                            </div>
                        </div>
                        <br><br>
                        <h3>合計金額　　　<span id="total_sum_value"></span>　　　円</h3>
                        <br><br><br>
                        {{ csrf_field() }}
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
    <script>
        $(function() {
            $("#expense_form").on('input', ".cat", function() {
                let value = $(this).val();
                value = value
                .replace(/[０-９]/g, function(s) {
                return String.fromCharCode(s.charCodeAt(0) - 65248);
                })
                .replace(/[^0-9]/g, '');
                $(this).val(value);
            });
            $("#expense_form").on('input', ".cat", function() {
                let expense_sum = 0;
                console.log(expense_sum);
                $('#expense_form .cat').each(function () {
                    var get_value = $(this).val();
                    if( $.isNumeric(get_value)) {
                        expense_sum += parseFloat(get_value);
                    }
                });
                $('#total_sum_value').html(expense_sum);
            });
            $("#expense_form").submit(function() {
                const oshi_id = $('#oshi_id').val();
                if(oshi_id == "") {
                    alert('推しを選択してください。');
                    return false;
                }
            })
        })
    </script>
@endsection
