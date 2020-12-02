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
            <strong>Sửa</strong> nhà cung cấp
        </div>
        <div class="card-body card-block">
            <form action="{{URL::to('/admin/supplier/supplier-update/'. $edit_ncc->ma_ncc)}}" method="post" class="">
                @csrf
                <div class="form-group">
                    <label class=" form-control-label">Tên nhà cung cấp</label>
                    <input type="text" name="ten_ncc" value="{{$edit_ncc->ten_ncc}}" class="form-control">
                </div>
                <div class="form-group">
                    <label class=" form-control-label">Địa chỉ</label>
                    <input type="text" name="diachi" value="{{$edit_ncc->diachi}}" class="form-control">
                </div>
                <div class="form-group">
                    <label class=" form-control-label">Số điện thoại</label>
                    <input type="text" name="phone" value="{{$edit_ncc->sdt}}" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
            </form>
        </div>
    </div>
</div>
@endsection