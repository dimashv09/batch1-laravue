@extends('layouts.admin')

@section('header', 'Catalog')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Catalog</h3>
                </div>

                <form action="{{ route("catalogs.update", $catalog->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="Enter Catalog's Name" name="name" required
                                value="{{ old('name', $catalog->name) }}">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Create</button>
                        <a href="{{ route('catalogs.index') }}" class="btn btn-primary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection