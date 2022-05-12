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
                                <img src="{{ $users->profile_image_path }}">
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
                                                どうする？
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            @if(in_array($users->id, $followee))
                                                <a class="btn btn-outline-info bg-{color}" href="{{ action('Admin\FollowerController@delete', ['id' => $users->id]) }}" role="botton">
                                                    ともだち解除
                                                </a>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">どうもしない</button>
                                            @else
                                                <form action="{{ action('Admin\FollowerController@store') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="followee_id" value="{{ $users->id }}">
                                                    <input type="hidden" name="follower_id" value="{{ Auth::id() }}">
                                                    <button type="submit" class="btn btn-primary">
                                                        推しともになる！
                                                    </button>
                                                </form>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    どうもしない
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
                        <div class="col-md-4">
                            <h2>
                                {{ $users->nickname }}の推し
                            </h2>
                        </div>
                        <div class="col-md-3 justify-content-end">
                            <form action="{{ action('Admin\OshiController@index') }}" method="get">
                                <input type="hidden" name="user_id" value="{{ $users->id }}">
                                <div class="d-grid gap-2 d-md-block" align="right">
                                    <button type="submit" class="btn btn-outline-dark bg-{color}">
                                        推し一覧
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @foreach($users->oshis as $oshi)
                        <div class="image" align="center">
                            <img src="{{ $oshi->image_path }}" class="img-fluid rounded mx-auto d-block">
                        </div>
                        <table class="oshi_table">
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
                        <div class="col-md-4">
                            <h2>
                                {{ $users->nickname }}のメモリー
                            </h2>
                        </div>
                        <div class="col-md-3 justify-content-end">
                            <form action="{{ action('Admin\MemoryController@index') }}" method="get">
                                <input type="hidden" name="user_id" value="{{ $users->id }}">
                                <div class="d-grid gap-2 d-md-block" align="right">
                                    <button type="submit" class="btn btn-outline-dark bg-{color}" >
                                        メモリー一覧
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-3 g-2">
                        @foreach($users->memories as $memory)
                            <div class="col">
                                <div class="card">
                                    <img src="{{ $memory->image_path }}" class="card-img-top" alt="card-grid-image">
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
                                                    <img src="https://oshikane.s3.ap-northeast-1.amazonaws.com/memo.png" width="30" height="30">
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
                        <div class="col-md-4">
                            <h2>
                                {{ $users->nickname }}の支出
                            </h2>
                        </div>
                        <div class="col-md-3 justify-content-end">
                            <form action="{{ action('Admin\BalancepaymentController@chartindex') }}" method="get">
                                <input type="hidden" name="user_id" value="{{ $users->id }}">
                                <div class="d-grid gap-2 d-md-block" align="right">
                                    <button type="submit" class="btn btn-outline-dark bg-{color}">
                                        グラフへ
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="wrap-chart">
                        <div class="chart-container" style="position: relative; width: 100%; height: 95%;">
                            <canvas id="expenseChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="box_mo_c">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-md-4">
                            <h2>
                                {{ $users->nickname }}の推し貯金
                            </h2>
                        </div>
                        <div class="col-md-3 justify-content-end">
                            <form action="{{ action('Admin\SavingController@index') }}" method="get">
                                <input type="hidden" name="user_id" value="{{ $users->id }}">
                                <div class="d-grid gap-2 d-md-block" align="right">
                                    <button type="submit" class="btn btn-outline-dark bg-{color}">
                                        グラフへ
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="wrap-chart">
                        <div class="chart-container" style="position: relative; width: 100%; height: 95%;">
                            <canvas id="savingCart"></canvas>
                        </div>
                    </div>
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
                const expensestageData = []; // dataを配列に格納するために初期化
                $.each(data['expense_stage'], function (index, value) { //dataの中身からvalueを取り出す
                    expensestageData.push(value); //　dataを格納する
                });
                const expensesum1 = expensestageData.reduce(function(a,b){return a + b;});
                const expenseconcertData = []; 
                $.each(data['expense_concert'], function (index, value) { 
                    expenseconcertData.push(value); 
                });
                const expensesum2 = expenseconcertData.reduce(function(a,b){return a + b;});
                const expensewebData = []; 
                $.each(data['expense_web'], function (index, value) { 
                    expensewebData.push(value); 
                });
                const expensesum3 = expensewebData.reduce(function(a,b){return a + b;});
                const expensemovieData = []; 
                $.each(data['expense_movie'], function (index, value) { 
                    expensemovieData.push(value); 
                });
                const expensesum4 = expensemovieData.reduce(function(a,b){return a + b;});
                const expensecdData = []; 
                $.each(data['expense_cd'], function (index, value) { 
                    expensecdData.push(value);
                });
                const expensesum5 = expensecdData.reduce(function(a,b){return a + b;});
                const expensedvdData = []; 
                $.each(data['expense_dvd'], function (index, value) { 
                    expensedvdData.push(value);
                });
                const expensesum6 = expensedvdData.reduce(function(a,b){return a + b;});
                const expensemagazineData = []; 
                $.each(data['expense_magazine'], function (index, value) { 
                    expensemagazineData.push(value); 
                });
                const expensesum7 = expensemagazineData.reduce(function(a,b){return a + b;});
                const expensetrainData = []; 
                $.each(data['expense_train'], function (index, value) { 
                    expensetrainData.push(value); 
                });
                const expensesum8 = expensetrainData.reduce(function(a,b){return a + b;});
                const expensetravelData = []; 
                $.each(data['expense_travel'], function (index, value) { 
                    expensetravelData.push(value); 
                });
                const expensesum9 = expensetravelData.reduce(function(a,b){return a + b;});
                const expensetoyData = []; 
                $.each(data['expense_toy'], function (index, value) { 
                    expensetoyData.push(value); 
                });
                const expensesum10 = expensetoyData.reduce(function(a,b){return a + b;});
                const expenseothersData = []; 
                $.each(data['expense_others'], function (index, value) { 
                    expenseothersData.push(value); 
                });
                const expensesum11 = expenseothersData.reduce(function(a,b){return a + b;});
                const myData = [expensesum1,expensesum2,expensesum3,expensesum4,expensesum5,expensesum6,expensesum7,expensesum8,expensesum9,expensesum10,expensesum11];
                const savingstageData = [];
                $.each(data['saving_stage'], function (index, value) { 
                    savingstageData.push(value); 
                });
                const savingsum1 = savingstageData.reduce(function(a,b){return a + b;});
                const savingconcertData = []; 
                $.each(data['saving_concert'], function (index, value) { 
                    savingconcertData.push(value); 
                });
                const savingsum2 = savingconcertData.reduce(function(a,b){return a + b;});
                const savingwebData = []; 
                $.each(data['saving_web'], function (index, value) { 
                    savingwebData.push(value); 
                });
                const savingsum3 = savingwebData.reduce(function(a,b){return a + b;});
                const savingmovieData = []; 
                $.each(data['saving_movie'], function (index, value) { 
                    savingmovieData.push(value); 
                });
                const savingsum4 = savingmovieData.reduce(function(a,b){return a + b;});
                const savingcdData = []; 
                $.each(data['saving_cd'], function (index, value) { 
                    savingcdData.push(value);
                });
                const savingsum5 = savingcdData.reduce(function(a,b){return a + b;});
                const savingdvdData = []; 
                $.each(data['saving_dvd'], function (index, value) { 
                    savingdvdData.push(value);
                });
                const savingsum6 = savingdvdData.reduce(function(a,b){return a + b;});
                const savingmagazineData = []; 
                $.each(data['saving_magazine'], function (index, value) { 
                    savingmagazineData.push(value); 
                });
                const savingsum7 = savingmagazineData.reduce(function(a,b){return a + b;});
                const savingmediaData = []; 
                $.each(data['saving_media'], function (index, value) { 
                    savingmediaData.push(value); 
                });
                const savingsum8 = savingmediaData.reduce(function(a,b){return a + b;});
                const savingothersData = []; 
                $.each(data['saving_others'], function (index, value) { 
                    savingothersData.push(value); 
                });
                const savingsum9 = savingothersData.reduce(function(a,b){return a + b;});
                const savingData = [savingsum1,savingsum2,savingsum3,savingsum4,savingsum5,savingsum6,savingsum7,savingsum8,savingsum9];
                console.log(savingData);
                console.log(myData);
                const ctx = document.getElementById('expenseChart').getContext('2d');
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
                                    }
                                }
                            ]
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                    }
                });
                const ctx2 = document.getElementById('savingCart').getContext('2d');
                window.myChart2 = new Chart( ctx2, {
                    type: 'bar',
                    data: {
                        labels: ['演劇', 'コンサート', '配信', '映画', 'CD', 'DVD', '雑誌', 'メディア出演', 'その他'],
                        datasets: [
                            {
                                type: 'bar',　// 棒グラフ
                                label: '貯金',
                                data: savingData,
                                backgroundColor: [
                                    'rgb(255, 99, 132)',
                                　　'rgb(54, 162, 235)',
                                    'rgb(255, 206, 86)',
                                    'rgb(75, 192, 192)',
                                    'rgb(153, 102, 255)',
                                    'rgb(255, 159, 64)',
                                    'rgb(248, 86, 252)',
                                    'rgb(86, 94, 252)',
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
                                    'rgb(157, 86, 252)'
                                ],
                                borderWidth: 1, // バーの境界線の太さ
                                yAxisID: 'y-axis-2'
                            }
                            
                        ]
                    },
                    options: {
                        title: {
                            display: true,
                        },
                        legend: {
                        position: 'top'
                        },
                        scales: {
                            yAxes: [
                                {
                                    id: "y-axis-2",         // Ｙ左軸の定義
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
                                    }
                                }
                            ]
                        },
                        responsive: true,
                        maintainAspectRatio: false,
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