@extends('layouts.admin')
@section('header', 'Transaction' )

@section('content')
<div class="row">

    <div class="col-md-6">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create New Transaction</h3>
            </div>


            <form action="{{ route('transactions.store') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Name</label>
                        <select name="member_id" id="">
                            @foreach($members as $member)
                            <option value="{{ $member->id }}">{{ $member->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Date Start</label>
                        <input type="date" name="date_start" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" style=" width:20% ;">
                    </div>
                    <div class=" form-group">
                        <label>Date End</label>
                        <input type="date" name="date_end" class="form-control rounded-0" id="exampleInputRounded0" style=" width:20% ;">
                    </div>
                    <div class="form-group">
                        <label>Books</label>
                        <select class="select2" name="books[]" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                            @foreach($books as $book)
                            <option value="{{ $book->id }}">{{ $book->tittle }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio1" value="1">
                            <label class="form-check-label">Sudah Mengembalikan</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio1" value="0" checked>
                            <label class="form-check-label">Belum Mengembalikan</label>
                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

    </div>

    @endsection