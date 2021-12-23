@extends('layouts.app')

@section('title')
    Home
@endsection

@section('subtitle')
    Dashboard
@endsection

@section('content-header')
    Selamat Datang, {{Auth::user()->name}}
@endsection

@section('content-title')
    Dashboard
@endsection

@section('content')

@if (session('status'))

    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>

@endif
    <!-- Small Box (Stat card) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{$total_books}}</h3>

            <p>Total Buku</p>
          </div>
          <div class="icon">
            <i class="fa fa-book"></i>
          </div>
          <a href="{{url('book')}}" class="small-box-footer">
            Selengkapnya <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{$total_members}}</h3>

            <p>Total Anggota</p>
          </div>
          <div class="icon">
            <i class="fa fa-address-card"></i>
          </div>
          <a href="{{url('member')}}" class="small-box-footer">
            Selengkapnya <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{$total_publishers}}</h3>

            <p>Penerbit</p>
          </div>
          <div class="icon">
            <i class="fa fa-globe"></i>
          </div>
          <a href="{{url('publisher')}}" class="small-box-footer">
            Selengkapnya <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{$total_transactions}}</h3>

            <p>Peminjaman</p>
          </div>
          <div class="icon">
            <i class="fas fa-money-check-alt"></i>
          </div>
          <a href="#" class="small-box-footer">
            Selengkapnya <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-md-6">
            <!-- DONUT CHART -->
            <div class="card card-danger">
                <div class="card-header">
                  <h3 class="card-title">Prosentase Penerbit</h3>

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
        </div>
        <div class="col-md-6">
            <!-- LINE CHART -->
            <div class="card card-info">
                <div class="card-header">
                  <h3 class="card-title">Prosentase Peminjaman Anggota</h3>
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
                    <canvas id="polarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
        </div>
        <div class="col-md-12">
            <!-- BAR CHART -->
            <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Rekapan Peminjaman</h3>

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
                    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

@push('script')
<script src="{{asset('vendor/plugins/chart.js/Chart.min.js')}}"></script>
<script>

    //- DONUT CHART CONFIGS -
    //-------------
    var dataDonutSide = {!! $donut_data !!}
    var labelDonutSide = {!! $donut_label !!}

    // random bg color function
    //*******************************************************************
    var color = [];
    var dynamicColors = function() {
        var r = Math.floor(Math.random() * 200);
        var g = Math.floor(Math.random() * 200);
        var b = Math.floor(Math.random() * 200);
        return "rgb(" + r + "," + g + "," + b + ")";
    };

    for (var i in dataDonutSide) {
            color.push(dynamicColors());
    }
    //*******************************************************************

    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: labelDonutSide,
      datasets: [
        {
          data: dataDonutSide,
          backgroundColor : color,
        }
      ]
    }
    var donutOptions = {
      maintainAspectRatio : false,
      responsive : true,
    }

    //- POLAR CHART CONFIGS -
    //-------------
    var dataPolarSide = {!! $polar_data !!}
    var labelPolarSide = {!! $polar_label !!}
    var polarChartCanvas = $('#polarChart').get(0).getContext('2d')
    var polarChartDatas = {
      labels: labelPolarSide,
      datasets: [
        {
          data: dataPolarSide,
          backgroundColor : color,
        }
      ]
    }
    var polarChartOptions = {
      maintainAspectRatio : false,
      responsive : true,
    }

    //- BAR CHART CONFIGS-
    //-------------
    var dataBarSide = {{ Js::from($data_bar) }};
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartDatas = {
            labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            datasets: [
                {
                    label               : dataBarSide[0]['label'],
                    backgroundColor     : 'rgba(60,141,188,0.9)',
                    borderColor         : 'rgba(60,141,188,0.8)',
                    pointRadius          : false,
                    pointColor          : '#3b8bba',
                    pointStrokeColor    : 'rgba(60,141,188,1)',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data                : dataBarSide[0]['data']
                },
                {
                    label               : dataBarSide[1]['label'],
                    backgroundColor     : 'rgba(210, 214, 222, 1)',
                    borderColor         : 'rgba(210, 214, 222, 1)',
                    pointRadius         : false,
                    pointColor          : 'rgba(210, 214, 222, 1)',
                    pointStrokeColor    : '#c1c7d1',
                    pointHighlightFill  : '#fff',
                    pointHighlightStroke: 'rgba(220,220,220,1)',
                    data                : dataBarSide[1]['data']
                },
            ]
        }
    var barChartOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false,
            scales: {
                xAxes: [{
                    stacked: true,
                }],
                yAxes: [{
                    stacked: true
                }]
            }
        }

    // DONUT CHART INSTANTIATION
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    // POLAR CHART INSTANTIATION
    new Chart(polarChartCanvas, {
      type: 'polarArea',
      data: polarChartDatas,
      options: polarChartOptions
    })

    // BAR CHART INSTANTIATION
    new Chart(barChartCanvas, {
        type: 'bar',
        data: barChartDatas,
        options: barChartOptions
    })


</script>
@endpush
