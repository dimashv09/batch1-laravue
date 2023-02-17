@extends('layouts.admin')
@section('content')
    <div id="controller">
        <div class="row justify-content-center align-items-center mb-4">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Create New Transaction</h3>
                    </div>

                    <form action="{{ url('transactions') }}" method="post">
                        <div class="card-body">
                            @csrf
                            <div class="row">
                                <label>Member&emsp;&emsp;&emsp;&emsp;</label>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control select2">
                                            <option selected>Select Member</option>
                                            @foreach ($members as $member)
                                                <option value="{{ $member->id }}">{{ $member->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label for="date_start">Transaction&emsp;&emsp;&nbsp;&nbsp;</label>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="date" class="form-control" id="date_start" name="date_start"
                                            value="{{ old('date_start') }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input type="date" class="form-control" id="date_end" name="date_end"
                                            value="{{ old('date_end') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label>Book&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;</label>
                                <div class="col-md-7">
                                    <select class="form-control select2">
                                        <option selected>Select Book</option>
                                        @foreach ($books as $book)
                                            <option value="{{ $book->id }}">{{ $book->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>&nbsp;
                            <div class="row">
                                <label>Status&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;</label>
                                <div class="col-md-7">
                                    <input type="radio" id="status" name="fav_language" value="1">
                                    <label for="status">Has Returned</label><br>
                                    <input type="radio" id="status" name="fav_language" value="2">
                                    <label for="status">Not Returned</label><br>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
