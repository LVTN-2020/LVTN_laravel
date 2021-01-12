@extends('admin.master')
@section('content')
@if(session('message'))
    <div class="alert alert-{{session('flag')}}">
        {{session('message')}}
    </div>
@endif
<div class="col-md-12">
    <!-- DATA TABLE -->
    <h3 class="title-5 m-b-35">Chi tiết đơn hàng</h3>
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
                    <th>Tên sản phẩm</th>
                    <th>Size</th>
                    <th>Màu</th>
                    <th>Số lượng</th>
                    <th>Số tiền</th>
                    <th>Tổng tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php $stt = 0 ?>
                @foreach($list_ctdh as $ctdh)
                <tr class="tr-shadow" style="text-align: center; ">
                    <?php $stt += 1 ?>
                    <td>{{ $stt }}</td>
                    <td>{{$ctdh->ten_sp}}</td>
                    <td>{{$ctdh->size}}</td>
                    <td>{{$ctdh->mau}}</td>
                    <td>{{$ctdh->soluong}}</td>
                    <td>{{$ctdh->so_tien}}</td>
                    <td>{{$ctdh->tongtien}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
    <!-- END DATA TABLE -->
</div>
@endsection