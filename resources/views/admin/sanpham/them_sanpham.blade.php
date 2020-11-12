@extends('admin.master')
@section('title', 'Sản phẩm')
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

    <form action="{{URL::to('/admin/product/product-add')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Tên sản phẩm</label>
            <input class="form-control" name="tensp" placeholder="Please Enter Product Name" />
        </div>
        <div class="form-group">
            <label>Giá</label>
            <input class="form-control" name="gia" placeholder="Please Enter Price" />
        </div>
        <div class="form-group">
            <label>Sale</label>
            <input class="form-control" name="sale" placeholder="Please Enter Sale" />
        </div>
        <div class="form-group">
            <label>Hình ảnh</label>
            <input type="file" name="fImages">
        </div>
        <div class="form-group">
            <label>Mô tả</label>
            <textarea class="form-control" rows="3" name="mota"></textarea>
        </div>
        <div class="form-group">
            <label>Check code</label>
            <input class="form-control" name="checkcode" placeholder="Please Enter Check Code" />
        </div>
        <div class="form-group">
            <label>Trạng thái</label>
            <select class="form-control" name="trangthai">
                <option value="0">Ẩn</option>
                <option value="1">Hiện</option>
            </select>
        </div>
        <div class="form-group">
            <label>Danh mục</label>
            <select class="form-control" name="danhmuc_sp">
                @foreach($show_dm as $dmuc)
                    <option value="{{ $dmuc->ma_danhmuc }}">{{ $dmuc->ten_danhmuc }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Dòng sản phẩm</label>
            <select class="form-control" name="dsp">
            @foreach($show_dsp as $dsp)
                <option value="{{ $dsp->ma_dongsp }}">{{ $dsp->ten_dongsp }}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Nhà cung cấp</label>
            <select class="form-control" name="ncc_sp">
                @foreach($show_ncc as $ncc)
                    <option value="{{ $ncc->ma_ncc}}">{{ $ncc->ten_ncc}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
    <form>
</div>
@endsection