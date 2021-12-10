@extends('layouts.admin')
@section('title', 'Catalogs')
@section('wrapper-title', 'Catalogs - Create')

@section('content')
	<div class="container">
		<div class="row">
			<div class="card w-100">
				<!-- /.card-header -->
				<div class="card-body">
					<form action="{{ url('catalogs') }}" method="POST">
						@csrf
						<div class="card-body">
							<div class="form-group">
								<label for="name">Catalog's Name</label>
								<input type="text" name="name" class="form-control w-50 @error('name') is-invalid @enderror" placeholder="Enter catalog's name">
								@error('name')
									<div class="alert alert-danger w-50 mt-1">{{ $message }}</div>
								@enderror
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