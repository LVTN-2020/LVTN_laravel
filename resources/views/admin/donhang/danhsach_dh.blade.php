@extends('admin.master')
@section('content')
@if(session('message'))
    <div class="alert alert-{{session('flag')}}">
        {{session('message')}}
    </div>
@endif
<div class="col-md-12">
    <!-- DATA TABLE -->
    <h3 class="title-5 m-b-35">Danh sách đơn hàng</h3>
    <div class="table-data__tool">
        <div class="table-data__tool-left">
            <div class="rs-select2--light rs-select2--md"> 
            </div>
        </div>
        <div class="table-data__tool-right">
        </div>
    </div>
    <div class="table-responsive table-responsive-data2">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr style="text-align: center;">
                    <th>ID</th>
                    <th>Mã đơn hàng</th>
                    <th>Tên người nhận</th>
                    <th>Ngày đặt hàng</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php $stt = 0 ?>
                @foreach($list_dh as $donhang)
                <tr class="tr-shadow" style="text-align: center; ">
                    <?php $stt += 1 ?>
                    <td>{{ $stt }}</td>
                    <td>{{$donhang->ma_dh}}</td>
                    <td>{{$donhang->ten_nguoinhan}}</td>
                    <td>{{date('d-m-Y', strtotime($donhang->ngaydathang))}}</td>
                    <td>{{$donhang->diachi}}</td>
                    <td>{{$donhang->sdt}}</td>
                    <td>
                        @if($donhang->trangthai_dh == 'Đang chờ xử lý')
                            <span class="status--denied">Đang chờ xử lý</span>
                        @else
                        <span class="status--process">Đã hoàn thành</span>
                        @endif
                    </td>
                    <td>
                        <div class="table-data-feature">
                            <a href="{{URL::to('/admin/order/order-detail/'. $donhang->donhang_id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Xem">
                                <i class="zmdi zmdi-eye"></i>
                            </a>
                            <a href="{{URL::to('/admin/order/order-edit/'. $donhang->donhang_id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="zmdi zmdi-edit"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- END DATA TABLE -->
</div>
@endsection