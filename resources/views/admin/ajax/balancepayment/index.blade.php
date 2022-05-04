@extends('layouts.admin')
@section('title', 'オシカネ グラフ')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mx-auto">
                <h2>支出と予算のグラフ</h2>
                <div class="wrap-chart">
                    <div class="chart-container" style="position: relative; width: 100%; height: 95%;">
                        <canvas id="myChart1"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection