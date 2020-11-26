@extends('admin.master')
@section('title', 'Dòng sản phẩm')
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


    <form action="{{URL::to('/admin/brand/brand-add')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Tên dòng sản phẩm</label>
            <input class="form-control" name="tendongsp" placeholder="Please Enter Brand Name" />
        </div>
        <div class="form-group">
            <label>Slug dòng sản phẩm</label>
            <input class="form-control" name="slug_dongsp" placeholder="Please Enter Brand Slug" />
        </div>
        <div class="form-group">
            <label>Trạng thái</label>
            <select class="form-control" name="trangthai">
                <option value="0">Ẩn</option>
                <option value="1">Hiện</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Thêm dòng sản phẩm</button>
    <form>
</div>
@endsection