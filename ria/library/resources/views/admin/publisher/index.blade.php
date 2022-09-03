@extends('layouts.admin')
@section('header', 'Publisher')

@section('css')

@endsection

@section('content')
<div id="controller">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Publisher</h3>
          <div class="card-tools">
            <a href="#" @click="addData()"  class="btn btn-sm btn-primary pull-left">Create New Publisher</a>
</div>
  </div>
    </div>
      </div>
        </div>

        <table class="table table-head-fixed text-nowrap">
          <thead>
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">Name</th>
              <th class="text-center">Email</th>
              <th class="text-center">Phone Number</th>
              <th class="text-center">Address</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>

          <tbody>

            @foreach($publishers as $key => $publisher)

            <tr>
              <td class="text-center">{{ $key+1 }}</td>
              <td class="text-center">{{ $publisher->name }}</td>
              <td class="text-center">{{ $publisher->email }}</td>
              <td class="text-center">{{ $publisher->phone_number }}</td>
              <td class="text-center">{{ $publisher->address }}</td>
              <td class="text-center">
                <a href="#" @click="editData({{ $publisher }})" class="btn btn-warning btn-sm">Edit</a>
                <a href="#" @click="deleteData({{ $publisher->id }})"class="btn btn-danger btn-sm">Delete</a>

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
                <form :action="actionUrl" method="post" autocomplete="off">
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
                      <input type="text" name="name" :value="data.name" class="form-control" placeholder="Input Name" required="">
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" class="form-control" name="email" :value="data.email" placeholder="Input Email" required="">
                    </div>
                    <div class="form-group">
                      <label>Phone Number</label>
                      <input type="text" class="form-control" name="phone_number" :value="data.phone_number"  placeholder="Input Phone Number" required="">
                    </div>
                    <div class="form-group">
                      <label>Address</label>
                      <input type="text" class="form-control" name="address" :value="data.address" placeholder="Input Address" required="">
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
              </div>
@endsection

@section('js')

  <script type="text/javascript">
    var controller = new Vue({
      el: '#controller',
      data: {
        data : {},
        actionUrl : '{{ url('publishers') }}',
        editStatus :false
      },
      mounted: function () {

      },
      methods: {
        addData() {
          this.data = {};
          this.actionUrl = '{{ url('publishers') }}';

          $('#modal-default').modal();

        },
        editData(data) {
          this.data = data;
          this.editStatus = true;
          this.actionUrl = '{{ url('publishers') }}'+'/'+data.id; 
          $('#modal-default').modal();

        },
        deleteData(id) {
          this.actionUrl = '{{ url('publishers') }}'+'/'+id;
          if (confirm("Are you sure?")) {
            axios.post(this.actionUrl, {_method: 'DELETE'}).then(response => {
              location.reload();
              });
          }

        }
      }
    });
  </script>

@endsection