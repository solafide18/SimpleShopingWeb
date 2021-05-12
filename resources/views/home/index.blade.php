@extends('shared.layout')

@section('content')
    <!-- <div class="wrap-in">
        <div class="wmuSlider example1 slide-grid" style="overflow: hidden; height: 553px;">
            <a href="single.html">		 
                <div class="wmuSliderWrapper">		  
                    <article style="position: relative; width: 100%; opacity: 1;">					
                        <div class="banner-matter">
                            <div class="col-md-5 banner-bag">
                                <img class="img-responsive " src="template/images/bag.jpg" alt=" ">
                            </div>
                            <div class="col-md-7 banner-off">							
                                <h2>FLAT 50% 0FF</h2>
                                <label>FOR ALL PURCHASE <b>VALUE</b></label>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et </p>					
                                <span class="on-get">GET NOW</span>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </article>
                    <article style="position: absolute; width: 100%; opacity: 0;">					
                        <div class="banner-matter">
                            <div class="col-md-5 banner-bag">
                                <img class="img-responsive " src="template/images/bag1.jpg" alt=" ">
                            </div>
                            <div class="col-md-7 banner-off">							
                                <h2>FLAT 50% 0FF</h2>
                                <label>FOR ALL PURCHASE <b>VALUE</b></label>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et </p>					
                                <span class="on-get">GET NOW</span>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </article>
                    <article style="position: absolute; width: 100%; opacity: 0;">					
                        <div class="banner-matter">
                            <div class="col-md-5 banner-bag">
                                <img class="img-responsive " src="template/images/bag.jpg" alt=" ">
                            </div>
                            <div class="col-md-7 banner-off">							
                                <h2>FLAT 50% 0FF</h2>
                                <label>FOR ALL PURCHASE <b>VALUE</b></label>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et </p>					
                                <span class="on-get">GET NOW</span>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </article>
                
                </div>
                </a>
            <ul class="wmuSliderPagination">
                <li><a href="#" class="">0</a></li>
                <li><a href="#" class="">1</a></li>
                <li><a href="#" class="">2</a></li>
            </ul>
            <a class="wmuSliderPrev">Previous</a>
            <a class="wmuSliderNext">Next</a>
            <ul class="wmuSliderPagination">
                <li><a href="#" class="wmuActive">0</a></li>
                <li><a href="#" class="">1</a></li>
                <li><a href="#" class="">2</a></li>
            </ul> 
        </div>
    </div> -->
    <!-- <div class="products">
        <h5 class="latest-product">PRODUCTS</h5>	
        <a class="view-all" href="product.html">VIEW ALL<span> </span></a> 		     
    </div> -->
    @php
        $productCounter = 100000;
        $counter = 0;
    @endphp
    <div class="grid-product">
        @foreach ($products as $product)
            @php($counter++)
            @if($counter<$productCounter)
                <div class="  product-grid" product-id="{{$product->id}}">
                    <div class="content_box">
                        <a href="single.html"></a>
                        <div class="left-grid-view grid-view-left">
                            <a class="add-item-prd">
                                <img src="{{url('/')}}/{{ $product->path_image }}" class="img-responsive watch-right productImg" alt="">
                                <div class="mask">
                                    <div class="info">Quick View</div>
                                </div>
                            </a>
                        </div>
                        <h4><a class="add-item-prd productName">{{$product->name}}</a></h4><h4>Stock : {{$product->stock}}</h4>
                        <span></span>
                        <div class="star-price">
                            <div class="dolor-grid"> 
                                <span class="actual productPrice">Rp. {{$product->price}}</span>
                            </div>
                            <a class="now-get get-cart add-item-prd">ADD TO CART</a> 
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        <div class="clearfix"> </div>
    </div>
    <div class="clearfix"> </div>
    <!-- Modal -->
    <div class="modal fade" id="modal-tambah-data">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form-tambah-data">
                <input type="hidden" name="product_id" id="product_id">
                <div class="modal-header">
                    <h4 class="modal-title">Form Data Diri&nbsp;<span class="text-red">* harus diisi</span></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" data-select2-id="29">
                            <div class="form-group">
                                <label>Nama Lengkap<span class="text-red">*</span></label>
                                <input class="form-control" type="text" placeholder="Default Nama Lengkap" name="full_name">
                            </div>
                            <div class="form-group">
                                <label>No Telpon <span class="text-red">*</span></label>
                                <input class="form-control" type="text" placeholder="Default No Telpon" name="no_telpon">
                            </div>
                            <div class="form-group">
                                <label>Email </label>
                                <input class="form-control" type="text" placeholder="Default Email" name="email">
                            </div>
                            <div class="form-group">
                                <label>Alamat <span class="text-red">*</span></label>
                                <textarea class="form-control" type="text" placeholder="input Alamat" name="alamat"></textarea>
                            </div>
                            <div class="form-group">
                                <div class="  product-grid">
                                    <div class="content_box" style="padding-right: 30px;">
                                        <a href="single.html"></a>
                                        <div class="left-grid-view grid-view-left">
                                            <span>
                                                <img src="{{url('/')}}/template/images/pic2.jpg" class="img-responsive watch-right" id="product-image" alt="">
                                                <div class="mask">
                                                    <div class="info">Quick View</div>
                                                </div>
                                            </span>
                                        </div>
                                        <h4><a id="product-name">Product Name</a></h4>
                                        <span></span>
                                        <div class="star-price">
                                            <div class="dolor-grid"> 
                                                <span class="actual" id="product-price">Rp. 0</span>
                                            </div>
                                            <div class="clearfix"> </div>
                                        </div>
                                    </div>
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
    <script src="{{url('/')}}/js/main.js" type=""></script>

@endsection