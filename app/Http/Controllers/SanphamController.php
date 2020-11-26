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

class SanphamController extends Controller
{
    public function getAddProduct(){
        $show_dm = Danhmuc::select('ma_danhmuc', 'ten_danhmuc', 'trangthai_danhmuc', 'slug_danhmuc')->get();
        $show_dsp = Dongsanpham::select('ma_dongsp', 'ten_dongsp', 'trangthai_dongsp', 'slug_dongsp')->get();
        $show_ncc = Nhacungcap::select('ma_ncc', 'ten_ncc', 'diachi', 'sdt')->get();
        return view('admin.sanpham.them_sanpham')
                ->with('show_dm', $show_dm)
                ->with('show_dsp', $show_dsp)
                ->with('show_ncc', $show_ncc);
    }
    
    public function postAddProduct(Request $req){

        $this->validate($req, [
            'tensp'      => 'required|unique:sanpham,ten_sp',
            'fImages'    => 'required|mimes:jpeg,jpg,png',
            'danhmuc_sp' => 'required',
            'dsp'        => 'required',
            'ncc_sp'     => 'required',
        ], [
            'tensp.required'   => 'Vui lòng điền tên sản phẩm',
            'tensp.unique'     => 'Không được trùng tên sản phẩm',
            'fImages.required' => 'Vui lòng không để hình ảnh rỗng',
            'fImages.mimes'    => 'Vui lòng định dạng đúng jpeg, jpg hoặc png',
            'danhmuc_sp'       => 'Vui lòng chọn danh mục',
            'dsp'              => 'Vui lòng chọn dòng sản phẩm',
            'ncc_sp'           => 'Vui lòng chọn nhà cung cấp',
        ]);
        
        $slug_sp = str_replace(' ', '-', $req->slug_sp);

        $file_name            = $req->file('fImages')->getClientOriginalName();
        $add_sp               = new Sanpham();
        $add_sp->ten_sp       = $req->tensp;
        $add_sp->gia          = $req->gia;
        $add_sp->sale         = $req->sale;
        $add_sp->hinhanh      = $file_name;
        $add_sp->mota         = $req->mota;
        $add_sp->checkcode    = $req->checkcode;
        $add_sp->slug_sanpham = $slug_sp;
        $add_sp->trangthai_sp = $req->trangthai;
        $add_sp->ma_danhmuc   = $req->danhmuc_sp;
        $add_sp->ma_dongsp    = $req->dsp;
        $add_sp->ma_ncc       = $req->ncc_sp;

        $req->file('fImages')->move('public/admin/upload/', $file_name);
        $add_sp->save();
        return redirect('/admin/product/product-add')->with(['flag' => 'success', 'message' => 'Thêm sản phẩm thành công']);
    }

    public function getListProduct(){
        $show_sp = Sanpham::all();
        return view('admin.sanpham.danhsach_sanpham')->with('show_sp', $show_sp);
    }

    public function getEditProduct($id){
        $edit_sp = Sanpham::findOrFail($id);
        $edit_dm = Danhmuc::all();
        $edit_dsp = Dongsanpham::all();
        $edit_ncc = Nhacungcap::all();
        return view('admin.sanpham.sua_sanpham')
                ->with('edit_sp', $edit_sp)
                ->with('edit_dm', $edit_dm)
                ->with('edit_dsp', $edit_dsp)
                ->with('edit_ncc', $edit_ncc);
    }

    public function postEditProduct(Request $req, $id){

        $slug = str_replace(' ', '-', $req->slug_sp);

        $file_name             = $req->file('fImages')->getClientOriginalName();
        $sanpham               = Sanpham::find($id);
        $sanpham->ten_sp       = $req->tensp;
        $sanpham->gia          = $req->gia;
        $sanpham->sale         = $req->sale;
        $sanpham->hinhanh      = $file_name;
        $sanpham->mota         = $req->mota;
        $sanpham->checkcode    = $req->checkcode;
        $sanpham->slug_sanpham = $slug;
        $sanpham->trangthai_sp = $req->trangthai;
        $sanpham->ma_danhmuc   = $req->danhmuc_sp;
        $sanpham->ma_dongsp    = $req->dsp;
        $sanpham->ma_ncc       = $req->ncc_sp;

        $req->file('fImages')->move('public/admin/upload/', $file_name);
        $sanpham->save();
        return redirect('/admin/product/product-list')->with(['flag' => 'success', 'message' => 'Cập nhật sản phẩm thành công']);
    }

