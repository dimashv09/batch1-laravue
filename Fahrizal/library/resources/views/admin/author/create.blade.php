@extends('layouts.admin')
@section('header','Create')
@section('content')
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
                    <input type="text" name="name" class="form-control" placeholder="Enter name" required="">
                  </div>
                  <div class="form-group">
                    <label >@mail</label>
                    <input type="text" name="email" class="form-control"  placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label >Phone Number</label>
                    <input type="text" name="phone_number" class="form-control"  placeholder="Enter Phone_number">
                  </div>
                  <div class="form-group">
                    <label >Address</label>
                    <input type="text" name="address" class="form-control"  placeholder="Enter Address">
                  </div>
                <!-- /.card-body -->
                <div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            </div>
            </div>
            <!-- /.card -->
@endsection