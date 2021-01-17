<h2>Xin chào {{$cus_name}}</h2>
<p>
    <b>Đặt hàng thành công tại cửa hàng chúng tôi</b>
</p>
<h4>Thông tin đơn hàng của bạn</h4>
<h4>Mã đơn hàng: {{$order->ma_dh}}</h4>
<h4>Ngày đặt hàng: {{$order->ngaydathang}}</h4>
<h4>Chi tiết đơn hàng</h4>
<table border="1" cellspacing="0" cellpadding="10" witdh=400 >
    <thead>
        <tr style="text-align: center;">
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Size</th>
            <th>Màu</th>
            <th>Số lượng</th>
            <th>Số tiền</th>
            <th>Tổng tiền</th>
            {{-- <th></th> --}}
        </tr>
    </thead>
    <tbody>
        <?php $stt = 0;?>
        @foreach($items as $item)
        <tr class="tr-shadow" style="text-align: center; ">
            <?php $stt += 1 ?>
            <td>{{ $stt }}</td>
            <td>{{$item->ten_sp}}</td>
            <td>{{$item->size}}</td>
            <td>{{$item->mau}}</td>
            <td>{{$item->soluong}}</td>
            <td>{{number_format($item->so_tien),',','.' }}vnđ</td>
            <td>{{number_format($item->tongtien),',','.' }}vnđ</td>
        </tr>
        @endforeach
        <tr class="spacer"></tr>
    </tbody>
</table>
<h4>
    <b>Cảm ơn quý khách đã ủng hộ và tin tưởng sản phẩm của chúng tôi</b>
</h4>