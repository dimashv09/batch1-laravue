@extends('layouts.admin')
@section('title')
Author
@endsection
@section('content')
<div class="row">

    <div class="col-md-6">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Author</h3>
            </div>

            <form method="POST" action="{{ url('authors/'.$author->id) }}">
                @csrf
                {{ method_field('put') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $author->name }}"
                            required>
                        @if($errors->has('name'))
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $author->email }}"
                            required>
                        @if($errors->has('email'))
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" class="form-control" id="phone" name="phone" value="{{ $author->phone }}"
                            required>
                        @if($errors->has('phone'))
                        <small class="text-danger">{{ $errors->first('phone') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" value="{{ $author->address }}"
                            name="address">
                        @if($errors->has('address'))
                        <small class="text-danger">{{ $errors->first('address') }}</small>
                        @endif
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm"><span class="fas fa-save"></span>
                        Submit</button>
                    <button type="reset" class="btn btn-secondary btn-sm"><span class="fas fa-undo"></span>
                        Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
