@extends('welcome')
@section('content')

<section id="form"><!--form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-1">
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
					<div class="login-form"><!--login form-->
					<h2>Đăng nhập tài khoản</h2>
					<form action="{{URL::to('/get-dangnhap')}}" method="POST">
						@csrf
						<input type="text" name="user_email" placeholder="Email" />
						<input type="password" name="user_password" placeholder="Password" />
						<span>
							<input type="checkbox" class="checkbox"> 
							Ghi nhớ mật khẩu
						</span>
						<button type="submit" class="btn btn-default">Đăng nhập</button>
					</form>
				</div><!--/login form-->
			</div>
			<div class="col-sm-1">
				<h2 class="or">hoặc</h2>
			</div>
			@include('pages.thanhtoan.dangky_thanhtoan')
		</div>
	</div>
</section><!--/form-->

@endsection