@extends('admin.master')
@section('title', 'Dòng sản phẩm')
@section('action', 'xem')
@section('content')
@if(session('message'))
    <div class="alert alert-{{session('flag')}}">
        {{session('message')}}
    </div>
@endif
<div class="col-md-12">
    <!-- DATA TABLE -->
    <h3 class="title-5 m-b-35">Danh sách dòng sản phẩm</h3>
    <div class="table-data__tool">
        <div class="table-data__tool-left">
            <div class="rs-select2--light rs-select2--md">
                <div class="dropDownSelect2"></div>
            </div>
        </div>
        <div class="table-data__tool-right">
            <a href="{{URL::to('/admin/brand/brand-add')}}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                <i class="zmdi zmdi-plus"></i>Thêm dòng sản phẩm
            </a>
        </div>
    </div>
    <div class="table-responsive table-responsive-data2">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr style="text-align: center;">
                    <th>ID</th>
                    <th>Tên dòng sản phẩm</th>
                    <th>Slug dòng sản phẩm</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php $stt = 0 ?>
                @foreach($show_dsp as $item)
                <tr class="tr-shadow" style="text-align: center;">
                    @if($item->trangthai_dongsp != 0)
                        <?php $stt += 1 ?>
                        <td>{{$stt}}</td>
                        <td>{{$item->ten_dongsp}}</td>
                        <td>{{$item->slug_dongsp}}</td>
                        <td>
                            @if($item->trangthai_dongsp == 1)
                                <span class="status--process">Hiện</span>
                            @else
                                <span class="status--denied">Ẩn</span>
                            @endif
                        </td>
                        <td>
                            <div class="table-data-feature">
                                <a href="{{URL::to('/admin/brand/brand-edit/'. $item->ma_dongsp)}}" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </a>
                                <a href="{{URL::to('/admin/brand/brand-del/'. $item->ma_dongsp)}}" onclick="return confirm('Bạn muốn xóa danh mục này?')" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <i class="zmdi zmdi-delete"></i>
                                </a>
                            </div>
                        </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- END DATA TABLE -->
</div>
@endsection
