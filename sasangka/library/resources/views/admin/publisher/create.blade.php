@extends('layouts.admin')
@section('title', 'Publisher')
@section('wrapper-title', 'Publisher - Create')
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
									<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="isi nama anda" required>
									@error('name')
										<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group">
									<label for="phone_number">Phone Number</label>
									<input type="number" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="012-345-678" required>
									@error('phone_number')
										<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="name">Email</label>
									<input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="email@exampl.com" required>
									@error('email')
										<div class="alert alert-danger">{{ $message }}</div>
									@enderror
								</div>
								<div class="form-group">
									<label for="phone_number">Address</label>
									<input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="5, Buana Street, Antares" required>
									@error('address')
										<div class="alert alert-danger">{{ $message }}</div>
									@enderror
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