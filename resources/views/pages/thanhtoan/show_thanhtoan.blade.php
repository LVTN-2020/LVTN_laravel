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
                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </div>
                @endif

                @if(session('message'))
                    <div class="alert alert-{{session('flag')}}">
                        {{session('message')}}
                    </div>
                @endif
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
                                <div class="form-group" id="dataUser">
                                @if($user)
                                    <input type="text" class="form-control ten_nguoinhan" id="ten_nguoinhan" name="ten_nguoinhan" placeholder="Họ và tên người nhận" data-val="{{$user['name']}}" value="{{old('ten_nguoinhan', isset($user) ? $user['name'] : null )}}" readonly/>
                                    <input type="text" class="form-control diachi" id="diachi" name="diachi" placeholder="Địa chỉ thường trú " data-val="{{$user['diachi']}}" value="{{old('diachi', isset($user) ? $user['address'] : null)}}" readonly/>
                                    <input type="text" class="form-control sdt" id="sdt" name="sdt" placeholder="Số điện thoại" data-val="{{$user['sdt']}}" value="{{old('sdt', isset($user) ? $user['phone'] : null)}}" readonly/>
                                @endif
                                </div>
                                 <select class="form-control" style="margin:0px 10px 10px 0px; " name="ma_tt" id="">
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
                                <input type="text" class="form-control" name="ngaydathang" value="{{$ngaydathang}}" placeholder="Ngày đặt hàng" readonly/>
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
                                <input type="text" class="form-control" name="tongtien" value="{{$item_cart->price * $item_cart->qty }}" placeholder="Tổng tiền" readonly/>
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
            
            $ten_nguoinhan = $('#ten_nguoinhan').data('val', $(this).val());
            $diachi = $('#diachi').data('val', $(this).val());
            $sdt = $('#sdt').data('val', $(this).val());
            
            if(checkUser == 2){
                $('#dataUser').empty();
                $('#dataUser').append('<input type="text" class="form-control" name="ten_nguoinhan" placeholder="Họ và tên người nhận"/>' +
                                      '<input type="text" class="form-control" name="diachi" placeholder="Địa chỉ thường trú "/>' + 
                                      '<input type="text" class="form-control" name="sdt" placeholder="Số điện thoại"/>');
            }else{
                $('#dataUser').empty();
                $('#dataUser').append('<input type="text" class="form-control" value="{{$user['name']}}" name="ten_nguoinhan" placeholder="Họ và tên người nhận" readonly/>' +
                                      '<input type="text" class="form-control" value="{{$user['address']}}" name="diachi" placeholder="Địa chỉ thường trú " readonly/>' + 
                                     '<input type="text" class="form-control" value="{{$user['phone']}}" name="sdt" placeholder="Số điện thoại" readonly/>');
            }
        })
    </script>
@endsection