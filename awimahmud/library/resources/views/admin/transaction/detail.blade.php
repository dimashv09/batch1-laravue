@extends('layouts.admin')
@section('header', 'Transactions')

@section('css')
  <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">@endsection
@section('content')
<div id="controller">
	<div class="row  justify-content-center d-flex " style="margin-top:10px">
		<div class="col-md-5 ">
			<div class="card" style="width:600px;height:32rem;">
				<div class="card-title mt-4">
					<h4 class="text-center mt-3"><strong>Transaction Detail</strong></h4>
				</div>
				<div class="card-body">
							<div class="row mt-4">
								<div class="col-md-4">
									<h5 class="text-bold justify-content-between d-flex">Anggota<span>:</span></h5>
								</div>
								<div class="col-md">
									<h5>{{ $transaction->member->name }}</h5>
								</div>
							</div>
							<div class="row mt-4">
								<div class="col-md-4">
									<h5 class="text-bold justify-content-between d-flex">Tanggal<span>:</span></h5>
								</div>
								<div class="col-md">
									<h5>{{ $transaction->date_start }}</h5>
								</div>
							</div>
							<div class="row mt-4">
								<div class="col-md-4">
									<h5 class="text-bold justify-content-between d-flex">Buku<span>:</span></h5>
								</div>
								
								<div class="col-md-6">
									<select class="col-md custom-select select2" multiple="multiple" name="books[]">
										@foreach ( $transaction->details as $item )
											<option>{{ $item->books['title'] }}</option>
										@endforeach
									</select>	
								</div>
							</div>
							<div class="row mt-4">
								<div class="col-md-4">
									<h5 class="text-bold justify-content-between d-flex">Status<span>:</span></h5>
								</div>
								<div class="col-md">
									<h5>{{ $transaction->status }}</h5>
								</div>
							</div>
				</div>
				<div class="justify-content-end d-flex m-4">
					<a href="{{ url('transactions') }}" class="btn btn-primary">CLose</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('js')
<script>
  	$(document).ready(function() {
  		// Menginisialisasi kembali elemen "select2" dengan opsi baru
  		$('.select2').select2();
	});
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets//plugins/select2/js/select2.full.min.js') }}"></script>
@endsection
