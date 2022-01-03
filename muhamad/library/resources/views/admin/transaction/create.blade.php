@extends('layouts.admin')

@section('header', 'Create Transaction')

@section('css')
<!-- Select2 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
    integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    /* For Input Field */
    .select2-container--default.select2-container--focus .select2-selection--multiple,
    .select2-container--default .select2-selection--multiple {
        border-color: #6c757d;
        background-color: #343a40;
    }

    /* For Buttons */
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        border-color: #343a40;
        background-color: #3f6791;
    }

</style>
@endsection

@section('content')
<div id="controller">
    <div class="row justify-content-center align-items-center mb-4">
        <div class="col-6">
            <form action="{{ route('transactions.store') }}" method="post" class="bg-dark">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="name">Member's Name</label>
                        <select name="member_id" id="name"
                            class="form-control @error('member_id') is-invalid @enderror">
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
                                <label for="date_start">Translation Starts</label>
                                <input type="date" class="form-control @error('date_start') is-invalid @enderror"
                                    id="date_start" name="date_start" value="{{ old('date_start') }}" required>
                                @error('date_start')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="date_end">Translation Ends</label>
                                <input type="date" class="form-control @error('date_end') is-invalid @enderror"
                                    id="date_end" name="date_end" value="{{ old('date_end') }}" required>
                                @error('date_end')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Books</label>
                        <select class="select2 select2-danger @error('book_id') is-invalid @enderror"
                            multiple="multiple" data-placeholder="Select a Book" style="width: 100%;" name="book_id[]">
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
                <div class="modal-footer justify-content-between">
                    <a href="{{ route('transactions.index') }}" class="btn btn-danger px-5">Cancel</a>
                    <button type="submit" class="btn btn-primary px-5">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<!-- CRUD VueJs -->
{{-- <script src="{{ asset('js/data.js') }}"></script> --}}

<!-- Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
    integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.select2').select2();
</script>

<!-- Filter Script -->
<script>
    $('select[name=status]').on('change', function() {
        status = $('select[name=status]').val();

        if (status == '') {
            controller.table.ajax.url(apiUrl).load()
        } else {
            controller.table.ajax.url(`${apiUrl}?status=${status}`).load()
        }
    })
</script>
@endsection
