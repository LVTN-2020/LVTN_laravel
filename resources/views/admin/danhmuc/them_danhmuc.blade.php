@extends('admin.master')
@section('title', 'Danh mục')
@section('action', 'Thêm')
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


    <form action="{{URL::to('/admin/cate/cate-add')}}" method="POST">
        @csrf
        <div class="form-group">
            <label>Tên danh mục</label>
            <input class="form-control" name="tendanhmuc" placeholder="Please Enter Category Name" />
        </div>
        <div class="form-group">
            <label>Slug danh mục</label>
            <input class="form-control" name="slug_cate" placeholder="Please Enter Category Slug" />
        </div>
        <div class="form-group">
            <label>Trạng thái</label>
            <select class="form-control" name="trangthai">
                <option value="0">Ẩn</option>
                <option value="1">Hiện</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Thêm danh mục</button>
    <form>
</div>
@endsection