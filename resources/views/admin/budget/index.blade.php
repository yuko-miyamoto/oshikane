@extends('layouts.admin')
@section('title', 'オシカネ ヨサンイチラン')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mx-auto">
                    <h2>予算・カテゴリ予算の一覧</h2>
                    <div class="box_yo">
                        <div class="col-md-3">
                            <span>
                                <h3>
                                    {{ $date->month }}月の予算
                                </h3>
                            </span>
                        </div>
                        @if(!empty($budgets))
                            <div align="right">
                                <a href="{{ action('Admin\BudgetController@edit', ['id' => $budgets->id]) }}">
                                    編集
                                </a>
                                <a href="{{ action('Admin\BudgetController@delete', ['id' => $budgets->id]) }}">
                                    削除
                                </a>
                            </div>
                            <div class="row">
                                <label class="col-md-3">総予算</label>
                                <div class="col-md-6">
                                    <P><span>{{ $budgets->total_budget }}円</span></P>
                                </div>
                            </div>
                            <br>
                            <label class="col-md-4">カテゴリ別 予算</label>
                            <br><br>
                            <div class="row">
                                <label class="col-md-3">演劇</label>
                                <div class="col-md-4">
                                    <P><span>{{ $budgets->stage }}円</span></P>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3">コンサート</label>
                                <div class="col-md-4">
                                    <P><span>{{ $budgets->concert }}円</span></P>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3">配信</label>
                                <div class="col-md-4">
                                    <P><span>{{ $budgets->web }}円</span></P>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3">映画</label>
                                <div class="col-md-4">
                                    <P><span>{{ $budgets->movie }}円</span></P>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3">CD</label>
                                <div class="col-md-4">
                                    <P><span>{{ $budgets->cd }}円</span></P>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3">DVD</label>
                                <div class="col-md-4">
                                    <P><span>{{ $budgets->dvd }}円</span></P>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3">雑誌</label>
                                <div class="col-md-4">
                                    <P><span>{{ $budgets->magazine }}円</span></P>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3">交通費</label>
                                <div class="col-md-4">
                                    <P><span>{{ $budgets->train }}円</span></P>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3">宿泊費</label>
                                <div class="col-md-4">
                                    <P><span>{{ $budgets->travel }}円</span></P>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3">ガチャ</label>
                                <div class="col-md-4">
                                    <P><span>{{ $budgets->toy }}円</span></P>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3">その他</label>
                                <div class="col-md-4">
                                    <P><span>{{ $budgets->others }}円</span></P>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3">登録年月</label>
                                <div class="col-md-4">
                                    <P><span>{{ $budgets->register_year }}年　{{ $budgets->register_month }}月</span></P>
                                </div>
                            </div>
                        @else
                            <p align="center">{{ $budget_message }}</p>
                        @endif
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
