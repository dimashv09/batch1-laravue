@extends('layouts.admin')
@section('header','Edit')
@section('content')

            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Edit Transaction</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('transactions/'.$transaction->id) }}" method="post">
                @csrf
                {{method_field('PUT')}}
                <div class="card-body">
                  <div class="form-group">
                    <label>Date Start</label>
                    <input type="text" name="date_start" class="form-control" placeholder="Enter date_start" required="" value="{{$transaction->date_start}}">
                  </div>
                  <div class="form-group">
                    <label>Date End</label>
                    <input type="text" name="date_end" class="form-control" placeholder="Enter date_end" required="" value="{{$transaction->date_end}}">
                  </div>
                  <div class="form-group">
                    <label>Member ID</label>
                    <input type="text" name="member_id" class="form-control" placeholder="Enter member_id" required="" value="{{$transaction->member_id}}">
                  </div>
                  <div class="form-group">
                    <label>QTY</label>
                    <input type="text" name="qty" class="form-control" placeholder="Enter qty" required="" value="{{$transaction->qty}}">
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