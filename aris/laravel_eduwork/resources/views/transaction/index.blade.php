@extends('layouts.admin')
@section('header', 'Peminjaman')
@section('content')
@section('css')
        <!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
@endsection
<div id="controller">
	<div class="card">
	  <div class="card-header">
	  	<div class="row">
	  	<div class="col-md-6">
	    	   <a href="#" @click="addData()" class="btn btn-primary pull-right">Create New Peminjaman</a>
		</div>
		 <div class="col-md-3">
		    	<div class="form-group row">
	    		<label class="col-md-2">Status : </label>
	    		<div class="col-md-9">
		               <select class="form-control" name="status">
		                   <option value="0">Semua</option>
		                   <option value="sudah">Sudah</option>
		                   <option value="belum">Belum</option>
		               </select>
	       		</div>
	           	</div>
           	</div>

           	<div class="col-md-3">
	              <div class="form-group row">
	    		<label class="col-md-3">Tanggal Peminjaman : </label>
	    		<div class="col-md-9">
		               <input type="date" class="form-control" name="date_start" value="date_start">
	       		</div>
	             </div>
         	</div>
	  <div class="card-body">
             	<table id="datatables" class="table table-striped table-bordered">
	            <thead>
		        <tr>
		            <th>No</th>
		            <th>Tangggal Pinjam</th>
		            <th>Tanggal Kembali</th>
                    <th>Nama Peminjam</th>
                    <th>Harga</th>
		            <th>status</th>
                    <th>Total Buku</th>
                    <th>Duration</th>
		            <th>Actions</th>
		        </tr>
	            </thead>
	        </table>

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
					<div class="form-group row">
			                    <label class="col-sm-2 col-form-label">Anggota</label>
			                    <div class="col-sm-10">
			                	 <select name="member_id" class="form-control">
			                	 	@foreach($members as $member)
			                	 	<option :selected="data.member_id" value="{{ $member->id }}">{{ $member->name }}</option>
			                	 	@endforeach
			                	 </select>
			                </div>
			                </div>
			                <div class="form-group row">
		                	 <label class="col-sm-2 col-form-label">Tanggal</label>
							    <div class="col-sm-4">
							      <input type="date" name="date_start" :value="data.date_start" class="form-control">
							    </div>&nbsp; - &nbsp; 
							    <div class="col-sm-5">
							      <input type="date" name="date_end" :value="data.date_end" class="form-control">
							    </div>
    						  </div>
							<div class="form-group row">
                                  <label class="col-sm-2 col-form-label">Buku</label>
                                  <div class="col-md-10">
                                  <select class="select2 form-control" name="book_id[]"  :multiple="true" data-placeholder="Select a Book" style="width: 100%;">
                                   @foreach($books as $book)
                                    <option v-if="createStatus" :selected="data.book_id" v-model="data.book_id" value="{{ $book->id }}">{{ $book->title }}</option>
                                    <option v-if="editStatus" :selected="data.book_id" v-model="data.book_id" value="{{ $book->id}}" @foreach($transactiondetail as $transaction) 
                                        {{ $transaction->book_id == $book->id ? 'selected' : ' ' }} @endforeach>{{ $book->title }}</option>
                                       
                                    @endforeach
                                  </select>
                                </div>
                              </div>
			                <div class="form-group row" v-if="editStatus">
			                    <label class="col-sm-2 col-form-label">Status</label>
			                    <div class="col-sm-10">
			                	 <div class="form-check">
						  <input class="form-check-input" type="radio" name="status" value="sudah" v-model="data.status">
						  <label class="form-check-label" for="exampleRadios1">
						    Sudah Dikembalikan
						  </label>
						</div>
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="status" value="belum" v-model="data.status">
						  <label class="form-check-label" for="exampleRadios2">
						    Belum Dikembalikan
						  </label>
						</div>
			                </div>
			              </div>
				<div class="modal-footer justify-content-between">
		                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		                  <button type="submit" class="btn btn-primary">Save</button>
		                </div>
				</form>
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
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
});
</script>
<script>
    var actionUrl = '{{ url('transactions') }}';
    var apiUrl = '{{ url('api/transactions') }}';
    var dateUrl = '{{ url('date/transactions') }}';

    var columns = [
    {data: 'DT_RowIndex', class: 'text-center', orderable: true},
    {data: 'date_start', class: 'text-center', orderable: true},
    {data: 'date_end', class: 'text-center', orderable: true},
    {data: 'name', class: 'text-center', orderable: true},
    {data: 'purches', class: 'text-center', orderable: true},
    {data: 'status', class: 'text-center', orderable: true},
    {data: 'qty', class: 'text-center', orderable: true},
    {data: 'duration', class: 'text-center', orderable: true},
    {render: function(index, row, data, meta) {
        return `
            <a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event, ${meta.row})">
            Edit
            </a>
            <a href="${actionUrl}/${data.id}" class="btn btn-success btn-sm">
             <i class="fas fa-eye"></i>
            Detail
            </a>
            <a href="#" class="btn btn-danger btn-sm" onclick="controller.deleteData(event, ${data.id})">
            Delete</a>
    `}, orderable: false, width: '200px', class:'text-center'},
    ];

    var controller = new Vue({
        el: '#controller',
        data: {
                datas: [],
                data: {},
                actionUrl,
                apiUrl,
                editStatus : false,
                createStatus : false,
            

            },
            mounted: function () {
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
                    this.actionUrl = '{{ url('transactions') }}';
                    this.editStatus = false;
                    this.createStatus = true;
                    $('#modal-default').modal();
                },
                editData(event, row) {
                    this.data = this.datas[row];
                    // console.log(this.data)
                    // this.actionUrl = '{{ url('authors') }}'+'/'+this.data.id;
                    this.editStatus = true;
                    this.createStatus = false;
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

    // var controller = new Vue({
    //     el: '#controller',
    //     data: {
    //             datas: [],
    //             data: {},
    //             actionUrl,
    //             apiUrl,
    //             editStatus : false,
            

    //         },
    //         mounted: function () {
    //             this.datatable();
    //         },
    //         methods: {
    //             datatable() {
    //                 const _this = this;
    //                 _this.table = $('#datatables').DataTable({
    //                     ajax: {
    //                         url: _this.apiUrl,
    //                         type: 'GET',
    //                     },
    //                     columns: columns
    //                 }).on('xhr', function() {
    //                     _this.datas = _this.table.ajax.json().data;
    //                 }); 
    //             },
    //             addData() {
    //                 this.data = {};
    //                 this.actionUrl = '{{ url('authors') }}';
    //                 this.editStatus = false;
    //                 $('#modal-default').modal();
    //             },
    //             editData(event, row) {
    //                 this.data = this.datas[row];
    //                 // console.log(this.data)
    //                 // this.actionUrl = '{{ url('authors') }}'+'/'+this.data.id;
    //                 this.editStatus = true;
    //                 $('#modal-default').modal();
    //             },
    //             deleteData(event, id) {
    //                 if (confirm("Are you sure ?")) {
    //                     $(event.target).parents('tr').remove();
    //                         axios.post(this.actionUrl+'/'+id, {_method: 'DELETE'}).then(response => {
    //                         // location.reload();
    //                         alert('Data has been removed');
    //                 });
    //             }
    //          },
    //          submitForm(event, id){
    //             event.preventDefault();
    //             const _this = this;
    //             var actionUrl = ! this.editStatus ? this.actionUrl : this.actionUrl+'/'+id;
    //             axios.post(actionUrl, new FormData($(event.target)[0])).then(response => {
    //                 $('#modal-default').modal('hide');
    //                 _this.table.ajax.reload();
    //             });
    //          },
    //     }      
    // });
</script>

<script>
    $('select[name=status]').on('change', function() {
        status = $('select[name=status]').val();

        if (status == 0) {
            controller.table.ajax.url(apiUrl).load()
        }else {
            controller.table.ajax.url(apiUrl+'?status='+status).load()
        }
    })
</script>
<script>
    $('input[name=date_start]').on('change', function() {
        date_start = $('input[name=date_start]').val();
        alert('testing')
        if (date_start == 0) {
            controller.table.ajax.url(dateUrl).load()
        }else {
            controller.table.ajax.url(dateUrl+'?date_start='+date_start).load()
        }
    })
</script>
@endsection
