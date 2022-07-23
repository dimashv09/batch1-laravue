@extends('layouts.admin')
@section('title', 'Transaction')

@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"/>

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
    <div class="row justify-content-center mb-4">
        <div class="col-6">
            <form action="{{ route('transactions.update', $transaction->id) }}" method="post" class="bg-light">
                <div class="modal-body">
                    @csrf
                    @method('put')

                    <div class="form-group">
                        <label for="name">Member Name</label>
                        <select name="member_id" id="name" class="form-control form-control-sm">
                            @foreach ($members as $member)
                            <option value="{{ $member->id }}"
                                {{ $transaction->member_id == $member->id ? 'selected' : ''}}>
                                {{ $member->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date_start">Transaction Start</label>
                                <input type="date" class="form-control" id="date_start" name="date_start" required
                                    value="{{ old('date_start', $transaction->date_start) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date_end">Transaction End</label>
                                <input type="date" class="form-control" id="date_end" name="date_end" required
                                    value="{{ old('date_end', $transaction->date_end) }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Books</label>
                        <select class="select2 select2-danger" multiple="multiple" data-placeholder="Select a Book"
                            style="width: 100%;" name="book_id[]">
                            @foreach ($books as $key => $book)
                            @if (old('book_id'))
                            <option value="{{ $book->id }}" {{ in_array($book->id, old('book_id')) ? 'selected' : '' }}>
                                {{ $book->title }}</option>
                            @else
                            <option value="{{ $book->id }}" @foreach($transactionDetails as $transaction)
                                {{ $transaction->book_id == $book->id ? 'selected' : '' }} @endforeach>
                                {{ $book->title }}
                            </option>
                            @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group" v-if="status">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control form-control-sm">
                            <option value="0">Not Returned yet</option>
                            <option value="1">Has Returned</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('transactions.index') }}" class="btn btn-secondary btn-sm px-5"><span class="fas fa-angle-left"></span> Back</a>
                    <button type="submit" class="btn btn-primary btn-sm px-5"><span class="fas fa-save"></span> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection