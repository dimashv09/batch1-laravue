@extends('layouts.admin')
@section('header', 'Publisher')

@section('content')
<div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Publisher</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('publishers/edit/'.$publisher->id) }}" method="post">
              	@csrf
                {{ method_field('put')}}
                <div class="card-body">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{$publisher->name}}" class="form-control" placeholder="Input Name" required="">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{$publisher->email}}" class="form-control" placeholder="Input Email" required="">
                  </div>
                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="number" name="phone_number" value="{{$publisher->phone_number}}" class="form-control" placeholder="Input Phone Number" required="">
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" value="{{$publisher->address}}" class="form-control" placeholder="Input Address" required="">
                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
@endsection