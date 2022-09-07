@extends('layouts.admin')
@section ('header', 'Transaction')

@section('css')
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- daterange picker -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.38.0/css/tempusdominus-bootstrap-4.min.css" crossorigin="anonymous" />
  <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
@endsection

@section('content')
<div class="row">
          <!-- left column -->
          <div class="col-md-5">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create New Transaction</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('transaction') }}" method="post">
                @csrf
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
            <!-- /.card -->
@endsection

@section ('js')
<!-- Select2 -->
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- date-range-picker -->
<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.38.0/js/tempusdominus-bootstrap-4.min.js" crossorigin="anonymous"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  });
</script>
@endsection