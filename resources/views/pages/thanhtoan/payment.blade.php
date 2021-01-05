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
                {{-- <tbody>
                    <div class="form-one">
                        <form action="{{URL::to('/cap-nhap-thanh-toan')}}" method="POST">
                            @csrf
                            <?php 
                            $cart = Cart::content();
                            ?>
                            @foreach($cart as $item)
                            <label for="">Tên sản phẩm</label><br>
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
</section> <!--/#cart_items--> --}}
<div class="table-responsive cart_info">
    <?php
        $content = Cart::content();
    ?>
    <table class="table table-condensed">
        <thead>
            <tr class="cart_menu" style="text-align: center;">
                <td class="image">Hình ảnh</td>
                <td class="description">Tên sản phẩm</td>
                <td class="price">Giá</td>   
                <td><i class="size">Size</i></td>
                <td class="quantity">Số lượng</td>
                <td class="total">Tổng tiền</td>
                
            </tr>
        </thead>
        <tbody>
            @foreach ($content as $item_content)
                
         
            <tr>
                <td class="cart_product">
                    <a href=""><img src="{{URL::to('public/admin/upload/'.$item_content->options->image)}}" width="50" height="50" alt=""></a>
                </td>
                <td class="cart_description">
                    <h4><a href="">{{$item_content->name}}</a></h4>
                </td>
                <td class="cart_price">
                    <p>{{number_format($item_content->price).' '.'vnđ'}}</p>
                </td>
                <td class="cart_size">
                    <p>{{$item_content->options->size}}</p>
                </td>
                <td class="cart_quantity">
                    <div class="cart_quantity_button">
                        <form action="{{URL::to('capnhat-giohang')}}" method="POST">
                            {{ csrf_field() }}
                        <input class="cart_quantity_input" type="text" name="quantity" value="{{$item_content->qty}}" size="3">
                        <input type="hidden" value="{{$item_content->rowId}}" name="rowId_giohang" class="form-control">
                        
                  
                    </div>
                </td>
                <td class="cart_total">
                    <p class="cart_total_price">
                        
                        <?php
                        $subtotal = $item_content->price * $item_content->qty;
                        echo number_format($subtotal).' '.'vnđ';
                        ?>
                    </p>
                </td>
                <td class="cart_delete">
                    <a class="cart_quantity_delete" href="{{URL::to('/delete-giohang/'.$item_content->rowId)}}"><i class="fa fa-times"></i></a>
                </td>
            </tr>
             @endforeach
        </tbody>
    </form>
    </table>
</div>
</div>
</section> <!--/#cart_items-->
    
@endsection