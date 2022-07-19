@extends('layouts.admin')

@section('title', 'Produk')

@section('content')
<div class="container-fluid">

    <!-- Main row -->
    <div class="row">

        <section class="col-lg-12 connectedSortable">
            <div class="card">
                <div class="card-header">
                    <div class="">
                        <button onclick="addForm('{{ route('product.store')}}')" class="btn btn-success btn-xs"><i class="fas fa-plus-circle"></i> Tambah</button>

                        <button onclick="deleteSelected('{{route('product.deleteSelected')}}')" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i> Hapus</button>
                    </div>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="" class="form-product">
                            @csrf
                            <table class="table table-stiped table-bordered">
                                <thead>
                                    <th>
                                        <input type="checkbox" id="checkbox">
                                    </th>
                                    <th width="5%">No</th>
                                    <th>Kode Produk</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Brand</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Diskon</th>
                                    <th>Stok</th>
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
@includeIf('pages.product.modal')

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
                url: '{{ route('product.data') }}',
            },
            columns: [
                {data: 'checkbox', sortable: false},
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'product_code'},
                {data: 'product_name'},
                {data: 'category.category_name'},
                {data: 'brand'},
                {data: 'pruchase_price'},
                {data: 'sell_price'},
                {data: 'discount'},
                {data: 'stock'},
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
        $('#modal-form .modal-title').text('Tambah Produk');
        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('post');
        $('#modal-form [name=product_name]').focus();
    }
    function editForm(url) {
        $('#modal-form').modal('show');
        $('#modal-form .modal-title').text('Edit Produk');
        $('#modal-form form')[0].reset();
        $('#modal-form form').attr('action', url);
        $('#modal-form [name=_method]').val('put');
        $('#modal-form [name=product_name]').focus();
        $.get(url)
            .done((response) => {
                $('#modal-form [name=product_name]').val(response.product_name);
                $('#modal-form [name=category_id]').val(response.category_id);
                $('#modal-form [name=brand]').val(response.brand);
                $('#modal-form [name=pruchase_price]').val(response.pruchase_price);
                $('#modal-form [name=sell_price]').val(response.sell_price);
                $('#modal-form [name=discount]').val(response.discount);
                $('#modal-form [name=stock]').val(response.stock);
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

    function deleteSelected(url) {
        if ($('input:checked').length>1) {
            if (confirm('Yakin ingin menghapus data terpilih?')) {
                $.post(url, $('.form-product').serialize()
                ).done((response)=> {
                    table.ajax.reload();
                }).fail((errors) =>{
                    alert('Tidak dapat menghapus data');
                    return;
                });
            }
        }else {
            alert('Pilih data yang ingin dihapus');
            return;
        }
    }
</script>

@endpush