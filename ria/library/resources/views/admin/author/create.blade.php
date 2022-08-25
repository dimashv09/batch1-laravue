@extends('layouts.admin')
@section('header', 'Author')

@section('content')

 <div class="row">
	          <!-- left column -->
	    <div class="col-md-6">
	            <!-- general form elements -->
	            <div class="card card-primary">
	              <div class="card-header">
	                <h3 class="card-title">Create New Author</h3>
	              </div>
	              <!-- /.card-header -->
	              <!-- form start -->
	              <form action="{{ url('authors') }}" method="post">
	              	@csrf
	                <div class="card-body">
	                  <div class="form-group">
	                    <label>Name</label>
	                    <input type="text" name="name" class="form-control" placeholder="Enter Author name" required="">
	                  </div>
	                  <div class="form-group">
	                    <label>Email</label>
	                    <input type="text" name="name" class="form-control" placeholder="Enter Author email" required="">
	                  </div>
	                  <div class="form-group">
	                    <label>Phone Number</label>
	                    <input type="text" name="name" class="form-control" placeholder="Enter Author phone number" required="">
	                  </div>
	                  <div class="form-group">
	                    <label>Address</label>
	                    <input type="text" name="name" class="form-control" placeholder="Enter Author address" required="">
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