@extends('admin.master')
@section('title', 'Danh mục')
@section('action', 'sửa')
@section('content')
<div class="col-lg-7" style="padding-bottom:120px">
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </div>
    @endif

    @if(session('message'))
        <div class="alert alert-{{session('flag')}}">
            {{session('message')}}
        </div>
    @endif


    <form action="{{URL::to('/admin/cate/cate-update/'. $edit_dm->ma_danhmuc)}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Tên danh mục</label>
            <input class="form-control" name="tendanhmuc" value="{{ $edit_dm->ten_danhmuc }}" placeholder="Please Enter Category Name" />
        </div>
        <div class="form-group">
            <label>Trạng thái</label>
            <select class="form-control" name="trangthai">
                @if($edit_dm->trangthai_danhmuc == 0)
                <option value="{{ $edit_dm->trangthai_danhmuc }}">Ẩn</option>
                <option value="1">Hiện</option>
                @else
                <option value="{{ $edit_dm->trangthai_danhmuc }}">Hiện</option>
                <option value="0">Ẩn</option>
                @endif
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Sửa danh mục</button>
    <form>
</div>
@endsection