@extends('layouts.admin')
@section('title', 'Publishers')
@section('wrapper-title', 'Publishers - Create')

@section('content')
	<div class="container">
		<div class="row">
			<div class="card w-100">
				<!-- /.card-header -->
				<div class="card-body">
					<form action="{{ url('publishers') }}" method="POST">
						@csrf
						<div class="card-body row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="name">Publisher's Name</label>
									<input type="text" name="name" class="form-control" placeholder="Lorem Ipsum" required>
								</div>
								<div class="form-group">
									<label for="phone_number">Phone Number</label>
									<input type="number" name="phone_number" class="form-control" placeholder="012-345-678" required>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="name">Email</label>
									<input type="email" name="email" class="form-control" placeholder="email@exampl.com" required>
								</div>
								<div class="form-group">
									<label for="phone_number">Address</label>
									<input type="text" name="address" class="form-control" placeholder="5, Buana Street, Antares" required>
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