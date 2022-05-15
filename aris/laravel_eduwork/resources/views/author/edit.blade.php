@extends('layouts.admin')
@section('header', 'Author')
@section('content')
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
              <form action="{{ route('authors.update',$author) }}" method="post">
                @csrf
                {{ method_field('PUT')}}
                <div class="card-body">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $author->name }}" placeholder="Input Name" required="">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{ $author->email}}" class="form-control" placeholder="Input Email" required="">
                  </div>
                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="number" name="phone_number" value="{{ $author->phone_number}}" class="form-control" placeholder="Input Phone Number" required="">
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" value="{{ $author->address}}" class="form-control" placeholder="Input Address" required="">
                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
           
    
@endsection
