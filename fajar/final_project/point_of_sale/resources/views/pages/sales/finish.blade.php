@extends('layouts.admin')

@section('title', 'Transaksi Penjualan')

@section('content')
<div class="container-fluid">

    <!-- Main row -->
    <div class="row">

        <section class="col-lg-12 connectedSortable">
            <div class="card">
                <div class="card-body">
                    <div class="alert alert-success alert-dismissible">
                        <i class="fa fa-check icon"></i>
                            Transaksi Selesai
                    </div>
                </div>
                <div class="card-footer">
                    @if($set->note_type == 1)                       
                    <button class="btn btn-warning" onclick="notaKecil('{{route('transaction.nota_kecil')}}', 'Nota kecil')">Cetak Nota</button>
                    @else
                    <button class="btn btn-warning" onclick="notaBesar('{{route('transaction.nota_besar')}}', 'Nota Besar')">Cetak Nota</button>
                    @endif
                    <a href="{{route('transaction.new')}}" class="btn btn-primary ">Transaksi Baru</a>
                </div>
            </div>

        </section>
    </div>
    <!-- /.row (main row) -->
</div>

@endsection

@push('scripts')
<script>
    function notaKecil(url, title) {
        popupCenter(url, title, 625, 500);
    }

    function notaBesar(url, title) {
        popupCenter(url, title, 900, 675);
    }

    function popupCenter(url, title, w, h){
        const dualScreenLeft = window.screenLeft !==  undefined ? window.screenLeft : window.screenX;
        const dualScreenTop = window.screenTop !==  undefined   ? window.screenTop  : window.screenY;

        const width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
        const height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

        const systemZoom = width / window.screen.availWidth;
        const left = (width - w) / 2 / systemZoom + dualScreenLeft
        const top = (height - h) / 2 / systemZoom + dualScreenTop
        const newWindow = window.open(url, title, 
        `
            scrollbars  =yes,
            width   =${w / systemZoom}, 
            height  =${h / systemZoom}, 
            top =${top}, 
            left    =${left}
        `
        )

        if (window.focus) newWindow.focus();
    }
</script>

@endpush