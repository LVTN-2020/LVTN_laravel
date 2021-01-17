@extends('welcome')
@section('content')
@foreach($chitiet_sanpham as $item)
<div class="product-details"><!--product-details-->
    <div class="col-sm-5">
        <div class="view-product">
            <img src="{{URL::to('/public/admin/upload/'.$item->hinhanh)}}" style="height: 230px; width: 350px;" alt="" />
           
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">
            
              <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    @foreach($get_sub_img as $item_img)
                    <div class="item active">
                      <a href=""><img src="{{URL::to('/public/admin/upload/details/'.$item_img->hinhanh)}}" width="100" height="100" alt=""></a>
                    </div>
                    @endforeach
                    
                </div>

              <!-- Controls -->
              <a class="left item-control" href="#similar-product" data-slide="prev">
                <i class="fa fa-angle-left"></i>
              </a>
              <a class="right item-control" href="#similar-product" data-slide="next">
                <i class="fa fa-angle-right"></i>
              </a>
        </div>

    </div>
    <div class="col-sm-7">
        <div class="product-information"><!--/product-information-->
            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
            <h2>{{$item->ten_sp}}</h2>
            <p>Check code: <strong>{{$item->checkcode}}</strong></p>
            <p>Dòng sản phẩm:<strong>{{$item->ten_dongsp}}</strong></p>
            <form action="{{URL::to('/save-cart')}}" method="POST">
                {{csrf_field()}}
                <span class="quantity">
                    <p style="font-weight: bold; font-size: 35px; color: red;">{{number_format($item->gia),',','.' }}vnđ</p>
                    <label>Số lượng:</label>
                    <input class="input-quantity" name="soluong" type="number" min="1" value="1" />
                    <input name="sanphamid_hidden" type="hidden" value="{{$item->ma_sp}}" />
                </span>
                <p>      
                    <div class="product-size">
                        <label> Chọn size:</label> 
                        <select name="size_id" id="size" class="form-group">
                            @foreach($get_size as $item_size)
                                <option value="{{$item_size->size}}">{{$item_size->size}}</option>
                            @endforeach
                        </select>
                    </div>
                </p>
                <p>
                    <div class="product-color">
                        <label>Màu:</label>
                        <select name="color_id" id="color" class="form-group">
                            @foreach($get_mau as $item_mau)
                                <option value="{{$item_mau->mau}}">{{$item_mau->mau}}</option>
                            @endforeach
                        </select>
                    </div>
                </p>
                <button type="submit" class="btn btn-fefault cart" style="margin-left:0px; margin-top:20px;">
                    <i class="fa fa-shopping-cart"></i>
                    Thêm vào giỏ hàng
                </button>
            </form>
            <a href=""><img src="{{asset('public/frontend/images/product-details/share.png')}}" class="share img-responsive"  alt="" /></a>
        </div><!--/product-information-->
    </div>
</div><!--/product-details-->
@endforeach
<div class="category-tab shop-details-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#details" data-toggle="tab">Mô tả sản phẩm</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="details" >
            <p>{!!$item->mota!!}</p>     
        </div>
        
        
    </div>
</div><!--/category-tab-->

<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Sản phẩm liên quan</h2>
    
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                @foreach($relate as $item => $lienquan)
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <a href="{{URL::to('/chi-tiet-san-pham/'.$lienquan->slug_sanpham.'.html')}}">
                                    <img src="{{URL::to('public/admin/upload/'.$lienquan->hinhanh)}}" width="200" height="100" alt="" />
                                    <h2>{{ number_format( $lienquan->gia),',','.' }}vnđ</h2>
                                    <p>{{  $lienquan->ten_sp }}</p>
                                </a>
                            </div>
                        </div>
                        </div>
                    </div>
                    @endforeach	
                </div> 
        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>			
    </div>
</div><!--/recommended_items-->
@endsection