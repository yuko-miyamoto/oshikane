@extends('layouts.admin')
@section('title', 'オシカネ ワタシノコト')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mx-auto">
                <h2>わたし</h2>
                <div class="box_me_v">
                    <div align="right">
                        <div class="col-md-2">
                            <a href="{{ action('Admin\UserController@edit', ['id' => $user->id]) }}">
                                編集
                            </a>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="profile_icon" align="center">
                            <img src="{{ $user->profile_image_path }}">
                        </div>
                    </div>
                    <table class="list_table">
                        <thead>
                            <th scope="row" colspan="2">
                                わたしのこと
                            </th>
                        </thead>
                        <tr>
                            <td>
                                なまえ
                            </td>
                            <td>
                                {{ \Str::limit( $user->name, 20) }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                あだな    
                            </td>
                            <td>
                                {{ \Str::limit($user->nickname, 10) }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                いち推し    
                            </td>
                            <td>
                                {{ \Str::limit($user->oshi, 30) }}    
                            </td>
                        </tr>
                        <tr>
                            <td>
                                メールアドレス    
                            </td>
                            <td>
                                {{ \Str::limit($user->email, 20) }}
                            </td>
                        </tr>
                    </table>
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

