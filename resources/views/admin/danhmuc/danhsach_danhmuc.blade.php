@extends('admin.master')
@section('content')
@if(session('message'))
    <div class="alert alert-{{session('flag')}}">
        {{session('message')}}
    </div>
@endif
<div class="col-md-12">
    <!-- DATA TABLE -->
    <h3 class="title-5 m-b-35">Danh sách danh mục</h3>
    <div class="table-data__tool">
        <div class="table-data__tool-left">
            <div class="rs-select2--light rs-select2--md">
                {{-- <select class="js-select2" name="property">
                    <option selected="selected">All Properties</option>
                    <option value="">Option 1</option>
                    <option value="">Option 2</option>
                </select> --}}
                <div class="dropDownSelect2"></div>
            </div>
            {{-- <button class="au-btn-filter">
                <i class="zmdi zmdi-filter-list"></i>filters
            </button> --}}
        </div>
        <div class="table-data__tool-right">
            <a href="{{URL::to('/admin/cate/cate-add')}}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                <i class="zmdi zmdi-plus"></i>Thêm danh mục
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
                    <th>Tên danh mục</th>
                    <th>Slug danh mục</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                    {{-- <th></th> --}}
                </tr>
            </thead>
            <tbody>
                <?php $stt = 0 ?>
                @foreach($show_dm as $item)
                <tr class="tr-shadow" style="text-align: center;">
                    @if($item->trangthai_danhmuc != 0)
                        <?php $stt += 1 ?>
                        <td>{{$stt}}</td>
                        <td>{{$item->ten_danhmuc}}</td>
                        {{-- <td class="desc">Samsung S8 Black</td> --}}
                        <td>{{$item->slug_danhmuc}}</td>
                        <td>
                            @if($item->trangthai_danhmuc == 1)
                                <span class="status--process">Hiện</span>
                            @else
                                <span class="status--denied">Ẩn</span>
                            @endif
                        </td>
                        <td>
                            <div class="table-data-feature">
                                <a href="{{URL::to('/admin/cate/cate-edit/'. $item->ma_danhmuc)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </a>
                                <a href="{{URL::to('/admin/cate/cate-del/'. $item->ma_danhmuc)}}" onclick="return confirm('Bạn muốn xóa danh mục này?')" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <i class="zmdi zmdi-delete"></i>
                                </a>
                            </div>
                        </td>
                    @endif
                </tr>
                @endforeach
                <tr class="spacer"></tr>
            </tbody>
        </table>
    </div>
    <!-- END DATA TABLE -->
</div>
@endsection