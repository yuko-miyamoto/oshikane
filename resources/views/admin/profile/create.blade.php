@extends('layouts.admin')
@section('title', 'オシカネ わたしのなまえ')
@section('header_sub')
    <li class="nav-item"><a class="nav-link" aria-current="page" href="{{ action('Admin\ProfileController@add') }}">なまえ<br>登録</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ action('Admin\ProfileController@search') }}">推しとも<br>検索</a></li>
@endsection
@section('content')
<hr>
    <div class="container">
        <div class="row　justify-content-center">
            <div class="ccol-md-9 mx-auto">
                <h2>わたし</h2>
                @if($posts->isEmpty())
                <form action="{{ action('Admin\ProfileController@create') }}" method="post" entype="multipart/form-data">
                    @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <div class="box_pro">
                        <br>
                        <label class="col-md-6 mx-auto">なまえと推しの登録</label>
                        <br>
                        <div class="form-group row">
                            <label class="col-md-2">わたしのなまえ</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="profile_name" value="{{ old('profile_name') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">いち推し</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="profile_oshi" valu="{{ old('profile_oshi') }}">
                            </div>
                            {{ csrf_field() }}
                            <br>
                        </div>
                        <div style="text-align: center;">
                        <input type="submit" class="btn btn-outline-dark bg-{color}" value="登　録">
                        </div>
                        <br><br>
                    </div>
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                </form>
                @endif
                <br><br>
                @foreach($posts as $profile)
                <div class="box_pro">
                    <br>
                    <div class="d-flex justify-content-center">
                        <label class="col-md-9" style="text-align: center;">わたしのなまえといち推し</label>
                    </div>
                    <br>
                    <table class="table">
                        <tbody>
                            <tr align="center">
                                <th scope="row">わたしのなまえ</th>
                                <th>わたしのいち推し</th>
                                <th>へんこうする</th>
                            </tr>
                            <tr>
                                <td scope="row" align="center">{{ \Str::limit($profile->profile_name, 20) }}</td>
                                <td align="center">{{ \Str::limit($profile->profile_oshi, 20) }}</td>
                                <td align="center"> <a href="{{ action('Admin\ProfileController@edit', ['id' => $profile->id]) }}">編集</a></td>
                            </tr>
                        </tbody>
                    </table>
                    <br><br>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

