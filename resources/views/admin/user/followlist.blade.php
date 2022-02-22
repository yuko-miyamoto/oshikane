@extends('layouts.admin')
@section('title', 'オシカネ 推しとも一覧')
@section('header_sub')
    <li class="nav-item2"><a class="nav-link" aria-current="page" href="{{ action('Admin\UserController@add') }}">なまえ<br>登録</a></li>
    <li class="nav-item2"><a class="nav-link" href="{{ action('Admin\UserController@search') }}">推しとも<br>検索</a></li>
@endsection
@section('content')
    <hr>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 mx-auto">
                <h2>推しとも一覧</h2>
                <div class="box_pro">
                    <br>
                    <div class="d-flex justify-content-center">
                        <label class="col-md-9" style="text-align: center;">推しとも一覧</label>
                    </div>
                    <br>
                    <table class="table">
                        <tbody>
                            <tr align="center">
                                <th scope="row">推しとものなまえ</th>
                                <th>推しとものいち推し</th>
                                <th>ともだちのへや</th>
                            </tr>
                            @foreach($followers as $followers)
                            <tr>
                                <td scope="row" align="center">{{ \Str::limit($followers->profile_name, 20) }}</td>
                                <td align="center">{{ \Str::limit($followers->profile_oshi, 20) }}</td>
                                <td align="center">
                                    <form action="{{ action('Admin\MainController@profile',['id' => $followers->user_id]) }}" method="get">
                                    <button type="submit">
                                        test
                                    </button>
                                    </form>
                                </td>
                                <td>
                                    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
@endsection