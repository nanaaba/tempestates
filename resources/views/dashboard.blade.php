
@extends('layouts.master')

@section('content')



<aside class="right-side">

    <section class="content-header">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-5 col-xs-8">
                <div class="header-element">
                    <h3>
                        <small>Dashboard</small>
                    </h3>
                </div>
            </div>

        </div>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <!-- Basic charts strats here-->
                <div class="card ">
                    <div class="card-header">
                        <h4 class="card-title">
                            <i class="ti-bar-chart-alt"></i> Tenants Payments Overview This Year Chart
                        </h4>
                        <span class="float-right">
                            <i class="fa fa-fw ti-angle-up clickable"></i>
                            <i class="fa fa-fw ti-close removecard "></i>
                        </span>
                    </div>
                    <div class="card-body">
                        <div>
                            <canvas id="line-chart" width="800" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
      
        </div>

        
               <div class="row">
            <div class="col-lg-12">
                <!-- Basic charts strats here-->
                <div class="card ">
                    <div class="card-header">
                        <h4 class="card-title">
                            <i class="ti-bar-chart-alt"></i> Tenants Bills Overview This Year Chart
                        </h4>
                        <span class="float-right">
                            <i class="fa fa-fw ti-angle-up clickable"></i>
                            <i class="fa fa-fw ti-close removecard "></i>
                        </span>
                    </div>
                    <div class="card-body">
                        <div>
                            <canvas id="line2-chart" width="800" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
      
        </div>

        <div class="background-overlay"></div>
    </section>
    <!-- /.content --> </aside>
@endsection
@section('userjs')
<script src="{{asset('vendors/chartjs/js/Chart.js')}}"></script>
<script type="text/javascript" src="{{asset('js/custom_js/chartjs-charts.js')}}"></script>


<script type="text/javascript">


function getPayments() {



    return    $.ajax({
        url: "{{url('banking/payments/all')}}",
        type: "GET",
        dataType: 'json'

    });
}

function getNonPerformingCashiers() {



    return    $.ajax({
        url: "{{url('reports/nonperformingcashiers')}}",
        type: "GET",
        dataType: 'json'

    });
}


$.when(getPayments()).done(function (response) {
    console.log(response);
    // the code here will be executed when all four ajax requests resolve.
    // a1, a2, a3 and a4 are lists of length 3 containing the response text,
    // status, and jqXHR object for each of the four ajax calls respectively.
    var dataSet = response.data;
    var cashiers = [];
    var figures = [];
    console.log('data her: ' + response);
    $.each(dataSet, function (i, item) {

        cashiers.push(item.name);
        figures.push(item.volume);
    });
    figures = figures.map(Number);
    console.log('figures: ' + figures);
    console.log('regions:' + cashiers);
    var ctx = document.getElementById("cashiersPerformance");

    new Chart(ctx, {
        type: 'horizontalBar',
        data: {
            labels: cashiers,
            datasets: [{
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    "borderWidth": 1,
                    "pointRadius": 1,
                    "label": "Performig Cashiers",
                    "data": figures

                }]

        },
        options: {
            scales: {
                yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
            }
        }
    });
});



$.when(getNonPerformingCashiers()).done(function (response) {
    console.log(response);
    // the code here will be executed when all four ajax requests resolve.
    // a1, a2, a3 and a4 are lists of length 3 containing the response text,
    // status, and jqXHR object for each of the four ajax calls respectively.
    var dataSet = response.data;
    var cashiers = [];
    var figures = [];
    console.log('data her: ' + response);
    $.each(dataSet, function (i, item) {

        cashiers.push(item.cashier_name);
        figures.push(item.volume);
    });
    figures = figures.map(Number);
    console.log('figures: ' + figures);
    console.log('regions:' + cashiers);
    var ctx = document.getElementById("cashiersNonPerformance");

    new Chart(ctx, {
        type: 'horizontalBar',
        data: {
            labels: cashiers,
            datasets: [{
                    "backgroundColor": 'rgba(54, 162, 235, 0.2)',
                    "borderColor": 'rgba(54, 162, 235, 1)',
                    "borderWidth": 1,
                    "pointRadius": 1,
                    "label": "Non-Performig Cashiers",
                    "data": figures

                }]

        }
    });
});

$.when(getRegionPerformance()).done(function (response) {
    console.log(response);
    // the code here will be executed when all four ajax requests resolve.
    // a1, a2, a3 and a4 are lists of length 3 containing the response text,
    // status, and jqXHR object for each of the four ajax calls respectively.
    var dataSet = response.data;
    var regions = [];
    var figures = [];
    console.log('data her: ' + response);
    $.each(dataSet, function (i, item) {

        regions.push(item.region_name);
        figures.push(item.volume);
    });
    figures = figures.map(Number);
    console.log('figures: ' + figures);
    console.log('regions:' + regions);
    var ctx = document.getElementById("regions").getContext('2d');
    ;

    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: regions,
            datasets: [{
                    backgroundColor: [
                        "#2ecc71",
                        "#3498db",
                        "#95a5a6",
                        "#9b59b6",
                        "#f1c40f",
                        "#e74c3c",
                        "#34495e"
                    ],
                    data: figures
                }]

        }
    });
});


$.when(getShiftPerformance()).done(function (response) {
    console.log(response);
    // the code here will be executed when all four ajax requests resolve.
    // a1, a2, a3 and a4 are lists of length 3 containing the response text,
    // status, and jqXHR object for each of the four ajax calls respectively.
    var dataSet = response.data;
    var shifts = [];
    var figures = [];
    console.log('data her: ' + response);
    $.each(dataSet, function (i, item) {

        shifts.push(item.shift);
        figures.push(item.volume);
    });
    figures = figures.map(Number);
    console.log('figures: ' + figures);
    console.log('shifts:' + shifts);
    var ctx = document.getElementById("shift").getContext('2d');
    ;

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: shifts,
            datasets: [{
                    backgroundColor: [
                        "#9b59b6",
                        "#f1c40f",
                        "#e74c3c",
                        "#34495e"
                    ],
                    data: figures
                }]

        }
    });
});



$.when(getNonPerformingTolls()).done(function (response) {
    console.log(response);
    // the code here will be executed when all four ajax requests resolve.
    // a1, a2, a3 and a4 are lists of length 3 containing the response text,
    // status, and jqXHR object for each of the four ajax calls respectively.
    var dataSet = response.data;
    var cashiers = [];
    var figures = [];
    console.log('data her: ' + response);
    $.each(dataSet, function (i, item) {

        cashiers.push(item.area);
        figures.push(item.volume);
    });
    figures = figures.map(Number);
    console.log('tollfigures: ' + figures);
    console.log('toll regions:' + cashiers);
    var ctx = document.getElementById("nonperformingtolls");

    new Chart(ctx, {
        type: 'horizontalBar',
        data: {
            labels: cashiers,
            datasets: [{
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    "borderWidth": 1,
                    "pointRadius": 1,
                    "label": "Non Performig TollPoints",
                    "data": figures

                }]

        }
    });
});



</script>
@endsection

