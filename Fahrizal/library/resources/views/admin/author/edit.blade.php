@extends('layouts.admin')
@section('header','Edit')
@section('content')

            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Edit Author</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('authors/'.$author->id) }}" method="post">
                @csrf
                {{method_field('PUT')}}
                <div class="card-body">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter name" required="" value="{{$author->name}}">
                  </div>
                  <div class="form-group">
                    <label >@mail</label>
                    <input type="text" name="email" class="form-control"  placeholder="Enter email" required="" value="{{$author->email}}">
                  </div>
                  <div class="form-group">
                    <label >Phone Number</label>
                    <input type="text" name="phone_number" class="form-control"  placeholder="Enter Phone_number" required="" value="{{$author->phone_number}}">
                  </div>
                  <div class="form-group">
                    <label >Address</label>
                    <input type="text" name="address" class="form-control"  placeholder="Enter Address" required="" value="{{$author->address}}">
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