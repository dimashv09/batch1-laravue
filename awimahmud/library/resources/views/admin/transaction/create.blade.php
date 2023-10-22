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
			<div class="card" style="width:600px;height:34rem;">
				<div class="card-title mt-4">
					<h4 class="text-center mt-3"><strong>Transaction Add</strong></h4>
				<div>
				<div class="card-body">
					<form action="{{ url('transactions') }}" method="POST">
					
					@csrf
						<table class="table table-borderless " style="height:19rem;margin-top:30px">
							<tr class="">
								<td class="text-bold">Member</td>
								<td class="px-3">
									<select id="selectMember" name="member_id" class="form-control col-md-10">
										@foreach ($members as $member)
											<option value="{{ $member->id }}">{{ $member->name }}</option>
										@endforeach
									</select>
								</td>	
							</tr>
							<tr class="">
								<td class="text-bold">Tanggal</td>
								<td class="px-3 m-3">
								    <div class="col-12 col-md-10 d-flex flex-column flex-md-row px-2">
										<div class="d-flex align-items-center w-100 px-0 row">
											<div class="col row m-0">
												<input type="date" value="" name="date_start" class="form-control mr-1 col-7 @error('date_start') is-invalid @enderror">
												<i class="far fa-calendar-alt text-xl col px-0 mr-4"></i>
											</div>
											@error('date_start')
											<p class="text-danger mt-1 col-12">{{ $message }}</p>
											@enderror
										</div>
										<span>_</span>
										<div class="d-flex align-items-center w-100 px-0 ml-md-4 row">
											<div class="col row">
												<input type="date" value="" name="data_end" class="form-control mr-1 col-8 @error('date_end') is-invalid @enderror">
												<i class="far fa-calendar-alt p-0 m-0 text-xl col"></i>
											</div>
											@error('date_end')
											<p class="text-danger mt-1 col-12">{{ $message }}</p>
											@enderror
										</div>
                                	</div>
								</td>
							</tr>
							<tr class="">
								<td class="text-bold">Buku</td>
								<td class="select2-purple">
									<select name="books[]" class="form-control select2 col-md-10" multiple="multiple" data-dropdown-css-class="select2-purple" >
										@foreach ( $books as $book )
											<option value="{{ $book->id }}">{{ $book->title }}</option>	
										@endforeach
									</select>
								</td>
							</td>
						</table>
					<div class=" justify-content-end d-flex mt-5">
						<button type="submit" class="btn btn-primary mr-4">Simpan</button>
					</div>
					</form>
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
