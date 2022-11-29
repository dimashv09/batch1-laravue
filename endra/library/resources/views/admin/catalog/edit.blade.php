@extends('layouts.admin')
@section('header', 'Transaction' )

@section('content')
<div class="row">

    <div class="col-md-6">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Transaction</h3>
            </div>


            <form action="{{ url('transactions/'.$transaction->id) }}" method="post">
                @csrf
                {{ method_field('PUT')}}
                <div class="card-body">

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label>Date Start</label>
                        <input type="date" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" style=" width:10px ;">
                    </div>
                    <div class="form-group">
                        <label>Date End</label>
                        <input type="date" class="form-control rounded-0" id="exampleInputRounded0">
                    </div>
                    <div class="form-group">
                        <label>Multiple</label>
                        <select class="select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                            <option>Alabama</option>
                            <option>Alaska</option>
                            <option>California</option>
                            <option>Delaware</option>
                            <option>Tennessee</option>
                            <option>Texas</option>
                            <option>Washington</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio1">
                            <label class="form-check-label">Sudah Mengembalikan</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radio1" checked>
                            <label class="form-check-label">Belum Mengembalikan</label>
                        </div>
                    </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>

    @endsection