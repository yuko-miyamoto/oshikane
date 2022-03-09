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
            const id = $('#oshi_id').val(); // value値を取得
            const year = $('#year').val();
            $.ajax({
                typr: 'get', // HTTP通信の種類
                url: 'ajax/expense',
                data: {
                    'oshi_id' : id,
                    'year' : year
                }, // Controllerに送る値
                dataType: 'json'
            })
            //通信が成功
            .done((data) => {
                const myData = []; // dataを配列に格納するために初期化
                $.each(data['stage'], function (index, value) { //dataの中身からvalueを取り出す
                    myData.push(value); //　dataを格納する
                });
                console.log(myData);
                    const ctx = document.getElementById('myChart1').getContext('2d');
                    window.myChart = new Chart( ctx, {
                        type: 'bar',
                        data: {
                            labels: ['演劇', 'コンサート', '配信', '映画', 'CD', 'DVD', '雑誌', '交通費', '宿泊費', 'ガチャ', 'その他'],
                            datasets: [{
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
                                borderColor: 'rgb(255, 99, 132)'
                            }],
                        },
                        option: {
                            maintainAspectRatio: false,
                        }
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