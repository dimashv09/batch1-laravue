@extends('layouts.admin')
@section('header', 'Transaction');

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Create New Transaction</h3>
        </div>

        <form action="{{ url('transaction')}}" method="post">
            @csrf
            <div class="card-body">
              <div class="row">
              <div class="col-md-6">
              <div class="form-group">
              <label>Member</label>
              @foreach ($members as $member)
              <select class="form-control select2">
              <option selected="selected">{{$member->name}}</option>
              </select>
              </div>
            </div>
            @endforeach 

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </div>
        </form>
      </div>
      </div>
</div>
  

@endsection