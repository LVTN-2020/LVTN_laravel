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
                {{-- <select class="js-select2" name="property">
                    <option selected="selected">All Properties</option>
                    <option value="">Option 1</option>
                    <option value="">Option 2</option>
                </select>
                <div class="dropDownSelect2"></div> --}}
            </div>
            {{-- <button class="au-btn-filter">
                <i class="zmdi zmdi-filter-list"></i>filters
            </button> --}}
        </div>
        <div class="table-data__tool-right">
            
        </div>
    </div>
    <div class="table-responsive table-responsive-data2">
        <table id="example" class="table table-striped table-bordered" style="width:100%" >
            <thead>
                <tr style="text-align: center;">
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Size</th>
                    <th>Màu</th>
                    <th>Số lượng</th>
                    <th>Số tiền</th>
                    <th>Tổng tiền</th>
                    {{-- <th></th> --}}
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
                <tr class="spacer"></tr>
            </tbody>
        </table>
    </div>
    <!-- END DATA TABLE -->
</div>
@endsection