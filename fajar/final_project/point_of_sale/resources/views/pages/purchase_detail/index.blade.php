@extends('layouts.admin')

@section('title', 'Transaksi Pembelian')

@push('css')
<style>
    .show-paid {
        font-size: 4em;
        text-align: center;
        height:100px; 
    }

    .show-terbilang {
        padding: 10px;
        background: rgb(206, 206, 206);
    }

    .table-purchase tbody tr:last-child {
        display: none;
    }

    @media(max-width: 768px) {
        .show-paid {
            font-size: 3em;
            height: 70px;
            padding-top: 5px;
        }
    }
</style>
@endpush

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
                <form class="form-product">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <label for="product_code">Kode Produk</label>
                                    <input type="hidden" name="purchase_id" id="purchase_id" value="{{$purchase_id}}">
                                    <input type="hidden" name="product_id" id="product_id">
                                    <input type="text" class="form-control" id="product_code" name="product_code">
                                    <span class="input-group-append">
                                        <button onclick="showProduct()" class="btn btn-info btn-flat" type="button"><i class="fa fa-arrow-right"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <table class="table table-bordered table-purchase">
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

                <div class="row">
                    <div class="col-lg-8">
                        <div class="show-paid bg-info"></div>
                        <div class="show-terbilang"></div>
                    </div>
                    <div class="col-lg-4">
                        <form action="{{route('purchase.store')}}" class="form-purchase" method="POST">
                            @csrf
                            <input type="hidden" name="purchase_id" value="{{ $purchase_id }}">
                            <input type="hidden" name="total" id="total" >
                            <input type="hidden" name="total_items" id="total_items">
                            <input type="hidden" name="paid" id="paid">

                            <div class="form-group row">
                                <label for="totalrp" class="col-lg-3 control-label">Total</label>
                                <div class="col-lg-9">
                                    <input type="text" name="totalrp" id="totalrp" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="discount" class="col-lg-3 control-label">Diskon</label>
                                <div class="col-lg-9">
                                    <input type="number" name="discount" id="discount" class="form-control" value="{{$discount}}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="paid" class="col-lg-3 control-label">Bayar</label>
                                <div class="col-lg-9">
                                    <input type="text" id="paidrp" class="form-control" >
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm btn-xs float-right btn-save"><i class="fa fa-floopy-o"></i> Simpan Transaksi</button>
            </div>

        </div>

    </div>
</div>
    <!-- /.row (main row) -->
@includeIf('pages.purchase_detail.product')

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
                url: '{{ route('purchase_detail.data', $purchase_id) }}',
            },
            columns: [
                {data: 'DT_RowIndex', searchable: false, sortable: false},
                {data: 'product_code'},
                {data: 'product_name'},
                {data: 'purchase_price'},
                {data: 'qty'},
                {data: 'subtotal'},
                {data: 'aksi', searchable: false, sortable: false},
            ],
            bPaginate: false,
            bInfo : false,
            bSort : false,
        })
        .on('draw.dt', function() {
            loadForm($('#discount').val())
        });


        table2 = $('.table-product').DataTable();

        $(document).on('input', '.quantity', function(){
            let id = $(this).data('id');
            let qty = parseInt($(this).val());

            if (qty < 1) {
                $(this).val(1);
                alert('Jumlah Tidak Boleh kurang dari 1');
                return;
            }

            if(qty > 10000){
                $(this).val(10000);
                alert('Jumlah Tidak Boleh lebih dari 10000');
                return;
            }

            $.post(`{{url('/purchase_detail')}}/${id}`,{
                '_token': $('[name=csrf-token]').attr('content'),
                '_method': 'PUT',
                'qty' : qty
            })
                .done(response => {
                    $(this).on('mouseout', function() {
                        table.ajax.reload();
                    })
                })
                .fail(errors => {
                    alert('Tidak Dapat Menambah Jumlah');
                    return;
                })
        })

        $(document).on('input', '#discount', function () {
            if($(this).val() == ""){
                $(this).val(0).select();
            }

            loadForm($(this).val());
        });

        $('.btn-save').on('click', function () {
            $('.form-purchase').submit();
        })
    });

    function loadForm(discount = 0) {
        $('.total').val($('.total').text());
    }

    function showProduct() {
        $('#modal-product').modal('show');

    }
    function hideProduct() {
        $('#modal-product').modal('hide');

    }
    function selectProduct(id, code) {
        $('#product_id').val(id);
        $('#product_code').val(code);
        hideProduct();
        addProduct();
    }

    function addProduct() {
        $.post('{{ route('purchase_detail.store') }}', $('.form-product').serialize())
            .done(response =>{
            $('product_code').focus();
            table.ajax.reload();
            // table.ajax.reload(() => loadForm($('#discount').val()));
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

    function loadForm(discount = 0) {
        $('#total').val($('.total').text());
        $('#total_items').val($('.total_items').text());
        
        $.get(`{{ url('/purchase_detail/loadForm') }}/${discount}/${$('.total').text()}`)
            .done(response => {
                $('#totalrp').val('Rp. ' + response.totalrp);
                $('#paidrp').val('Rp. ' + response.paidrp);
                $('#paid').val(response.paid);
                $('.show-paid').text('Rp. ' + response.paidrp);
                $('.show-terbilang').text(response.terbilang );
            })
            .fail(errors =>{
                alert('Tidak dapat menampilkan data');
                return;
            })
    }
</script>

@endpush