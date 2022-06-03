@extends('layouts.admin')
@section('header', 'Peminjaman')
@section('content')
@section('css')
        <!-- DataTables -->
 <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
 <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
 <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection
<div id="controller">
	<div class="card">
	  <div class="card-header">
	    <a href="#" @click="addData()" class="btn btn-primary pull-right">Create New Peminjaman</a>
	  </div>
	  <div class="card-body">
	   <table id="datatable" class="table table-striped">
						<thead>
					    <tr>
						  <th>No</th>
					      <th>Tanggal Pinjam</th>
					      <th>Tanggal Kembali</th>
					      <th>Nama Pinjam</th>
					      <th>Lama Pinjam</th>
					      <th>Total Buku</th>
					      <th>Total Bayar</th>
					      <th>Status</th>
					      <th>Action</th>
					    </tr>
					  </thead>
					  <tbody>
					  @foreach($peminjamans as $key=>$peminjaman)
					    <tr>
						<td>{{ $key+1 }}</td>
					    	<td>{{ $peminjaman->date_start }}</td>
					    	<td>{{ $peminjaman->date_end }}</td>
					    	<td>{{ $peminjaman->anggota->name }}</td>
					    	<td></td>
					    	<td>{{ count($peminjaman->buku) }}</td>
					    	<td></td>
					    	<td>{{ $peminjaman->status }}</td>
					    	
					    </tr>
					  @endforeach
					</tbody>
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
                				<div class="form-group row">
				                    <label class="col-sm-2 col-form-label">Anggota</label>
				                    <div class="col-sm-10">
				                	 <select name="id_anggota" class="form-control">
				                	 	@foreach($anggotas as $anggota)
				                	 	<option value="{{ $anggota->id }}">{{ $anggota->name }}</option>
				                	 	@endforeach
				                	 </select>
				                </div>
				                </div>
				                <div class="form-group row">
				                	<label class="col-sm-2 col-form-label">Tanggal</label>
											    <div class="col-sm-4">
											      <input type="date" name="date_start" class="form-control">
											    </div>&nbsp; - &nbsp; 
											    <div class="col-sm-5">
											      <input type="date" name="date_end" class="form-control">
											    </div>
											  </div>
											  <div class="form-group row">
				                    <label class="col-sm-2 col-form-label">Buku</label>
				                    <div class="col-sm-10">
				                	  <select name="id_buku"class="form-control">
				                	  	@foreach($bukus as $buku)
				                	 	<option value="{{$buku->id }}">{{ $buku->title }}</option>
				                	 	
				                	 	@endforeach
				                	 </select>
				                </div>
				              </div>
				                <div class="form-group row">
				                    <label class="col-sm-2 col-form-label">Status</label>
				                    <div class="col-sm-10">
				                	 <div class="form-check">
							  <input class="form-check-input" type="radio" name="status"value="sudah">
							  <label class="form-check-label" for="exampleRadios1">
							    Sudah Dikembalikan
							  </label>
							</div>
							<div class="form-check">
							  <input class="form-check-input" type="radio" name="status"value="belum" checked>
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
<script>
	var controller = new Vue({
		el: '#controller',
		data: {
			datas: [],
			data: {},
			actionUrl : '{{ url('peminjaman') }}'
		},
		mounted: function () {

		},
		methods: {
			addData() {
				this.data = {};
				this.actionUrl = '{{ url('peminjaman') }}';
				$('#modal-default').modal();
			},

		}
	})
</script>
@endsection

