@extends('layouts.admin')
@section('title', 'オシカネ わたしのなまえ')
@section('header_sub')
    <li class="nav-item"><a class="nav-link" aria-current="page" href="{{ action('Admin\UserController@add') }}">なまえ<br>登録</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ action('Admin\UserController@search') }}">推しとも<br>検索</a></li>
@endsection
@section('content')
<hr>
    <div class="container">
        <div class="row　justify-content-center">
            <div class="col-md-9 mx-auto">
                <h2>わたし</h2>
                @if($users->isEmpty())
                <form action="{{ action('Admin\UserController@profile_create') }}" method="post" entype="multipart/form-data">
                    @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <div class="box_pro">
                        <div class="d-flex justify-content-center">
                            <label class="col-md-9" style="text-align: center;">なまえと推しの登録</label>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label class="col-md-2">わたしのなまえ</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="nickname" value="{{ old('nickname') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2">いち推し</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="oshi" valu="{{ old('oshi') }}">
                            </div>
                            {{ csrf_field() }}
                            <br>
                        </div>
                        <div style="text-align: center;">
                            <input type="submit" class="btn btn-outline-dark bg-{color}" value="登　録">
                        </div>
                    </div>
                </form>
                @endif
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
                            @foreach($users as $user)
                            <tr>
                                <td scope="row" align="center">{{ \Str::limit($user->nickname, 20) }}</td>
                                <td align="center">{{ \Str::limit($user->oshi, 20) }}</td>
                                <td align="center"><a href="{{ action('Admin\UserController@edit', ['id' => $user->id]) }}">編集</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

