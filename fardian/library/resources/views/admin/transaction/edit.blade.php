@extends('layouts.admin')
@section ('header', 'Transaction')
@section('content')
<div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Transaction</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('transaction') }}" method="post">
                @csrf
                {{ method_field('PUT') }}
                <div class="card-body">
               <div class="form-group">
                         <label>Member</label>
                        <select name="member_id" class="form-control">
                           @foreach($members as $member)
                           <option value="{{ $member->id }}">{{ $member->name }}</option>
                            @endforeach
                        </select>
                 </div>
                <!-- Date -->
                <div class="form-group">
                          <label>Transaction Start</label>
                          <input type="date" class="form-control" name="date_start" value="" required>
                </div>
                <div class="form-group">
                          <label>Transaction End</label>
                          <input type="date" class="form-control" name="date_end" value="" required>
                </div>
                <div class="form-group">
                  <div class="select2-blue">
                          <label>Book</label>
                          <select name="book_id[]" class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                            @foreach($books as $book)
                             <option value="{{ $book->id }}">{{ $book->title }}</option>
                             @endforeach
                          </select>
                  </div>
                </div>
            </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
@endsection