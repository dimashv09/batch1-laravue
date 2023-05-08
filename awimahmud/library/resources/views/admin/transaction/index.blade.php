@extends('layouts.admin')
@section('header','Transactions')

@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
@section('content')

{{-- @role('petugas') --}}
<div id="controller">
    <div class="row">
        <div class="col">
            <div class="card ">
                <div class=" border-1">
                <div class="row">
                    <div class="col-md-8">
                        <div class="m-4">
                            <a href="{{ url('transactions/create') }}" @click.prevent="addData()" class="btn btn-primary btn-md">Tambah Transaksi</a>
                        </div>
                    </div>
                    <div class="col-md-2 mt-3">
                        <label class="col-sm">Status </label>
                        <div class="form-group">
                            <select id="filter-status" class="form-control" name='status' >
                                <option value="0">Semua</option>
                                <option value="1">Sudah dikembalikan</option>
                                <option value="2">Belum dikembalikan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="mr-3 mt-3">
                            <label>Tanggal Peminjaman</label>
                            <div class="form-group" >
                                <input type="date" value="" id="filter-date_start"  name="date_start" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="card-body p-0">
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th class="text-center">Tanggal Pinjam</th>
                                <th class="text-center">Tanggal Kembali</th>
                                <th class="text-center">Nama Peminjam</th>
                                <th class="text-center">Lama Pinjam (hari)</th>
                                <th class="text-center">Total Buku</th>
                                <th class="text-center">Total Bayar</th>
                                <th class="text-center">Denda</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="modal fade" id="modal-default">
		<div class="modal-dialog">
			<div class="modal-content">
				<form  :action="actionUrl" method="POST" autocomplete="" @submit.prevent="submitForm($event, book.id)">
					<div class="modal-header">
						<h3 class="modal-title">Book</h3>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span>&times;</span>
						</button>
					</div>
					<div class="modal-body">
						@csrf
						<input type="hidden" name="_method" value="put" v-if="editStatus">
						<div class="form-group">
							<label>ISBN</label>
							<input type="text" class="form-control" name="isbn" required="" :value="book.isbn">
						</div>
						<div class="form-group">
							<label>Title</label>
							<input type="text" class="form-control" name="title" required="" :value="book.title">
						</div>
						<div class="form-group">
							<label>Year</label>
							<input type="number" class="form-control" name="year" required="" :value="book.year">
						</div>
						<div class="form-group">
							<label>Publisher</label>
							<select name="publisher_id" class="form-control">
								@foreach ($publishers as $publisher)
								<option	:selected="book.publisher_id == {{$publisher->id }}" value="{{ $publisher->id }}">{{ $publisher->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Author</label>
							<select name="author_id" class="form-control">
								@foreach ($authors as $author)
								<option :selected="book.author_id == {{ $author->id }}" value="{{ $author->id }}">{{ $author->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Catalog</label>
							<select name="catalog_id" class="form-control">
								@foreach ($catalogs as $catalog)
								<option :selected="book.catalog_id == {{ $catalog->id }}" value="{{ $catalog->id }}">{{ $catalog->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label>Qty</label>
							<input type="number" class="form-control" name="qty" required="" :value="book.qty">
						</div>
						<div class="form-group">
							<label>Price</label>
							<input type="number" class="form-control" name="price" required="" :value="book.price">
						</div>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default bg-danger" v-if="editStatus" v-on:click="deleteData(book.id)">Delete</button>
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div> --}}
    <!-- /.modal -->
</div>
{{-- @endrole --}}

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
  	var actionUrl = '{{ url('transactions') }}';
	var apiUrl = '{{ url('api/transactions') }}';
	//var statusUrl = '{{ url('status/transactions') }}';

	var columns = [
         //kolom harus sesuai dgn tabel headnya
		{data: 'DT_RowIndex', class: 'text-center', orderable: false},
		{data: 'date_start', class: 'text-center', orderable: false},
  
        {"render": function(data, type, row, meta) {
           return moment(row.data_end).format('DD-MM-yy')
        }, orderable: true, class: 'text-center'},
		//{data: 'data_end', class: 'text-center', orderable: true},
		{data: 'nama', class: 'text-center', orderable: true},
		{data: 'durasi', class: 'text-center', orderable: true},
		{data: 'total_buku', class: 'text-center', orderable: true},
		{data: 'total_bayar', class: 'text-center', orderable: true},
		{data: 'denda', class: 'text-center', orderable: true},
		{data: 'status', class: 'text-center', orderable: true},
        //render ini untuk mengisi data pada kolom actionnya
		{render: function(index, row, data, meta){
			return `
			   <a href="${actionUrl}/${data.id}" class="btn btn-info btn-md fas fa-eye" onclick="controller.detailData(event, ${meta.row})">
                 
               </a>
			   <a href="${actionUrl}/${data.id}/edit" class="btn btn-warning btn-md" onclick.prevent="controller.editData(event, ${meta.row})">
                 Edit
               </a>
			   <a href="#" class="btn btn-danger btn-md" onclick="controller.deleteData(event, ${data.id})">
                 Delete
               </a>`;
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
            mounted: function () {
                this.datatable();
            },
             methods: { 
                //methods data table funginya untuk memanggil data api
                datatable() {
                        const _this = this;
                        _this.table = $('#datatable').DataTable({
                            "serverSide": true,
                            "processing": true,
                            "searching": false,
                            "paging": true,
                            ajax: {
                                url: _this.apiUrl,
                                type: 'GET',
                                data: function (d) {
                                d.status = $('#filter-status').val();
                               // d.date_start = $('#filter-date_start').val();
                                
                               } 
                            },
                            columns
                        }).on('xhr', function() {
                        _this.datas = _this.table.ajax.json().data;
                        });
                },
               /* loadDate() {
                    if(this.date_start == ''){
                        this.controller.table.ajax.url(apiUrl).load();
                    }else{
                        this.controller.table.ajax.url(apiUrl+'?date_start'+this.date_start).load();
                    }
                },
                loadStatus() {
                    if(this.status == ''){
                        this.controller.table.ajax.url(apiUrl).load();
                    }else{
                        this.controller.table.ajax.url(apiUrl+'?status'+this.status).load()    
                    }
                }, */
                addData() {
                    this.data = {};
				    this.actionUrl = '{{ url('transactions/create') }}';
                    this.editStatus = false;
                     window.location.href = this.actionUrl;
                },
                editData(event, row) {
                    this.data = this.datas[row];
				    this.actionUrl = '{{ url('transactions/transaction/edit') }}/' + this.data.id;
                    this.editStatus = true;
                    window.location.href = this.actionUrl;
                },
                detailData(event, row) {
                    this.data = this.datas[row];
				    this.actionUrl = '{{ url('transactions/transaction/detail') }}/' + this.data.id;
                    window.location.href = this.actionUrl;
                },
                deleteData(event, id) {
                    if(confirm('Are you sure ?')){
                        $(event.target).parents('tr').remove();
                        axios.post(this.actionUrl+'/'+id, {_method: 'DELETE'}).then(response => {
                            alert('Data has been removed')
                        });
                    }
                },
				//membuat form tidak reload saat digunakan
                submitForm(event, id) {
                    event.preventDefault();
                    const _this = this;
                    var actionUrl = ! this.editStatus ? this.actionUrl : this.actionUrl+'/'+id;
                    axios.post(actionUrl, new FormData($(event.target)[0])).then(response => {
                        $('#modal-default').modal('hide');
                        _this.table.ajax.reload(); 
                    })
                },
            },
        });

</script>
{{-- <script>
     $('#status-filter').change(function() {
            controller.table.ajax.url(apiUrl).load();
        })
</script> --}}
<script>
    $('select[name="status"]').on('change', function() {
       let status = $('select[name=status]').val();

        if(status == '') {
            controller.table.ajax.url(apiUrl).load()
        }else {
            controller.table.ajax.url(apiUrl+'?status'+status).load()
        }
    })

    $('select[name=date_start]').on('change', function() {
       let date_start = $('select[name=date_start]').val()

        if(date_start == '') {
            controller.table.ajax.url(apiUrl).load();
        }else {
            controller.table.ajax.url(apiUrl+'?date_start='+date_start).load()
        }
       
    })
</script>
{{-- <script>
    $(".datepicker").datepicker({
        format:"dd-mm-yyyy"
    })

        //document.getElementByClassName('datepicker').valueAsDate = new Date();
</script> --}}
  {{--   --}}
{{-- </script> --}}

{{-- <script src="{{asset('assets/js/data.js')}}"></script> --}}

@endsection
