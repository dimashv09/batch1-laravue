@extends('layouts.admin')
@section('header', 'Peminjaman')
@section('content')
@section('css')
        <!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
@endsection
<div class="card">
  <form action="{{url('transactions/update/'. $transaction->id)}}" method="post">
      @csrf
      @method('put')
    <div class="card-body">
    <div class="form-group">
      <label>Nama Peminjam</label>
      <select name="member_id" class="form-control">
                          @foreach($members as $member)
                          <option :selected="data.member_id" value="{{ $member->id }}">{{ $member->name }}</option>
                          @endforeach
                         </select>
    </div>
    <div class="form-group">
      <label>Tanggal</label>
        <div class="row">
          <div class="col-md-5">
            <input type="date" name="date_start" value="{{ $transaction->date_start }}" class="form-control">
          </div>&nbsp; - &nbsp; 
          <div class="col-md-6">
            <input type="date" name="date_end" value="{{ $transaction->date_end }}" class="form-control">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label>Book</label>
        <select class="select2 form-control" name="book_id[]"  multiple="multiple" data-placeholder="Select a Book" style="width: 100%;">
         @foreach($books as $book)
         @if(old('book_id'))
          <option value="{{ $book->id }}" {{ in_array($book->id, old('book_id')) ? 'selected' : '' }}>{{ $book->title }}</option>
          @else
          <option value="{{ $book->id }}" @foreach($transactiondetail as $detail)
            {{ $detail->book_id == $book->id ? 'selected' : ' ' }} @endforeach>{{ $book->title }}</option>
            @endif
          @endforeach
        </select>
    </div>
    <div class="form-group row">
      <label class="col-sm-2 col-form-label">Status</label>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="status" value="sudah" {{$transaction->status == 'sudah'? 'checked' : ''}}>
          <label class="form-check-label" for="exampleRadios1">
            Sudah Dikembalikan
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="status" value="belum" {{$transaction->status == 'belum'? 'checked' : ''}}>
          <label class="form-check-label" for="exampleRadios2">
            Belum Dikembalikan
          </label>
        </div>
        </div>
      </div>
    <div class="form-group">
     <button type="submit" class="btn btn-primary" value="submit">Edit</button>
    </div>
  </div>
  </form>
</div>
@endsection
@section('js')

<!-- DataTables -->
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
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

