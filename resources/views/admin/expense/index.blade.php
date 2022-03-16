@extends('layouts.admin')
@section('title', 'オシカネ シシュツ')
@section('header_sub')
    
@endsection
@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mx-auto">
                <h2>支出の一覧</h2>
                <div class="row">
                    <div class="form-row justify-content-end">
                        <div class="form-group col-md-3">
                            <select class="form-control" name="year" id="year">
                                <option value="">年を選択</option>
                                @foreach($years as $year)
                                <option value="{{ $year }}">{{ $year }}年</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <select class="form-control" name="oshi_id" id="oshi_id">
                                <option value="">推しを選択</option>
                                <option value="all">全表示</option>
                                @foreach($login_user->oshis as $oshi)
                                <option value="{{ $oshi->id }}">{{ $oshi->oshi_name }}くん</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <canvas id="myChart1"></canvas>
            </div>
        </div>
    </div>
    <script>
        $(function(){ // 画面が読み込まれた
        // セレクトボックスの切り替えで
            $('#oshi_id, #year').change(function() {
                const id = $('#oshi_id').val(); // 選択した値を取得
                const year = $('#year').val();
                $.ajax({
                    typr: 'get', // HTTP通信の種類
                    url: 'ajax/expense',
                    data: {
                        oshi_id : id,
                        year : year
                    }, // Controllerに送る値
                    dataType: 'json'
                })
                //通信が成功
                .done((data) => {
                    if( id != "" ) {
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
                        const budget = @json($budgets);
                        const budgetData = [];
                        $.each(budget, function (index, value) {
                            budgetData.push(value);
                        });
                        console.log(budgetData);
                        console.log(myData);
                        const ctx = document.getElementById('myChart1').getContext('2d');
                        window.myChart = new Chart( ctx, {
                            type: 'bar',
                            data: {
                                labels: ['演劇', 'コンサート', '配信', '映画', 'CD', 'DVD', '雑誌', '交通費', '宿泊費', 'ガチャ', 'その他'],
                                datasets: [
                                    {
                                        type: 'line',  //折れ線グラフ
                                        label: '予算',
                                        data: budgetData,
                                        backgroundColor: 'rgba(100, 170, 100, 0.2)',
                                        borderColor: 'rgb(100, 170, 100)',
                                        borderWidth: 1.2, 
                                        pointBackgroundColor: 'rgba(100, 170, 100, 0.2)', //ポイントの背景色
                                        pointStyle: 'circle', //ポイントの形(circle[○],rect[□],triangle[△]等がある)
                                        radius: 4, //ポイントの半径
                                        pointHoverBackgroundColor: 'rgba(100, 170, 100, 0.2)', //ホバー時のポイント背景色
                                        pointHoverRadius: 6, //ホバー時のポイントの半径
                                        pointHoverBorderColor: 'rgb(100, 170, 100)', //ホバー時のポイント背景色
                                        pointHoverBorderWidth: 2, //ホバー時の先の太さ
                                        lineTension: 0, //ベジェ曲線の張力（0＝直線）
                                        fill: false, //線下を塗りつぶすかどうか
                                        
                                    },
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
                    }
                    
                })
                //通信が失敗
                .fail((error) => {
                    console.log(error.ststusText);
                });
            });
        })
    </script>
@endsection