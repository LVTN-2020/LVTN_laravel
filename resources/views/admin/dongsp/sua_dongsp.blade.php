@extends('admin.master')
@section('title', 'Dòng sản phẩm')
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


    <form action="{{URL::to('/admin/brand/brand-update/'. $edit_dsp->ma_dongsp)}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Tên danh mục</label>
            <input class="form-control" name="tendongsp" value="{{ $edit_dsp->ten_dongsp }}" placeholder="Please Enter Category Name" />
        </div>
        <div class="form-group">
            <label>Slug danh mục</label>
            <input class="form-control" name="slug_dongsp" value="{{ $edit_dsp->slug_dongsp }}" placeholder="Please Enter Category Name" />
        </div>
        <div class="form-group">
            <label>Trạng thái</label>
            <select class="form-control" name="trangthai">
                @if($edit_dsp->trangthai_dongsp == 0)
                <option value="{{ $edit_dsp->trangthai_dongsp }}">Ẩn</option>
                <option value="1">Hiện</option>
                @else
                <option value="{{ $edit_dsp->trangthai_dongsp }}">Hiện</option>
                <option value="0">Ẩn</option>
                @endif
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Sửa dòng sản phẩm</button>
    <form>
</div>
@endsection