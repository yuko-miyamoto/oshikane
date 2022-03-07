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
                    <div class="from-row justify-content-end">
                        <div class="col-md-4">
                            <select class="form-control" name="oshi_name" id="oshi_name">
                                <option>推しを選択</option>
                                @foreach($login_user->oshis as $oshi)
                                <option name="oshi_id" id="oshi_id" value="{{ $oshi->id }}">{{ $oshi->oshi_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <span id="span1"></span>
                <script>
                $("#oshi_name").change(function() {
                // value値を取得
                const str1 = $("#oshi_name").val();
                $("#span1").text(str1);
                });
                </script>
                
                <script>
                    $(function(){ // 遅延処理
                    // セレクトボックスが切り替わったら発動
                    $('#oshi_id').change(function() {
                    const id = $('#oshi_id').val();
                    
                    $.ajax({
                　　type: 'GET',
                    url: 'admin/ajax/expense', // url: は読み込むURLを表す
                    data: { 
                        'oshi_id' : id 
                    },
                    dataType: 'json', // 読み込むデータの種類を記入
                }).done(function (data) {
                
                // 通信成功時の処理
                function drawChart() {
                
                    const ctx = document.getElementById('myChart1').getContext('2d');
                    window.myChart = new Chart(ctx, {
                            　　type: 'bar',
                            　　data: {
                            　　labels: ['演劇', 'コンサート', '配信', '映画', 'CD', 'DVD', '雑誌', '交通費', '宿泊費', 'ガチャ', 'その他'],
                            　　datasets: [{
                            　　label: 'マイグラフ',
                            　　data: 0,
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
                                'rgb(157, 86, 252)'],
                                borderColor: 'rgb(255, 99, 132)'
                            }]
                            },
                            options: {
                            　　maintainAspectRatio: false
                            }
                        })
                        const updateChart = (selectedData) => {
                        　　chart.data.labels = selectedData.labels;
                            chart.data.datasets[0].data = selectedData.data;
                            chart.update();
                        }
                        }
                        drawChart();
                    　　}).fail(function (err) {
                    　　// 通信失敗時の処理
                    　　      alert('ファイルの取得に失敗しました。');
                        });
                    }
                );
            });
                }
        </script>
                <div class="row">
                    <div class="from-row justify-content-end">
                        <div class="col-md-4">
                            <select class="form-control" name="oshi_id" id="oshi_id">
                                <option>推しを選択</option>
                                @foreach($login_user->oshis as $oshi)
                                <option value="{{ $oshi->id }}">{{ $oshi->oshi_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                
<canvas id="myChart1"></canvas>
</div>
</div>
</div>
$(document).ready(function(){
        
        $.get('ajax/expense')
        .done(function(data) {
        console.log( data );
        
    });
    })
    <script>
    const ctx = document.getElementById('myChart1').getContext('2d');
    myChart = new Chart(ctx, {
                            　　type: 'bar',
                            　　data: {
                            　　labels: ['演劇', 'コンサート', '配信', '映画', 'CD', 'DVD', '雑誌', '交通費', '宿泊費', 'ガチャ', 'その他'],
                            　　datasets: [{
                            　　label: 'マイグラフ',
                            　　data: 0,
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
                                'rgb(157, 86, 252)'],
                                borderColor: 'rgb(255, 99, 132)'
                            }]
                            },
                            options: {
                            　　maintainAspectRatio: false
                            }
                        })
                        const updateChart = (selectedData) => {
                        　　chart.data.labels = selectedData.labels;
                            chart.data.datasets[0].data = selectedData.data;
                            chart.update();
                        }
                    　　
        </script>
   

@endsection
                
</div>
@endsection