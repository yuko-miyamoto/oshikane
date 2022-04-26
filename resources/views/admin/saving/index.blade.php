@extends('layouts.admin')
@section('title', 'オシカネ チョキングラフ')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mx-auto">
                <div class="col-md-6">
                    <h2>
                        貯金のグラフ
                    </h2>
                </div>
                @if($years != null)
                    <div class="col-md-6">
                        <form action="{{ action('Admin\SavingController@detail_index') }}" method="get">
                            <input type="hidden" name="user_id" value="{{ $user_id }}">
                            <button type="submit" class="btn btn-outline-dark bg-{color}">
                                貯金の一覧をみる
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
                                    <option value="">貯金を登録してください。</option>
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
                        @endif
                    </div>
                </div>
                <canvas id="savingChart"></canvas>
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
            // セレクトボックスの切り替えで
            $('#oshi_id, #year').change(function() {
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
                $.ajax({
                    typr: 'get', // HTTP通信の種類
                    url: 'ajax/saving',
                    data: {
                        user_id : userId,
                        oshi_id : id,
                        year : year
                    }, // Controllerに送る値
                    dataType: 'json'
                })
                //通信が成功
                .done((data) => {
                    const stageData = [];
                    $.each(data['stage'], function (index, value) { 
                        stageData.push(value); 
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
                    const mediaData = []; 
                    $.each(data['media'], function (index, value) { 
                        mediaData.push(value); 
                    });
                    const sum8 = mediaData.reduce(function(a,b){return a + b;});
                    const othersData = []; 
                    $.each(data['others'], function (index, value) { 
                        othersData.push(value); 
                    });
                    const sum9 = othersData.reduce(function(a,b){return a + b;});
                    const savingData = [sum1,sum2,sum3,sum4,sum5,sum6,sum7,sum8,sum9];
                    console.log(savingData);
                    const ctx = document.getElementById('savingChart').getContext('2d');
                    window.myChart = new Chart( ctx, {
                        type: 'bar',
                        data: {
                        labels: ['演劇', 'コンサート', '配信', '映画', 'CD', 'DVD', '雑誌', 'TV出演', 'その他'],
                        datasets: [{
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
                            borderColor: 'rgb(255, 99, 132)'
                        }],
                        },
                        options: {
                            responsive: true,
                            legend: {
                                display: false
                            },
                            title: {
                                display: true,
                                fontSize: 14,
                                text: '推し貯金'
                            },
                        },
                    });
                })
                //通信が失敗
                .fail((error) => {
                    console.log(error.ststusText);
                });
            });
        })
    </script>
@endsection
@section('footer')
    <div style="text-align: center;">
        <button type="button" class="btn btn-outline-dark bg-{color} btn-lg" onClick="history.back()">戻る</button>
    </div>
@endsection
