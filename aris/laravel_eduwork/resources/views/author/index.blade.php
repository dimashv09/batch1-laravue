@extends('layouts.admin')
@section('header', 'Catalog')
@section('content')
@section('css')

@endsection
<div id="controller">
            <div class="row">
            <div class="col-12">
            <div class="card">

            <div class="card-header">
                  <!-- ngga bisa detail -->
                <a href="#" @click="addData()" class="btn btn-primary pull-right">Create New Catalog</a>
               <!-- <a href="{{ url('/create') }}" class="btn btn-primary pull-right">Create New Catalog</a> -->
            <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
            <div class="input-group-append">
            <button type="submit" class="btn btn-default">
            <i class="fas fa-search"></i>
            </button>
            </div>
            </div>
            </div>
            </div>
            <div class="card-body table-responsive p-0">
             <table class="table table-hover text-nowrap">
            <thead>
            <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Created At</th>
            <th>Actions</th>
            </tr>
            </thead>
            @foreach($authors as $key => $author)
            <tbody>
            <tr>
            <td>{{$key+1}}</td>
            <td>{{ $author->name }}</td>
            <td>{{ $author->email }}</td>
            <td>{{ $author->phone_number }}</td>
            <td>{{ $author->address }}</td>
            <td>{{ date('H:i:s - d M Y', strtotime($author->created_at)) }}</td>
            <td>
                <a href="#" @click="editData({{$author}})" class="btn btn-warning btn-sm">Edit</a>
                <a href="#" @click="deleteData({{$author->id}})" class="btn btn-danger btn-sm">Delete</a>
                <!-- <form action="{{ route('authors.destroy', $author->id) }}" method="post">
                    <input class="btn btn-danger btn-sm" type="submit" value="Delete" onclick="return confirm('Are you sure?')">
                    @method('delete')
                    @csrf
                </form> -->
            </td>
            @endforeach
            </tr>
            </tbody>
            </table>

            </div>

            </div>

            </div>
            </div>
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
              <div class="modal-content">
                <form :action="actionUrl" method="post" autocomplete="off">
                <div class="modal-header">
                  <h4 class="modal-title">Default Modal</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" :value="data.name" class="form-control" placeholder="Input Name" required="">
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" :value="data.email" class="form-control" placeholder="Input Email" required="">
                      </div>
                      <div class="form-group">
                        <label>Phone Number</label>
                        <input type="number" name="phone_number" :value="data.phone_number" class="form-control" placeholder="Input Phone Number" required="">
                      </div>
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" :value="data.address" class="form-control" placeholder="Input Address" required="">
                      </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
  </div>
</div>
</div>
@endsection
@section('js')
<script>

    var controller = new Vue({
        el: '#controller',
        data: {
                data: {},
                actionUrl : '{{ route('authors.store') }}',
                editStatus : false
            

            },
            mounted: function () {
            },
            methods: {
                addData() {
                    // console.log('Add Data');
                    this.actionUrl = '{{ route('authors.store') }}';
                    this.data = {};
                    this.editStatus = false;
                    $('#modal-default').modal();
                    
                },
                editData(data) {
                    // console.log(data);
                    this.data = data;
                    this.actionUrl = '{{ route('authors.store') }}'+'/'+data.id;
                    this.editStatus = true;
                   $('#modal-default').modal();

                },
                deleteData(id) {
                    // console.log(id);
                    this.actionUrl = '{{ route('authors.store') }}'+'/'+id;
                    if (confirm("Are you sure ?")) {
                        axios.post(this.actionUrl, {_method: 'DELETE'}).then(response => {
                            location.reload();
                        });
                    }
                }

            }
    });
</script>
@endsection
