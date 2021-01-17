@extends('welcome')
@section('content')
<div class="features_items search_ajax"><!--features_items-->
    <h2 class="title text-center">Sản phẩm mới nhất</h2>
    @foreach($sanpham as $item)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                    <div class="productinfo text-center">
                        <a href="{{URL::to('/chi-tiet-san-pham/'.$item->slug_sanpham.'.html')}}">
                            <img src="{{URL::to('public/admin/upload/'.$item->hinhanh)}}" width="200" height="100" alt="" />
                            <h2>{{ number_format($item->gia),',','.' }}vnđ</h2>
                            <p>{{ $item->ten_sp }}</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <nav aria-label="Page navigation example">
        @if($sanpham != '')
        <ul class="pagination pull-right">
            @if($sanpham->currentPage() != 1)
            <li class="page-item"><a class="page-link" href="{{str_replace('/?', '?', $sanpham->url($sanpham->currentPage() - 1) )}}">Previous</a></li>
            @endif
            @for($i = 1; $i <= $sanpham->lastPage(); $i = $i + 1)
            <li class="page-item  {{$sanpham->currentPage() == $i ? 'active' : ''}}"><a class="page-link" href="{{str_replace('/?', '?', $sanpham->url($i)) }}">{{ $i }}</a></li>
            @endfor
            @if($sanpham->currentPage() != $sanpham->lastPage())
            <li class="page-item"><a class="page-link" href="{{str_replace('/?', '?', $sanpham->url($sanpham->currentPage() + 1) ) }}">Next</a></li>
            @endif
        </ul>
        @else
            <p>Không có sản phẩm</p>
        @endif      
    </nav>
</div>
@endsection


@section('script')
<script>
    $('#search').on('keyup', function(){
        var numVND = new Intl.NumberFormat("vi-VN",{
            style:"currency",
            currency: "VND"
        });
        $valueSearch = $(this).val();
        // console.log($valueSearch);
        $.ajax({
            method  : 'post',
            url     : '{{ url("/tim-kiem-ajax") }}',
            dataType: 'json',
            data    : {
                '_token' : '{{ csrf_token() }}',
                'search': $valueSearch
            },
            success:function(data){
                $('.search_ajax').html('');
                $.each(data, function(index, value){
                    $('.search_ajax').append(
                            '<a href="{{ URL::to('chi-tiet-san-pham') }}/'+value.slug_sanpham+'.html">' +
                                '<div class="col-sm-4">' + 
                                    '<div class="single-products">' + 
                                        '<div class="productinfo text-center">' + 
                                            '<img src="{{ URL::to('public/admin/upload/') }}/'+value.hinhanh+' "width="200" height="100" alt="Image" >' +
                                            '<h2>'+ numVND.format(value.gia) +'</h2>' +
                                            '<p>' + value.ten_sp + '</p>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                            '</a>'
                    );
                })
                console.log(data);
            }
        });
    })
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
</script>
@endsection