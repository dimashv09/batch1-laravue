@extends('layouts.admin')

@section('title', 'Pengaturan')

@section('content')
<div class="container-fluid">

    <!-- Main row -->
    <div class="row">
        <section class="col-lg-12">
            <div class="card">
                <form action="{{route('setting.update')}}" data-toggle="validator" class="form-setting" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="alert alert-info alert-dismissible" style="display: none;">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fa fa-check"></i> Perubahan berhasil disimpan
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="company_name" class="col-lg-3 control-label offset-md-1">Nama Perusahaan</label>
                            <div class="col-lg-6">
                                <input type="text" name="company_name" class="form-control" id="company_name" required autofocus>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone_number" class="col-lg-3 control-label offset-md-1">Telepon</label>
                            <div class="col-lg-6">
                                <input type="text" name="phone_number" class="form-control" id="phone_number" required>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-lg-3 control-label offset-md-1">Alamat</label>
                            <div class="col-lg-6">
                                <textarea name="address" class="form-control" id="address" rows="3" required></textarea>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="logo_path" class="col-lg-3 control-label offset-md-1">Logo</label>
                            <div class="col-lg-4">
                                <input type="file" name="logo_path" class="form-control" id="logo_path"
                                    onchange="preview('.tampil-logo', this.files[0])">
                                <span class="help-block with-errors"></span>
                                <br>
                                <div class="tampil-logo"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="discount" class="col-lg-3 control-label offset-md-1">Diskon</label>
                            <div class="col-lg-2">
                                <input type="number" name="discount" class="form-control" id="discount" required>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="note_type" class="col-lg-3 control-label offset-md-1">Tipe Nota</label>
                            <div class="col-lg-2">
                                <select name="note_type" class="form-control" id="note_type" required>
                                    <option value="1">Nota Kecil</option>
                                    <option value="2">Nota Besar</option>
                                </select>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        
                    </div><!-- /.card-body -->
                    <div class="card-footer text-right">
                        <button class="btn btn-sm btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
                    </div>
                </form>
            </div>

        </section>
    </div>
    <!-- /.row (main row) -->
</div>
@endsection

@push('scripts')
<script>
    $(function () {
        showData();
        $('.form-setting').validator().on('submit', function (e) {
            if (! e.preventDefault()) {
                $.ajax({
                    url: $('.form-setting').attr('action'),
                    type: $('.form-setting').attr('method'),
                    data: new FormData($('.form-setting')[0]),
                    async: false,
                    processData: false,
                    contentType: false
                })
                .done(response => {
                    showData();
                    $('.alert').fadeIn();
                    setTimeout(() => {
                        $('.alert').fadeOut();
                    }, 3000);
                })
                .fail(errors => {
                    alert('Tidak dapat menyimpan data');
                    return;
                });
            }
        });
    });
    function showData() {
        $.get('{{ route('setting.show') }}')
            .done(response => {
                $('[name=company_name]').val(response.company_name);
                $('[name=phone_number]').val(response.phone_number);
                $('[name=address]').val(response.address);
                $('[name=discount]').val(response.discount);
                $('[name=note_type]').val(response.note_type);
                $('title').text(response.company_name + ' | Pengaturan');
                
                // let words = response.company_name.split(' ');
                // let word  = '';
                // words.forEach(w => {
                //     word += w.charAt(0);
                // });

                // $('.logo-mini').text(word);
                // $('.logo-lg').text(response.company_name);
                
                $('.tampil-logo').html(`<img src="{{ url('/') }}${response.logo_path}" width="200">`);

                $('[rel=icon]').attr('href', `{{ url('/') }}/${response.logo_path}`);
            })
            .fail(errors => {
                alert('Tidak dapat menampilkan data');
                return;
            });
    }
</script>
@endpush
