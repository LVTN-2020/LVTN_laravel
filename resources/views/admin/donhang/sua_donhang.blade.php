@extends('admin.master')
@section('content')
<div class="col-lg-6">
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
    <div class="card">
        <div class="card-header">
            <strong>Sửa</strong> đơn hàng
        </div>
        <div class="card-body card-block">
            <form action="{{URL::to('/admin/order/order-update/'. $get_orderId->donhang_id)}}" method="post" class="">
                @csrf
                <div class="form-group">
                    <label class=" form-control-label">Mã đơn hàng</label>
                    <input type="text" name="ma_dh" value="{{$get_orderId->ma_dh}}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label class=" form-control-label">Tên sản phẩm</label>
                    @foreach($ten_sp as $item)
                        @if($item->donhang_id == $get_orderId->donhang_id)
                            <input type="text" name="ma_dh" value="{{$item->ten_sp}}" class="form-control" disabled>
                        @endif
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="nf-password" class=" form-control-label">Tên người nhận</label>
                    <input type="text" name="ten_nguoinhan" value="{{$get_orderId->ten_nguoinhan}}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label for="nf-password" class=" form-control-label">Ngày đặt hàng</label>
                    <input type="date" name="ngaydathang" value="{{$get_orderId->ngaydathang}}" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label>Trạng thái đơn hàng</label>
                    <select class="form-control" name="trangthai_dh">
                        @if($get_orderId->trangthai_dh == 'Đang chờ xử lý')
                            <option value="{{$get_orderId->trangthai_dh}}">{{$get_orderId->trangthai_dh}}</option>
                            <option value="Đã hoàn thành">Đã hoàn thành</option>
                        @else
                            <option value="{{$get_orderId->trangthai_dh}}">{{$get_orderId->trangthai_dh}}</option>
                            <option value="Đang chờ xử lý">Đang chờ xử lý</option>
                       @endif
                       
                    </select>
                </div>
                {{-- <div class="form-group">
                    <input type="hidden" name="ma_tt" value="{{$get_orderId->ma_tt}}" class="form-control" disabled>
                    <input type="hidden" name="ma_vanchuyen" value="{{$get_orderId->ma_vanchuyen}}" class="form-control" disabled>
                    <input type="hidden" name="phivanchuyen" value="{{$get_orderId->phivanchuyen}}" class="form-control" disabled>
                    <input type="hidden" name="tongtien" value="{{$get_orderId->tongtien}}" class="form-control" disabled>
                    <input type="hidden" name="sdt" value="{{$get_orderId->sdt}}" class="form-control" disabled>
                    <input type="hidden" name="diachi" value="{{$get_orderId->diachi}}" class="form-control" disabled>
                    {{-- <span class="help-block">Please enter your password</span> --}}
                </div>
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
            </form>
        </div>
    </div>
</div>
@endsection