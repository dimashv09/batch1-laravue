@extends('layouts.admin')
@section('header', 'Data User')
@section('content')
@section('css')
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
 @endsection

<div id="controller">
    <div class="card">
    <div class="card-header">
      <a href="#" @click="addData()" class="btn btn-primary btn-sm pull-right">+ Create New Product</a>
    </div>
  
    <!-- /.card-header -->
    <div class="card-body">
      <table id="datatables" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>No</th>
          <th>Title</th>
          <th>Price</th>
          <th>Description</th>
          <th>Quantity</th>
          <th>Image</th>
          <th>Action</th>
        </tr>
        </thead>
      </table>
    </div>
  </div>


        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
              <div class="modal-content">
                <form :action="actionUrl" method="post" autocomplete="off" @submit="submitForm($event, data.id)">
                <div class="modal-header">
                  <h4 class="modal-title">Default Modal</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                   <div class="form-group">
                    <label>Product Title</label>
                    <input type="text" name="title" :value="data.title" class="form-control" placeholder="Input title" required="">
                  </div>
                  <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" :value="data.price" class="form-control" placeholder="Input price" required="">
                  </div>
                   <div class="form-group">
                    <label for="exampleFormControlTextarea2">Description</label>
                    <textarea name="description" :value="data.description" class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="quantity" :value="data.quantity" class="form-control" placeholder="Input quantity" required="">
                  </div>
                  <div class="form-group">
                    <label>File</label>
                    <input type="file" name="file" :value="data.file" class="form-control" required="">
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
@endsection
@section('js')
<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
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
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assets/dist/js/demo.js') }}"></script>
<!-- Page specific script -->

<script>
  var actionUrl = '{{ url('products') }}';
  var apiUrl = '{{ url('api/products') }}';

  var columns = [
    {data: 'DT_RowIndex', class: 'text-center', orderable: true },
    {data: 'title', class: 'text-center', orderable: true },
    {data: 'price', class: 'text-center', orderable: true },
    {data: 'description', class: 'text-center', orderable: true },
    {data: 'quantity', class: 'text-center', orderable: true },
    { data: 'image', class: 'text-center',
                    render: function( data, type, full, meta ) {
                        return "<img src=\"/productimage/" + data + "\" width=\"50\"/>";
                    }
                },
    {render: function(index, row, data, meta ){
      return `
        <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event, ${meta.row})">
        Edit
                </a>
        <a href="#" class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">
                Delete</a>
      `

    }, orderable: false, width: '200px', class: 'text-center'},
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
        datatable() {
          const _this = this;
          _this.table = $('#datatables').DataTable({
            ajax: {
              url: _this.apiUrl,
              type: 'GET',
            },
            columns: columns
          }).on('xhr', function() {
            _this.datas = _this.table.ajax.json().data;
          });
        },
               addData() {
                this.data = {};
                this.actionUrl = '{{ url('products') }}';
                $('#modal-default').modal();
                editStatus: false;
               },
               editData(event, row){
                this.data = this.datas[row];
                this.editStatus = true;
                $('#modal-default').modal();
               },
               deleteData(event, id) {
                    if (confirm("Are you sure ?")) {
                        $(event.target).parents('tr').remove();
                            axios.post(this.actionUrl+'/'+id, {_method: 'DELETE'}).then(response => {
                            // location.reload();
                            alert('Data has been removed');
                    });
                }
             },
               submitForm(event, id){
                event.preventDefault();
                const _this = this;
                var actionUrl = ! this.editStatus ? this.actionUrl : this.actionUrl+'/'+id;
                axios.post(actionUrl, new FormData($(event.target)[0])).then(response => {
                    $('#modal-default').modal('hide');
                    _this.table.ajax.reload();
                });
               },
      }
    });
 
</script>
@endsection


