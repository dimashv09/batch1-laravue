@extends('layouts.admin')
@section('header','Create')
@section('content')
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Create New Transaction</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('transactions') }}" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Date Start</label>
                    <input type="text" name="date_start" class="form-control" placeholder="Enter date_start" required="">
                  </div>
                  <div class="form-group">
                    <label>Date End</label>
                    <input type="text" name="date_end" class="form-control" placeholder="Enter date_end" required="">
                  </div>
                  <div class="form-group">
                    <label>Member ID</label>
                    <input type="text" name="phone_number" class="form-control" placeholder="Enter phone_number" required="">
                  </div>
                  <div class="form-group">
                    <label>QTY</label>
                    <input type="text" name="qty" class="form-control" placeholder="Enter qty" required="">
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