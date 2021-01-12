<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Inbox</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('public/admin/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('public/admin/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('public/admin/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('public/admin/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('public/admin/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('public/admin/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('public/admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('public/admin/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('public/admin/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('public/admin/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('public/admin/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('public/admin/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

    <!-- Main CSS-->
    <link href="{{asset('public/admin/css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="{{asset('public/admin/images/icon/logo.png')}}" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="active has-sub">
                            <a class="js-arrow" href="{{URL::to('/admin')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="{{URL::to('/admin/cate/cate-list')}}">
                                <i class="fa fa-list-alt"></i>Quản lý danh mục</a>
                        </li>
                        <li>
                            <a href="{{URL::to('/admin/brand/brand-list')}}">
                                <i class="fa fa-trademark"></i>Quản lý dòng sản phẩm</a>
                        </li>
                        <li>
                            <a href="{{URL::to('/admin/supplier/supplier-list')}}">
                                <i class="fa fa-industry"></i>Quản lý nhà cung cấp</a>
                        </li>
                        <li>
                            <a href={{URL::to('/admin/product/product-list')}}>
                                <i class="fa fa-cube fa-fw"></i>Quản lý sản phẩm</a>
                        </li>
                        <li>
                            <a href="{{URL::to('/admin/user/user-list')}}">
                                <i class="fa fa-users fa-fw"></i>Quản lý người dùng</a>
                        </li>
                        <li>
                            <a href="{{URL::to('/admin/order/order-list')}}">
                                <i class="fa fa-users fa-fw"></i>Quản lý đơn hàng</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="{{URL::to('/admin')}}">
                    <img src="{{asset('public/admin/images/icon/logo.png')}}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="{{URL::to('/admin')}}">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="{{URL::to('/admin/cate/cate-list')}}">
                                <i class="fa fa-list-alt"></i>Quản lý danh mục</a>
                        </li>
                        <li>
                            <a href="{{URL::to('/admin/brand/brand-list')}}">
                                <i class="fa fa-trademark"></i>Quản lý dòng sản phẩm</a>
                        </li>
                        <li>
                            <a href="{{URL::to('/admin/supplier/supplier-list')}}">
                                <i class="fa fa-industry"></i>Quản lý nhà cung cấp</a>
                        </li>
                        <li>
                            <a href={{URL::to('/admin/product/product-list')}}>
                                <i class="fa fa-cube fa-fw"></i>Quản lý sản phẩm</a>
                        </li>
                        <li>
                            <a href="{{URL::to('/admin/user/user-list')}}">
                                <i class="fa fa-users fa-fw"></i>Quản lý người dùng</a>
                        </li>
                        <li>
                            <a href="{{URL::to('/admin/order/order-list')}}">
                                <i class="fa fa-users fa-fw"></i>Quản lý đơn hàng</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            
                            <div class="header-button" style="margin-left: 85%;">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="content">
                                            @if(Auth::check())
                                            <a class="js-acc-btn" href="#">{{Auth::user()->name}}</a>
                                            @endif
                                        </div>
                                        <div class="account-dropdown js-dropdown" style="mix-width: 150px;">
                                            <div class="account-dropdown__footer">
                                                <a href="{{URL::to('/logout-admin')}}">
                                                    <i class="zmdi zmdi-power"></i>Đăng xuất</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE CONTAINER-->

    </div>

    <!-- Jquery JS-->
    <script src="{{asset('public/admin/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('public/admin/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('public/admin/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('public/admin/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{asset('public/admin/vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('public/admin/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('public/admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{asset('public/admin/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('public/admin/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{asset('public/admin/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('public/admin/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('public/admin/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('public/admin/vendor/select2/select2.min.js')}}"></script>
    
    {{-- CKEDITOR --}}
    <script src="{{asset('public/admin/ckeditor/ckeditor.js')}}"></script>
    <script> CKEDITOR.replace('ckeditor1'); </script>

    {{-- <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> --}}
    <script src="{{asset('public/admin/js/dataTable.min.js')}}"></script>


    <!-- Main JS-->
    <script src="{{asset('public/admin/js/main.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                pageLength : 5,
                lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
                "searching": true
            });
            $(".dataTables_empty").empty();
        } );
        $("div.alert").delay(3000).slideUp();
    </script>

</body>

</html>
<!-- end document-->
