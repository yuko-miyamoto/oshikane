@extends('layouts.admin')
@section('title', 'オシカネ フキョウ')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mx-auto">
                <h2>
                    推しのいいところ
                </h2>
                @foreach($oshis as $oshi)
                    <div class="box">
                        @if (Auth::check() && Auth::user()->id === $oshi->user_id)
                            <div align="right">
                                <a href="{{ action('Admin\NotifyController@edit', ['id' => $oshi->id]) }}">
                                    編集
                                </a>
                            </div>
                        @endif       
                        <div class="notify">
                            <img class="notifyimg" src="{{ $oshi->image_path }}">
                            <span class="box_bottom_center">
                                {{ $oshi->oshi_name }}
                            </span>
                            <span class="box_top_left">
                                歴史
                                <br>
                                {{ $oshi->text_history }}
                            </span>
                            <span class="box_top_right">
                                いち推し！
                                <br>
                                {{ $oshi->text_point }}
                            </span>
                            <span class="box_bottom_right">
                                導入方法
                                <br>
                                {{ $oshi->text_input }}
                            </span>
                            <span class="box_bottom_left">
                                近況
                                <br>
                                {{ $oshi->text_now }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>   
@endsection
@section('footer')
    <div style="text-align: center;">
        <button type="button" class="btn btn-outline-dark bg-{color} btn-lg" onClick="history.back()">戻る</button>
    </div>
@endsection