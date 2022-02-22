@extends('layouts.admin')
@section('title', 'オシカネ　ユーザーページ')
@section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="box_ma">
                    <div class="row row-cols-1 row-cols-md-3 g-2">
                        @foreach($user->memoies as $memory)
                        <div class="col">
                            <div class="card">
                                <a href="{{ action('Admin\MemoryController@index', ['id' => $memory->id]) }}">
                                    <img src="/storage/image/{{$memory->image_path}}" class="card-img-top" alt="card-grid-image">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ \Str::limit($memory->stage_name, 20) }}</h5>
                                        <p class="card-text">{{ \Str::limit($memory->artist, 20) }}</p>
                                        <p class="card-text">{{ \Str::limit($memory->place, 20) }}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection