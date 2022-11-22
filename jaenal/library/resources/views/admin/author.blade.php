@extends('layouts.admin')
@section('header', 'Author');

@section('css')

@endsection
@section('content')
<div id="controller">
    <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right">Create New Author</a>
                <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" Name="table_search" class="form-control float-right" placeholder="Mencari">
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
            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">ID</font></font></th>
            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Name</font></font></th>
            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Email</font></font></th>
            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Phone Number</font></font></th>
            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Address</font></font></th>
            <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Action</font></font></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($authors as $key => $author)
            
        
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$author->name}}</td>
                <td>{{$author->email}}</td>
                <td>{{$author->phone_Number}}</td>
                <td>{{$author->address}}</td>
                <td>
                    <a href="#" @click="editData({{ $author }})" class="btn btn-warning btn-sm">Edit</a>
                    <a href="#" @click="deleteData({{ $author->id }})"class="btn btn-danger btn-sm">Delete</a>
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

          <h4 class="modal-title">Author</h4>

           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           </button>
        </div>
          <div class="modal-body">
            @csrf

            <input type="hidden" name="_method" value="PUT" v-if="editStatus">

            <div class="from-group">
              <label>Name</label>
              <input type="text" class="form-control" name="name" :value="data.name" required="">
            </div>
            
            <div class="from-group">
              <label>Email</label>
              <input type="text" class="form-control" name="email" :value="data.email" required="">
            </div>

            <div class="from-group">
              <label>Phone Number</label>
              <input type="text" class="form-control" name="phone_Number" :value="data.phone_Number" required="">
            </div>
            
            <div class="from-group">
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
</div>
@endsection

@section('js')
    <script type="text/javascript">
      var controller = new Vue({
        el: '#controller',
        data: {
          data : {},
          actionUrl : '{{ url ('authors') }}',
          editStatus : false
        },
        mounted: function(){

        },
        methods: {
          addData (){
            this.data = {};
            this.actionUrl = '{{ url('authors') }}';
            this.editStatus = false;
            $('#modal-default').modal();
          },
          editData (data){
            //console.log(data);
            this.data = data;
            this.actionUrl = '{{ url('authors') }}'+'/'+data.id;
            this.editStatus = true;
            $('#modal-default').modal();
          },
          deleteData (id){
            //console.log(id);
            this.actionUrl = '{{ url('authors') }}'+'/'+id;
            if (confirm("Are you sure?")) {
              axios.post(this.actionUrl, {_method: 'DELETE'}).then(response =>{
                location.reload();
              })
            }
          }
        }
      });

    </script>

@endsection
