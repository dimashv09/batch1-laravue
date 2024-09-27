@extends('layouts.admin')
@section('header','Create')
@section('content')
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Create New Book</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('books') }}" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>isbn</label>
                    <input type="text" name="isbn" class="form-control" placeholder="Enter isbn" required="">
                  </div>
                  <div class="form-group">
                    <label >tittle</label>
                    <input type="text" name="tittle" class="form-control"  placeholder="Enter tittle">
                  </div>
                  <div class="form-group">
                    <label >year</label>
                    <input type="text" name="year" class="form-control"  placeholder="Enter year">
                  </div>
                  <div class="form-group">
                    <label >publisher_id</label>
                    <input type="text" name="publisher_id" class="form-control"  placeholder="Enter publisher_id">
                  </div>
                  <div class="form-group">
                    <label >author_id</label>
                    <input type="text" name="author_id" class="form-control"  placeholder="Enter author_id">
                  </div>
                  <div class="form-group">
                    <label >catalog_id</label>
                    <input type="text" name="catalog_id" class="form-control"  placeholder="Enter catalog_id">
                  </div>
                  <div class="form-group">
                    <label >qty</label>
                    <input type="text" name="qty" class="form-control"  placeholder="Enter qty">
                  </div>
                  <div class="form-group">
                    <label >price</label>
                    <input type="text" name="price" class="form-control"  placeholder="Enter price">
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