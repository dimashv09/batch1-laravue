@extends('layouts.admin')
@section('title','Catalog')

@section('content')
	<div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create New Catalog</h3>
              </div>
             
              <form action="{{	url('catalogs')}}"method="post">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for=>Name</label>
                    <input type="text"name="name"class="form-control"  placeholder="Enter name
                     " required="">
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