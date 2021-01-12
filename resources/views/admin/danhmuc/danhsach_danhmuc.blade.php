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
                <div class="dropDownSelect2"></div>
            </div>
        </div>
        <div class="table-data__tool-right">
            <a href="{{URL::to('/admin/cate/cate-add')}}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                <i class="zmdi zmdi-plus"></i>Thêm danh mục
            </a>
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
                </tr>
            </thead>
            <tbody>
                <?php $stt = 0 ?>
                @foreach($show_dm as $item)
                <tr>
                    <?php $stt += 1 ?>
                    <td>{{$stt}}</td>
                    <td>{{$item->ten_danhmuc}}</td>
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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- END DATA TABLE -->
</div>
@endsection