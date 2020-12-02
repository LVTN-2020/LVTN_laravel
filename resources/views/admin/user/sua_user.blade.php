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
            <strong>Sửa</strong> user
        </div>
        <div class="card-body card-block">
            <form action="{{URL::to('/admin/user/user-update/'. $get_id->id)}}" method="post" class="">
                @csrf
                <div class="form-group">
                    <label>Họ tên</label>
                    <input class="form-control" name="name" value="{{$get_id->name}}" placeholder="Please Enter Username" />
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input class="form-control" name="phone" value="{{$get_id->phone}}" placeholder="Please Enter Phone" />
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input class="form-control" name="address" value="{{$get_id->address}}" placeholder="Please Enter Address" />
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" name="email" value="{{$get_id->email}}" placeholder="Please Enter Email" />
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" class="form-control" name="password" value="{{$get_id->password}}" placeholder="Please Enter Password" />
                </div>
                <div class="form-group">
                    <label>Xác thực mật khẩu</label>
                    <input type="password" class="form-control" name="repassword" value="{{$get_id->password}}" placeholder="Please Enter RePassword" />
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <label class="radio-inline">
                        @if($get_id->level == 2)
                        <input name="level" value="{{$get_id->level}}" checked="" type="radio">Admin
                        @else
                        <input name="level" value="1" checked="" type="radio">Member
                        @endif
                    </label>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
            </form>
        </div>
    </div>
</div>
@endsection