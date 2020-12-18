@extends('welcome')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
            </ol>
        </div>

        
        <div class="review-payment">
            <h2>Xem lại giỏ hàng</h2>
        </div>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                {{-- <thead>
                    <tr class="cart_menu" style="">
                        <td class="description">Tên sản phẩm</td>
                        <td class="price">Giá</td>   
                        <td><i class="size">Size</i></td>
                        <td><i class="size">Màu</i></td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng tiền</td>
                        
                    </tr>
                </thead> --}}
                <tbody>
                    <div class="form-one">
                        <form action="{{URL::to('/cap-nhap-thanh-toan')}}" method="POST">
                            @csrf
                            <?php 
                            $cart = Cart::content();
                            ?>
                            @foreach($cart as $item)
                            <label for="">Tên sản phẩm</label>
                            <input type="text" name="ten_sp" class="table table-condensed" value="{{$item->name}}"><br>
                            <label for="">Số tiền</label><br>
                            <input type="text" name="so_tien" class="table table-condensed"  value="{{$item->price}}"><br>
                            <label for="">Số lượng</label><br>
                            <input type="text" name="soluong" class="table table-condensed" value="{{$item->qty}}"><br>
                            <label for="">Size</label><br>
                            <input type="text" name="size" class="table table-condensed" value="{{$item->options->size}}"><br>
                            <label for="">Màu</label><br>
                            <input type="text" name="mau" class="table table-condensed" value="{{$item->options->color}}"><br>
                            <label for="">Tổng tiền</label><br>
                            <input type="text" name="tongtien" class="table table-condensed" value="{{$item->price * $item->qty}}"><br>
                            @foreach($get_dh_id as $get_id)
                            <input type="hidden" name="donhang_id" class="table table-condensed" value="{{$get_id->donhang_id}}">
                            @endforeach
                            <input type="hidden" name="ma_sp" value="{{$item->id}}">
                            <input type="submit" value="Gửi" name="send_order_details" class="btn btn-primary btn-sm">
                        @endforeach
                        </form>
                    </div>
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->
    
@endsection