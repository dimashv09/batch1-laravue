@extends('layouts.admin')

@section('title', 'Transaksi Pembelian')

@section('content')

    <!-- Main row -->
<div class="row">
    <div class="col-md-12 ">
        <div class="card">
            <div class="card-header">
                <table>
                    <tr>
                        <td>Supplier</td>
                        <td>:   {{$supplier->name}}</td>
                    </tr>
                    <tr>
                        <td>Telepon</td>
                        <td>:   {{$supplier->phone_number}}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:   {{$supplier->address}}</td>
                    </tr>
                </table>
            </div>
            <div class="card-body">
                <form action="" class="form-product">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="product_code">Kode Produk</label>
                                <div class="input-group">
                                    <input type="hidden" name="product_id" id="product_id">
                                    <input type="text" class="form-control" id="product_code" name="product_code">
                                    <div class="input-group-append">
                                        <button onclick="showProduct()" class="btn btn-info btn-flat" type="button"><i class="fa fa-arrow-right"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <table class="table table-stiped table-bordered">
                    <thead>
                        <th width="5%">No</th>
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th width="15%"><i class="fa fa-cog"></i></th>
                    </thead>
                </table>
            </div>

        </div>

    </div>
</div>
    <!-- /.row (main row) -->
@includeIf('pages.purchase_detail.product')

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

    function showProduct() {
        $('#modal-product').modal('show');

    }
    function hideProduct() {
        $('#modal-product').modal('show');

    }
    function selectProduct(id,code) {
        $('#product_id').val(id);
        $('#product_code').val(code);
        hideProduct();
        addProduct();
    }

    function addProduct() {
        $.post('{{'purchase_detail.store'}}'. $('.form-product').serialize())
        .done(response =>{
            $('product_code').focus();
        }).fail(errors => {
            alert ("Tidak dapat menyimpan data");
            return;
        })
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