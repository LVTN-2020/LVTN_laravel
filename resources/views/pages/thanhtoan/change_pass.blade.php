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
    <h3 class="title-5 m-b-35" style="text-align: center;">Thay đổi mật khẩu</h3>
    <div class="card-body card-block">
        <form action="{{URL::to('/change-pass')}}" method="post" class="">
            @csrf
            <input type="hidden" name="id" value="{{ $change_pass->id }}">
            <div class="form-group">
                <label>Mật khẩu</label>
                <input type="password" class="form-control" name="password" value="{{ $change_pass->password }}" placeholder="Please Enter Password" />
            </div>
            <div class="form-group">
                <label>Xác thực mật khẩu</label>
                <input type="password" class="form-control" name="repassword" value="{{ $change_pass->password }}" placeholder="Please Enter RePassword" />
            </div>
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