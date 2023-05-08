@extends('layouts.admin')
@section('header', 'Kategori')

@section('css')
 <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endsection

@section('content')
<div id="controller">
<div class="row mt-2">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<button @click="addForm" class="btn btn-success btn-xm btn-flat"><i class="fa fa-plus-circle">Tambah</i></button>
			</div>
			<div class="card-body  table-responsive">
				<table class="table table-striped table-bordered"> 
					<thead>
						<th width="5%">No</th>
						<th>Kategori</th>
						<th width="15%"><i class="fa fa-cog"></i></th>
					</thead>
				</table>
			</div>
		</div>
	</div>
<div class="modal fade" id="modal-form" tabindex="-1" aria-labelledby="modal-form" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-prim ary">Simpan</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>

{{-- @includeIf('category.form') --}}
@endsection

@push('js')
	<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>	
	<script>
		let table;
/*
		$(function () {
			table = $('.table').DataTable({
					processing: true,
					autoWidth: false,
					ajax: {
						url: '{{ route('categories.data') }}',
					}
			}); 
		
		});

		/* function addForm() {
			$('#modal-form').modal('show');
			$('#modal-form .modal-title').text('Tambah Kategori');
		} */

	</script>
	<script>
		var controller = new Vue({
			el: '#controller',
			data: {
				//datas: [],
				//data: {},
				actionUrl,
				apiUrl,
			},
			mounted: function() {
				this.datatable();
			},
			methods: {
			/*	datatable() {
					const _this = this;
					_this.table = $('#datatable').DataTable({
						ajax: {
							url: '{{ route('categories/data') }}',
							type: 'GET',
						}
					});
				}, */
				addForm() {
					$('#modal-form').modal();
				}
			}
			
		})
	</script>

@endpush