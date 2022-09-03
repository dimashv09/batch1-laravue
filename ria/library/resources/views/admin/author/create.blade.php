@extends('layouts.admin')
@section('header', 'Author')
@section('content')

@section('css')

@endsection
<div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Author</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('authors.store') }}" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Input Name" required="">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Input Email" required="">
                  </div>
                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="number" name="phone_number" class="form-control" placeholder="Input Phone Number" required="">
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Input Address" required="">
                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
           
    
@endsection

@section('js')

@endsection
