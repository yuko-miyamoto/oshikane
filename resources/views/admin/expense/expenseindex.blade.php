@extends('layouts.admin')
@section('title', 'オシカネ シシュツ')
@section('header_sub')
    
@endsection
@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mx-auto">
                <h2>支出の一覧</h2>
                <div class="row">
                    <form action="{{ action('Admin\ExpenseController@expenseindex') }}" method="get">
                        <div class="form-row justify-content-end">
                            <div class="form-group col-md-3">
                                <select class="form-control" name="year" id="year">
                                    <option value="">年を選択</option>
                                    @foreach($years as $year)
                                    <option value="{{ $year }}">{{ $year }}年</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <select class="form-control" name="category_id" id="category_id" value="{{ $category_id }}">
                                    <option value="">カテゴリを選択</option>
                                    @foreach($categories as $id => $category_name)
                                    <option value="{{ $id }}">
                                        {{ $category_name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <select class="form-control" name="oshi_id" id="oshi_id" value="{{ $oshi_id }}">
                                    <option value="">推しを選択</option>
                                    <option value="all">全表示</option>
                                    @foreach($oshis->oshis as $oshi)
                                    <option value="{{ $oshi->id }}">{{ $oshi->oshi_name }}くん</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-outline-dark bg-{color} btn-sm" value="検索">
                            </div>
                        </div>
                    </form>
                </div>
                @if(!empty($expenses))
                <p>全{{ $expenses->count() }}件</p>
                <div class="box_mo_c">
                    <div class="row">
                        <label class="col-md-2">
                            日付
                        </label>
                        <label class="col-md-2">
                            カテゴリー
                        </label>
                        <label class="col-md-2">
                            推し
                        </label>
                        <label class="col-md-2">
                            金額
                        </label>
                        <label class="col-md-2">
                            メモ
                        </label>
                    </div>
                    @foreach($expenses as $expense)
                    <div class="row">
                        <div class="col-md-2">
                            <p><span>{{ $expense->paid_at->format('Y年m月d日') }}</span></p>
                        </div>
                        <div class="col-md-2">
                            <p><span>{{ $expense->category->category_name }}</span></p>
                        </div>
                        <div class="col-md-2">
                            <p><span>{{ $expense->oshi->oshi_name }}</span></p>
                        </div>
                        <div class="col-md-2">
                            <p><span>{{ $expense->stage }}</span></p>
                        </div>
                        <div class="col-md-2">
                            <p><span>{{ $expense->stage_memo }}</span></p>
                        </div>
                        
                    </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">
                  {{-- appendsでカテゴリを選択したまま遷移 --}}
                  {{ $expenses->appends(request()->input())->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
    
@endsection