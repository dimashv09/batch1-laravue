@extends('layouts.admin')

@section('header', 'Dashboard')

@section('content')
<div class="container">
    <div class="row">
        <!-- Box 1 -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $books }}</h3>
                    <p>Total of Books</p>
                </div>
                <div class="icon">
                    <i class="fas fa-book"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- Box 2 -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $members }}</h3>
                    <p>Total of Members</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-friends"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- Box 3 -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $publishers }}</h3>
                    <p>Total of Publishers</p>
                </div>
                <div class="icon">
                    <i class="fas fa-file-invoice"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- Box 4 -->
        <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $transactions }}</h3>
                    <p>Total of Transactions</p>
                </div>
                <div class="icon">
                    <i class="fas fa-receipt"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <!-- DONUT CHART -->
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Data of Publishers</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body bg-light">
                    <canvas id="donutChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <!-- BAR CHART -->
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Data of Authors</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body bg-light">
                    <canvas id="pieChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <!-- BAR CHART -->
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Data of Transactions</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body bg-light">
                    <div class="chart">
                        <canvas id="barChart"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<!-- ChartJS -->
<script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>

<script>
    // Data Donut Chart
    const dataDonut = '{!! json_encode($data_donut) !!}'
    const labelDonut = '{!! json_encode($label_donut) !!}'
    // Data Pie Chart
    const dataPie = '{!! json_encode($data_pie) !!}'
    const labelPie = '{!! json_encode($label_pie) !!}'
    // Data Bar Chart
    const dataBar = '{!! json_encode($data_bar) !!}'

    $(function () {
        //- DONUT CHART -
        // Get context with jQuery - using jQuery's .get() method.
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData        = {
            labels: JSON.parse(labelDonut),
            datasets: [{
                data: JSON.parse(dataDonut),
                backgroundColor : [
                    '#03044D',
                    '#030455',
                    '#03045e',
                    '#023e8a',
                    '#0077b6',
                    '#0096c7',
                    '#00b4d8',
                    '#48cae4',
                    '#90e0ef',
                    '#ade8f4',
                    '#caf0f8',
                    '#CFF1F9',
                ],
            }]
        }
        var donutOptions     = {
            maintainAspectRatio : false,
            responsive : true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })

        //- PIE CHART -
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieData = {
            labels: JSON.parse(labelPie),
            datasets: [{
                data: JSON.parse(dataPie),
                backgroundColor : [
                    '#03044D',
                    '#030455',
                    '#03045e',
                    '#023e8a',
                    '#0077b6',
                    '#0096c7',
                    '#00b4d8',
                    '#48cae4',
                    '#90e0ef',
                    '#ade8f4',
                    '#caf0f8',
                    '#CFF1F9',
                ],
            }]
        };
        var pieOptions = {
            maintainAspectRatio : false,
            responsive : true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
        })

        //- BAR CHART -
        var areaChartData = {
            labels : ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: JSON.parse(dataBar)
        }

        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = $.extend(true, {}, areaChartData)
        // var temp0 = areaChartData.datasets[0]
        // var temp1 = areaChartData.datasets[1]
        // barChartData.datasets[0] = temp1
        // barChartData.datasets[1] = temp0

        var barChartOptions = {
            responsive : true,
            maintainAspectRatio : false,
            datasetFill : false
        }

        new Chart(barChartCanvas, {
            type: 'bar',
            data: barChartData,
            options: barChartOptions
        })
    })
</script>
@endsection
