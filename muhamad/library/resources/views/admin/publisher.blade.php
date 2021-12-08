@extends('layouts.admin')

@section('header', 'Publisher')

@section('css')

@endsection

@section('content')
<div id="controller">
    {{-- Data Table --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div class="card-header">
                    <a href="#" @click="addData()" class="btn btn-primary">Add new Publisher</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="align-middle" style="width: 10px;">#</th>
                                <th class="align-middle">Name</th>
                                <th class="align-middle">Email</th>
                                <th class="align-middle">Phone Number</th>
                                <th class="align-middle">Address</th>
                                <th class="align-middle">Total of Books</th>
                                <th class="align-middle">Join Date</th>
                                <th class="align-middle text-center" style="width: 130px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($publishers as $publisher)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $publisher->name }}</td>
                                <td>{{ $publisher->email }}</td>
                                <td>{{ $publisher->phone_number }}</td>
                                <td>{{ $publisher->address }}</td>
                                <td>{{ count($publisher->books) }}</td>
                                <td>{{ date('d M Y', strtotime($publisher->created_at)) }}</td>
                                <td>
                                    <a href="#" @click="editData({{ $publisher }})" class="badge bg-warning p-2 mb-2">
                                        Edit</a>
                                    <a href="#" @click="deleteData({{ $publisher->id }})"
                                        class="badge bg-danger p-2 mb-2">
                                        Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Popup --}}
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Publisher</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form :action="actionUrl" method="post">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="_method" value="PUT" v-if="status" />

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="Enter Catalog's name" name="name" required :value="data.name">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                placeholder="Enter Publisher's email" name="email" required :value="data.email">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                id="phone" placeholder="Enter Publisher's phone" name="phone_number" required
                                :value="data.phone_number">
                            @error('phone_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                                placeholder="Enter Publisher's address" name="address" required :value="data.address">
                            @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    const controller = new Vue({
            el: '#controller',
            data: {
                data : {},
                actionUrl : `{{ url('publishers') }}`,
                status : false,
            },
            methods: {
                addData() {
                    this.data = {};
                    this.actionUrl = `{{ url('publishers') }}`
                    this.status = false
                    $('#modal-default').modal()
                },
                editData(publisherData) {
                    this.data = publisherData;
                    this.actionUrl = `{{ url('publishers') }}/${publisherData.id}`
                    this.status = true
                    $('#modal-default').modal()
                },
                deleteData(publisherID) {
                    this.actionUrl = `{{ url('publishers') }}/${publisherID}`
                    if (confirm("Are you sure you want to delete this Data?")) {
                        axios.post(this.actionUrl, {_method: 'DELETE'})
                            .then(response => { location.reload() })
                    }
                }
            }
        })
</script>

{{-- If is-invalid show the model --}}
@if (count($errors) > 0)
<script type="text/javascript">
    $( document ).ready(function() {
        $('#modal-default').modal('show');
    });
</script>
@endif
@endsection
