<?php

namespace App\Http\Controllers;

use App\Models\Danhmuc;
use App\Models\Dongsanpham;
use App\Models\Nhacungcap;
use App\Models\Sanpham;
use App\Models\Sanpham_ha;
use App\Models\Sanpham_mau;
use App\Models\Sanpham_size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Cart;

class GiohangController extends Controller
{   

    
    public function save_cart(Request $request){
       
        $sanphamid    = $request->sanphamid_hidden;
        $quantity     = (int)$request->soluong;
        $size         = $request->input('size_id');
        // $size         = $request->get('size');
        $color        = $request->color_id;
        $sanpham_info = DB::table('sanpham')->where('ma_sp',$sanphamid)->first();
        $data['id']               = $sanpham_info->ma_sp;
        $data['qty']              = $quantity;
        $data['name']             = $sanpham_info->ten_sp;
        $data['price']            = $sanpham_info->gia;
        $data['weight']           = $sanpham_info->gia;
        $data['options']['image'] = $sanpham_info->hinhanh;
        $data['options']['size']  = $size;
        $data['options']['color'] = $color;
        
        Cart::add($data);
        
        // return $size;
        return redirect('/show-cart'); 
       
    }
    public function show_giohang(){
        $danhmuc     = Danhmuc::select('ma_danhmuc', 'ten_danhmuc', 'trangthai_danhmuc', 'slug_danhmuc')->get();
        $dongsanpham = Dongsanpham::select('ma_dongsp', 'ten_dongsp', 'trangthai_dongsp', 'slug_dongsp')->get();
        return view('pages.giohang.show_giohang')
        ->with('danhmuc', $danhmuc)
        ->with('dongsanpham', $dongsanpham);

    }
    public function delete_giohang($rowId){
        Cart::update($rowId,0);
        return redirect('/show-cart'); 
    }
    public function capnhat_giohang(Request $request){
        $this->validate($request, [
            'quantity'   => 'required|numeric|gt:0',
        ], [
            'quantity.required' => 'Vui lòng không để số lượng rỗng',
            'quantity.numeric'  => 'Vui lòng nhập lại số lượng bằng số',
            'quantity.gt'       => 'Vui lòng nhập lại số lượng > 0',
        ]);

        $rowId = $request->rowId_giohang;
        $qty = (int)$request->quantity;
        Cart::update($rowId,$qty);
        return redirect('/show-cart');
    }
}
