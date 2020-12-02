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
            <strong>Thêm</strong> nhà cung cấp
        </div>
        <div class="card-body card-block">
            <form action="{{URL::to('/admin/supplier/supplier-add')}}" method="post" class="">
                @csrf
                <div class="form-group">
                    <label class=" form-control-label">Tên nhà cung cấp</label>
                    <input type="text" name="ten_ncc" placeholder="Vui lòng nhập tên dòng sản phẩm" class="form-control">
                </div>
                <div class="form-group">
                    <label class=" form-control-label">Địa chỉ</label>
                    <input type="text" name="diachi_ncc" placeholder="Vui lòng nhập tên slug" class="form-control">
                </div>
                <div class="form-group">
                    <label class=" form-control-label">Số điện thoại</label>
                    <input type="text" name="phone_ncc" placeholder="Vui lòng nhập tên slug" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
            </form>
        </div>
    </div>
</div>
@endsection