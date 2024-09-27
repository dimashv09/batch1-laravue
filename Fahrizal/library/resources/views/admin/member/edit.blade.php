@extends('layouts.admin')
@section('header','Edit')
@section('content')

            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Edit Member</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('members/'.$member->id) }}" method="post">
                @csrf
                {{method_field('PUT')}}
                <div class="card-body">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter name" required="" value="{{$member->name}}">
                  </div>
                  <div class="form-group">
                    <label>Gender</label>
                    <input type="text" name="gender" class="form-control" placeholder="Enter gender" required="" value="{{$member->gender}}">
                  </div>
                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="phone_number" class="form-control" placeholder="Enter phone_number" required="" value="{{$member->phone_number}}">
                  </div>
                  <div class="form-group">
                    <label>address</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter address" required="" value="{{$member->address}}">
                  </div>
                  <div class="form-group">
                    <label>@mail</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter emai" required="" value="{{$member->email}}">
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