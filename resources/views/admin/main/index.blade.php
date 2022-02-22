@extends('layouts.admin')
@section('title', 'オシカネ　メインページ')
@section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="box">
                    @foreach($posts as $oshi)
                    <div class="image" align="center">
                        <img src="/storage/image/{{$oshi->image_path}}">
                    </div>
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th scope="row">なまえ</th>
                                <td>{{ \Str::limit($oshi->oshi_name, 20) }}</td>
                            </tr>
                            <tr>
                                <th scope="row">あいじょうど</th>
                                <td>{{ \Str::limit($oshi->tentacles, 20) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    @endforeach
                    <a href="" align="right"></a>
                </div>
                <div class="box_ma">
                    <div class="row row-cols-1 row-cols-md-3 g-2">
                        @foreach($posts2 as $memory)
                        <div class="col">
                            <div class="card">
                                <a href="{{ action('Admin\MemoryController@index', ['id' => $memory->user_id]) }}">
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