@extends('layouts.admin')

@section('header', 'Publisher')

@section('content')
<div class="row">

    <div class="col">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create New Catalog</h3>
            </div>

            @if ($errors->any())
            <div class="alert alert-danger" style="border-radius:0 ">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{url('publisher')}}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter Email" required value="{{old('email')}}">
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" name="phone_number" class="form-control" placeholder="Enter Phone Number" required value="{{old('phone_number')}}">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="adress" id="exampleFormControlTextarea3" rows="7" value="{{old('address')}}"></textarea>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
        </div>

    </div>
</div>

@endsection
