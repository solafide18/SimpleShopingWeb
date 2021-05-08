@extends('shared.layout')

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
                <h3 class="card-title">Data Pajak Restoran Aktif</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="actionwrap">
                    <button type="button" class="btn btn-success btn-flat" onclick="ShowModalAdd()">Tambah Data</button>
                </div>
                <div class="tablewrap">
                    <table id="grid" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Action</th>
                                <th>Restoran</th>
                                <th>Alamat</th>
                                <th>Penghasilan Perbulan</th>
                                <th>Dasar Pengenaan Pajak</th>
                                <th>Masa Pajak</th>
                                <th>Tarif Pajak</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-tambah-data">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form-tambah-data">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data&nbsp;<span class="text-red">* harus diisi</span></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" data-select2-id="29">
                            <div class="form-group">
                                <label>Nama Restoran <span class="text-red">*</span></label>
                                <input class="form-control" type="text" placeholder="Default input" name="nama">
                            </div>
                            <div class="form-group">
                                <label>Alamat <span class="text-red">*</span></label>
                                <input class="form-control" type="text" placeholder="Default input" name="alamat">
                            </div>
                            <div class="form-group">
                                <label>Penghasilan Perbulan</label>
                                <input class="form-control" type="number" placeholder="Default input" name="penghasilan_perbulan">
                            </div>
                            <div class="form-group">
                                <label>Dasar Pengenaan Pajak</label>
                                <input class="form-control" type="number" placeholder="Default input" name="dasar_pengenaan_pajak">
                            </div>
                            <div class="form-group">
                                <label>Masa Pajak </label>
                                <input class="form-control" type="date" placeholder="Default input" name="masa_pajak">
                            </div>
                            <div class="form-group">
                                <label>Tarif Pajak </label>
                                <input class="form-control" type="number" placeholder="Default input" name="tarif_pajak">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="SubmitDataInsert()">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-edit-data">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form-edit-data">
                <input type="hidden" name="id">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data&nbsp;<span class="text-red">* harus diisi</span></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" data-select2-id="29">
                            <div class="form-group">
                                <label>Nama Restoran <span class="text-red">*</span></label>
                                <input class="form-control" type="text" placeholder="Default input" name="nama">
                            </div>
                            <div class="form-group">
                                <label>Alamat <span class="text-red">*</span></label>
                                <input class="form-control" type="text" placeholder="Default input" name="alamat">
                            </div>
                            <div class="form-group">
                                <label>Penghasilan Perbulan </label>
                                <input class="form-control" type="number" placeholder="Default input" name="penghasilan_perbulan">
                            </div>
                            <div class="form-group">
                                <label>Dasar Pengenaan Pajak </label>
                                <input class="form-control" type="number" placeholder="Default input" name="dasar_pengenaan_pajak">
                            </div>
                            <div class="form-group">
                                <label>Masa Pajak </label>
                                <input class="form-control" type="date" placeholder="Default input" name="masa_pajak">
                            </div>
                            <div class="form-group">
                                <label>Tarif Pajak </label>
                                <input class="form-control" type="number" placeholder="Default input" name="tarif_pajak">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="SubmitDataEdit()">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>

</script>
<script src="{{url('/')}}/js/restoran.js" type=""></script>
@endsection