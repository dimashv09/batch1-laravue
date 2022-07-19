<!-- Modal -->
<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <form action="" method="post" class="form-horizontal">
            @csrf
            @method('post')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="product_name" class="col-md-2 offset-md-1 control-label">Nama</label>
                        <div class="col-md-6">
                            <input type="text" name="product_name" id="product_name" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="category_id" class="col-md-2 offset-md-1 control-label">Kategori</label>
                        <div class="col-md-6">
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option value="">Pilih Kategory</option>
                                @foreach ($category as $item)
                                <option value="{{$item->id}}">{{$item->category_name}}</option>
                                @endforeach
                            </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="brand" class="col-md-2 offset-md-1 control-label">Brand</label>
                        <div class="col-md-6">
                            <input type="text" name="brand" id="brand" class="form-control">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pruchase_price" class="col-md-2 offset-md-1 control-label">Harga Beli</label>
                        <div class="col-md-6">
                            <input type="number" name="pruchase_price" id="pruchase_price" class="form-control">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sell_price" class="col-md-2 offset-md-1 control-label">Harga Jual</label>
                        <div class="col-md-6">
                            <input type="number" name="sell_price" id="sell_price" class="form-control" required>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="discount" class="col-md-2 offset-md-1 control-label">Diskon</label>
                        <div class="col-md-6">
                            <input type="number" name="discount" id="discount" class="form-control" value="0">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stock" class="col-md-2 offset-md-1 control-label">Stok</label>
                        <div class="col-md-6">
                            <input type="number" name="stock" id="stock" class="form-control" required value="0">
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>

    </div>
</div>