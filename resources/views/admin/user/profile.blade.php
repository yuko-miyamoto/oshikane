@extends('layouts.admin')
@section('title', 'オシカネ ワタシの名前')
@section('header_sub')
    
@endsection
@section('content')

    <div class="container">
        <div class="row　justify-content-center">
            <div class="col-md-12 mx-auto">
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
                            <label class="col-md-2">わたしのあだな</label>
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
                <div class="box_me_v">
                    <br>
                    <div class="d-flex justify-content-center">
                        <label class="col-md-9" style="text-align: center;">わたしのこと</label>
                    </div>
                    <br>
                    @foreach($users as $user)
                    <div align="right">
                        <a href="{{ action('Admin\UserController@edit', ['id' => $user->id]) }}">編集</a>
                    </div>
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th>
                                    わたしのなまえ
                                </th>
                                <td>
                                    {{ \Str::limit( $user->name, 20) }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    わたしのあだな
                                </th>
                                <td>
                                    {{ \Str::limit($user->nickname, 20) }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    わたしのいち推し
                                </th>
                                <td>
                                    {{ \Str::limit($user->oshi, 20) }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    メールアドレス
                                </th>
                                <td>
                                    {{ \Str::limit($user->email, 20) }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    パスワード
                                </th>
                                <td>
                                    {{ str_repeat("*", mb_strlen($user->password, "UTF8")) }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

