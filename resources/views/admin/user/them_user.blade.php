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
            <strong>Thêm</strong> user
        </div>
        <div class="card-body card-block">
            <form action="{{URL::to('/admin/user/user-add')}}" method="post" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label>Họ tên</label>
                    <input class="form-control" name="name" placeholder="Please Enter Username" />
                </div>
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input class="form-control" name="phone" placeholder="Please Enter Phone" />
                </div>
                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input class="form-control" name="address" placeholder="Please Enter Address" />
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" name="email" placeholder="Please Enter Email" />
                </div>
                <div class="form-group">
                    <label>Mật khẩu</label>
                    <input type="password" class="form-control" name="password" placeholder="Please Enter Password" />
                </div>
                <div class="form-group">
                    <label>Xác thực mật khẩu</label>
                    <input type="password" class="form-control" name="repassword" placeholder="Please Enter RePassword" />
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <label class="radio-inline">
                        <input name="level" value="2" checked="" type="radio">Admin
                    </label>
                    <label class="radio-inline">
                        <input name="level" value="1" type="radio">Member
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