@extends('welcome')
@section('content')
<div class="col-md-6">
    <!-- DATA TABLE -->
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
    <h3 class="title-5 m-b-35" style="text-align: center;">Thông tin khách hàng</h3>
    <div class="card-body card-block">
        <form action="{{URL::to('/info-user')}}" method="post" class="">
            @csrf
            <input type="hidden" name="id" value="{{ $info_user->id }}">
            <div class="form-group">
                <label>Họ tên</label>
                <input class="form-control" name="name" value="{{ $info_user->name }}" placeholder="Please Enter Username" />
            </div>
            <div class="form-group">
                <label>Số điện thoại</label>
                <input class="form-control" name="phone" value="{{ $info_user->phone }}" placeholder="Please Enter Phone" />
            </div>
            <div class="form-group">
                <label>Địa chỉ</label>
                <input class="form-control" name="address" value="{{ $info_user->address }}" placeholder="Please Enter Address" />
            </div>
            <div class="form-group">
                <label>Email</label>
                <input class="form-control" name="email" value="{{ $info_user->email }}" placeholder="Please Enter Email" />
            </div>
            <a href="{{URL::to('change-pass')}}" class="pull-right">Đổi mật khẩu</a>
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Cập nhật
            </button>
        </form>
    </div>
</div>
@endsection
@section('script')
	<script>
		$("div.alert").delay(3000).slideUp();
	</script>
@endsection