@extends('admin.master')
@section('content')
@if(session('message'))
    <div class="alert alert-{{session('flag')}}">
        {{session('message')}}
    </div>
@endif
<div class="col-md-12">
    <!-- DATA TABLE -->
    <h3 class="title-5 m-b-35">Danh sách sản phẩm</h3>
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
            <a href="{{URL::to('/admin/product/product-add')}}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                <i class="zmdi zmdi-plus"></i>Thêm sản phẩm
            </a>
            <a href="{{URL::to('/admin/product/product-image-add')}}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                <i class="zmdi zmdi-plus"></i>Thêm hình ảnh
            </a>
            <a href="{{URL::to('/admin/product/product-size-add')}}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                <i class="zmdi zmdi-plus"></i>Thêm size
            </a>
            <a href="{{URL::to('/admin/product/product-color-add')}}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                <i class="zmdi zmdi-plus"></i>Thêm màu
            </a>
            {{-- <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                <select class="js-select2" name="type">
                    <option selected="selected">Export</option>
                    <option value="">Option 1</option>
                    <option value="">Option 2</option>
                </select>
                <div class="dropDownSelect2"></div>
            </div> --}}
        </div>
    </div>
    <div class="table-responsive table-responsive-data2">
        <table id="example" class="table table-striped table-bordered" style="width:100%" >
            <thead>
                <tr style="text-align: center;">
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    {{-- <th>Sale</th> --}}
                    <th>Hình ảnh</th>
                    <th>Mô tả</th>
                    <th>Check code</th>
                    <th>Slug</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                    {{-- <th></th> --}}
                </tr>
            </thead>
            <tbody>
                <?php $stt = 0 ?>
                @foreach($show_sp as $item)
                <tr class="tr-shadow" style="text-align: center; ">
                    <?php $stt += 1 ?>
                    <td>{{ $stt }}</td>
                    <td>{{ $item->ten_sp }}</td>
                    <td>{{ number_format($item->gia),0,",","." }}vnđ</td>
                    {{-- <td>{{ number_format($item->sale),0,",","." }}vnđ</td> --}}
                    <td><img src="{{URL::to('public/admin/upload/'.$item->hinhanh)}}" width=200 height=200></td>
                    <td>{{ $item->mota }}</td>
                    <td>{{ $item->checkcode }}</td>
                    <td>{{ $item->slug_sanpham }}</td>
                    <td>
                        @if($item->trangthai_sp == 1)
                            <span class="status--process">Hiện</span>
                        @else
                            <span class="status--denied">Ẩn</span>
                        @endif
                    </td>
                    <td>
                        <div class="table-data-feature">
                            <a href="{{URL::to('/admin/product/product-edit/'. $item->ma_sp)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="zmdi zmdi-edit"></i>
                            </a>
                            <a href="{{URL::to('/admin/product/product-del/'. $item->ma_sp)}}" onclick="return confirm('Bạn muốn xóa danh mục này?')" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                <i class="zmdi zmdi-delete"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
                <tr class="spacer"></tr>
            </tbody>
        </table>
    </div>
    <!-- END DATA TABLE -->
</div>
@endsection