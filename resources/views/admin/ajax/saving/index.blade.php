@extends('layouts.admin')
@section('title', 'オシカネ チョキン')
@section('header_sub')
    
@endsection
@section('content')
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mx-auto">
                <h2>貯金の一覧</h2>
                <div class="chart-container" style="position: relative; width: 100%; height: 400px;">
                    <canvas id="savingChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    
@endsection