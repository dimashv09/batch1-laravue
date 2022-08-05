@extends('layouts.admin')

@section('title')
    Laporan Pendapatan : {{ tanggal_indonesia($tanggalAwal, false) }} s/d {{ tanggal_indonesia($tanggalAkhir, false)}}
@endsection

@push('css')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
@endpush

@section('content')
<div class="container-fluid">

    <!-- Main row -->
    <div class="row">
        <section class="col-lg-12 connectedSortable">
            <div class="card">
                <div class="card-header">
                    <button onclick="updatePeriode()" class="btn btn-success btn-xs"><i
                            class="fas fa-pencil-alt"></i>
                        Edit Periode</button>
                    <a href="{{route('report.export_pdf', [$tanggalAwal, $tanggalAkhir])}}" target="_blank" class="btn btn-info btn-xs"><i
                            class="fa fa-file"></i>
                        Export PDF</a>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                            <table class="table table-stiped table-bordered">
                                <thead>
                                    <th width="5%">No</th>
                                    <th>Tanggal</th>
                                    <th>Penjualan</th>
                                    <th>Pembelian</th>
                                    <th>Pengeluaran</th>
                                    <th>Pendapatan</th>
                                </thead>
                            </table>
                    </div>

                </div><!-- /.card-body -->
            </div>

        </section>
    </div>
    <!-- /.row (main row) -->
</div>
@includeIf('pages.report.modal')

@endsection

@push('scripts')
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    let table;
    $(function () {
        table = $('.table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('report.data', [$tanggalAwal, $tanggalAkhir]) }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'date'},
                {data: 'sales'},
                {data: 'purchase'},
                {data: 'expenditure'},
                {data: 'income'},
            ],

            bPaginate: false,
            bInfo : false,
            bSort : false,
            searching: false
        });

        $( ".datepicker" ).datepicker({
            dateFormat: 'yy-mm-dd',
            autoclose: true,
        });

    });

    function updatePeriode() {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Periode Laporan');
    }
    
</script>

@endpush