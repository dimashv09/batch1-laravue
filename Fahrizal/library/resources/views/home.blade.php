@extends('layouts.admin')
@section('header','Home')
@section('title', 'Home')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/dist/css/fahri.css') }}">
@endsection

@section('content')
<div class="showcase">
	<video autoplay loop muted>
		<source src ="{{ asset('assets/dist/video/1.mp4')}}" type="video/mp4">
	</video>
	<div class="text-box">
		<h1 REFL-TEXT> HELLO {{ Auth::user()->name }}  </h1>
		<div class="loader-square-32"></div>
	</div>
</div>
<div class="container">
	<div class="row justify-content-center">
		<!--========== INFO BOX ==========-->
		<div class="col-lg-3 col-6">
			<!-- Books -->
			<div class="small-box bg-info">
				<div class="inner">
					<h3>{{ $total_books }}</h3>
					<p>Books</p>
				</div>
				<div class="icon">
					<i class="fa fa-book"></i>
				</div>
				<a href="/books" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<div class="col-lg-3 col-6">
            <!-- Members -->
            <div class="small-box bg-success">
				<div class="inner">
					<h3>{{ $total_members }}</h3>
					<p>Members</p>
				</div>
				<div class="icon">
					<i class="fas fa-users"></i>
				</div>
				<a href="/members" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
		</div>
		<div class="col-lg-3 col-6">
            <!-- Transactions -->
            <div class="small-box bg-secondary">
				<div class="inner">
					<h3>{{ $total_transactions }}</h3>
					<p>Total of Transactions</p>
				</div>
				<div class="icon">
					<i class="fas fa-shopping-bag"></i>
				</div>
				<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
		</div>
		<div class="col-lg-3 col-6">
            <!-- Publishers -->
            <div class="small-box bg-primary">
				<div class="inner">
					<h3>{{ $total_publishers }}</h3>
					<p>Publishers</p>
				</div>
				<div class="icon">
					<i class="fas fa-print"></i>
				</div>
				<a href="/publishers" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
		</div>
		</div>
		<!--========== CHARTS ==========-->
		<div class="col-12">
			<!-- PIE CHART -->
            <div class="card card-primary">
				<div class="card-header">
					<h3 class="card-title">Books' Price</h3>

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
            </div>
		</div>
		<div class="col-12">
			<!-- DONUT CHART -->
			<div class="card card-danger">
				<div class="card-header">
					<h3 class="card-title">Total of Publishing</h3>

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
			</div>
		</div>
		<!-- BAR CHART -->
		<div class="col-12">
			<div class="card card-success">
				<div class="card-header">
					<h3 class="card-title">Transactions</h3>

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
			</div>
		</div>
    </div>
</div>
@endsection

@section('js')
<script>
	var label_donut = '{!! json_encode($label_donut) !!}'
	var data_donut = '{!! json_encode($data_donut) !!}'
	var label_pie = '{!! json_encode($label_pie) !!}'
	var data_pie = '{!! json_encode($data_pie) !!}'
	var data_bar = '{!! json_encode($data_bar) !!}'
	$(function () {
		//- PIE CHART -
		var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
		var pieData        = {
			labels: JSON.parse(label_pie),
			datasets: [
				{
				data: JSON.parse(data_pie),
				backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef',
                                   '#3c8dbc', '#d2d6de', '#23242e', '#56524e',
                                   '#FF009D','#00FF5C','#00FFDB','#0024FF',
                                   '#DC00FF','#933A3A','#EF6262'],
				}
			]
		}
		var pieOptions     = {
		maintainAspectRatio : false,
		responsive : true,
		}
		new Chart(pieChartCanvas, {
		type: 'pie',
		data: pieData,
		options: pieOptions
		})
		
		//- DONUT CHART -
		var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
		var donutData        = {
			labels: JSON.parse(label_donut),
			datasets: [
				{
				data: JSON.parse(data_donut),
				backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#23242e', '#56524e', '#00FF11'],
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

		//- BAR CHART -
		var barChartData = {
			labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
			datasets: JSON.parse(data_bar)
		}
		var barChartCanvas = $('#barChart').get(0).getContext('2d')
		var barChartData = $.extend(true, {}, barChartData)
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
	})
</script>
@endsection