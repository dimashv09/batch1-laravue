@extends('layouts.admin')
@section('title', 'Publisher')


@section('content')
	<div class="row">    
          <div class="col-md-6">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Publisher</h3>
              </div>
             
              <form action="{{url('publishers/'.$publisher->id)}}"method="post">
              	@csrf
              	{{method_field('PUT')}}
                <div class="card-body">
                  <div class="form-group">
                    <label for=>Name</label>
                    <input type="text"name="name"class="form-control"  placeholder="Enter name
                     " required="" value="{{$publisher->name}}">
                     <div class="form__group">
                      <label for=>Email</label>
                    <input type="text"name="email"class="form-control"  placeholder="Enter email
                     " required="" value="{{$publisher->email}}">
                     <div class="form__group">
                      <label for=>Phone Number</label>
                      <input type="text"name="phone_number"class="form-control"  placeholder="Enter phone_number
                       " required="" value="{{$publisher->phone_number}}">
                       <div class="form__group">
                        <label for=>Address</label>
                        <input type="text"name="address"class="form-control"  placeholder="Enter 
                         " required="" value="{{$publisher->address}}">
                         <div class="form__group">
                     </div>
                  </div>
                  </div>
            
            

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
           </div>
          </div>
            <!-- /.card -->
@endsection
