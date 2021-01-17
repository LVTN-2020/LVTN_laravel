@extends('admin.master')
@section('content')

<div class="col-lg-6">
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
    <div class="card">
        <div class="card-header">
            <strong>Sửa</strong> sản phẩm
        </div>
        <div class="card-body card-block">
            <form action="{{URL::to('/admin/product/product-update/'. $edit_sp->ma_sp)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input class="form-control" name="tensp" value="{{$edit_sp->ten_sp}}" />
                </div>
                <div class="form-group">
                    <label>Giá</label>
                    <input class="form-control" name="gia" value="{{$edit_sp->gia}}" />
                </div>
                <div class="form-group">
                    <label>Sale</label>
                    <input class="form-control" name="sale" value="{{$edit_sp->sale}}" />
                </div>
                <div class="form-group">
                    <label>Hình ảnh</label>
                    <input type="file" name="fImages">
                    <img src="{{URL::to('public/admin/upload/'.$edit_sp->hinhanh)}}" height="100" width="100">
                </div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <textarea class="form-control" rows="3" name="mota" id="ckeditor1" >{{ $edit_sp->mota }}</textarea>
                </div>
                <div class="form-group">
                    <label>Check code</label>
                    <input class="form-control" name="checkcode" value="{{ $edit_sp->checkcode }}" />
                </div>
                <div class="form-group">
                    <label>Slug sản phẩm</label>
                    <input class="form-control" name="slug_sp" value="{{ $edit_sp->slug_sanpham }}" />
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select class="form-control" name="trangthai">
                        @if($edit_sp->trangthai_sp == 0)
                        <option value="{{ $edit_sp->trangthai_sp }}">Ẩn</option>
                        <option value="1">Hiện</option>
                        @else
                        <option value="{{ $edit_sp->trangthai_sp }}">Hiện</option>
                        <option value="0">Ẩn</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label>Danh mục</label>
                    <select class="form-control" name="danhmuc_sp">
                        @foreach($edit_dm as $dmuc)
                            @if($dmuc->ma_danhmuc == $edit_sp->ma_danhmuc)
                                <option selected value="{{ $dmuc->ma_danhmuc }}">{{ $dmuc->ten_danhmuc }}</option>
                            @else
                                <option value="{{ $dmuc->ma_danhmuc }}">{{ $dmuc->ten_danhmuc }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Dòng sản phẩm</label>
                    <select class="form-control" name="dsp">
                    @foreach($edit_dsp as $dsp)
                        @if($dsp->ma_dongsp == $edit_sp->ma_dongsp)
                            <option selected value="{{ $dsp->ma_dongsp }}">{{ $dsp->ten_dongsp }}</option>
                        @else
                            <option value="{{ $dsp->ma_dongsp }}">{{ $dsp->ten_dongsp }}</option>
                        @endif
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Nhà cung cấp</label>
                    <select class="form-control" name="ncc_sp">
                        @foreach($edit_ncc as $ncc)
                            @if($ncc->ma_ncc == $edit_sp->ma_ncc)
                                <option selected value="{{ $ncc->ma_ncc}}">{{ $ncc->ten_ncc}}</option>
                            @else
                                <option value="{{ $ncc->ma_ncc}}">{{ $ncc->ten_ncc}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
            </form>
        </div>
    </div>
</div>
@endsection