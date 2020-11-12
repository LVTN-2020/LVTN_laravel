@extends('admin.master')
@section('title', 'Hình ảnh')
@section('action', 'thêm')
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

    <form action="{{URL::to('/admin/product/product-image-add')}}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label>Hình ảnh </label>
            <input type="file" name="fImagesDetail">
        </div>
        <div class="form-group">
            <label>Trạng thái</label>
            <select class="form-control" name="trangthai_ha">
                <option value="0">Ẩn</option>
                <option value="1">Hiện</option>
            </select>
        </div>
        <div class="form-group">
            <label>Sản phẩm</label>
            <select class="form-control" name="ma_sp">
                @foreach($show_sp as $sp)
                    <option value="{{ $sp->ma_sp }}">{{ $sp->ten_sp }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Thêm hình ảnh</button>
    <form>
</div>
@endsection