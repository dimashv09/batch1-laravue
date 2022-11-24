@extends('layouts.admin')
@section('header', 'Author');

@section('css')
<!-- Data Table -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">


@endsection
@section('content')
<div id="controller">
    <div class="row">
      <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right">Create New Author</a>
                <div class="card-tools">
                
            </div>
            </div>
    
            <div class="card-body table-responsive p-3">
              <table id="datatable" class="table table-hover text-nowrap">
              <thead>
               <tr>
                 <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">No</font></font></th>
                 <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Name</font></font></th>
                 <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Phone Number</font></font></th>
                 <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Address</font></font></th>
                 <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Email</font></font></th>
                  <th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Action</font></font></th>
               </tr>
            </thead>
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
              <label>Phone Number</label>
              <input type="text" class="form-control" name="phone_Number" :value="data.phone_Number" required="">
            </div>
            
            <div class="from-group">
              <label>Address</label>
              <input type="text" class="form-control" name="address" :value="data.address" required="">
            </div>

            <div class="from-group">
              <label>Email</label>
              <input type="text" class="form-control" name="email" :value="data.email" required="">
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
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script type="text/javascript">
  var actionUrl = '{{ url('authors') }}';
  var apiUrl = '{{ url('api/authors') }}';

  var columns = [
    {data: 'DT_RowIndex', class: 'text-center', orderabel: true},
    {data: 'name', class: 'text-center', orderabel: true},
    {data: 'phone_Number', class: 'text-center', orderabel: true},
    {data: 'address', class: 'text-center', orderabel: true},
    {data: 'email', class: 'text-center', orderabel: true},
    {render: function (index, row, data, meta){
      return `
            <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event, ${meta.row})">
                Edit
            </a>
            <a class="btn btn-denger btn-sm" onclick="controller.deleteData(event, ${data.id})">
               Delete
            </a>`;

    }, orderabel: false, widht: '200px', class: 'text-center'},
  ];

 var controller = new Vue({
    el: '#controller',
    data: {
      datas: [],
      data: {},
      actionUrl,
      apiUrl,
      editStatus: false,
    },
    mounted: function() {
      this.datatable();
    },
    methods: {
      datatable(){
        const _this = this;
        _this.table = $('#datatable').DataTable({
          ajax: {
            url: _this.apiUrl,
            type: 'GET',
          },
          columns: columns
        }).on('xhr', function() {
          _this.datas = _this.table.ajax.json().data;
        });
      },
    }
  });
</script>

/*<script type="text/javascript">
  $(function () {
    $("#datatable").DataTable();
  });
</script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<!-- CRUD Vue js -->
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
*/