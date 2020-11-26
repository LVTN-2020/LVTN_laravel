@extends('admin.master')
@section('title', 'Dòng sản phẩm')
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
            <th>Tên dòng sản phẩm</th>
            <th>Slug</th>
            <th>Trạng thái</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt = 0 ?>
        @foreach($show_dsp as $item)
        <?php $stt = $stt + 1 ?>
        <tr class="odd gradeX" align="center">
            <td>{{ $stt }}</td>
            <td>{{ $item->ten_dongsp }}</td>
            <td>{{ $item->slug_dongsp }}</td>
            <td>
                @if($item->trangthai_dongsp == 0)
                    Ẩn 
                @else
                    Hiện
                @endif
            </td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{URL::to('/admin/brand/brand-del/'. $item->ma_dongsp)}}" onclick="return confirm('Bạn muốn xóa danh mục này?')"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{URL::to('/admin/brand/brand-edit/'. $item->ma_dongsp)}}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection