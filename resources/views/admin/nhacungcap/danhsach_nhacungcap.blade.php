@extends('admin.master')
@section('title', 'Nhà cung cấp')
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
            <th style="text-align:center;">ID</th>
            <th style="text-align:center;">Tên nhà cung cấp</th>
            <th style="text-align:center;">Địa chỉ</th>
            <th style="text-align:center;">Số điện thoại</th>
            <th style="text-align:center;">Delete</th>
            <th style="text-align:center;">Edit</th>
        </tr>
    </thead>
    <tbody>
        <?php $stt = 0 ?>
        @foreach($show_ncc as $item)
        <?php $stt = $stt + 1 ?>
        <tr class="odd gradeX" align="center">
            <td>{{ $stt }}</td>
            <td>{{ $item->ten_ncc }}</td>
            <td>{{ $item->diachi }}</td>
            <td>{{ $item->sdt }}</td>
            
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{URL::to('/admin/supplier/supplier-del/'. $item->ma_ncc)}}" onclick="return confirm('Bạn muốn xóa danh mục này?')"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{URL::to('/admin/supplier/supplier-edit/'. $item->ma_ncc)}}">Edit</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection