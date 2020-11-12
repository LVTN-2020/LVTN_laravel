@extends('admin.master')
@section('title', 'Nhà cung cấp')
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


    <form action="{{URL::to('/admin/supplier/supplier-add')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Tên nhà cung cấp</label>
            <input class="form-control" name="ten_ncc" placeholder="Please Enter Supplier Name" />
        </div>
        <div class="form-group">
            <label>Địa chỉ</label>
            <input class="form-control" name="diachi_ncc" placeholder="Please Enter Supplier Address" />
        </div>
        <div class="form-group">
            <label>Số điện thoại</label>
            <input class="form-control" name="phone_ncc" placeholder="Please Enter Supplier Phone" />
        </div>
        <button type="submit" class="btn btn-primary">Thêm nhà cung cấp</button>
    <form>
</div>
@endsection