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
                                <div class="form-group" style="margin:0px 20px 20px 0px;" id="chooseUser">
                                    <input type="radio" name="rdoUser" class="checkUser" value="1" checked>Bản thân
                                    <input type="radio" name="rdoUser" class="checkUser" value="2">Người khác
                                </div>
                                @if($user)
                                <input type="text" class="ten_nguoinhan" id="ten_nguoinhan" name="ten_nguoinhan" placeholder="Họ và tên người nhận" value="{{$user['name']}}"/>
                                <input type="text" class="diachi" id="diachi" name="diachi" placeholder="Địa chỉ thường trú " value="{{$user['address']}}"/>
                                <input type="text" class="sdt" id="sdt" name="sdt" placeholder="Số điện thoại" value="{{$user['phone']}}"/>
                                @endif
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
                                <input type="text" name="ngaydathang" value="{{$ngaydathang}}" placeholder="Ngày đặt hàng"/>
                                <?php 
                                    $cart = Cart::content();
                                ?>
                                @foreach($cart as $item_cart)
                                <input type="hidden" name="ten_sp" class="table table-condensed" value="{{$item_cart->name}}">
                                <input type="hidden" name="soluong" class="table table-condensed" value="{{$item_cart->qty}}">
                                <input type="hidden" name="size" class="table table-condensed" value="{{$item_cart->options->size}}">
                                <input type="hidden" name="mau" class="table table-condensed" value="{{$item_cart->options->color}}">
                                <input type="hidden" name="ma_sp" class="table table-condensed" value="{{$item_cart->id}}">
                                <input type="hidden" name="so_tien" class="table table-condensed" value="{{$item_cart->price}}">
                                <input type="text" name="tongtien" value="{{$item_cart->price * $item_cart->qty }}" placeholder="Tổng tiền"/>
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
@section('script')
    <script>
        $('.checkUser').change(function(){
            var checkUser = $('input[class="checkUser"]:checked').val();
            console.log(checkUser);
            
            $ten_nguoinhan = $('#ten_nguoinhan').val();
            $diachi = $('#diachi').val();
            $sdt = $('#sdt').val();
            
            if(checkUser == 2){
                $('#ten_nguoinhan').replaceWith('<input type="text" name="ten_nguoinhan" placeholder="Họ và tên người nhận"/>')
                $('#diachi').replaceWith('<input type="text" name="diachi" placeholder="Địa chỉ thường trú "/>')
                $('#sdt').replaceWith('<input type="text" name="sdt" placeholder="Số điện thoại"/>')
            }else{
                $.ajax({
                    method  : 'get',
                    url     : '{{ url("/thanh-toan") }}',
                    dataType: 'json',
                    data    : {
                            '_token'       : '{{ csrf_token() }}',
                            'ten_nguoinhan': $ten_nguoinhan,
                            'diachi'       : $diachi,
                            'sdt'          : $sdt
                    },
                    success:function(data){
                        $('#ten_nguoinhan').replaceWith('<input type="text" name="ten_nguoinhan" placeholder="Họ và tên người nhận" value="'+data.name+'" />');
                        $('#diachi').replaceWith('<input type="text" name="diachi" placeholder="Địa chỉ thường trú " value="'+data.address+'"/>')
                        $('#sdt').replaceWith('<input type="text" name="sdt" placeholder="Số điện thoại" value="'+data.phone+'"/>')
                        console.log(data);
                    }
                });
            }
        })
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
    </script>
@endsection