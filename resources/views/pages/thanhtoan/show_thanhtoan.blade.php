@extends('welcome')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
            </ol>
        </div>
        <div class="shopper-informations">
            <div class="row">       
                <div class="col-sm-12 clearfix">
                    <div class="bill-to">
                        <p>Điền thông tin người nhận</p>
                         <div class="form-one">
                              <form action="{{URL::to('/save-thanhtoan')}}" method="POST">
                                {{csrf_field()}}
                                <div class="form-one" style="margin:0px 20px 20px 0px; ">
                                    <label for=""></label>
                                    <input type="radio" name="rdoUser" value="1" id="">Bản thân
                                    <input type="radio" name="rdoUser" value="2" id="">Người khác
                                </div>
                                <input type="text" name="ten_nguoinhan" placeholder="Họ và tên người nhận"/>
                                <input type="text" name="diachi" placeholder="Địa chỉ thường trú "/>
                                <input type="text" name="sdt" placeholder="Số điện thoại"/>  
                                 <select class="form-one" style="margin:0px 10px 10px 0px; " name="ma_tt" id="">
                                    <option value="">Chọn hình thức thanh toán</option>
                                    <option value="1">Thanh toán tai nhà</option>
                                    <option value="2">Thanh toán ATM</option>
                                </select>  
                                 <input type="hidden" name="ma_vanchuyen" placeholder="Mã vận chuyển"/>
                                <input type="hidden" name="phivanchuyen" placeholder="Phí vận chuyển"/>
                                @if(Auth::check())
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}"/>
                                @endif
                                <input type="hidden" name="ma_dh" placeholder=""/>
                                <input type="date" name="ngaydathang" placeholder="Ngày đặt hàng"/>
                                <?php 
                                    $cart = Cart::content();
                                ?>
                                @foreach($cart as $item_cart)
                                <input type="text" name="tongtien" value="{{$item_cart->price }}" placeholder="Tổng tiền"/>
                                @endforeach
                                <input type="hidden" name="trangthai_dh" value="Đang chờ xử lý" placeholder="Trạng thái đơn hàng"/>     
                                <input type="submit" value="Gửi" name="send_order" class="btn btn-primary btn-sm">
                                
                            </form>   
                        </div>              
                    </div>
                </div>                             
            </div>
        </div>
</section> <!--/#cart_items-->
    
@endsection