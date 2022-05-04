@extends('layouts.admin')
@section('title', 'オシカネ チョキンイチラン')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mx-auto">
                <h2>貯金の一覧</h2>
                <div class="row">
                    <form action="{{ action('Admin\SavingController@detail_index') }}" method="get">
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
                                        <option value="media">メディア出演</option>
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
                <p>全{{ $savings->count() }}件</p>
                @foreach($savings as $saving)
                    <div class="box_mo_c">
                        <div align="right">
                            @if (Auth::check() && Auth::user()->id === $saving->user_id)
                                <div class="col-md-2">
                                    <a href="{{ action('Admin\SavingController@edit', ['id' => $saving->id]) }}">
                                        編集
                                    </a>
                                    <a href="{{ action('Admin\SavingController@delete', ['id' => $saving->id]) }}">
                                        削除
                                    </a>
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col">    
                                日付
                            </div>
                            <div class="col">    
                                推しの名前
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                {{ $saving->stocked_at->format('Y年m月d日') }}
                            </div>
                            <div class="col">
                                {{ $saving->oshi->oshi_name }}
                            </div>
                        </div>    
                        <table class="money_table">
                            <thead>
                                <tr>
                                    <th>
                                        カテゴリ
                                    </th>
                                    <th>
                                        日付
                                    </th>
                                    <th>
                                        メモ
                                    </th>
                                </tr>    
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        演劇
                                    </td>
                                    <td>
                                        @if($saving->stage != null)
                                            {{ $saving->stage }}円
                                        @else
                                            0円
                                        @endif
                                    </td>
                                    <td>
                                        {{ $saving->stage_memo }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        コンサート
                                    </td>
                                    <td>
                                        @if($saving->concert != null)
                                            {{ $saving->concert }}円
                                        @else
                                            0円
                                        @endif
                                    </td>
                                    <td>
                                        {{ $saving->concert_memo }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        配信
                                    </td>
                                    <td>
                                        @if($saving->web != null)
                                            {{ $saving->web }}円
                                        @else
                                            0円
                                        @endif    
                                    </td>
                                    <td>
                                        {{ $saving->web_memo }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        映画
                                    </td>
                                    <td>
                                        @if($saving->movie != null)
                                            {{ $saving->movie }}円
                                        @else
                                            0円
                                        @endif
                                    </td>
                                    <td>
                                        {{ $saving->movie_memo }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        CD
                                    </td>
                                    <td>
                                        @if($saving->cd != null)
                                            {{ $saving->cd }}円
                                        @else
                                            0円
                                        @endif   
                                    </td>
                                    <td>
                                        {{ $saving->cd_memo }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        DVD
                                    </td>
                                    <td>
                                        @if($saving->dvd != null)
                                            {{ $saving->dvd }}円
                                        @else
                                            0円
                                        @endif
                                    </td>
                                    <td>
                                        {{ $saving->dvd_memo }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        雑誌
                                    </td>
                                    <td>
                                        @if($saving->magazine != null)
                                            {{ $saving->magazine }}円
                                        @else
                                            0円
                                        @endif
                                    </td>
                                    <td>
                                        {{ $saving->magazine_memo }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        メディア出演
                                    </td>
                                    <td>
                                        @if($saving->media != null)
                                            {{ $saving->media }}円
                                        @else
                                            0円
                                        @endif
                                    </td>
                                    <td>
                                        {{ $saving->media_memo }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        その他
                                    </td>
                                    <td>
                                        @if($saving->others != null)
                                            {{ $saving->others }}円
                                        @else
                                            0円
                                        @endif
                                    </td>
                                    <td>
                                        {{ $saving->others_memo }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                @endforeach
                <div class="d-flex justify-content-center">
                    {{-- appendsでカテゴリを選択したまま遷移 --}}
                    {{ $savings->appends(request()->input())->links() }}
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