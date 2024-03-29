<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
	<meta name="author" content="">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Shop bán giày</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
	
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('public/frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('public/frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('public/frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
	<link rel="apple-touch-icon-precomposed" href="{{asset('public/frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
	
	<style>
		.product-size{
			height:100px;
			width:400px;
			background: #f4f4f4;
		}
		.product-size ul.ulsize li, .product-color ul.ul-color li{
			border: 1px solid #dadada;
		}
		ul.ulsize, ul.ul-color{
			padding-left: 10px;
		}
		ul.ulsize li{
			float: left;
			margin-right: 5px;
			text-align: center;
			width: 40px;
			height: 40px;
			cursor: pointer;
			background: #fff;
			display: flex;
			align-items: center;
			justify-content: center;
			cursor: pointer;
		}
		ul.ulsize li.tick{
			background: url(../public/frontend/images/rsz_1checked.png) right bottom no-repeat #fff;
			border-color: red;
		}
		ul.ulsize li:hover{
			border-color: red;
		}
		.product-color{
			width: 400px;
			height: 50px;
			margin-top: 20px;
		}
		ul.ul-color li{
			float: left;
			margin-right: 10px;
			margin-top: -35px;
    		margin-left: 30px;
			text-align: center;
			width: 70px;
			height: 40px;
			cursor: pointer;
			background: #fff;
			display: flex;
			align-items: center;
			justify-content: center;
			cursor: pointer;
		}
		ul.ul-color li a{
			color: #262626;
			text-decoration: none;
		}
	</style>

</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{ URL::to('/') }}"><img src="{{asset('public/frontend/images/home/logo.png')}}" alt="" /></a>
						</div>
						
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								@if(!Auth::check())
								<li>
									<a href="{{URL::to('/get-dangnhap')}}">
										<i class="fa fa-user"></i>Tài khoản
									</a>
								</li>
								@else
								<li>
									<a href="{{URL::to('/')}}">
										<i class="fa fa-user"></i>{{Auth::user()->name}}
									</a>
								</li>
								<li>
									<a href="{{URL::to('/info-user')}}">
										<i class="fa fa-user"></i>Thong tin khach hang
									</a>
								</li>
								<li>
									<a href="{{URL::to('/info-order')}}">
										<i class="fa fa-crosshairs"></i> Đơn hàng
									</a>
								</li> 
								@endif
								<li><a href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
								<li>
									@if(Auth::check())
									<a href="{{URL::to('/logout-user')}}">
										<i class="fa fa-lock"></i>Đăng xuất
									</a>
									@endif
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-7">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{URL::to('/')}}" class="active">TRANG CHỦ</a></li>
								<li class="dropdown"><a href="#">SẢN PHẨM<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
										@foreach($dongsanpham as $dsp)
                                        <li><a href="{{URL::to('/dong-san-pham/'.$dsp->slug_dongsp.'.html')}}">{{ $dsp->ten_dongsp }}</a></li>
										@endforeach
                                    </ul>
                                </li> 
								<li><a href="{{URL::to('/')}}">GIỚI THIỆU</a></li>
								<li><a href="{{URL::to('/')}}">LIÊN HỆ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-5">
						<form action="{{URL::to('/tim-kiem')}}" method="POST">
                            {{csrf_field()}}
                        <div class="search_box pull-right">
                            <input type="text" name="search" id="search" placeholder="Tìm kiếm sản phẩm"/>
                            <input type="submit" style="margin-top:0;color:#666; width: 80px;" name="search_items" class="btn btn-primary btn-sm" value="Tìm kiếm">
                        </div>
                        </form>
						</div>	
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>MUA 1 TẶNG 1</h2>
									<p> Đón tết cùng E-shopper </p>
									<button type="button" class="btn btn-default get">Mua ngay</button>
								</div>
								<div class="col-sm-6">
									<img src="{{asset('public/frontend/images/home/girl1.jpg')}}" class="girl img-responsive" alt="" />
									<img src="{{asset('public/frontend/images/home/pricing.png')}}"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>SALE up to 30%</h2>
									<p> </p>
									<button type="button" class="btn btn-default get">Mua ngay</button>
								</div>
								<div class="col-sm-6">
									<img src="{{asset('public/frontend/images/home/girl2.jpg')}}" class="girl img-responsive" alt="" />
									<img src="{{asset('public/frontend/images/home/pricing.png')}}"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Khách hàng thân thiết</h2>
									<p>Mua hàng càng nhiều</p>
									<p>Nhận ưa đãi càng lớn</p>
									<button type="button" class="btn btn-default get">Mua ngay</button>
								</div>
								<div class="col-sm-6">
									<img src="{{asset('public/frontend/images/home/girl3.jpg')}}" class="girl img-responsive" alt="" />
									<img src="{{asset('public/frontend/images/home/pricing.png')}}" class="pricing" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Danh mục sản phẩm</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							@foreach($danhmuc as $item)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="{{URL::to('/danhmuc-sanpham/'.$item->ma_danhmuc.'.html')}}">{{$item->ten_danhmuc}}</a></h4>
								</div>
							</div>
						@endforeach
						</div><!--/category-products-->
					
						<div class="brands_products"><!--brands_products-->
							<h2>Dòng sản phẩm</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									@foreach($dongsanpham as $item)
									<li><a href="{{URL::to('/dong-san-pham/'.$item->slug_dongsp.'.html')}}"> <span class="pull-right"></span>{{$item->ten_dongsp}}</a></li>
									@endforeach
								</ul>
							</div>
						</div><!--/brands_products-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					@yield('content')		
				</div>
			</div>
		</div>
	</section>
	

  
    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
	<script src="{{asset('public/frontend/js/main.js')}}"></script>

	<script>
		$("div.alert").delay(3000).slideUp();
	</script>
	
	<script>
		$(document).on('click', 'ul li', function(){
			var tick = $(this).addClass('tick').siblings().removeClass('tick');
			// console.log(tick);
			var id_size = $('.tick input[name="size_id"]', this).val();
			console.log(id_size);
		})
	</script>
	@yield('script')
</body>
</html>