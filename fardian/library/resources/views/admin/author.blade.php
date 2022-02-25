@extends('layouts.admin')
@section ('header', 'Author')

@section('css')

@endsection

@section('content')
<div id="controller">
  <div class="card"> 
    <div class="card-header">
                <a href="#" @click="addData()" data-target="#modal-default" data-toggle="modal" class="btn btn-sm btn-primary pull-right">Create New Author</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th class ="text-center">Name</th>
                      <th class ="text-center">Email</th>
                      <th class ="text-center">Phone Number</th>
                      <th class ="text-center">Address</th>
                      <th class ="text-center">Created At</th>
                      <th class ="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($authors as $key => $author)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $author->name }}</td>
                      <td>{{ $author->email }}</td>
                      <td>{{ $author->phone_number }}</td>
                      <td>{{ $author->address }}</td>
                      <td class="text-center"> {{ date('d M Y', strtotime($author->created_at)) }}</td>
                      <td class="text-right">
                        <a href="#" @click="editData({{ $author }})" class="btn btn-warning btn-sm">Edit</a>
                        <a href="#" @click="deleteData({{ $author->id }})" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
         </div>
         
         <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="post" :action="actionUrl" autocomplete="off">
                      <div class="modal-header">

                        <h4 class="modal-title">Author</h4>

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
                        <button type="submit" class="btn btn-default">Save Changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
</div>
@endsection

@section('js')
 <script type="text/javascript">
   var controller = new Vue({
     el : '#controller',
     data : {
       data :{},
       actionUrl : '{{ url('author') }}',
       editStatus : false
     },
     mounted: function () {

     },
     methods: {
       addData() {
        this.data = {};
        this.actionUrl = '{{ url('author') }}';
        this.editStatus = false;
          $('#modal-default').modal();
       },
       editData(data) {
          this.data = data;
          this.actionUrl = '{{ url('author') }}'+'/'+data.id;
          this.editStatus = true;
          $('#modal-default').modal();
       },
       deleteData(id) {
          this.actionUrl = '{{ url('author') }}'+'/'+id;
          if (confirm("Are you sure?")) {
            axios.post(this.actionUrl, {_method: 'DELETE'}).then(response =>{
              location.reload();
            });
          }
       }
     }
   });
 </script>
@endsection