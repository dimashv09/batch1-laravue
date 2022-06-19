@extends('layouts.admin')
@section('header', 'Pengunjung Web')
@section('content')
@section('css')
        <!-- DataTables -->
 <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
 <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
<div class="container-fluid">
	<div class="card">
  <div class="card-header">
    Download Data Pengunjung Web
  </div>
  <div class="card-body">
    <form action="{{ url('/date/web') }}" method="post">
	      {{ csrf_field() }}
			<label>PILIH TANGGAL</label>
			<input type="date" name="tanggal">
			<input class="btn btn-primary btn-sm" type="submit" value="EXPORT TO EXCEL">
		</form>
  </div>
</div>

	<div class="card">
	  <div class="card-header">
	    Table Pengunjung Web
	  </div>
	  <div class="card-body">
	   <table id="datatable" class="table table-striped">
						<thead>
					    <tr>
					      <th>No</th>
					      <th>Tanggal</th>
					      <th>IP Addess</th>
					      <th>Country Name</th>
					      <th>Region Name</th>
					      <th>City Name</th>
				    	</tr>
					  </thead>
					  <tbody>
					  @foreach($orders as $key=>$web)
					    <tr>
					    	<td>{{ $key+1}}</td>
					    	<td>{{ date('H:i:s - d M Y', strtotime($web->created_at)) }}</td>
					    	<td>{{ $web->name }}</td>
		            <td>{{ $web->countryName }}</td>
		            <td>{{ $web->regionName }}</td>
		            <td>{{ $web->cityName }}</td>
	   			 		</tr>
					  @endforeach
					</tbody>
					</table>
	 		 </div>
		</div>
	
		<div class="card">
	  <div class="card-header">
	    Data Chart Pengunjung Web
	  </div>
		<div class="card-body">
				<div class="col-md-12">
          <!-- LINE CHART -->
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Line Chart</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div id="grafik"></div>
            </div>
            <!-- /.card-body -->
          </div>
				</div>
			</div>
		</div>
</div>
@endsection
@section('js')

<!-- DataTables -->
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
	$(function () {
		$('#datatable').DataTable();
	});
</script>
<script>
	var web = <?php echo json_encode($total_order) ?>;
	var day = <?php echo json_encode($day) ?>;
	Highcharts.chart('grafik', {
		title : {
			text: 'Data Grafik Pengunjung Web Harian'
		},
		xAxis : {
			categories : day
		},
		yAxis : {
			title: {
				text : 'Data Nominal Pengunjung Web Harian'
			}
		},
		plotOptions: {
			series: {
				allowPointSelect: true
			}
		},
		series: [
		{
			name: 'Data Nominal Pengunjung Web',
			data: web
		}
		]
	});
</script>

@endsection

