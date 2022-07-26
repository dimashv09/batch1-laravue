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

                        @empty(! session('purchase_id'))                           
                        <a href="{{route('purchase_detail.index')}}" class="btn btn-info btn-xs"><i class="fa fa-pencil-alt"></i> Transaksi Aktif
                        </a>
                        @endempty
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                            <table class="table table-stiped table-bordered table-purchase">
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
@includeIf('pages.purchase.detail')

@endsection

@push('scripts')
<script>
    let table, table2;
    $(function () {
        table = $('.table-purchase').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('purchase.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'created_at'},
                {data: 'supplier.name'},
                {data: 'total_items'},
                {data: 'total_price'},
                {data: 'discount'},
                {data: 'paid'},
                {data: 'aksi', searchable: false, sortable: false},
            ]
        });
        
        $('.table-supplier').DataTable();

        table2 = $('.table-detail').DataTable({
            processing: true,
            bPaginate: false,
            bInfo : false,
            bSort : false,
            searching: false,
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'product_code'},
                {data: 'product_name'},
                {data: 'purchase_price'},
                {data: 'qty'},
                {data: 'subtotal'},

            ]            

        });
    });

    function addForm() {
        $('#modal-supplier').modal('show');

    }

    function detail(url) {
        $('#modal-detail .modal-title').text('Detail Pembelian');
        $('#modal-detail').modal('show');

        table2.ajax.url(url);
        table2.ajax.reload();
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