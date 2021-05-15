@extends('shared.admin.layout')
@section('title', 'Simple Shoping | Data Product')
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
                <h3 class="card-title">Data Product</h3>
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
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Stock</th>
                                <th>Stock on Progress</th>
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
            <form id="form-tambah-data" method="POST" action="{{ route('api.admin.post.product') }}">
                @csrf
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
                                <label>Product Name <span class="text-red">*</span></label>
                                <input class="form-control" type="text" placeholder="Default input" name="name">
                            </div>
                            <div class="form-group">
                                <label>Price <span class="text-red">*</span></label>
                                <input class="form-control" type="number" placeholder="Default input" name="price">
                            </div>
                            <div class="form-group">
                                <label>Stock</label>
                                <input class="form-control" type="number" placeholder="Default input" name="stock">
                            </div>
                            <div class="form-group">
                                <label>Category <span class="text-red">*</span></label>
                                <Select class="form-control seelct2ddl" name="category_id">
                                    <option value="" selected="selected">Select</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Image</label><br>
                                <input type="hidden" class="file-path" name="path_image">
                                <input type="file" class="file-product" name="path_image_upload" accept="image/*">
                                <img class="image_preview form-control" src="#" alt="your image" /><br>
                            </div>
                        </div>
                    </div>  
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-submit" alert-msg='Do you want to save new Product?'>Save changes</button>
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
            <form id="form-edit-data" method="POST" action="{{ route('api.admin.put.product') }}">
                @csrf
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
                                <label>Product Name <span class="text-red">*</span></label>
                                <input class="form-control" type="text" placeholder="Default input" name="name">
                            </div>
                            <div class="form-group">
                                <label>Price <span class="text-red">*</span></label>
                                <input class="form-control" type="number" placeholder="Default input" name="price">
                            </div>
                            <div class="form-group">
                                <label>Stock</label>
                                <input class="form-control" type="text" placeholder="Default input" name="stock">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <Select class="form-control seelct2ddl" name="category_id">
                                    <option value="" selected="selected">Select</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Image</label><br>
                                <input type="hidden" class="file-path" name="path_image" accept="image/*">
                                <input type="file" class="file-product" name="path_image_upload" accept="image/*">
                                <img class="image_preview form-control" src="#" alt="your image" /><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-submit" alert-msg='Do you want to save the changes?'>Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>

</script>
<script src="{{url('/')}}/js/admin.product.js" type=""></script>
@endsection