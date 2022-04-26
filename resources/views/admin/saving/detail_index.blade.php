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
                                <p><span class="detail_content">{{ $saving->stocked_at->format('Y年m月d日') }}</span></p>
                            </div>
                            <div class="col-md-4" align="center">
                                <p><span class="detail_content">{{ $saving->oshi->oshi_name }}</span></p>
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
                                @if($saving->stage != null)
                                    <p><span class="detail_content">{{ $saving->stage }}円</span></p>
                                @else
                                    <p><span class="detail_content">0円</span></p>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <p><span class="detail_content">{{ $saving->stage_memo }}</span></p>
                            </div>
                            <div class="col-md-2" align="right">
                                @if($saving->concert != null)
                                    <p><span class="detail_content">{{ $saving->concert }}円</span></p>
                                @else
                                    <p><span class="detail_content">0円</span></p>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <p><span class="detail_content">{{ $saving->concert_memo }}</span></p>
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
                                @if($saving->web != null)
                                    <p><span class="detail_content">{{ $saving->web }}円</span></p>
                                @else
                                    <p><span class="detail_content">0円</span></p>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <p><span class="detail_content">{{ $saving->web_memo }}</span></p>
                            </div>
                            <div class="col-md-2" align="right">
                                @if($saving->movie != null)
                                    <p><span class="detail_content">{{ $saving->movie }}円</span></p>
                                @else
                                    <p><span class="detail_content">0円</span></p>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <p><span class="detail_content">{{ $saving->movie_memo }}</span></p>
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
                                @if($saving->cd != null)
                                    <p><span class="detail_content">{{ $saving->cd }}円</span></p>
                                @else
                                    <p><span class="detail_content">0円</span></p>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <p><span class="detail_content">{{ $saving->cd_memo }}</span></p>
                            </div>
                            <div class="col-md-2" align="right">
                                @if($saving->dvd != null)
                                    <p><span class="detail_content">{{ $saving->dvd }}円</span></p>
                                @else
                                    <p><span class="detail_content">0円</span></p>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <p><span class="detail_content">{{ $saving->dvd_memo }}</span></p>
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
                                メディア出演
                            </label>
                            <label class="col-md-4" align="center">
                                メモ
                            </label>
                        </div>
                        <div class="row">
                            <div class="col-md-2" align="right">
                                @if($saving->magazine != null)
                                    <p><span class="detail_content">{{ $saving->magazine }}円</span></p>
                                @else
                                    <p><span class="detail_content">0円</span></p>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <p><span class="detail_content">{{ $saving->magazine_memo }}</span></p>
                            </div>
                            <div class="col-md-2" align="right">
                                @if($saving->media != null)
                                    <p><span class="detail_content">{{ $saving->media }}円</span></p>
                                @else
                                    <p><span class="detail_content">0円</span></p>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <p><span class="detail_content">{{ $saving->media_memo }}</span></p>
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
                                @if($saving->others != null)
                                    <p><span class="detail_content">{{ $saving->others }}円</span></p>
                                @else
                                    <p><span class="detail_content">0円</span></p>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <p><span class="detail_content">{{ $saving->others_memo }}</span></p>
                            </div>
                        </div>
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