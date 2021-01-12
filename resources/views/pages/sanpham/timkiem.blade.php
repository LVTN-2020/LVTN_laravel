@extends('welcome')
@section('content')
<div class="features_items"><!--features_items-->
        <h2 class="title text-center">Kết quả tìm kiếm</h2>
        @foreach($search as $item)
        <a href="{{URL::to('/chi-tiet-san-pham/'.$item->slug_sanpham.'.html')}}">
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{URL::to('public/admin/upload/'.$item->hinhanh)}}" width="200" height="100" alt="" />
                                <h2>{{ number_format($item->gia),',','.' }}vnđ</h2>
                                <p>{{ $item->ten_sp }}</p>
                            </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
@endsection