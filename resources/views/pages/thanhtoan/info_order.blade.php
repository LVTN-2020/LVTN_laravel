@extends('welcome')
@section('content')
<div class="col-md-12">
    <!-- DATA TABLE -->
    <h3 class="title-5 m-b-35" style="text-align: center;">Thông tin đơn hàng</h3>
    <div class="table-data__tool">
        <div class="table-data__tool-left">
            <div class="rs-select2--light rs-select2--md">
            </div>
        </div>
        <div class="table-data__tool-right">
            
        </div>
    </div>
    <div class="table-responsive table-responsive-data2">
        <table class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th style="text-align: center;">ID</th>
                    <th style="text-align: center;">Mã đơn hàng</th>
                    <th style="text-align: center;">Ngày đặt hàng</th>
                    <th style="text-align: center;">Tên sản phẩm</th>
                    <th style="text-align: center;">Size</th>
                    <th style="text-align: center;">Màu</th>
                    <th style="text-align: center;">Số lượng</th>
                    <th style="text-align: center;">Số tiền</th>
                    <th style="text-align: center;">Tổng tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php $stt = 0 ?>
                @foreach($info_order as $item)
                <tr class="tr-shadow" style="text-align: center; ">
                    <?php $stt += 1 ?>
                    <td>{{ $stt }}</td>
                    <td>{{ $item->ma_dh }}</td>
                    <td>{{ date('d-m-Y', strtotime($item->ngaydathang)) }}</td>
                    <td>{{ $item->ten_sp }}</td>
                    <td>{{ $item->size }}</td>
                    <td>{{ $item->mau }}</td>
                    <td>{{ $item->soluong }}</td>
                    <td>{{ number_format($item->so_tien),0,",","." }}đ</td>
                    <td>{{ number_format($item->tongtien),0,",","." }}đ</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
    <!-- END DATA TABLE -->
</div>
    
@endsection