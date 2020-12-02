@extends('admin.master')
@section('content')
@if(session('message'))
    <div class="alert alert-{{session('flag')}}">
        {{session('message')}}
    </div>
@endif
<div class="col-md-12">
    <!-- DATA TABLE -->
    <h3 class="title-5 m-b-35">Danh sách nhà cung cấp</h3>
    <div class="table-data__tool">
        <div class="table-data__tool-left">
            <div class="rs-select2--light rs-select2--md">
                <select class="js-select2" name="property">
                    <option selected="selected">All Properties</option>
                    <option value="">Option 1</option>
                    <option value="">Option 2</option>
                </select>
                <div class="dropDownSelect2"></div>
            </div>
            <button class="au-btn-filter">
                <i class="zmdi zmdi-filter-list"></i>filters
            </button>
        </div>
        <div class="table-data__tool-right">
            <a href="{{URL::to('/admin/supplier/supplier-add')}}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                <i class="zmdi zmdi-plus"></i>Thêm nhà cung cấp
            </a>
            <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                <select class="js-select2" name="type">
                    <option selected="selected">Export</option>
                    <option value="">Option 1</option>
                    <option value="">Option 2</option>
                </select>
                <div class="dropDownSelect2"></div>
            </div>
        </div>
    </div>
    <div class="table-responsive table-responsive-data2">
        <table class="table table-data2">
            <thead>
                <tr style="text-align: center;">
                    <th>ID</th>
                    <th>Tên nhà cung cấp</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Hành động</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $stt = 0 ?>
                @foreach($show_ncc as $item)
                <tr class="tr-shadow" style="text-align: center;">
                    <?php $stt += 1 ?>
                    <td>{{$stt}}</td>
                    <td>{{$item->ten_ncc}}</td>
                    {{-- <td class="desc">Samsung S8 Black</td> --}}
                    <td>{{$item->diachi}}</td>
                    <td>{{$item->sdt}}</td>
                    <td>
                        <div class="table-data-feature">
                            <a href="{{URL::to('/admin/supplier/supplier-edit/'. $item->ma_ncc)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="zmdi zmdi-edit"></i>
                            </a>
                            <a href="{{URL::to('/admin/supplier/supplier-del/'. $item->ma_ncc)}}" onclick="return confirm('Bạn muốn xóa danh mục này?')" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
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