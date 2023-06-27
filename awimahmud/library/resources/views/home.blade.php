@extends('layouts.admin')
@section('header', 'Dashboard');

@section('content')

{{-- <div class="container"> --}}
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h1>{{ $total_books }}</h1>
                <p>Total Books</p>
            </div>
            <div class="icon">
                <i class="fas fa-book"></i>
            </div>
            <a href="{{ url('books') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h1>{{ $total_members }}</h1>
                <p>Total Members</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
             <a href="{{ url('members') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-secondary">
            <div class="inner">
                <h1>{{ $total_publishers }}</h1>
                <p>Total Publishers</p>
            </div>
            <div class="icon">
                <i class="fas fa-print"></i>
            </div>
            <a href="{{ url('publishers') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h1>{{ $total_transactions }}</h1>
                <p>Total Transactions</p>
            </div>
            <div class="icon">
                <i class="fas fa-shopping-bag"></i>
            </div>
            <a href="{{ url('transactions') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Publisher Chart</h3>
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
    </div>
    <div class="col-md-6">
                <!-- BAR CHART -->
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
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
        </div>
     <!-- /.card -->
    </div>
    <!-- PIE CHART -->
    </div class="6">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Author Chart</h3>

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
    </div>
    <!-- /.card -->
</div>
{{-- </div> --}}
@endsection

@section('js')
<!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('assets/plugins/chart.js/Chart.min.js')}}"></script>
<script>
    var label_donut = '{!! json_encode($label_donut) !!}'
	var data_donut = '{!! json_encode($data_donut) !!}'
	var data_bar = '{!! json_encode($data_bar) !!}'
    var label_pie = '{!! json_encode($label_pie) !!}'
	var data_pie = '{!! json_encode($data_pie) !!}'

    $(function () { 
    
    //- DONUT CHART -
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: JSON.parse(label_donut),
      datasets: [
        {
          data: JSON.parse(data_donut),
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }

    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })
    

    //AREA CHART
    var areaChartData = {
      labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July','Agust','September','October','November','December'],
      datasets: JSON.parse(data_bar)
    }

        //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
 

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

    //-------------

 //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData        =  {
      labels: JSON.parse(label_pie),
      datasets: [
        {
          data: JSON.parse(data_pie),
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
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

    
})
</script>
@endsection
