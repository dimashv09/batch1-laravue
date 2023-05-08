@extends('layouts.admin')
@section('header','Member')

@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')
<div class="container" id="controller">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="#" @click="addData()" class="btn btn-primary btn-sm pull-right" >Create New Member</a>
                </div>

                <div class="card-body p-0">
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Gender</th>
                                <th class="text-center">Phone Number</th>
                                <th class="text-center">Address</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Created_at</th>
                                <th class="text-center">Action</th>
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
                <form :action="actionUrl" method="post" @submit="submitForm($event, data.id)">
                    <div class="modal-header">
                        <h4 class="modal-title">Create New Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" :value="data.name" name="name" placeholder="Enter name" required="">
                        </div>
                        <div class="form-group">
							<label>Gender</label><br>
								<span class="mr-2">			
									<input type="radio" name="gender" id="male" :value="data.gender" checked required=""> L
								</span>
								<span>
									<input type="radio" name="gender" id="famale" :value="data.gender" checked required=""> P
								</span>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="number" class="form-control" :value="data.phone_number" name="phone_number" placeholder="Enter phone number" required="">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" name="address" :value="data.address" row="4" cols="5" placeholder="Enter address" required=""></textarea>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" :value="data.email" name="email" placeholder="Enter email" required="">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-end">
                        <button type="button" class="btn btn-secondary mr-3" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
            </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
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
<script>
  	var actionUrl = '{{ url('members') }}';
	var apiUrl = '{{ url('api/members') }}';

	var columns = [
         //kolom harus sesuai dgn tabel headnya
		{data: 'DT_RowIndex', class: 'text-center', orderable: false},
		{data: 'name', class: 'text-center', orderable: true},
		{data: 'gender', class: 'text-center', orderable: true},
		{data: 'phone_number', class: 'text-center', orderable: true},
		{data: 'address', class: 'text-center', orderable: true},
		{data: 'email', class: 'text-center', orderable: true},
		{data: 'date', class: 'text-center', orderable: true},
        //render ini untuk mengisi data pada kolom actionnya
		{render: function(index, row, data, meta){
			return `
			   <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event, ${meta.row})">
                 Edit
               </a>
			   <a href="#" class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">
                 Delete
               </a>`;
		}, orderable: false, width: '200px', class: 'text-center'},
	];

</script>
<script>
        var controller = new Vue({
            el: '#controller',
            data: {
                datas: [],
                data: {},
                actionUrl,
                apiUrl,
            },
            mounted: function () {
                this.datatable();
            },
             methods: { 
                //methods data table funginya untuk memanggil data api
                datatable() {
                        const _this = this;
                        _this.table = $('#datatable').DataTable({
                            ajax: {
                                url: _this.apiUrl,
                                type: 'GET',
                            },
                            columns
                        }).on('xhr', function() {
                        _this.datas = _this.table.ajax.json().data;
                        });
                },
                addData() {
                    this.data = {};
                    this.editStatus = false;
                    $('#modal-default').modal();
                },
                editData(event, row) {
                    this.data = this.datas[row];
                    //this.editStatus = true;
                    $('#modal-default').modal();
                },
                deleteData(event, id) {
                    if(confirm('Are you sure ?')){
                        $(event.target).parents('tr').remove();
                        axios.post(this.actionUrl+'/'+id, {_method: 'DELETE'}).then(response => {
                            alert('Data has been removed')
                        });
                    }
                },
                submitForm(event, id) {
                    event.preventDefault();
                    const _this = this;
                    var actionUrl = ! this.editStatus ? this.actionUrl : this.actionUrl+'/'+id;
                    axios.post(actionUrl, new FormData($(event.target)[0])).then(response => {
                        $('#modal-default').modal('hide');
                        _this.table.ajax.reload(); //ini untk membuat form tidak reload saat digunakan
                    })
                },
            },
        });
</script>
@endsection
