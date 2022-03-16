@extends('layouts.admin')
@section('title', 'オシカネ シシュツトウロク')
@section('header_sub')
    
@endsection
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mx-auto">
            <h2>支出の登録</h2>
                <form action="{{ action('Admin\ExpenseController@create') }}" method="post" oninput="result.value = Number(stage.value) + Number(concert.value) + Number(web.value) + Number(movie.value) + Number(cd.value) + Number(dvd.value) + Number(magazine.value) + Number(train.value) + Number(travel.value) + Number(toy.value) + Number(others.value);" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                        @endforeach
                        </ul>
                    @endif
                    <div class="box_mo_c">
                        <div class="form-row">
                        <label class="col">カテゴリ</label>
                        <lavel class="col">金額</lavel>
                        <lavel class="col">メモ</lavel>
                    </div>
                    <br>
                    <div class="form-row">
                        <label class="col-md-3">演劇</label>
                        <div class="form-group col-md-3">
                            <input type="number" class="form-control" name="stage" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="stage_memo">
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-md-3">コンサート</label>
                        <div class="form-group col-md-3">
                            <input type="number" class="form-control" name="concert" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="concert_memo">
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-md-3">配信</label>
                        <div class="form-group col-md-3">
                            <input type="number" class="form-control" name="web" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="web_memo">
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-md-3">映画</label>
                        <div class="form-group col-md-3">
                            <input type="number" class="form-control" name="movie" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="movie_memo">
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-md-3">CD</label>
                        <div class="form-group col-md-3">
                            <input type="number" class="form-control" name="cd" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="cd_memo">
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-md-3">DVD</label>
                        <div class="form-group col-md-3">
                            <input type="number" class="form-control" name="dvd" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="dvd_memo">
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-md-3">雑誌</label>
                        <div class="form-group col-md-3">
                            <input type="number" class="form-control" name="magazine" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="magazine_memo">
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-md-3">交通費</label>
                        <div class="form-group col-md-3">
                            <input type="number" class="form-control" name="train" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="train_memo">
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-md-3">宿泊費</label>
                        <div class="form-group col-md-3">
                            <input type="number" class="form-control" name="travel" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="travel_memo">
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-md-3">ガチャ</label>
                        <div class="form-group col-md-3">
                            <input type="number" class="form-control" name="toy" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="toy_memo">
                        </div>
                    </div>
                    <div class="form-row">
                        <label class="col-md-3">その他</label>
                        <div class="form-group col-md-3">
                            <input type="number" class="form-control" name="others" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" name="others_memo">
                        </div>
                    </div>
                    <br><br>
                    <h3>合計金額　　　<output name="result"></output>　　　円</h3>
                    <br><br>
                    <div class="form-row">
                        <label class="col-md-3" for="date">日付</label>
                        <input type="date" name="paid_at" required />
                    </div>
                    <br>
                    <div class="form-row">
                        <label class="col-md-3">推し</label>
                        <select class="form-control" name="oshi_id" style="display: inline; width: 30%;">
                            <option>推しを選択 ▼</option>
                            @foreach($oshis as $oshi)
                            <option value="{{ $oshi->id }}" @if(old('oshi_name')=='oshi_name')selected @endif>{{ $oshi->oshi_name}}</option>
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
