@extends('layouts.admin')
@section('title')
Member
@endsection
@section('content')
<div class="row">

    <div class="col-md-6">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add New Member</h3>
            </div>

            <form method="POST" action="{{ url('members') }}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                        @if($errors->has('name'))
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" class="form-control">
                            <option value="">-- Select Gender --</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="none">None</option>
                        </select>
                        @if($errors->has('gender'))
                        <small class="text-danger">{{ $errors->first('gender') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                        @if($errors->has('email'))
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="number" class="form-control" id="phone" name="phone" required>
                        @if($errors->has('phone'))
                        <small class="text-danger">{{ $errors->first('phone') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address">
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
