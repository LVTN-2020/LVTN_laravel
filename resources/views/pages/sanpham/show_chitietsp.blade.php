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
                      {{--  {{print_r($item->hinhanh)}}  --}}
                    </div>
                    @endforeach
                    {{--  <div class="item">
                        <a href=""><img src="{{URL::to('/public/frontend/images/product-details/similar1.jpg')}}" alt=""></a>
                        <a href=""><img src="{{URL::to('/public/frontend/images/product-details/similar2.jpg')}}" alt=""></a>
                        <a href=""><img src="{{URL::to('/public/frontend/images/product-details/similar3.jpg')}}" alt=""></a>
                    </div>
                    <div class="item">
                        <a href=""><img src="{{URL::to('/public/frontend/images/product-details/similar1.jpg')}}" alt=""></a>
                        <a href=""><img src="{{URL::to('/public/frontend/images/product-details/similar2.jpg')}}" alt=""></a>
                        <a href=""><img src="{{URL::to('/public/frontend/images/product-details/similar3.jpg')}}" alt=""></a>
                    </div>  --}}
                    
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
            {{-- <img src="{{asset('public/frontend/images/product-details/rating.png')}}" alt="" /> --}}
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
                        {{-- <ul class="ulsize">
                            @foreach($get_size as $item_size)
                            <li class="size" value="{{$item_size->size}}">{{$item_size->size}}
                                <input type="hidden" name="size_id" value="{{$item_size->size}}">{{$item_size->size}}
                            </li>
                            @endforeach
                        </ul> --}}
                        <select name="size_id" id="size" class="form-group">
                            @foreach($get_size as $item_size)
                                <option value="{{$item_size->size}}">{{$item_size->size}}</option>
                            @endforeach
                        </select>
                    </div>
                    <?php //echo '<pre>' ?>
                    <?php //print_r($get_size) ?>
                    <?php //echo '</pre>' ?>
                </p>
                <p>
                    <div class="product-color">
                        <label>Màu:</label>
                        {{-- <ul class="ul-color">
                            @foreach ($get_mau as $item_mau)
                            <li>{{$item_mau->mau}}</li>
                            <input type="hidden" name="color_id" value="{{$item_mau->ma_mau}}">
                            @endforeach
                        </ul> --}}
                        <select name="color_id" id="color" class="form-group">
                            @foreach($get_mau as $item_mau)
                                <option value="{{$item_mau->mau}}">{{$item_mau->mau}}</option>
                            @endforeach
                        </select>
                    </div>
                    <?php //echo '<pre>' ?>
                    <?php //print_r($get_mau) ?>
                    <?php //echo '</pre>' ?>
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
            <li><a href="#reviews" data-toggle="tab">Đánh giá (5)</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="details" >
            <p>{!!$item->mota!!}</p>     
        </div>
        <div class="tab-pane fade" id="reviews" >
            <div class="col-sm-12">
                <ul>
                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2021</a></li>
                </ul>   
                <form action="#">
                    <span>
                        <input type="text" placeholder="Tên của bạn"/>
                        <input type="email" placeholder="Địa chỉ Email"/>
                    </span>
                    <textarea name="" ></textarea>
                    <b>Xếp hạng đánh giá: </b> <img src="images/product-details/rating.png" alt="" />
                    <button type="button" class="btn btn-default pull-right">
                        Đánh giá
                    </button>
                </form>
            </div>
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
                                <img src="{{URL::to('public/admin/upload/'.$lienquan->hinhanh)}}" width="200" height="100" alt="" />
                                <h2>{{ number_format( $lienquan->gia),',','.' }}vnđ</h2>
                                <p>{{  $lienquan->ten_sp }}</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
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

{{-- @section('script')
    <script>
        $('ul.ulsize li').click(function(){
            var id_size = $('input[type=hidden]', this).val();
            console.log(id_size);
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url : "show-cart",
                data: {
                    "size_id": id_size
                },
                success: function(data){
                    $('ul.ulsize li input').html(data);
                    console.log('ok');
                }
                // error: function(data){
                //     console.log(data);
                // }

            });
        })
    </script>
@endsection --}}