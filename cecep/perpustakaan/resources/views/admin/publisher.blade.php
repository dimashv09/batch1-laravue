@extends('layouts.admin')
@section('header', 'Publisher')

@section('css')

@endsection

@section('content')
<div class="row">
    <div class="col-md-100%">
        <div class="card">
          <div class="card-header">
                <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right">Create New publisher</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">Phone Number</th>
                      <th class="text-center">Address</th>
                      <th class="text-center">Created at</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($publishers as $key => $publisher)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $publisher->name }}</td>
                      <td>{{ $publisher->email }}</td>
                      <td>{{ $publisher->phone_number }}</td>
                      <td>{{ $publisher->address }}</td>
                      <td class="text-right">{{ date('d-m-y', strtotime($publisher->created_at)) }}</td>
                      <td class="text-right">
                        <a href="#" @click="editData({{ $publisher }})" class="btn btn-warning btn-sm">Edit</a>
                        <a href="#" @click="deleteData({{ $publisher->id }})" class="btn btn-danger btn-sm">Delete</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
          </div>
    </div>
</div>
<div class="modal fade" id="modal-default">
      <div class="modal-dialog">
          <div class="modal-content">
            <form method="post" :action="actionUrl" autocomplete="off">
              <div class="modal-header">

                <h4 class="modal-title">Publisher</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                @csrf

                <input type="hidden" name="_method" value="PUT" v-if="editStatus">

                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name" :value="data.name" required="">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" :value="data.email" required="">
                </div>
                <div class="form-group">
                  <label>Phone Number</label>
                  <input type="text" class="form-control" name="phone_number" :value="data.phone_number" required="">
                </div>
                <div class="form-group">
                  <label>Address</label>
                  <input type="text" class="form-control" name="address" :value="data.address" required="">
                </div>
              </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
          </div>
      </div>
</div>
<div id="controller">
  <div class="row">
  </div>

  <div class="modal-fade" id="modal-defauld">
  </div>
</div>
@endsection

@section('js')
  <script type="text/javascript">
    var controller = new Vue({
      el: '#controller',
      data: {
        data : {},
        actionUrl : "{{ url('publishers') }}",
        editStatus : false
      },
      mounted: function () {

      },
      metods: {
        addData() {
            this.data = {};
            this.actionUrl = "{{ url('publishers') }}";
            this.editStatus = false;
            $('#modal-default').modal();
          },
          editData(data) {
            this.data = data;
            this.actionUrl = "{{ url('publishers') }}"+'/'+data.id;
            this.editStatus = true;
            $('#modal-default').modal();

        },
        deletData(id) {
            this.actionUrl = "{{ url('publishers') }}"+'/'+id;
            if (confirm("Are You Sure ?")) {
              axios.post(this.actionUrl, {_method: 'DELETE'}).then(response => {
                location.reload();
              });
            }
        }
      }

    });

  </script>

@endsection