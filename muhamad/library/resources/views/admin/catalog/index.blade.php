@extends('layouts.admin')

@section('header') Catalog @endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Catalog</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>183</td>
                            <td>John Doe</td>
                        </tr>
                        <tr>
                            <td>219</td>
                            <td>Alexander Pierce</td>
                        </tr>
                        <tr>
                            <td>657</td>
                            <td>Bob Doe</td>
                        </tr>
                        <tr>
                            <td>175</td>
                            <td>Mike Doe</td>
                        </tr>
                        <tr>
                            <td>134</td>
                            <td>Jim Doe</td>
                        </tr>
                        <tr>
                            <td>494</td>
                            <td>Victoria Doe</td>
                        </tr>
                        <tr>
                            <td>832</td>
                            <td>Michael Doe</td>
                        </tr>
                        <tr>
                            <td>982</td>
                            <td>Rocky Doe</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
@endsection
