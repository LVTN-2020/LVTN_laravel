@extends('welcome')
@section('content')
<div class="features_items"><!--features_items-->
    @foreach($dongsanpham_name as $item)
    <h2 class="title text-center">{{$item->ten_dongsp}}</h2>
    @endforeach

    @foreach($sanpham_slug as $item)
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
    <nav aria-label="Page navigation example">
        @php $count_page = $sanpham_slug->count() @endphp
        @if($count_page > 8)
        <ul class="pagination pull-right">
            @if($sanpham_slug->currentPage() != 1)
            <li class="page-item"><a class="page-link" href="{{str_replace('/?', '?', $sanpham_slug->url($sanpham_slug->currentPage() - 1) )}}">Previous</a></li>
            @endif
            @for($i = 1; $i <= $sanpham_slug->lastPage(); $i = $i + 1)
            <li class="page-item  {{$sanpham_slug->currentPage() == $i ? 'active' : ''}}"><a class="page-link" href="{{str_replace('/?', '?', $sanpham_slug->url($i)) }}">{{ $i }}</a></li>
            @endfor
            @if($sanpham_slug->currentPage() != $sanpham_slug->lastPage())
            <li class="page-item"><a class="page-link" href="{{str_replace('/?', '?', $sanpham_slug->url($sanpham_slug->currentPage() + 1) ) }}">Next</a></li>
            @endif
        </ul>
        @elseif(!$count_page)
            <p>Không có sản phẩm</p>
        @endif
    </nav>
</div><!--features_items-->
    
@endsection