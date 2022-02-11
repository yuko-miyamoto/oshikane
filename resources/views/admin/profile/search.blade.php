@extends('layouts.admin')
@section('title', 'オシカネ 推しともをさがす')
@section('header_sub')
    <li class="nav-item"><a class="nav-link" aria-current="page" href="{{ action('Admin\ProfileController@add') }}">なまえ<br>登録</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ action('Admin\ProfileController@search') }}">推しとも<br>検索</a></li>
@endsection
@section('content')
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-6">
            <h2>推しともを探す</h2>
            </div>
            <div class="col-6" align="right">
                <form action="{{ action('Admin\ProfileController@search') }}" method="get">
                    <input type="text" class="form-control_search" name="cond_title" value="{{ $cond_title }}" placeholder="推しの名前">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-outline-dark bg-{color} btn-sm" value="検索">
                </form>
            </div>
            <br><br>
            <div class="box_pro">
                <div class="form-group d-flex align-items-center justify-content-center">
                    <label class="col-6" align="center">推しとも検索結果</label>
                </div>
                <br>
                @if($posts->isEmpty())
                <p align="center">推しともは見つかりませんでした。</p>
                @endif
                <table class="table">
                    <tbody>
                       
                        <tr align="center">
                            <th scope="row">推しとものなまえ</th>
                            <th>推しとものいち推し</th>
                            <th>ともだちになる</th>
                        </tr>
                         @foreach($posts as $profile)
                        <tr>
                            <td scope="row" align="center">{{ \Str::limit($profile->profile_name, 20) }}</td>
                            <td align="center">{{ \Str::limit($profile->profile_oshi, 20) }}</td>
                            <td align="center"> <a href="">追加</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br><br>
            </div>
        </div>
    </div>
</div>
@endsection