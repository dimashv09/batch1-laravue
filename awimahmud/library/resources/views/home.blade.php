@extends('layouts.admin')

@section('content')
<div clas="container-fluid">
    <div class="col rounded" style="width:100%;height:20vh;background:#eaeaea;justify-content:center;display:flex;">
        <div class="warraper rounded bg-secondary" style="width:100%;height:150px;align-items:center;display:flex;justify-content:center;">
            <h2 class="font-monospace">404 NOT FOUND</h2>
        </div>
    </div>
    <div class="col-12 mx-auto text-center">
        <div class="col" >
            <div class="bg-danger">
				<p class="">Laravel</p>
            </div>
        </div>
        <div class="col">
            <div class="bg-primary">
				<p>Php and Mysql</p>
            </div>
        </div>
        <div class="col">
            <div class="bg-success">
				<p>Vue.js</p>
            </div>
        </div>
    </div>
    <div class="card mt-4 mx-auto text-center">
        <h5 class="card-header">Featured</h5>
        <div class="card-body">
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
</div>
@endsection
