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
                <h3 class="card-title">Edit Transaction</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ url('transaction/'.$transaction->id) }}" method="post">
                @csrf
                {{ method_field('PUT') }}
              <div class="card-body">
                <div class="form-group">
                        <label>Member</label>
                        <select name="member_id" class="form-control">
                           @foreach($members as $member)
                           <option value="{{ $member->id }}" {{ $transaction->member_id == $member->id ? 'selected' : ''}}>{{ $member->name }}</option>
                            @endforeach
                        </select>
                 </div>
                <!-- Date -->
                <div class="form-group">
                          <label>Transaction Start</label>
                          <input type="date" class="form-control" name="date_start" value="{{ old('date_start', $transaction->date_start) }}" required>
                </div>
                <div class="form-group">
                          <label>Transaction End</label>
                          <input type="date" class="form-control" name="date_end" value="{{ old('date_end', $transaction->date_end) }}" required>
                </div>
                  <div class="select2-blue">
                          <label>Book</label>
                          <select name="book_id[]" class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
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
                  </div><br>
                  <div class="form-group">
                  <label> Status </label>
                    <div class="form-check">
                          <input class="form-check-input" type="radio" name="status" value="1" {{ ($transaction->status == '1') ? 'checked' : '' }}>
                          <label class="form-check-label">Has Been Returned</label>
                  </div>
                  <div class="form-check">
                          <input class="form-check-input" type="radio" name="status" value="0" {{ ($transaction->status == '0') ? 'checked' : '' }}>
                          <label class="form-check-label">Not Been Restored</label>
                  </div>
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