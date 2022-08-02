@extends('layouts.admin')

@section('title', 'Daftar Penjualan')

@section('content')
<div class="container-fluid">

    <!-- Main row -->
    <div class="row">

        <section class="col-lg-12 connectedSortable">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                            <table class="table table-stiped table-bordered table-sales">
                                <thead>
                                    <th width="5%">No</th>
                                    <th>Tanggal</th>
                                    <th>Kode Member</th>
                                    <th>total Item</th>
                                    <th>Total harga</th>
                                    <th>Diskon</th>
                                    <th>Total Bayar</th>
                                    <th>Kasir</th>
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
@includeIf('pages.sales.detail')

@endsection

@push('scripts')
<script>
    let table, table2;
    $(function () {
        table = $('.table-sales').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('sales.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'created_at'},
                {data: 'member_code'},
                {data: 'total_items'},
                {data: 'total_price'},
                {data: 'discount'},
                {data: 'paid'},
                {data: 'kasir'},
                {data: 'aksi', searchable: false, sortable: false},
            ]
        });
        

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
                {data: 'price'},
                {data: 'qty'},
                {data: 'subtotal'},

            ]            

        });
    });


    function detail(url) {
        $('#modal-detail .modal-title').text('Detail Penjualan');
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