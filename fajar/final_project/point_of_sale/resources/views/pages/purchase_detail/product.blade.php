<!-- Modal -->
<div class="modal fade" id="modal-product" tabindex="-1" role="dialog" aria-labelledby="modal-supplier" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <th width="5%">No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Harga Beli</th>
                        <th><i class="fa fa-cogh"></i></th>
                    </thead>
                    <tbody>
                        @foreach($product as $key => $item)
                        <tr>
                            <td width="5%">{{$key+1}}</td>
                            <td>
                                <span class="badge badge-success">{{$item->product_code}}</span>
                            </td>
                            <td>{{$item->product_name}}</td>
                            <td>{{$item->pruchase_price}}</td>
                            <td>
                                <a href="{{route('purchase.create', $item->id)}}" class="btn-primary btn-xs" onclick="selectProduct('{{$item->id}}', '{{$item->product_code}}')">
                                    <i class="fa fa-check-circle"></i>
                                    Pilih
                                </a>
                            </td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>