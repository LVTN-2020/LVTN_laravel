@extends('welcome')
@section('content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
              <li class="active">Giỏ hàng của bạn</li>
            </ol>
        </div>
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
                                <input class="cart_quantity_input"name="quantity" value="{{$item_content->qty}}" size="3">
                                <input type="hidden" value="{{$item_content->rowId}}" name="rowId_giohang" class="form-control">
                                <input type="submit" value="Cập nhật" name="capnhat_giohang" class="btn btn-default btn-sm">
                            </form>
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
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->
<section id="do_action">
    <div class="container">
    
        <div class="row">
        
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Tổng <span>{{Cart::total().' '.'vnđ'}}</span></li>
                        <li>Phí vận chuyển <span>Free</span></li>
                        <li>Thành tiền <span>{{Cart::total().' '.'vnđ'}}</span></li>
                    </ul>
                        @if(Auth::check())
                        <a class="btn btn-default check_out" href="{{URL::to('/thanh-toan')}}">Mua</a>
                        @else
                        <a class="btn btn-default check_out" href="{{URL::to('/get-dangnhap')}}">Mua</a>
                        @endif
                </div>
            </div>
        </div>
    </div>
</section><!--/#do_action-->


@endsection