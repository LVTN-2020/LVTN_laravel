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
            <strong>Thêm</strong> size
        </div>
        <div class="card-body card-block">
            <form action="{{URL::to('/admin/product/product-size-add')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label>Size</label>
                    <input class="form-control" name="size" placeholder="Please Enter Size" />
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select class="form-control" name="trangthai_size">
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
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
            </form>
        </div>
    </div>
</div>
@endsection