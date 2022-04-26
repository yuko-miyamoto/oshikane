@extends('layouts.admin')
@section('title', 'オシカネ シシュツ')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mx-auto">
                <h2>支出の一覧</h2>
                <div class="row">
                    <form action="{{ action('Admin\ExpenseController@index') }}" method="get">
                        <div class="form-row justify-content-end">
                            <div class="form-group col-md-2">
                                <select class="form-control" name="year" id="year">
                                    @if($years != null)
                                        <option value="">年を選択</option>
                                        @foreach($years as $year)
                                            <option value="{{ $year }}">{{ $year }}年</option>
                                        @endforeach
                                    @else
                                        <option value="">支出を登録してください。</option>
                                    @endif
                                </select>
                            </div>
                            @if($years != null)
                                <div class="form-group col-md-2">
                                    <select class="form-control" name="category_name" id="category_name" value="{{ $category_name }}">
                                        <option value="">カテゴリを選択</option>
                                        <option value="stage">演劇</option>
                                        <option value="concert">コンサート</option>
                                        <option value="web">配信</option>
                                        <option value="movie">映画</option>
                                        <option value="cd">CD</option>
                                        <option value="dvd">DVD</option>
                                        <option value="magazine">雑誌</option>
                                        <option value="train">交通費</option>
                                        <option value="travel">宿泊費</option>
                                        <option value="toy">ガチャ</option>
                                        <option value="others">その他</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <select class="form-control" name="oshi_id" id="oshi_id" value="{{ $oshi_id }}">
                                        <option value="">推しを選択</option>
                                        <option value="all">全表示</option>
                                        @foreach($oshis->oshis as $oshi)
                                            <option value="{{ $oshi->id }}">{{ $oshi->oshi_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2 offset-1">
                                    <input type="hidden" name="user_id" value="{{ $user_id }}">
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-outline-dark bg-{color} btn-sm" value="検索">
                                </div>
                            </div>
                        @endif
                    </form>
                </div>
                <p>全{{ $expenses->count() }}件</p>
                @foreach($expenses as $expense)
                    <div class="box_mo_c">
                        <div align="right">
                            @if (Auth::check() && Auth::user()->id === $expense->user_id)
                                <div class="col-md-2">
                                    <a href="{{ action('Admin\ExpenseController@edit', ['id' => $expense->id]) }}">
                                        編集
                                    </a>
                                    <a href="{{ action('Admin\ExpenseController@delete', ['id' => $expense->id]) }}">
                                        削除
                                    </a>
                                </div>
                            @endif
                        </div>
                        <div class="row justify-content-start">
                            <label class="col-md-3" align="center">
                                日付
                            </label>
                            <label class="col-md-4" align="center">
                                選択した推しのなまえ
                            </label>
                        </div>
                        <div class="row justify-content-start">
                            <div class="col-md-3" align="center">
                                <p><span class="detail_content">{{ $expense->paid_at->format('Y年m月d日') }}</span></p>
                            </div>
                            <div class="col-md-4" align="center">
                                <p><span class="detail_content">{{ $expense->oshi->oshi_name }}</span></p>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2" align="center">
                                演劇
                            </label>
                            <label class="col-md-4" align="center">
                                メモ
                            </label>
                            <label class="col-md-2" align="center">
                                コンサート
                            </label>
                            <label class="col-md-4" align="center">
                                メモ
                            </label>
                        </div>
                        <div class="row">
                            <div class="col-md-2" align="right">
                                @if($expense->stage != null)
                                    <p><span class="detail_content">{{ $expense->stage }}円</span></p>
                                @else
                                    <p><span class="detail_content">0円</span></p>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <p><span class="detail_content">{{ $expense->stage_memo }}</span></p>
                            </div>
                            <div class="col-md-2" align="right">
                                @if($expense->concert != null)
                                    <p><span class="detail_content">{{ $expense->concert }}円</span></p>
                                @else
                                    <p><span class="detail_content">0円</span></p>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <p><span class="detail_content">{{ $expense->concert_memo }}</span></p>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2" align="center">
                                配信
                            </label>
                            <label class="col-md-4" align="center">
                                メモ
                            </label>
                            <label class="col-md-2" align="center">
                                映画
                            </label>
                            <label class="col-md-4" align="center">
                                メモ
                            </label>
                        </div>
                        <div class="row">
                            <div class="col-md-2" align="right">
                                @if($expense->web != null)
                                    <p><span class="detail_content">{{ $expense->web }}円</span></p>
                                @else
                                    <p><span class="detail_content">0円</span></p>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <p><span class="detail_content">{{ $expense->web_memo }}</span></p>
                            </div>
                            <div class="col-md-2" align="right">
                                @if($expense->movie != null)
                                    <p><span class="detail_content">{{ $expense->movie }}円</span></p>
                                @else
                                    <p><span class="detail_content">0円</span></p>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <p><span class="detail_content">{{ $expense->movie_memo }}</span></p>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2" align="center">
                                CD
                            </label>
                            <label class="col-md-4" align="center">
                                メモ
                            </label>
                            <label class="col-md-2" align="center">
                                DVD
                            </label>
                            <label class="col-md-4" align="center">
                                メモ
                            </label>
                        </div>
                        <div class="row">
                            <div class="col-md-2" align="right">
                                @if($expense->cd != null)
                                    <p><span class="detail_content">{{ $expense->cd }}円</span></p>
                                @else
                                    <p><span class="detail_content">0円</span></p>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <p><span class="detail_content">{{ $expense->cd_memo }}</span></p>
                            </div>
                            <div class="col-md-2" align="right">
                                @if($expense->dvd != null)
                                    <p><span class="detail_content">{{ $expense->dvd }}円</span></p>
                                @else
                                    <p><span class="detail_content">0円</span></p>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <p><span class="detail_content">{{ $expense->dvd_memo }}</span></p>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2" align="center">
                                雑誌
                            </label>
                            <label class="col-md-4" align="center">
                                メモ
                            </label>
                            <label class="col-md-2" align="center">
                                交通費
                            </label>
                            <label class="col-md-4" align="center">
                                メモ
                            </label>
                        </div>
                        <div class="row">
                            <div class="col-md-2" align="right">
                                @if($expense->magazine != null)
                                    <p><span class="detail_content">{{ $expense->magazine }}円</span></p>
                                @else
                                    <p><span class="detail_content">0円</span></p>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <p><span class="detail_content">{{ $expense->magazine_memo }}</span></p>
                            </div>
                            <div class="col-md-2" align="right">
                                @if($expense->train != null)
                                    <p><span class="detail_content">{{ $expense->train }}円</span></p>
                                @else
                                    <p><span class="detail_content">0円</span></p>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <p><span class="detail_content">{{ $expense->train_memo }}</span></p>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2" align="center">
                                宿泊費
                            </label>
                            <label class="col-md-4" align="center">
                                メモ
                            </label>
                            <label class="col-md-2" align="center">
                                ガチャ
                            </label>
                            <label class="col-md-4" align="center">
                                メモ
                            </label>
                        </div>
                        <div class="row">
                            <div class="col-md-2" align="right">
                                @if($expense->travel != null)
                                    <p><span class="detail_content">{{ $expense->travel }}円</span></p>
                                @else
                                    <p><span class="detail_content">0円</span></p>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <p><span class="detail_content">{{ $expense->travel_memo }}</span></p>
                            </div>
                            <div class="col-md-2" align="right">
                                @if($expense->toy != null)
                                    <p><span class="detail_content">{{ $expense->toy }}円</span></p>
                                @else
                                    <p><span class="detail_content">0円</span></p>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <p><span class="detail_content">{{ $expense->toy_memo }}</span></p>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-2" align="center">
                                その他
                            </label>
                            <label class="col-md-4" align="center">
                                メモ
                            </label>
                        </div>
                        <div class="row">
                            <div class="col-md-2" align="right">
                                @if($expense->others != null)
                                    <p><span class="detail_content">{{ $expense->others }}円</span></p>
                                @else
                                    <p><span class="detail_content">0円</span></p>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <p><span class="detail_content">{{ $expense->others_memo }}</span></p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="d-flex justify-content-center">
                    {{-- appendsでカテゴリを選択したまま遷移 --}}
                    {{ $expenses->appends(request()->input())->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <div style="text-align: center;">
        <button type="button" class="btn btn-outline-dark bg-{color} btn-lg" onClick="history.back()">戻る</button>
    </div>
@endsection