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
                        <label for="name" class="col-md-3 offset-md-1 control-label">Nama</label>
                        <div class="col-md-6">
                            <input type="text" name="name" id="name" class="form-control" autofocus required>
                            <span class="help-block with-errors text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="email" class="col-md-3 offset-md-1 control-label">Email</label>
                        <div class="col-md-6">
                            <input type="email" name="email" id="email" class="form-control" required
                                autofocus>
                            <span class="help-block with-errors text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="roles" class="col-md-3 offset-md-1 control-label">Role</label>
                        <div class="col-md-6">
                            <select name="roles" id="roles" class="form-control" required>
                                <option value="">Pilih roles</option>
                                @foreach ($roles as $item)
                                <option value="{{$item}}">{{$item}}</option>
                                @endforeach
                            </select>
                            <span class="help-block with-errors text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="password" class="col-md-3 offset-md-1 control-label">Password</label>
                        <div class="col-md-6">
                            <input type="password" name="password" id="password" class="form-control"
                            minlength="6" required>
                            <span class="help-block with-errors text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="password_confirmation" class="col-md-3 offset-md-1 control-label">Konfirmasi Password</label>
                        <div class="col-md-6">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required data-match="#password">
                            <span class="help-block with-errors text-danger"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-xs" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary btn-xs">Save changes</button>
                </div>
            </div>
        </form>

    </div>
</div>