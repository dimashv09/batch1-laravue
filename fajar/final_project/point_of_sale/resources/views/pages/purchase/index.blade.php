@extends('layouts.admin')

@section('title', 'Supplier')

@section('content')
<div class="container-fluid">

    <!-- Main row -->
    <div class="row">

        <section class="col-lg-12 connectedSortable">
            <div class="card">
                <div class="card-header">
                    <button onclick="addForm()" class="btn btn-success btn-xs"><i
                            class="fas fa-plus-circle"></i>
                        Transaksi Baru</button>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                            <table class="table table-stiped table-bordered">
                                <thead>
                                    <th width="5%">No</th>
                                    <th>Tanggal</th>
                                    <th>Nama Supplier</th>
                                    <th>total Item</th>
                                    <th>Total harga</th>
                                    <th>Diskon</th>
                                    <th>Total Bayar</th>
                                    <th width="15%"><i class="fa fa-cog"></i></th>
                                </thead>
                            </table>
                    </div>

                </div><!-- /.card-body -->
            </div>

        </section>
    </div>
    <!-- /.row (main row) -->
</div>
@includeIf('pages.purchase.supplier')

@endsection

@push('scripts')
<script>
    let table;
    $(function () {
        table = $('.table').DataTable({
            // responsive: true,
            // processing: true,
            // serverSide: true,
            // autoWidth: false,
            // ajax: {
            //     url: '{{ route('supplier.data') }}',
            // },
            // columns: [
            //     {data: 'DT_RowIndex', searchable: false, sortable: false},
            //     {data: 'name'},
            //     {data: 'phone_number'},
            //     {data: 'address'},
            //     {data: 'aksi', searchable: false, sortable: false},
            // ]
        });
    });

    function addForm() {
        $('#modal-supplier').modal('show');

    }
    function editForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Supplier');
        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=name]').focus();
        $.get(url)
            .done((response) => {
                $('#modal-form [name=name]').val(response.name);
                $('#modal-form [name=phone_number]').val(response.phone_number);
                $('#modal-form [name=address]').val(response.address);
            })
            .fail((errors) => {
                alert('Tidak dapat menampilkan data');
                return;
            });
    }
    function deleteData(url) {
        if (confirm('Yakin ingin menghapus data terpilih?')) {
            $.post(url, {
                    '_token': $('[name=csrf-token]').attr('content'),
                    '_method': 'delete'
                })
                .done((response) => {
                    table.ajax.reload();
                })
                .fail((errors) => {
                    alert('Tidak dapat menghapus data');
                    return;
                });
        }
    }
</script>

@endpush