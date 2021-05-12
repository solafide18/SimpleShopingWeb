@extends('shared.admin.layout')
@section('title', 'Simple Shoping | Data Transaksi')
@section('content')
<style>
    .tablewrap {
        overflow: auto;
        padding: 20px 10px 10px 10px;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Transaksi</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <!-- <div class="actionwrap">
                    <button type="button" class="btn btn-success btn-flat" onclick="ShowModalAdd()">Tambah Data</button>
                </div> -->
                <div class="tablewrap">
                    <table id="grid" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Action</th>
                                <th>Nama Requestor</th>
                                <th>No Telepon</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Product</th>
                                <th>Harga</th>
                                <th>Confirmed By</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{url('/')}}/js/admin.transaction.js" type=""></script>
@endsection