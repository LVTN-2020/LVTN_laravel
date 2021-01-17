@extends('welcome')
@section('content')
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Danh mục sản phẩm</h2>
    @foreach($danhmucsp_slug as $item)
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
        @if($danhmucsp_slug != '')
        <ul class="pagination pull-right">
            @if($danhmucsp_slug->currentPage() != 1)
            <li class="page-item"><a class="page-link" href="{{str_replace('/?', '?', $danhmucsp_slug->url($danhmucsp_slug->currentPage() - 1) )}}">Previous</a></li>
            @endif
            @for($i = 1; $i <= $danhmucsp_slug->lastPage(); $i = $i + 1)
            <li class="page-item  {{$danhmucsp_slug->currentPage() == $i ? 'active' : ''}}"><a class="page-link" href="{{str_replace('/?', '?', $danhmucsp_slug->url($i)) }}">{{ $i }}</a></li>
            @endfor
            @if($danhmucsp_slug->currentPage() != $danhmucsp_slug->lastPage())
            <li class="page-item"><a class="page-link" href="{{str_replace('/?', '?', $danhmucsp_slug->url($danhmucsp_slug->currentPage() + 1) ) }}">Next</a></li>
            @endif
        </ul>
        
        @endif
    </nav>
</div><!--features_items-->
    
@endsection