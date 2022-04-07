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
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Detail Transaction</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('transaction') }}" method="post">
                @csrf
              <div class="card-body">
                <div class="form-group">
                  <label>Name</label>
                        <select disabled onlyread name="member_id" class="form-control">
                           @foreach($members as $member)
                           <option value="{{ $member->id }}">{{ $member->name }}</option>
                            @endforeach
                        </select>
                 </div>
                <!-- Date -->
                <div class="form-group">
                          <label>Transaction Start</label>
                          <input disabled onlyread type="text" class="form-control" name="date_start" value="{{ $transaction->date_start }}">
                </div>
                <div class="form-group">
                        <label>Book</label><br>
                        <select multiple name="book_id[]" disabled>
                            @foreach ($books as $key => $book)
                            @if (old('book_id'))
                            <option value="{{ $book->id }}" {{ in_array($book->id, old('book_id')) ? 'selected' : '' }}>
                                {{ $book->title }}</option>
                            @else
                            <option value="{{ $book->id }}" @foreach($transactionDetails as $transactions)
                                {{ $transactions->book_id == $book->id ? 'selected' : '' }} @endforeach>
                                {{ $book->title }}
                            </option>
                            @endif
                            @endforeach
                        </select>
                      </div>
                  <div class="form-group">
                      <label>Status</label>
                           <input disabled onlyread type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ $transaction->status == 1 ? 'Has Been Returned' : 'Not Been Returned'}}">
                  </div>
                </div>
              </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a href="{{ url('transaction') }}" class="btn btn-primary">Close</a>
                </div>
              </form>
            </div>
@endsection

@section('js')
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