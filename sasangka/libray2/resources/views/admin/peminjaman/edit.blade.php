@extends('layouts.admin')

@section('header', 'Edit Transaction')

@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                        <label for="name">Member's Name</label>
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
                                <label for="date_start">Translation Starts</label>
                                <input type="date" class="form-control" id="date_start" name="date_start" required
                                    value="{{ old('date_start', $transaction->date_start) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date_end">Translation Ends</label>
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
                        <label for="status">status</label>
                        <select name="status" id="status" class="form-control form-control-sm">
                            <option value="0">Not Returned yet</option>
                            <option value="1">Has Returned</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <a href="{{ route('transactions.index') }}" class="btn btn-danger px-5">Cancel</a>
                    <button type="submit" class="btn btn-primary px-5">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2(

    )
    })
</script>

@endsection