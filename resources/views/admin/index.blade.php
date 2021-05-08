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
                <div class="actionwrap">
                    <button type="button" class="btn btn-success btn-flat" onclick="ShowModalAdd()">Tambah Data</button>
                </div>
                <div class="tablewrap">
                    <table id="grid" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Action</th>
                                <th>Nama Lengkap</th>
                                <th>Nama Panggilan</th>
                                <th>Alamat</th>
                                <th>TTL</th>
                                <th>Jenis Kelamin</th>
                                <th>Pekerjaan</th>
                                <th>Pendidikan</th>
                                <th>Jabatan di Gereja</th>
                                <th>Tanggal Bergabung</th>
                                <th>Tanggal Dibaptis</th>
                                <th>Tanggal Menikah</th>
                                <th>Tanggal Meninggal</th>
                                <th>Active</th>
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
                        <div class="col-md-6" data-select2-id="29">
                            <div class="form-group">
                                <label>Nama Lengkap <span class="text-red">*</span></label>
                                <input class="form-control" type="text" placeholder="Default input" name="nama_lengkap">
                            </div>
                            <div class="form-group">
                                <label>Nama Panggilan <span class="text-red">*</span></label>
                                <input class="form-control" type="text" placeholder="Default input" name="nama_panggilan">
                            </div>
                            <div class="form-group">
                                <label>Alamat <span class="text-red">*</span></label>
                                <input class="form-control" type="text" placeholder="Default input" name="alamat">
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir <span class="text-red">*</span></label>
                                <input class="form-control" type="text" placeholder="Default input" name="tempat_lahir">
                            </div>
                            <div class="form-group">
                                <label>Tanggal lahir <span class="text-red">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input class="form-control datepicker float-right" type="text" placeholder="Default input" name="tanggal_lahir">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin <span class="text-red">*</span></label>
                                <Select class="form-control seelct2ddl" id="ddlJenisKelamin" name="jenis_kelamin">
                                    <option value="" selected="selected">Select</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pekerjaan <span class="text-red">*</span></label>
                                <input class="form-control" type="text" placeholder="Default input" name="pekerjaan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pendidikan</label>
                                <Select class="form-control seelct2ddl" id="ddlPendidikan" name="pendidikan_id">
                                    <option value="" selected="selected">Select</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jabatan Di Gereja</label>
                                <Select class="form-control seelct2ddl" id="ddlJabatanGereja" name="jabatan_gereja_id">
                                    <option value="" selected="selected">Select</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Bergabung</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input class="form-control datepicker float-right" type="text" placeholder="Default input" name="tanggal_bergabung">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Dibaptis</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input class="form-control datepicker float-right" type="text" placeholder="Default input" name="tanggal_baptis">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Menikah</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input class="form-control datepicker float-right" type="text" placeholder="Default input" name="tanggal_menikah">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Meninggal</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input class="form-control datepicker float-right" type="text" placeholder="Default input" name="tanggal_meninggal">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Active</label>
                                <div class="form-group">
                                    <input type="checkbox" readonly name="active" checked data-bootstrap-switch>
                                </div>
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
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data&nbsp;<span class="text-red">* harus diisi</span></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" hidden="hidden" name="id_jemaat">
                    <div class="row">
                        <div class="col-md-6" data-select2-id="29">
                            <div class="form-group">
                                <label>Nama Lengkap <span class="text-red">*</span></label>
                                <input class="form-control" type="text" placeholder="Default input" name="nama_lengkap">
                            </div>
                            <div class="form-group">
                                <label>Nama Panggilan <span class="text-red">*</span></label>
                                <input class="form-control" type="text" placeholder="Default input" name="nama_panggilan">
                            </div>
                            <div class="form-group">
                                <label>Alamat <span class="text-red">*</span></label>
                                <input class="form-control" type="text" placeholder="Default input" name="alamat">
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir <span class="text-red">*</span></label>
                                <input class="form-control" type="text" placeholder="Default input" name="tempat_lahir">
                            </div>
                            <div class="form-group">
                                <label>Tanggal lahir <span class="text-red">*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input class="form-control datepicker float-right" type="text" placeholder="Default input" name="tanggal_lahir">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin <span class="text-red">*</span></label>
                                <Select class="form-control seelct2ddl" id="ddlJenisKelamin" name="jenis_kelamin">
                                    <option value="" selected="selected">Select</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Pekerjaan <span class="text-red">*</span></label>
                                <input class="form-control" type="text" placeholder="Default input" name="pekerjaan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pendidikan</label>
                                <Select class="form-control seelct2ddl" id="ddlPendidikan" name="pendidikan_id">
                                    <option value="" selected="selected">Select</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jabatan Di Gereja</label>
                                <Select class="form-control seelct2ddl" id="ddlJabatanGereja" name="jabatan_gereja_id">
                                    <option value="" selected="selected">Select</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Bergabung</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input class="form-control datepicker float-right" type="text" placeholder="Default input" name="tanggal_bergabung">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Dibaptis</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input class="form-control datepicker float-right" type="text" placeholder="Default input" name="tanggal_baptis">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Menikah</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input class="form-control datepicker float-right" type="text" placeholder="Default input" name="tanggal_menikah">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Meninggal</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                    </div>
                                    <input class="form-control datepicker float-right" type="text" placeholder="Default input" name="tanggal_meninggal">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Active</label>
                                <div class="form-group">
                                    <input type="checkbox" readonly name="active" checked data-bootstrap-switch>
                                </div>
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
    <script src="{{url('/')}}/js/DataJemaat.js" type=""></script>
@endsection