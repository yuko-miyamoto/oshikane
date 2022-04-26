@extends('layouts.admin')
@section('title', 'オシカネ ワタシノコト')
@section('content')
    <div class="container">
        <div class="row　justify-content-center">
            <div class="col-md-12 mx-auto">
                <h2>わたし</h2>
                <div class="box_me_v">
                    <div align="center">
                        <span><h3>わたしのこと</h3></span>
                    </div>
                    @if(Auth::check() && Auth::user()->id === $user->id)
                        <div align="right">
                            <a href="{{ action('Admin\UserController@edit', ['id' => $user->id]) }}">編集</a>
                        </div>
                    @endif
                    <div align="center">
                        <div class="profile_icon">
                            <img src="{{ asset('/storage/image/'.$user->profile_image_path) }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <span>わたしのなまえ</span>
                        </div>
                        <div class="col-md-5">
                            <span>{{ \Str::limit( $user->name, 20) }}</span>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <span>わたしのあだな</span>
                        </div>
                        <div class="col-md-5">
                            <span>{{ \Str::limit($user->nickname, 20) }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <span>わたしのいち推し</span>
                        </div>
                        <div class="col-md-5">
                            <span>{{ \Str::limit($user->oshi, 20) }}</span>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <span>メールアドレス</span>
                        </div>
                        <div class="col-md-5">
                            <span>{{ \Str::limit($user->email, 20) }}</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <span>パスワード</span>
                        </div>
                        <div class="col-md-5">
                            <span>{{ str_repeat("*", mb_strlen($user->password, "UTF8")) }}</span>
                        </div>    
                    </div>
                </div>
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

