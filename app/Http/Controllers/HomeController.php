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

class HomeController extends Controller
{
    public function index(){
        $danhmuc = Danhmuc::select('ma_danhmuc', 'ten_danhmuc', 'trangthai_danhmuc', 'slug_danhmuc')->get();
        $dongsanpham = Dongsanpham::select('ma_dongsp', 'ten_dongsp', 'trangthai_dongsp', 'slug_dongsp')->get();
        $sanpham = Sanpham::paginate(9);
        return view('pages.home') 
        ->with('danhmuc', $danhmuc)
        ->with('dongsanpham', $dongsanpham)
        ->with('sanpham', $sanpham);
    }
    public function show_dongsp_home(string $slug){
        $danhmuc = Danhmuc::select('ma_danhmuc', 'ten_danhmuc', 'trangthai_danhmuc', 'slug_danhmuc')->get();
        $dongsanpham = Dongsanpham::select('ma_dongsp', 'ten_dongsp', 'trangthai_dongsp', 'slug_dongsp')->get();
        $sanpham_slug = Dongsanpham::join('sanpham as sp', 'dongsanpham.ma_dongsp', '=', 'sp.ma_dongsp')
                                ->where('dongsanpham.slug_dongsp', $slug)
                                ->select('sp.ma_sp', 'sp.ten_sp', 'sp.gia', 'sp.hinhanh', 'sp.mota', 'sp.checkcode', 'sp.slug_sanpham')
                                ->paginate(9);
        $dongsanpham_name = DB::table('dongsanpham')->where('.slug_dongsp',$slug)->limit(1)->get();
        return view('pages.dongsanpham.show_dongsp') 
        ->with('danhmuc', $danhmuc)
        ->with('dongsanpham', $dongsanpham)
        ->with('dongsanpham_name', $dongsanpham_name)
        ->with('sanpham_slug', $sanpham_slug);

    }
    public function show_danhmuc_home(string $ma_danhmuc){
        $danhmuc = Danhmuc::select('ma_danhmuc', 'ten_danhmuc', 'trangthai_danhmuc', 'slug_danhmuc')->get();
        $dongsanpham = Dongsanpham::select('ma_dongsp', 'ten_dongsp', 'trangthai_dongsp', 'slug_dongsp')->get();
        $danhmucsp_slug = Danhmuc::join('sanpham as sp', 'danhmuc.ma_danhmuc', '=', 'sp.ma_danhmuc')
                                 ->where('danhmuc.ma_danhmuc', $ma_danhmuc)
                                 ->select('sp.ma_sp', 'sp.ten_sp', 'sp.gia', 'sp.hinhanh', 'sp.mota', 'sp.checkcode', 'sp.slug_sanpham')
                                 ->paginate(9);
        return view('pages.danhmuc.show_danhmuc_sanpham') 
        ->with('danhmuc', $danhmuc)
        ->with('dongsanpham', $dongsanpham)
        ->with('danhmucsp_slug', $danhmucsp_slug);

    }
    public function chitiet_sp(string $slug_sp)
    {
        $danhmuc = Danhmuc::select('ma_danhmuc', 'ten_danhmuc', 'trangthai_danhmuc', 'slug_danhmuc')->get();
        $dongsanpham = Dongsanpham::select('ma_dongsp', 'ten_dongsp', 'trangthai_dongsp', 'slug_dongsp')->get();
        
        $chitiet_sanpham = DB::table('sanpham as sp')
            ->join('dongsanpham as dsp','sp.ma_dongsp','=','dsp.ma_dongsp')
            ->join('danhmuc as dmuc','sp.ma_danhmuc','=','dmuc.ma_danhmuc')
            ->join('nhacungcap as ncc','sp.ma_ncc','=','ncc.ma_ncc')
            ->where('sp.slug_sanpham',$slug_sp)
            ->select('sp.ma_sp', 'sp.ten_sp', 'sp.gia', 'sp.hinhanh', 'sp.mota', 'sp.checkcode', 'sp.slug_sanpham',
                     'sp.ma_danhmuc', 'sp.ma_dongsp', 'sp.ma_ncc',
                     'dsp.ten_dongsp', 'dmuc.ten_danhmuc', 'ncc.ten_ncc')
            ->get();
            foreach($chitiet_sanpham as $item => $value){
                $ma_dongsp = $value->ma_dongsp;
            }
            $related_sanpham = DB::table('sanpham')
            ->join('danhmuc','danhmuc.ma_danhmuc','=','sanpham.ma_danhmuc')
            ->join('dongsanpham','dongsanpham.ma_dongsp','=','sanpham.ma_dongsp')
            ->where('dongsanpham.ma_dongsp',$ma_dongsp)->whereNotIn('sanpham.slug_sanpham',[$slug_sp])
            ->get();
        $get_sub_img = DB::table('sanpham_hinhanh as sp_ha')
                            ->join('sanpham as sp', 'sp_ha.ma_sp', '=', 'sp.ma_sp')
                            ->where('sp.slug_sanpham', $slug_sp)
                            ->select('sp_ha.ma_hinhanh', 'sp_ha.hinhanh', 'sp_ha.trangthai_hinhanh')
                            ->get();

        $get_size = DB::table('sanpham_size as size')
                    ->join('sanpham as sp','size.ma_sp', '=','sp.ma_sp')
                    ->where('sp.slug_sanpham',$slug_sp)
                    ->select('size.ma_size','size.size','size.trangthai_size')
                    ->get(); 

        $get_mau = DB::table('sanpham_mau as mau')
                    ->join('sanpham as sp','mau.ma_sp', '=','sp.ma_sp')
                    ->where('sp.slug_sanpham',$slug_sp)
                    ->select('mau.ma_mau','mau.mau','mau.trangthai_mau')
                    ->get(); 

        return view('pages.sanpham.show_chitietsp')
                ->with('danhmuc', $danhmuc)
                ->with('relate',$related_sanpham)
                ->with('chitiet_sanpham', $chitiet_sanpham)
                ->with('dongsanpham', $dongsanpham)
                ->with('get_size', $get_size)
                ->with('get_mau',$get_mau)
                ->with('get_sub_img', $get_sub_img);

    }

    public function live_search(Request $req){
        $keyword = $req->search;
        $danhmuc = Danhmuc::select('ma_danhmuc', 'ten_danhmuc', 'trangthai_danhmuc', 'slug_danhmuc')->get();
        $dongsanpham = Dongsanpham::select('ma_dongsp', 'ten_dongsp', 'trangthai_dongsp', 'slug_dongsp')->get();
        $search = DB::table('sanpham')
                    ->where('ten_sp', 'LIKE', '%'.$keyword.'%');
        if(!$search){
            echo "không tìm thấy kết quả";
        }else{
            $search = $search->get();
        }
        return view('pages.sanpham.timkiem')
                ->with('danhmuc', $danhmuc)
                ->with('dongsanpham', $dongsanpham)
                ->with('search', $search);
    }

    public function live_search_ajax(Request $req){
        $valueSearch = $req->search;
        if($req->ajax()){
            $output = '';
            $product = DB::table('sanpham')->where('ten_sp', 'LIKE', '%'.$valueSearch.'%')->get();
            return json_encode($product);
        }
    }
}
