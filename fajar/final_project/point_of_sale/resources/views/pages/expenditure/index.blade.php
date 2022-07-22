@extends('layouts.admin')

@section('title', 'Pengeluaran')

@section('content')
<div class="container-fluid">

    <!-- Main row -->
    <div class="row">

        <section class="col-lg-12 connectedSortable">
            <div class="card">
                <div class="card-header">
                    <button onclick="addForm('{{ route('expenditure.store')}}')" class="btn btn-success btn-xs"><i
                            class="fas fa-plus-circle"></i>
                        Tambah</button>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                            <table class="table table-stiped table-bordered">
                                <thead>
                                    <th width="5%">No</th>
                                    <th>Tanggal</th>
                                    <th>Deskripsi</th>
                                    <th>Nominal</th>
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
@includeIf('pages.expenditure.modal')

@endsection

@push('scripts')
<script>
    let table;
    $(function () {
        table = $('.table').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            autoWidth: false,
            ajax: {
                url: '{{ route('expenditure.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'created_at'},
                {data: 'desc'},
                {data: 'nominal'},
                {data: 'aksi', searchable: false, sortable: false},
            ]
        });
        $('#modal-form').validator().on('submit', function (e) {
            if (! e.preventDefault()) {
                $.post($('#modal-form form').attr('action'), $('#modal-form form').serialize())
                    .done((response) => {
                        $('#modal-form').modal('hide');
                        table.ajax.reload();
                    })
                    .fail((errors) => {
                        alert('Tidak dapat menyimpan data');
                        return;
                    });
            }
        });

    });
    function addForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah Expenditure');
        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=desc]').focus();
    }
    function editForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Expenditure');
        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=desc]').focus();
        $.get(url)
            .done((response) => {
                $('#modal-form [name=desc]').val(response.desc);
                $('#modal-form [name=nominal]').val(response.nominal);
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