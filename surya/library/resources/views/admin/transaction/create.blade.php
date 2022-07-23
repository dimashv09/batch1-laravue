@extends('layouts.admin')
@section('title', 'Transaction')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />

<style>
    /* For Buttons */
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        border-color: #343a40;
        background-color: #0d6efd;
    }

</style>
@endsection

@section('content')
<div id="controller">
    <div class="row justify-content-center align-items-center mb-4">
        <div class="col-6">
            <form action="{{ route('transactions.store') }}" method="post" class="bg-light">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="name">Members Name</label>
                        <select name="member_id" id="name"
                            class="form-control @error('member_id') is-invalid @enderror">
                            <option selected>-- Select Member --</option>
                            @foreach ($members as $member)
                            <option value="{{ $member->id }}">{{ $member->name }}</option>
                            @endforeach
                        </select>
                        @error('member_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date_start">Transaction Starts</label>
                                <input type="date" class="form-control @error('date_start') is-invalid @enderror"
                                    id="date_start" name="date_start" value="{{ old('date_start') }}">
                                @error('date_start')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date_end">Transaction Ends</label>
                                <input type="date" class="form-control @error('date_end') is-invalid @enderror"
                                    id="date_end" name="date_end" value="{{ old('date_end') }}">
                                @error('date_end')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Books</label>
                        <select class="select2 @error('book_id') is-invalid @enderror" id='select2' multiple="multiple"
                            data-placeholder="Choose a book" style="width: 100%;" name="book_id[]">
                            @foreach ($books as $book)
                            <option value="{{ $book->id }}">
                                {{ $book->title }}
                            </option>
                            @endforeach
                        </select>
                        @error('book_id')
                        <div class="invalid-feedback">Please select a book</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('transactions.index') }}" class="btn btn-danger btn-sm px-5"><span class="fas fa-ban"></span> Cancel</a>
                    <button type="submit" class="btn btn-primary btn-sm px-5"><span class="fas fa-save"></span> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
