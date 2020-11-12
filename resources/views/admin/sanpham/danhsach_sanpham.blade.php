@extends('admin.master')
@section('title', 'Sản phẩm')
@section('action', 'xem')
@section('content')
@if(session('message'))
    <div class="alert alert-{{session('flag')}}">
        {{session('message')}}
    </div>
@endif
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Sale</th>
            <th>Hình ảnh</th>
            <th>Mô tả</th>
            <th>Trạng thái</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt = 0 ?>
        @foreach($show_sp as $item)
        <?php $stt += 1 ?>
        <tr class="odd gradeX" align="center">
            <td>{{ $stt }}</td>
            <td>{{ $item->ten_sp }}</td>
            <td>{{ number_format($item->gia),0,",","." }}vnđ</td>
            <td>{{ number_format($item->sale),0,",","." }}vnđ</td>
            <td><img src="{{URL::to('public/admin/upload/'.$item->hinhanh)}}" width=200 height=100></td>
            <td>{{ $item->mota }}</td>
            <td>
                @if($item->trangthai_sp == 0)
                    Ẩn
                @else
                    Hiện
                @endif
            </td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{URL::to('/admin/product/product-del/'.$item->ma_sp)}}" onclick="return confirm('Bạn muốn xóa danh mục này?')"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{URL::to('/admin/product/product-edit/'.$item->ma_sp)}}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection