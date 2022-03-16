@extends('layouts.admin')
@section('title', 'オシカネ ヨサンヘンシュウ')
@section('header_sub')
    
@endsection
@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mx-auto">
                    <h2>予算・カテゴリ予算の編集</h2>
                    <form action="{{ action('Admin\BudgetController@update') }}" method="post" name="budget_form" id="budget_form" enctype="multipart/form-data">
                        @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                        @endif
                        <div class="box_yo">
                            <div class="form-group">
                                <label class="col-md-3">総予算</label>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="total_budget" id="total_budget" value="{{ $budget_form->total_budget }}">
                                    </div>
                                    <div class="col-md-2 d-flex align-items-center">円</div>
                                </div>
                            </div>
                            <br>
                            <label class="col-md-4">カテゴリ別 予算</label>
                            <br><br>
                            <div class="form-group row">
                                <label class="col-md-3">演劇</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="stage" id="stage"  value="{{ $budget_form->stage }}">
                                </div>
                                <div class="col-md-2 d-flex align-items-center">円</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">コンサート</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="concert" id="concert"  value="{{ $budget_form->concert }}">
                                </div>
                                <div class="col-md-2 d-flex align-items-center">円</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">配信</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="web" id="web"  value="{{ $budget_form->web }}">
                                </div>
                                <div class="col-md-2 d-flex align-items-center">円</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">映画</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="movie" id="movie"  value="{{ $budget_form->movie }}">
                                </div>
                                <div class="col-md-2 d-flex align-items-center">円</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">CD</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="cd" id="cd"  value="{{ $budget_form->cd }}">
                                </div>
                                <div class="col-md-2 d-flex align-items-center">円</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">DVD</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="dvd" id="dvd"  value="{{ $budget_form->dvd }}">
                                </div>
                                <div class="col-md-2 d-flex align-items-center">円</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">雑誌</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="magazine" id="magazine"  value="{{ $budget_form->magazine }}">
                                </div>
                                <div class="col-md-2 d-flex align-items-center">円</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">交通費</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="train" id="train"  value="{{ $budget_form->train }}">
                                </div>
                                <div class="col-md-2 d-flex align-items-center">円</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">宿泊費</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="travel" id="travel"  value="{{ $budget_form->travel }}">
                                </div>
                                <div class="col-md-2 d-flex align-items-center">円</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">ガチャ</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="toy" id="toy"  value="{{ $budget_form->toy }}">
                                </div>
                                <div class="col-md-2 d-flex align-items-center">円</div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3">その他</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="others" id="others"  value="{{ $budget_form->others }}">
                                </div>
                                <div class="col-md-2 d-flex align-items-center">円</div>
                            </div>
                            <br>
                            <div style="text-align: center;">
                                <input type="hidden" name="id" value="{{ $budget_form->id }}">
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                {{ csrf_field() }}
                                <input type="submit" id="submit-btn" class="btn btn-outline-dark bg-{color} btn-sm" value="編　集">
                            </div>
                            
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
            } else {
                return $('#budget_form').submit();
            }
        });
    });
    </script>
@endsection
