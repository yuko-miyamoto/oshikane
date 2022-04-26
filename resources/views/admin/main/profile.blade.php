@extends('layouts.admin')
@section('title', 'オシカネ　ユーザーページ')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mx-auto">
                <div class="box_me_v">
                    <div class="row row-cols-auto align-items-center">
                        <div class="col">
                            <div class="profile_icon">
                                <img src="{{ asset('/storage/image/'.$users->profile_image_path) }}">
                            </div>
                        </div>
                        <div class="col">
                            <h2>
                                {{ $users->nickname }}
                            </h2>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-outline-dark bg-{color} btn-sm" data-bs-toggle="modal" data-bs-target="#modal1{{ $users->id }}">
                                @if(in_array($users->id, $followee))
                                    フォロー中
                                @else
                                    フォロー
                                @endif
                            </button>
                            <div class="modal fade" id="modal1{{ $users->id }}" tabindex="-1" aria-labelledby="modal1label{{ $users->id }}">
                                <div class="modal-dialog modal-sm modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modal1label{{ $users->id }}">
                                                推しともになる？
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @if(in_array($users->id, $followee))
                                                <a class="btn btn-outline-info bg-{color}" href="{{ action('Admin\FollowerController@delete', ['id' => $users->id]) }}" role="botton">
                                                    ともだち解除
                                                </a>
                                            @else
                                                <form action="{{ action('Admin\FollowerController@store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="followee_id" value="{{ $users->id }}">
                                                    <input type="hidden" name="follower_id" value="{{ Auth::id() }}">
                                                    <button type="submit" class="btn btn-primary">
                                                        なる！
                                                    </button>
                                                </form>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    ならない
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="row align-items-center justify-content-between">
                        <div class="col">
                            <h2>
                                {{ $users->nickname }}の推し
                            </h2>
                        </div>
                        <div class="col justify-content-end">
                            <form action="{{ action('Admin\OshiController@index') }}" method="get">
                                <input type="hidden" name="user_id" value="{{ $users->id }}">
                                <button type="submit" class="btn btn-outline-dark bg-{color}">
                                    推し一覧
                                </button>
                            </form>
                        </div>
                    </div>
                    @foreach($users->oshis as $oshi)
                        <div class="image" align="center">
                            <img src="/storage/image/{{$oshi->image_path}}" class="img-fluid rounded mx-auto d-block">
                        </div>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th scope="row">
                                        なまえ
                                    </th>
                                    <td>
                                        {{ \Str::limit($oshi->oshi_name, 20) }}
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        めも
                                    </th>
                                    <td>
                                        {{ \Str::limit($oshi->oshi_memo, 100) }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @endforeach
                </div>
                <div class="box_ma">
                    <div class="row align-items-center justify-content-between">
                        <div class="col">
                            <h2>
                                {{ $users->nickname }}のメモリー
                            </h2>
                        </div>
                        <div class="col justify-content-end">
                            <form action="{{ action('Admin\MemoryController@index') }}" method="get">
                                <input type="hidden" name="user_id" value="{{ $users->id }}">
                                <button type="submit" class="btn btn-outline-dark bg-{color}">
                                    メモリー一覧
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-3 g-2">
                        @foreach($users->memories as $memory)
                            <div class="col">
                                <div class="card">
                                    <img src="/storage/image/{{$memory->image_path}}" class="card-img-top" alt="card-grid-image">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            {{ \Str::limit($memory->stage_name, 20) }}
                                        </h5>
                                        <p class="card-text">
                                            {{ \Str::limit($memory->artist, 20) }}
                                        </p>
                                        <p class="card-text">
                                            {{ \Str::limit($memory->stage_memo, 100) }}
                                        </p>
                                        <p class="card-text">
                                            <br>
                                        </p>
                                        <p class="card-text">
                                            <form action="{{ action('Admin\MemoryController@index') }}" method="get">
                                                <input type="hidden" name="user_id" value="{{ $memory->user->id }}">
                                                <input type="hidden" name="id" value="{{ $memory->id }}">
                                                <button type="submit" id="heart" style="position: absolute; right: 10px; bottom: 10px">
                                                    <img src="{{ asset('/storage/images/memo.png') }}" width="30" height="30">
                                                    <br>
                                                    みる
                                                </button>
                                            </form>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="box_mo_c">
                    <div class="row align-items-center justify-content-between">
                        <div class="col">
                            <h2>
                                {{ $users->nickname }}の支出
                            </h2>
                        </div>
                        <div class="col justify-content-end">
                            <form action="{{ action('Admin\BalancepaymentController@chartindex') }}" method="get">
                                <input type="hidden" name="user_id" value="{{ $users->id }}">
                                <button type="submit" class="btn btn-outline-dark bg-{color}">
                                    グラフへ
                                </button>
                            </form>
                        </div>
                    </div>
                    <canvas id="myChart1"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(window).on('load', function() { // 読み込み時
            const id = getParam('id');
            function getParam(name, url) { 
                if (!url) url = window.location.href; //url取得
                    name = name.replace(/[\[\]]/g, "\\$&"); // replace(置換) \はエスケープ処理判断->\\
                    const regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"), // 正規表現
                    results = regex.exec(url); // exec(最初に一致した文字列を抽出)
                    if (!results) return null;
                    if (!results[2]) return '';
                    return decodeURIComponent(results[2].replace(/\+/g, " "));
            }
            $.ajax({
                type: 'get',
                url: 'profilechart',
                data: {
                    id : id
                },
                dataType: 'json'
            })
            .done((data) => {
                const stageData = []; // dataを配列に格納するために初期化
                $.each(data['stage'], function (index, value) { //dataの中身からvalueを取り出す
                    stageData.push(value); //　dataを格納する
                });
                const sum1 = stageData.reduce(function(a,b){return a + b;});
                const concertData = []; 
                $.each(data['concert'], function (index, value) { 
                    concertData.push(value); 
                });
                const sum2 = concertData.reduce(function(a,b){return a + b;});
                const webData = []; 
                $.each(data['web'], function (index, value) { 
                    webData.push(value); 
                });
                const sum3 = webData.reduce(function(a,b){return a + b;});
                const movieData = []; 
                $.each(data['movie'], function (index, value) { 
                    movieData.push(value); 
                });
                const sum4 = movieData.reduce(function(a,b){return a + b;});
                const cdData = []; 
                $.each(data['cd'], function (index, value) { 
                    cdData.push(value);
                });
                const sum5 = cdData.reduce(function(a,b){return a + b;});
                const dvdData = []; 
                $.each(data['dvd'], function (index, value) { 
                    dvdData.push(value);
                });
                const sum6 = dvdData.reduce(function(a,b){return a + b;});
                const magazineData = []; 
                $.each(data['magazine'], function (index, value) { 
                    magazineData.push(value); 
                });
                const sum7 = magazineData.reduce(function(a,b){return a + b;});
                const trainData = []; 
                $.each(data['train'], function (index, value) { 
                    trainData.push(value); 
                });
                const sum8 = trainData.reduce(function(a,b){return a + b;});
                const travelData = []; 
                $.each(data['travel'], function (index, value) { 
                    travelData.push(value); 
                });
                const sum9 = travelData.reduce(function(a,b){return a + b;});
                const toyData = []; 
                $.each(data['toy'], function (index, value) { 
                    toyData.push(value); 
                });
                const sum10 = toyData.reduce(function(a,b){return a + b;});
                const othersData = []; 
                $.each(data['others'], function (index, value) { 
                    othersData.push(value); 
                });
                const sum11 = othersData.reduce(function(a,b){return a + b;});
                const myData = [sum1,sum2,sum3,sum4,sum5,sum6,sum7,sum8,sum9,sum10,sum11];
                console.log(myData);
                const ctx = document.getElementById('myChart1').getContext('2d');
                window.myChart = new Chart( ctx, {
                    type: 'bar',
                    data: {
                        labels: ['演劇', 'コンサート', '配信', '映画', 'CD', 'DVD', '雑誌', '交通費', '宿泊費', 'ガチャ', 'その他'],
                        datasets: [
                            {
                                type: 'bar',　// 棒グラフ
                                label: '支出',
                                data: myData,
                                backgroundColor: [
                                    'rgb(255, 99, 132)',
                                　　'rgb(54, 162, 235)',
                                    'rgb(255, 206, 86)',
                                    'rgb(75, 192, 192)',
                                    'rgb(153, 102, 255)',
                                    'rgb(255, 159, 64)',
                                    'rgb(248, 86, 252)',
                                    'rgb(86, 94, 252)',
                                    'rgb(252, 105, 86)',
                                    'rgb(86, 128, 252)',
                                    'rgb(157, 86, 252)'
                                ],
                                borderColor: [
                                    'rgb(255, 99, 132)',
                                    'rgb(54, 162, 235)',
                                    'rgb(255, 206, 86)',
                                    'rgb(75, 192, 192)',
                                    'rgb(153, 102, 255)',
                                    'rgb(255, 159, 64)',
                                    'rgb(248, 86, 252)',
                                    'rgb(86, 94, 252)',
                                    'rgb(252, 105, 86)',
                                    'rgb(86, 128, 252)',
                                    'rgb(157, 86, 252)'
                                ],
                                borderWidth: 1, // バーの境界線の太さ
                                yAxisID: 'y-axis-1'
                            }
                            
                        ]
                    },
                    options: {
                        responsive: true,
                        title: {
                            display: true,
                        },
                        legend: {
                        position: 'top'
                        },
                        scales: {
                            yAxes: [
                                {
                                    id: "y-axis-1",         // Ｙ左軸の定義
                                    position: "left",     //
                                    gridLines: {
                                        color: "rgba(255, 0, 0, 0.2)"
                                    },
                                    scaleLabel: {         // 軸ラベル設定
                                        display: true,          //表示設定
                                        fontColor: "red",
                                        fontSize: 14               //フォントサイズ
                                    },                 
                                    ticks: {
                                        fontColor: "black",             
                                        beginAtZero: true,
                                        suggestedMax: 50000,
                                        suggestedMin: 1000,
                                        stepSize: 5000
                                    }
                                }
                            ]
                        }
                    }
                });
            })
            //通信が失敗
            .fail((error) => {
                console.log(error.ststusText);
            });
        });
    </script>
@endsection
@section('footer')
    <div style="text-align: center;">
        <button type="button" class="btn btn-outline-dark bg-{color} btn-lg" onClick="history.back()">戻る</button>
    </div>
@endsection