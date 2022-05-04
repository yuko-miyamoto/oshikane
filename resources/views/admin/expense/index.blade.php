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
                        <table class="money_table">
                            <thead>
                                <tr>
                                    <th>
                                        日付
                                    </th>
                                    <th>
                                        推しのなまえ
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        {{ $expense->paid_at->format('Y年m月d日') }}
                                    </th>
                                    <th>
                                        {{ $expense->oshi->oshi_name }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        演劇
                                    </td>
                                    <td>
                                        メモ
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        @if($expense->stage != null)
                                            {{ $expense->stage }}円
                                        @else
                                            0円
                                        @endif
                                    </td>
                                    <td>
                                        {{ $expense->stage_memo }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        コンサート
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        @if($expense->concert != null)
                                            {{ $expense->concert }}円
                                        @else
                                            0円
                                        @endif
                                    </td>
                                    <td>
                                        {{ $expense->concert_memo }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        配信
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        @if($expense->web != null)
                                            {{ $expense->web }}円
                                        @else
                                            0円
                                        @endif    
                                    </td>
                                    <td>
                                        {{ $expense->web_memo }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        映画
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        @if($expense->movie != null)
                                            {{ $expense->movie }}円
                                        @else
                                            0円
                                        @endif
                                    </td>
                                    <td>
                                        {{ $expense->movie_memo }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        CD
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        @if($expense->cd != null)
                                            {{ $expense->cd }}円
                                        @else
                                            0円
                                        @endif   
                                    </td>
                                    <td>
                                        {{ $expense->cd_memo }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        DVD
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        @if($expense->dvd != null)
                                            {{ $expense->dvd }}円
                                        @else
                                            0円
                                        @endif
                                    </td>
                                    <td>
                                        {{ $expense->dvd_memo }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        雑誌
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        @if($expense->magazine != null)
                                            {{ $expense->magazine }}円
                                        @else
                                            0円
                                        @endif
                                    </td>
                                    <td>
                                        {{ $expense->magazine_memo }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        交通費
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        @if($expense->train != null)
                                            {{ $expense->train }}円
                                        @else
                                            0円
                                        @endif
                                    </td>
                                    <td>
                                        {{ $expense->train_memo }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        宿泊費
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        @if($expense->travel != null)
                                            {{ $expense->travel }}円
                                        @else
                                            0円
                                        @endif
                                    </td>
                                    <td>
                                        {{ $expense->travel_memo }}    
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        ガチャ
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        @if($expense->toy != null)
                                            {{ $expense->toy }}円
                                        @else
                                            0円
                                        @endif
                                    </td>
                                    <td>
                                        {{ $expense->toy_memo }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        その他
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        @if($expense->others != null)
                                            {{ $expense->others }}円
                                        @else
                                            0円
                                        @endif
                                    </td>
                                    <td>
                                        {{ $expense->others_memo }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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