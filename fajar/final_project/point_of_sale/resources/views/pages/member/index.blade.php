@extends('layouts.admin')

@section('title', 'Member')

@section('content')
<div class="container-fluid">

    <!-- Main row -->
    <div class="row">

        <section class="col-lg-12 connectedSortable">
            <div class="card">
                <div class="card-header">
                    <button onclick="addForm('{{ route('member.store')}}')" class="btn btn-success btn-xs"><i
                            class="fas fa-plus-circle"></i>
                        Tambah</button>
                    <button onclick="printMember('{{ route('member.printMember')}}')" class="btn btn-info btn-xs"><i
                            class="fas fa-id-card"></i> Print Member</button>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="" method="post" class="form-member">
                            @csrf
                            <table class="table table-stiped table-bordered">
                                <thead>
                                    <th width="5%">
                                        <input type="checkbox" id="checkbox">
                                    </th>
                                    <th width="5%">No</th>
                                    <th>Kode</th>
                                    <th>Nama Member</th>
                                    <th>No Telp</th>
                                    <th>Alamat</th>
                                    <th width="15%"><i class="fa fa-cog"></i></th>
                                </thead>
                            </table>
                        </form>
                    </div>

                </div><!-- /.card-body -->
            </div>

        </section>
    </div>
    <!-- /.row (main row) -->
</div>
@includeIf('pages.member.modal')

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
                url: '{{ route('member.data') }}',
            },
            columns: [
                {data: 'checkbox', searchable: false, sortable: false},
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'member_code'},
                {data: 'name'},
                {data: 'phone_number'},
                {data: 'address'},
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

        $('#checkbox').on('click', function(){
            $(':checkbox').prop('checked', this.checked);
        });
    });
    function addForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Tambah Member');
        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=name]').focus();
    }
    function editForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Member');
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
    function printMember(url) {
        if ($('input:checked').length < 1) {
            alert('Pilih data yang ingin dicetak');
            return;
        }else {
            $('.form-member').attr('target','_blank').attr('action', url).submit();
        }
    }
</script>

@endpush