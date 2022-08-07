@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body text-center">
                    <h1>Selamat Datang</h1>
                    <h2>Anda login sebagai KASIR</h2>
                    <br><br>
                    <a href="{{ route('transaction.new') }}" class="btn btn-success btn-lg">Transaksi Baru</a>
                    <br><br><br>
                </div>
            </div>
        </div>

    </div>

</div><!-- /.container-fluid -->
@endsection