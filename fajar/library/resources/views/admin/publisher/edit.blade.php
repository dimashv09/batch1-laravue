@extends('layouts.admin')

@section('header', 'Publisher')

@section('content')
<div class="row">

    <div class="col-md-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Catalog</h3>
            </div>

            <form action="{{url('publisher/'.$catalog->id)}}" method="post">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Catalog Name" required="" value="{{$publisher->name}}">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter Email" required value="{{$publisher->email}}">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" name="phone_number" class="form-control" placeholder="Enter Phone Number" required value="{{$publisher->phone_number}}">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="adress" id="exampleFormControlTextarea3" rows="7" value="{{$publisher->adress}}"></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

    </div>
</div>

@endsection
