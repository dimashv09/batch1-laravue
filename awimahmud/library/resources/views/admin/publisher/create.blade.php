@extends('layouts.admin')
@section('header', 'Publisher')

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create New Publisher</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ url('publishers') }}" method="post">
			@csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="Text" name="name" class="form-control @error('name')
							is-invalid @enderror" placeholder="Enter name">
							@error('name')
							<div class="invalid-feedback">{{ $message }}</div>
							@enderror
					</div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control  @error('name')
							is-invalid @enderror" placeholder="Enter email" autofocus>
							@error('email')
							<div class="invalid-feedback">{{ $message }}</div>
							@enderror
					</div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="number" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Enter phone number">
							@error('phone_number')
							<div class="invalid-feedback">{{ $message }}</div>
							@enderror
							</div>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" class="form-control" rows="4" cols="50" placeholder="Enter address"></textarea>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- /.card -->
@endsection
