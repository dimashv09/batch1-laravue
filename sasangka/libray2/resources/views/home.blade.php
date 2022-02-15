@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                {{-- <h3>{{ $total_books }}</h3> --}}
                <p>Total Buku</p>
            </div>
            <div class="icon">
                <i class="fa fa-book"></i>
            </div>
            {{-- <a href="{{  url('books') }}" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a> --}}
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-dark">
            <div class="inner">
                {{-- <h3>{{ $total_members }}</h3> --}}
                <p>Total Anggota</p>
            </div>
            <div class="icon">
                <i class="fa fa-book"></i>
            </div>
            {{-- <a href="{{  url('members') }}" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a> --}}
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                {{-- <h3>{{ $total_publishers }}</h3> --}}
                <p>Data Penerbit</p>
            </div>
            <div class="icon">
                <i class="fa fa-book"></i>
            </div>
            {{-- <a href="{{  url('publishers') }}" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a> --}}
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                {{-- <h3>{{ $total_transactions }}</h3> --}}
                <p>Data Peminjaman</p>
            </div>
            <div class="icon">
                <i class="fa fa-book"></i>
            </div>
            {{-- <a href="{{  url('transactions') }}" class="small-box-footer">More Info <i class="fa fa-arrow-circle-right"></i></a> --}}
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="row">
  {{-- Doughnut --}}

</div>
 <!-- DONUT CHART -->
<div class="card card-success">
  <div class="card-header">
    <h3 class="card-title">Grafik Penerbit</h3>

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
    <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

<!-- PIE CHART -->
<div class="card card-warning">
  <div class="card-header">
    <h3 class="card-title">Grafik Peminjaman</h3>

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
    <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
<div class="card-body" style="display: block;"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 951px;" width="792" height="208" class="chartjs-render-monitor"></canvas>
              </div>
@endsection
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
<script text="text/javascript">

  $(function () {
   //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
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
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        = donutData;
    var pieOptions     = {
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

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })
</script>
</body>
</html>
