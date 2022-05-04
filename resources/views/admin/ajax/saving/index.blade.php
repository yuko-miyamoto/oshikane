@extends('layouts.admin')
@section('title', 'オシカネ チョキン')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mx-auto">
                <h2>貯金の一覧</h2>
                <div class="wrap-chart">
                    <div class="chart-container" style="position: relative; width: 100%; height: 95%;">
                        <canvas id="savingChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection