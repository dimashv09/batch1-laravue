@extends('layouts.admin')
@section('title')
Catalog
@endsection
@section('content')
<div class="row">

    <div class="col-md-6">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add New Catalog</h3>
            </div>

            <form method="POST" action="{{ url('catalogs') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                        @if($errors->has('name'))
                        <small class="text-danger">{{ $errors->first('name') }}</small>
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
