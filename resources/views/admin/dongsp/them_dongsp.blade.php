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
            <strong>Thêm</strong> dòng sản phẩm
        </div>
        <div class="card-body card-block">
            <form action="{{URL::to('/admin/brand/brand-add')}}" method="post" class="">
                @csrf
                <div class="form-group">
                    <label class=" form-control-label">Tên dòng sản phẩm</label>
                    <input type="text" name="tendongsp" placeholder="Vui lòng nhập tên dòng sản phẩm" class="form-control">
                    {{-- <span class="help-block">Please enter your email</span> --}}
                </div>
                <div class="form-group">
                    <label for="nf-password" class=" form-control-label">Slug dòng sản phẩm</label>
                    <input type="text" name="slug_dongsp" placeholder="Vui lòng nhập tên slug" class="form-control">
                    {{-- <span class="help-block">Please enter your password</span> --}}
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select class="form-control" name="trangthai">
                        <option value="0">Ẩn</option>
                        <option value="1">Hiện</option>
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