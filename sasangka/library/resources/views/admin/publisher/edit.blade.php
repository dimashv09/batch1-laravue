@extends('layouts.admin')
@section('title', 'Publisher')
@section('wrapper-title', 'Publisher - Edit')

@section('content')
	<div class="container">
		<div class="row">
			<div class="card w-100">
				<!-- /.card-header -->
				<div class="card-body">
					<form action="{{ url('publishers/'.$publisher->id) }}" method="POST">
						@csrf
						{{method_field('PUT')}}
						<div class="card-body row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="name">Publisher's Name</label>
									<input type="text" name="name" class="form-control" value="{{ $publisher->name }}" required>
								</div>
								<div class="form-group">
									<label for="phone_number">Phone Number</label>
									<input type="number" name="phone_number" class="form-control" value="{{ $publisher->phone_number }}" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="name">Email</label>
									<input type="email" name="email" class="form-control" value="{{ $publisher->email }}" required>
								</div>
								<div class="form-group">
									<label for="phone_number">Address</label>
									<input type="text" name="address" class="form-control" value="{{ $publisher->address }}" required>
								</div>
							</div>
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</form>
				</div>
				<!-- /.card-body -->
			</div>
		</div>
	</div>
@endsection