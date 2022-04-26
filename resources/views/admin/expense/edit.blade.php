@extends('layouts.admin')
@section('title', 'オシカネ シシュツヘンシュウ')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mx-auto">
                <h2>支出の編集</h2>
                    <form action="{{ action('Admin\ExpenseController@update') }}" method="post" name="expense_form" id="expense_form" enctype="multipart/form-data">
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
                                    <input type="date" name="paid_at" value="{{ $expense_form->paid_at->format('Y-m-d') }}"/>
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="col-md-3">推し</label>
                                <div class="form-group col-md-3">
                                    <select class="form-control" name="oshi_id" id="oshi_id">
                                        <option value="{{ $expense_form->oshi_id }}">
                                            {{ $expense_form->oshi->oshi_name }}
                                        </option>
                                            @foreach($oshis as $oshi)
                                                <option value="{{ $oshi->id }}" @if(old('oshi_name')=='oshi_name')selected @endif>{{ $oshi->oshi_name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="col">カテゴリ</label>
                                <lavel class="col">金額</lavel>
                                <lavel class="col">メモ</lavel>
                            </div>
                            <br>
                            <div class="form-row">
                                <label class="col-md-3">演劇</label>
                                <div class="form-group col-md-3">
                                    <input type="text" class="cat form-control" name="stage" value="{{ $expense_form->stage }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="stage_memo" value="{{ $expense_form->stage_memo }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="col-md-3">コンサート</label>
                                <div class="form-group col-md-3">
                                    <input type="text" class="cat form-control" name="concert" value="{{ $expense_form->concert }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="concert_memo" value="{{ $expense_form->concert_memo }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="col-md-3">配信</label>
                                <div class="form-group col-md-3">
                                    <input type="text" class="cat form-control" name="web" value="{{ $expense_form->web }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="web_memo" value="{{ $expense_form->web_memo }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="col-md-3">映画</label>
                                <div class="form-group col-md-3">
                                    <input type="text" class="cat form-control" name="movie" value="{{ $expense_form->movie }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="movie_memo" value="{{ $expense_form->movie_memo }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="col-md-3">CD</label>
                                <div class="form-group col-md-3">
                                    <input type="text" class="cat form-control" name="cd" value="{{ $expense_form->cd }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="cd_memo" value="{{ $expense_form->cd_memo }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="col-md-3">DVD</label>
                                <div class="form-group col-md-3">
                                    <input type="text" class="cat form-control" name="dvd" value="{{ $expense_form->dvd }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="dvd_memo" value="{{ $expense_form->dvd_memo }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="col-md-3">雑誌</label>
                                <div class="form-group col-md-3">
                                    <input type="text" class="cat form-control" name="magazine" value="{{ $expense_form->magazine }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="magazine_memo" value="{{ $expense_form->magazine_memo }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="col-md-3">交通費</label>
                                <div class="form-group col-md-3">
                                    <input type="text" class="cat form-control" name="train" value="{{ $expense_form->train }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="train_memo" value="{{ $expense_form->train_memo }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="col-md-3">宿泊費</label>
                                <div class="form-group col-md-3">
                                    <input type="text" class="cat form-control" name="travel" value="{{ $expense_form->travel }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="travel_memo" value="{{ $expense_form->travel_memo }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="col-md-3">ガチャ</label>
                                <div class="form-group col-md-3">
                                    <input type="text" class="cat form-control" name="toy" value="{{ $expense_form->toy }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="toy_memo" value="{{ $expense_form->toy_memo }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <label class="col-md-3">その他</label>
                                <div class="form-group col-md-3">
                                    <input type="text" class="cat form-control" name="others" value="{{ $expense_form->others }}">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="others_memo" value="{{ $expense_form->others_memo }}">
                                </div>
                            </div>
                            <br><br>
                            <h3>合計金額　　　<span id="total_sum_value"></span>　　　円</h3>
                            <br><br><br>
                            <input type="hidden" name="id" value="{{ $expense_form->id }}">
                            {{ csrf_field() }}
                            <div style="text-align: center;">
                                <input type="submit" class="btn btn-outline-dark bg-{color} btn-lg" value="編　集">
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
@section('footer')
    <div style="text-align: center;">
        <button type="button" class="btn btn-outline-dark bg-{color} btn-lg" onClick="history.back()">戻る</button>
    </div>
@endsection
