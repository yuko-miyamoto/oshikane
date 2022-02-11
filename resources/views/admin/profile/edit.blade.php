@extends('layouts.admin')
@section('title', 'オシカネ なまえをかえる')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-10 mx-auto">
                <h2>わたし</h2>
                <form action="{{ action('Admin\ProfileController@update') }}" method="post" entype="multipart/form-data">
                    @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <div class="box_pro">
                        <div class="form-group d-flex align-items-center justify-content-center">
                            <label class="col-6" align="center">なまえと推しをかえる</label>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-2">わたしのなまえ</label>
                            <div class="col-10">
                                <input type="text" class="form-control" name="profile_name" value="{{ optional($profile_form)->profile_name }}">
                            </div>
                        </div>
                        <label class="col-2">いち推し</label>
                        <div class="col-10">
                            <input type="text" class="form-control" name="profile_oshi" valu="{{ optional($profile_form)->profile_oshi }}">
                        </div>
                        <div class="form-group row">
                            <div class="col-md-10">
                                <input type="hidden" name="id" value="{{ optional($profile_form)->id }}">
                                {{ csrf_field() }}
                                <div class="form-group d-flex align-items-center justify-content-center">
                                    <input type="submit" class="btn btn-outline-dark bg-{color}" value="更　新">
                                </div>
                            </div>
                        </div>
                        <br><br><br>
                    </div>
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                </form>
            </div>
        </div>
    </div>
@endsection
               