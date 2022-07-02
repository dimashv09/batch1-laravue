@extends('layouts.admin')
@section('header', 'Data Order')
@section('content')
@section('css')
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
 @endsection

<div id="controller">
<div class="card text-center">
  <div class="card-header">
    <div class="row">
    	<div class="col-md-1">
    	</div>
      <div class="col-md-8">
        
      </div>
      <div class="col-md-3">
        @foreach($details as $detail)
      <form action="{{url('/detail/delete/'.$detail->user_id)}}" method="get">
         @endforeach
       <input type="submit" class="btn btn-danger" value="Selesaikan Transaksi">
     </form>
      </div>
    	
    </div>
  </div>
 @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
@endif
  <div class="card-body">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th>Name</th>
      <th>Phone</th>
      <th>Product Name</th>
      <th>Quantity</th>
      <th>Price</th>
    </tr>
  </thead>
 
  <tbody>
    @foreach($transactions as $key=>$transaction)
          <tr>
            <td>{{ $key+1 }}</td>
            <td>{{$transaction->orders->name}}</td>
            <td>{{$transaction->orders->phone}}</td>
            <td>{{ $transaction->orders->product_name }}</td>
            <td>{{ $transaction->orders->quantity }}</td>
            <td>{{ $transaction->orders->price }}</td>
          </tr>
          @endforeach
  </tbody>
</table>
</div>
	<div class="card-body">
<div class="row">
      <tr>
      	<td>
      		<h4 class="pull-right">Total Harga: Rp.{{$count}}<br><br>Total Bayar: Rp.{{$data}}<br><br>Total Kembali: Rp.{{$counts}}</h4>
      	</td>
      </tr>
      
    </div>
    <div class="">
    	
    </div>
	</div>

</div>
</div>
@endsection
@section('js')
<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/dist/js/demo.js') }}"></script>
<!-- Page specific script -->
<script>
	$(function () {
		$('#datatable').DataTable();
	});
</script>

@endsection


