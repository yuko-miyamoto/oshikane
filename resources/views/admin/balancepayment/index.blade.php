@extends('layouts.admin')
@section('title', 'オシカネ シシュツグラフ')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mx-auto">
                <div class="col-md-6">
                    <h2>
                        支出と予算のグラフ
                    </h2>
                </div>
                @if($years != null)
                    <div class="col-md-6">
                        <form action="{{ action('Admin\ExpenseController@index') }}" method="get">
                            <input type="hidden" name="user_id" value="{{ $user_id }}">
                            <button type="submit" class="btn btn-outline-dark bg-{color}">
                                支出の一覧をみる
                            </button>
                        </form>
                    </div>
                @endif
                <div class="row">
                    <div class="form-row justify-content-end">
                        <div class="form-group col-md-3">
                            <select class="form-control" name="year" id="year">
                                @if($years != null)
                                    <option value="">年を選択</option>
                                    @foreach($years as $year)
                                        <option value="{{ $year }}">{{ $year }}年</option>
                                    @endforeach
                                @else
                                    <option value="">支出を登録してください。</option>
                                @endif
                            </select>
                        </div>
                        @if($years != null)
                            <div class="form-group col-md-3">
                                <select class="form-control" name="oshi_id" id="oshi_id">
                                    <option value="">推しを選択</option>
                                    <option value="all">全表示</option>
                                    @foreach($oshis->oshis as $oshi)
                                        <option value="{{ $oshi->id }}">{{ $oshi->oshi_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2 offset-1">
                                <input type="button" id="draw" class="btn btn-outline-dark bg-{color} btn-sm" value="グラフ表示">
                            </div>
                        @endif
                    </div>
                </div>
                <div class="wrap-chart">
                    <div class="chart-container" style="position: relative; width: 100%; height: 95%;">
                        <canvas id="myChart1"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function(){ // 画面が読み込まれた
            const userId = getParam('user_id');
            function getParam(name, url) { 
                if (!url) url = window.location.href; //url取得
                name = name.replace(/[\[\]]/g, "\\$&"); // replace(置換) \はエスケープ処理判断->\\
                const regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"), // 正規表現
                results = regex.exec(url); // exec(最初に一致した文字列を抽出)
                if (!results) return null;
                if (!results[2]) return '';
                return decodeURIComponent(results[2].replace(/\+/g, " "));
            }
            console.log(userId);
            // グラフボタンが押された
            $('#draw').click(function() {
                const id = $('#oshi_id').val(); // 選択した値を取得
                const year = $('#year').val();
                if(year == "") {
                    alert('年度を選択してください。');
                    return false;
                }
                if(id == ""){
                    alert('推しを選択してください。');
                    return false;
                }
                function getData(callback) {
                    $.ajax({
                        typr: 'get', // HTTP通信の種類
                        url: 'ajax/balancepayment',
                        data: {
                            user_id : userId,
                            oshi_id : id,
                            year : year
                        }, // Controllerに送る値
                        dataType: 'json'
                    })
                    //通信が成功
                    .done((data) => {
                        console.log(userId);
                        callback(data);
                        const expenseStageData = []; // dataを配列に格納するために初期化
                        $.each(data['expense_stage'], function (index, value) { //dataの中身からvalueを取り出す
                            expenseStageData.push(value); //　dataを格納する
                        });
                        const sum1 = expenseStageData.reduce(function(a,b){return a + b;});
                        const expenseConcertData = []; 
                        $.each(data['expense_concert'], function (index, value) { 
                            expenseConcertData.push(value); 
                        });
                        const sum2 = expenseConcertData.reduce(function(a,b){return a + b;});
                        const expenseWebData = []; 
                        $.each(data['expense_web'], function (index, value) { 
                            expenseWebData.push(value); 
                        });
                        const sum3 = expenseWebData.reduce(function(a,b){return a + b;});
                        const expenseMovieData = []; 
                        $.each(data['expense_movie'], function (index, value) { 
                            expenseMovieData.push(value); 
                        });
                        const sum4 = expenseMovieData.reduce(function(a,b){return a + b;});
                        const expenseCdData = []; 
                        $.each(data['expense_cd'], function (index, value) { 
                            expenseCdData.push(value);
                        });
                        const sum5 = expenseCdData.reduce(function(a,b){return a + b;});
                        const expenseDvdData = []; 
                        $.each(data['expense_dvd'], function (index, value) { 
                            expenseDvdData.push(value);
                        });
                        const sum6 = expenseDvdData.reduce(function(a,b){return a + b;});
                        const expenseMagazineData = []; 
                        $.each(data['expense_magazine'], function (index, value) { 
                            expenseMagazineData.push(value); 
                        });
                        const sum7 = expenseMagazineData.reduce(function(a,b){return a + b;});
                        const expenseTrainData = []; 
                        $.each(data['expense_train'], function (index, value) { 
                            expenseTrainData.push(value); 
                        });
                        const sum8 = expenseTrainData.reduce(function(a,b){return a + b;});
                        const expenseTravelData = []; 
                        $.each(data['expense_travel'], function (index, value) { 
                            expenseTravelData.push(value); 
                        });
                        const sum9 = expenseTravelData.reduce(function(a,b){return a + b;});
                        const expenseToyData = []; 
                        $.each(data['expense_toy'], function (index, value) { 
                            expenseToyData.push(value); 
                        });
                        const sum10 = expenseToyData.reduce(function(a,b){return a + b;});
                        const expenseOthersData = []; 
                        $.each(data['expense_others'], function (index, value) { 
                            expenseOthersData.push(value); 
                        });
                        const sum11 = expenseOthersData.reduce(function(a,b){return a + b;});
                        const allExpenseData = [sum1,sum2,sum3,sum4,sum5,sum6,sum7,sum8,sum9,sum10,sum11];
                        const allBudgetData = [
                            data['budget_stage'],
                            data['budget_concert'],
                            data['budget_web'],
                            data['budget_movie'],
                            data['budget_cd'],
                            data['budget_dvd'],
                            data['budget_magazine'],
                            data['budget_train'],
                            data['budget_travel'],
                            data['budget_toy'],
                            data['budget_others']
                        ];
                        console.log(allBudgetData);
                        console.log(allExpenseData);
                        drawChart();
                        function drawChart() {
                            const ctx = document.getElementById('myChart1').getContext('2d');
                            const myChart = new Chart( ctx, {
                                type: 'bar',
                                data: {
                                    labels: ['演劇', 'コンサート', '配信', '映画', 'CD', 'DVD', '雑誌', '交通費', '宿泊費', 'ガチャ', 'その他'],
                                    datasets: [
                                        {
                                            type: 'line',  //折れ線グラフ
                                            label: '予算',
                                            data: allBudgetData,
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
                                            data: allExpenseData,
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
                                                scaleLabel: {                           // 軸ラベル設定
                                                    display: window.screen.width > 414, //表示設定
                                                    fontColor: "red",
                                                    fontSize: 14                       //フォントサイズ
                                                },                 
                                                ticks: {
                                                    fontColor: "black",             
                                                    beginAtZero: true,
                                                    suggestedMax: 50000,
                                                    suggestedMin: 1000,
                                                }
                                            }
                                        ],
                                        xAxes: [
                                            {
                                                scaleLabel: {                           // 軸ラベル設定
                                                    display: window.screen.width > 414, //表示設定
                                                },
                                                ticks: {
                                                    min: 1,
                                                }
                                            }
                                        ]
                                    },
                                    responsive: true,
                                    maintainAspectRatio: false,
                                }
                            });
                            document.getElementById('myChart1').addEventListener('click', e => {
                                const elements = myChart.getElementAtEvent(e);
                                if (elements.length) {
                                    window.location.href = '/admin/expense/index'
                                }
                            });
                        }
                    })
                    //通信が失敗
                    .fail((error) => {
                        console.log(error.ststusText);
                    });
                }
                getData(function (data) {
                    const chartData = data;
                });
            })
        })
    </script>
@endsection
@section('footer')
    <div style="text-align: center;">
        <button type="button" class="btn btn-outline-dark bg-{color} btn-lg" onClick="history.back()">戻る</button>
    </div>
@endsection