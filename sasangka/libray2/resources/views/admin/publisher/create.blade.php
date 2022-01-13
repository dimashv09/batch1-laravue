@extends('layouts.admin')
@section('title', 'Publisher')

@section('content')
	<div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create New Publisher</h3>
              </div>
             
              <form action="{{url('publishers')}}"method="post">
            @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for=>Name</label>
                    <input type="text"name="name"class="form-control"  placeholder="Enter name
                     " required="">
                     <div class="form__group">
                      <label>Email</label>
                      <input type="text" name="email"class="form-control" placeholder="Enter email" value=""required="">
                      <div class="form__group">
                     </div>
                      <label>Phone Number</label>
                      <input type="text" class="form-control" name="Enter phone_number"  placeholder="phone_number" value=""required="">
                      <div class="form__group">
                     </div>
                      <label>Address</label>
                      <input type="text" class="form-control" name="Enter address"  placeholder="Enter addres" value=""required="">
                      <div class="form__group">
                     </div>
                  </div>
            
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
           </div>
@endsection