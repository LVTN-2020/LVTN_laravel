<?php

namespace App\Http\Controllers;

use App\Models\ChitietDH;
use App\Models\Donhang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonhangController extends Controller
{
    public function getListorder(){
        $list_dh = Donhang::all();
        return view('admin.donhang.danhsach_dh')->with('list_dh', $list_dh);
    }
    public function getEditorder($id){
        $get_orderId = Donhang::find($id);
        $ten_sp = ChitietDH::all();
        return view('admin.donhang.sua_donhang')->with('get_orderId', $get_orderId)->with('ten_sp', $ten_sp);
    }
    public function postEditorder(Request $req, $id){
        $update_order = Donhang::findOrFail($id);
        $update_order->trangthai_dh = $req->trangthai_dh;
        $update_order->save();
        return redirect('/admin/order/order-list')->with(['flag' => 'success', 'message' => 'Cập nhật đơn hàng thành công']);
    }
    public function getListdetail($id){
        $list_ctdh = DB::table('chitiet_dh as ctdh')
                        ->join('donhang as dh', 'dh.donhang_id', '=', 'ctdh.donhang_id')
                        ->join('sanpham as sp', 'sp.ma_sp', '=', 'ctdh.ma_sp')
                        ->where(['dh.donhang_id' => $id])
                        ->select('ctdh.ma_chitiet', 'ctdh.ten_sp', 'ctdh.so_tien',
                                 'ctdh.soluong', 'ctdh.size', 'ctdh.mau',
                                  'ctdh.tongtien', 'ctdh.donhang_id', 'ctdh.ma_sp',)
                        ->get();
        return view('admin.donhang.danhsach_ctdh')->with('list_ctdh', $list_ctdh);
    }
}
