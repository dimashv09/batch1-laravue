@extends('layouts.admin')

@section('header', 'Transaction')

@section('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
@endsection

@section('content')

<div id="controller">
    <div class="card container-fluid col-md-6">
        <div class="card-header border-0">

            <H5 class="font-weight-bold">Edit </H5>

        </div>
        <form action="{{url ('transaction/'.$transaction->id)}}" method="post">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label font-weight-bold">Anggota</label>
                    <div class="col-sm">
                        <select class="form-control" name="member_id" id="exampleFormControlSelect1">
                            <option>Pilih Anggota</option>
                            @foreach ($members as $member)
                            @if (old('transaction', $transaction->member_id) == $member->id)
                            <option value="{{ $member->id }}" selected>{{ $member->name }}</option>
                            @else
                            <option value="{{ $member->id }}">{{ $member->name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label font-weight-bold">Tanggal</label>
                    <div class="col-md-4">
                        <input for="date_start" name="date_start" type="date" class="form-control" id="d" placeholder=""
                            value="{{old('date_start', $transaction->date_start) }}">
                    </div>
                    <span class="col-md-1 text-center">-</span>
                    <div class="col-md-4">
                        <input for="date_end" name="date_end" type="date" class="form-control" id="date_end"
                            placeholder="" value="{{old('date_end',  $transaction->date_end) }}">
                    </div>

                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label mt-1">Buku</label>
                    <div class="col-sm mt-1">
                        <select class="form-control select2" multiple="multiple" name="book[]"
                            id="exampleFormControlSelect1" data-placeholder="select Book">
                            @foreach($transaction->details as $key => $detail)
                            <option value="{{$detail->book_id}}" {{($detail->book_id) ? "selected" :
                                ""}}>{{$detail->book->title}}
                            </option>
                            @endforeach
                            @foreach ($books as $book)
                            <option value="{{$book->id}}">
                                {{$book->title}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label mt-1">Status</label>
                    <div class="col-sm mt-1">
                        <div>
                            <input type="radio" id="option1" name="status" value="0" {{ ($transaction->status == 0 )?
                            "checked" : "" }} >
                            <label>
                                belum kembali
                            </label>
                        </div>
                        <div>
                            <input type="radio" id="option2" name="status" value="1" {{ ($transaction->status == 1 )?
                            "checked" : "" }} >
                            <label>
                                sudah kembali
                            </label>
                        </div>

                    </div>
                </div>
                <div class="card-footer mt-5 mb-3 bg-white">
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
        </form>
    </div>
</div>


@endsection
@section('js')
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>

<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>\
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>


<script type="text/javascript">
    //Initialize Select2 Elements
    $('.select2').select2();

</script>

@endsection