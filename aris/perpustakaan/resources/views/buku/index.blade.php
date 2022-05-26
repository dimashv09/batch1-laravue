@extends('layouts.admin')
@section('header', 'Publisher')
@section('content')
@section('css')
        <!-- DataTables -->
 <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
 <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
<div id="controller">
            <div class="row">
            <div class="col-12">
            <div class="card">

            <div class="card-header">
                  <!-- ngga bisa detail -->
                <a href="#" @click="addData()" class="btn btn-primary pull-right">Create New Publisher</a>
               <!-- <a href="{{ url('/create') }}" class="btn btn-primary pull-right">Create New Catalog</a> -->
            <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
            <div class="input-group-append">
            </div>
            </div>
            </div>
            </div>
            <div class="card-body">
             <table id="datatable" class="table table-striped table-bordered">
            <thead>
            <tr>
            <th>No</th>
            <th>ISBN</th>
            <th>Nama Buku</th>
            <th>Tahun</th>
            <th>QTY</th>
            <th>Price</th>
            <th>Action</th>
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
                    <label>ISBN</label>
                    <input type="number" name="isbn" :value="data.isbn" class="form-control" placeholder="Input ISBN" required="">
                  </div>
                  <div class="form-group">
                    <label>Nama Buku</label>
                    <input type="text" name="title" :value="data.title" class="form-control" placeholder="Input Title" required="">
                  </div>
                  <div class="form-group">
                    <label>Tahun</label>
                    <input type="number" name="year" :value="data.year" class="form-control" placeholder="Input Tahun" required="">
                  </div>
                  <div class="form-group">
                    <label>QTY</label>
                    <input type="number" name="qty" :value="data.qty" class="form-control" placeholder="Input QTY" required="">
                  </div>
                  <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" :value="data.price" class="form-control" placeholder="Input Price" required="">
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

<!-- DataTables -->
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script>
    var actionUrl = '{{ url('buku')}}';
    var apiUrl = '{{ url('api/buku')}}';

    var columns = [
            {data: 'DT_RowIndex', class: 'text-center', orderable:true},
            {data: 'isbn', class: 'text-center', orderable:true},
            {data: 'title', class: 'text-center', orderable:true},
            {data: 'year', class: 'text-center', orderable:true},
            {data: 'qty', class: 'text-center', orderable:true},
            {data: 'price', class: 'text-center', orderable:true},
            {render: function (index, row, data, meta){
              return`
              <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event, ${meta.row})">
              Edit</a>

              <a  class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">
              Delete</a>`;
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
        addData() {
          this.data = {};
          this.actionUrl = '{{ url('buku') }}';
          this.editStatus = false;
          $('#modal-default').modal();
        },
        editData(event, row) {
            this.data = this.datas[row];
            // console.log(this.data)
            // this.actionUrl = '{{ url('authors') }}'+'/'+this.data.id;
            this.editStatus = true;
            $('#modal-default').modal();
        },
        deleteData(event, id){
          if (confirm('Are you sure ?')) {
            $(event.target).parents('tr').remove();
            axios.post(this.actionUrl+'/'+id, {
              _method: 'DELETE'
            }).then(response => {
              alert('Data has been removed');
            });
          }
        },
        submitForm(event, id){
        event.preventDefault();
        const _this = this;
        var actionUrl = ! this.editStatus ? this.actionUrl : this.actionUrl+'/'+id;
        axios.post(actionUrl, new FormData($(event.target)[0])).then(response => 
        {
          $('#modal-default').modal('hide');
          _this.table.ajax.reload();
        });
      },
    }

    });
    
</script>
@endsection
