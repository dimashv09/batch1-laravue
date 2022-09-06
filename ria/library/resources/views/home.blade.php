@extends('layouts.admin')
@section('header', 'Home')

@section('content')
<div class="container-fluid">

  <!-- Content Row -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{$total_catalog}}</h3>

                    <p>Catalog</p>
                </div>
                <div class="icon">
                    <i class="fas fa-boxes"></i>
                </div>
                <a href="{{ url('catalogs') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{$total_book}}</h3>

                    <p>Book</p>
                </div>
                <div class="icon">
                    <i class="fas fa-book"></i>
                </div>
                <a href="{{ url('books') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{$total_author}}</h3>

                    <p>Author</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-edit"></i>
                </div>
                <a href="{{ url('authors') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{$total_publisher}}</h3>

                    <p>Publisher</p>
                </div>
                <div class="icon">
                    <i class="fas fa-paper-plane"></i>
                </div>
                <a href="{{ url('publishers') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
        <!-- ./col -->
    </div>


<section class="content">
    <div class="row">
    </div>

 <!-- DONUT CHART -->
    <div class="card card-success" class="btn btn-secondary">
        <div class="card-header accent-gray-dark">
            <h3 class="card-title">Publishers Chart</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <canvas id="donutChart"
                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
        </div>
    </div>


<!--barChart -->
    <div class="card card-warning">

        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Transaction Chart</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="pieChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>

        @endsection


        <!-- jQuery -->
        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>

        <script>
            // Data Donut Chart
            var data_donut = '{!! json_encode($data_donut) !!}';
            var label_donut = '{!! json_encode($label_donut) !!}';
            // Data Pie Chart
            var dataPie = '{!! json_encode($data_pie) !!}';
            var labelPie = '{!! json_encode($label_pie) !!}';
            // Data Bar Chart
            var data_bar = '{!! json_encode($data_bar) !!}';

 $(function () {
               //- DONUT CHART -
                //-------------
                // Get context with jQuery - using jQuery's .get() method.
                var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
                var donutData = {
                    labels: JSON.parse(label_donut),
                    datasets: [{
                        data: JSON.parse(data_donut),
                        backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc',
                            '#d2d6de'
                        ],
                    }]
                }
                var donutOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                }
                //Create pie or douhnut chart
                // You can switch between pie and douhnut using the method below.
                new Chart(donutChartCanvas, {
                    type: 'doughnut',
                    data: donutData,
                    options: donutOptions
                })
                //- PIE CHART -
                //-------------
                // Get context with jQuery - using jQuery's .get() method.
                var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
                var pieData = donutData;
                var pieOptions = {
                    maintainAspectRatio: false,
                    responsive: true,
                }
                //Create pie or douhnut chart
                // You can switch between pie and douhnut using the method below.
                new Chart(pieChartCanvas, {
                    type: 'bar',
                    data: pieData,
                    options: pieOptions
                })
                //- BAR CHART -
                var barChartData = {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August',
                        'September', 'October', 'November', 'December'
                    ],
                    datasets: JSON.parse(data_donut)
                }
                var barChartCanvas = $('#barChart').get(0).getContext('2d')
                var barChartData = $.extend(true, {}, barChartData)
                var barChartOptions = {
                    responsive: true,
                    maintainAspectRatio: false,
                    datasetFill: false
                }
                new Chart(barChartCanvas, {
                    type: 'bar',
                    data: barChartData,
                    options: barChartOptions
                })
            })
        </script>
        </body>

        </html>
