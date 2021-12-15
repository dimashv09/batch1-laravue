@extends('layouts.admin',[
'judul' => 'Edit Publisher'
])
@section('content')

    <div class="row">
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Publisher</h3>
                </div>

                <!-- form start -->
                <form action="{{ url('publishers/' . $publisher->id) }}" method="post">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="card-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                placeholder="name" value="{{ old('name', $publisher->name) }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="email" value="{{ old('email', $publisher->email) }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="number" name="phone_number"
                                class="form-control @error('phone_number') is-invalid @enderror" placeholder="phone number"
                                value="{{ old('phone_number', $publisher->phone_number) }}">
                            @error('phone_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class=" form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                                placeholder="address" value="{{ old('address', $publisher->address) }}">
                            @error('address')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.card -->

@endsection
