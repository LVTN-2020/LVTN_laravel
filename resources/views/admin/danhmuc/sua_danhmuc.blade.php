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
            <strong>Sửa</strong> danh mục
        </div>
        {{-- @php echo '<pre>'; print_r($id);  echo '</pre>'; @endphp --}}
        <div class="card-body card-block">
            <form action="{{URL::to('/admin/cate/cate-update/'. $edit_dm->ma_danhmuc)}}" method="post" class="">
                @csrf
                <div class="form-group">
                    <label class=" form-control-label">Tên danh mục</label>
                    <input type="text" name="tendanhmuc" value="{{$edit_dm->ten_danhmuc}}" class="form-control">
                    {{-- <span class="help-block">Please enter your email</span> --}}
                </div>
                <div class="form-group">
                    <label for="nf-password" class=" form-control-label">Slug danh mục</label>
                    <input type="text" name="slug_cate" value="{{$edit_dm->slug_danhmuc}}" class="form-control">
                    {{-- <span class="help-block">Please enter your password</span> --}}
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select class="form-control" name="trangthai">
                        @if($edit_dm->trangthai_danhmuc == 1)
                            <option value="{{$edit_dm->trangthai_danhmuc == 1}}">Hiện</option>
                            <option value="0">Ẩn</option>
                        @else
                            <option value="{{$edit_dm->trangthai_danhmuc == 0}}">Ẩn</option>
                            <option value="1">Hiện</option>
                        @endif
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