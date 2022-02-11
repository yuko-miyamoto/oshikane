@extends('layouts.admin')
@section('title', 'オシカネ お金一覧')
@section('header_sub')
    <li class="nav-item"><a class="nav-link" aria-current="page" href="{{ action('Admin\ExpenseController@add') }}">支出<br>登録</a></li>
    <li class="nav-item"><a class="nav-link" aria-current="page" href="{{ action('Admin\SavingController@add') }}">貯金<br>登録</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ action('Admin\ExpenseController@index') }}">お金<br>一覧</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ action('Admin\YosanController@add') }}">予算<br>登録</a></li>
@endsection
@section('content')
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h2>お金の一覧</h2>
                <div class="col-10">
                                <select  class="form-control_02" name="id" style="display: inline; width: 30%;">
                                    <option>推しを選択する</option>
                                    @foreach($oshis as $oshi)
                                    <p>{{ $oshis->oshi_name->name }}</p>
                                    @endforeach
                                </select>
                            </div>
               
            
            <div class="chart-container" style="position: relative; width: 100%; height: 300px;">
                <canvas id="myChart2"></canvas>
                <canvas id="myChart1"></canvas>
            </div>
        </div>
    </div>
    <script>
    var ctx = document.getElementById('myChart2').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['演劇', 'コンサート', '配信', '映画', 'CD', 'DVD', '雑誌', '交通費', '宿泊費', 'ガチャ', 'その他'],
            datasets: [{
                label: 'マイグラフ',
                data: @json($expense_array2),
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
                'rgb(157, 86, 252)',],
                
                borderColor: 'rgb(255, 99, 132)'
            }]
        },
        options: {
            maintainAspectRatio: false
        }
    });
</script>

    <script>
    var ctx = document.getElementById('myChart1').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['演劇', 'コンサート', '配信', '映画', 'CD', 'DVD', '雑誌', '交通費', '宿泊費', 'ガチャ', 'その他'],
            datasets: [{
                label: 'マイグラフ',
                data: @json($expense_array1),
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
                'rgb(157, 86, 252)',],
                
                borderColor: 'rgb(255, 99, 132)'
            }]
        },
        options: {
            maintainAspectRatio: false
        }
    });
</script>
@endsection