    public function getDelProduct($id){
        $del_img_sp = Sanpham_ha::join('sanpham as sp', 'sanpham_hinhanh.ma_sp', 'sp.ma_sp')
                                ->where('sanpham_hinhanh.ma_sp', $id)
                                ->get();
        foreach($del_img_sp as $value){
            File::delete('public/admin/upload/details/'. $value['hinhanh']);
        }
        $del_size_sp = Sanpham_size::join('sanpham as sp', 'sanpham_size.ma_sp', 'sp.ma_sp')
                                    ->where('sanpham_size.ma_sp', $id)
                                    ->delete();
        $del_color_sp = Sanpham_mau::join('sanpham as sp', 'sanpham_mau.ma_sp', 'sp.ma_sp')
                                ->where('sanpham_mau.ma_sp', $id)
                                ->delete();
        $del_sp = Sanpham::find($id);
        File::delete('public/admin/upload/'. $del_sp->hinhanh);
        $del_sp->delete();
        return redirect('/admin/product/product-list')->with(['flag' => 'success', 'message' => 'Xóa sản phẩm thành công']);
        
    }

    //Thêm hình ảnh
    public function getAddProductImage(){
        $show_sp = Sanpham::select('ma_sp', 'ten_sp')->get();
        return view('admin.sanpham.them_ha_sp')->with('show_sp', $show_sp);
    }
    public function postAddProductImage(Request $req){
        $file_name = $req->file('fImagesDetail')->getClientOriginalName();
        $add_img   = new Sanpham_ha();

        $add_img->hinhanh           = $file_name;
        $add_img->trangthai_hinhanh = $req->trangthai_ha;
        $add_img->ma_sp             = $req->ma_sp;
        $req->file('fImagesDetail')->move('public/admin/upload/details/', $file_name);

        $add_img->save();
        return redirect('/admin/product/product-image-add')->with(['flag' => 'success', 'message' => 'Thêm hình ảnh thành công']);
    }

    //Thêm size
    public function getAddProductSize(){
        $show_sp = Sanpham::select('ma_sp', 'ten_sp')->get();
        return view('admin.sanpham.them_size_sp')->with('show_sp', $show_sp);
    }
    public function postAddProductSize(Request $req){
        $add_size                 = new Sanpham_size();
        $add_size->size           = $req->size;
        $add_size->trangthai_size = $req->trangthai_size;
        $add_size->ma_sp          = $req->ma_sp;

        $add_size->save();
        return redirect('/admin/product/product-size-add')->with(['flag' => 'success', 'message' => 'Thêm size thành công']);
    }

    //Thêm màu
    public function getAddProductColor(){
        $show_sp = Sanpham::select('ma_sp', 'ten_sp')->get();
        return view('admin.sanpham.them_color_sp')->with('show_sp', $show_sp);
    }
    public function postAddProductColor(Request $req){
        $add_color                 = new Sanpham_mau();
        $add_color->mau           = $req->color;
        $add_color->trangthai_mau = $req->trangthai_color;
        $add_color->ma_sp          = $req->ma_sp;

        $add_color->save();
        return redirect('/admin/product/product-color-add')->with(['flag' => 'success', 'message' => 'Thêm màu thành công']);
    }
    // ket thuc backend
    public function chitiet_sp($id)
    {
        $danhmuc = Danhmuc::select('ma_danhmuc', 'ten_danhmuc', 'trangthai_danhmuc', 'slug_danhmuc')->get();
        $dongsanpham = Dongsanpham::select('ma_dongsp', 'ten_dongsp', 'trangthai_dongsp', 'slug_dongsp')->get();
        
        $chitiet_sanpham = DB::table('sanpham as sp')
            ->join('dongsanpham as dsp','sp.ma_dongsp','=','dsp.ma_dongsp')
            ->join('danhmuc as dmuc','sp.ma_danhmuc','=','dmuc.ma_danhmuc')
            ->join('nhacungcap as ncc','sp.ma_ncc','=','ncc.ma_ncc')
            // ->join('sanpham_hinhanh as sp_ha', 'sp_ha.ma_sp', '=', 'sp.ma_sp')
            ->where('sp.ma_sp',$id)->get();
        $get_sub_img = DB::table('sanpham_hinhanh as sp_ha')
                            ->join('sanpham as sp', 'sp_ha.ma_sp', '=', 'sp.ma_sp')
                            ->where('sp.ma_sp', $id)
                            ->select('sp_ha.ma_hinhanh', 'sp_ha.hinhanh', 'sp_ha.trangthai_hinhanh')
                            ->get();
       $get_size = DB::table('sanpham_size as size')
        ->join('sanpham as sp','size.ma_sp', '=','sp.ma_sp')
        ->where('sp.ma_sp',$id)
        ->select('size.ma_size','size.size','size.trangthai_size')->get(); 
        $get_mau = DB::table('sanpham_mau as mau')
        ->join('sanpham as sp','mau.ma_sp', '=','sp.ma_sp')
        ->where('sp.ma_sp',$id)
        ->select('mau.ma_mau','mau.mau','mau.trangthai_mau')->get(); 
        return view('pages.sanpham.show_chitietsp')
        ->with('danhmuc', $danhmuc)
        ->with('chitiet_sanpham', $chitiet_sanpham)
        ->with('dongsanpham', $dongsanpham)
        ->with('get_size', $get_size)
        ->with('get_mau',$get_mau)
        ->with('get_sub_img', $get_sub_img);

    }
}
