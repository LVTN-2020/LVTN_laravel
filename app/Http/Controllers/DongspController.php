<?php

namespace App\Http\Controllers;


use App\Models\Dongsanpham;
use App\Models\Danhmuc;
use App\Models\Sanpham;
use Illuminate\Http\Request;

class DongspController extends Controller
{
    public function getAddBrand(){
        return view('admin.dongsp.them_dongsp');
    }
    
    public function postAddBrand(Request $req){
        
        $this->validate($req, [
            'tendongsp' => 'required|unique:dongsanpham,ten_dongsp',
            'slug_dongsp' => 'required',
        ], [
            'tendongsp.required' => 'Vui lòng điền tên dòng sản phẩm',
            'tendongsp.unique' => 'Không được trùng tên dòng sản phẩm',
            'slug_dongsp.required' => 'Vui lòng điền tên dòng bi danh sản phẩm',
        ]);

        $slug_dongsp = str_replace(' ', '-', $req->slug_dongsp);

        $dsp = new Dongsanpham;
        $dsp->ten_dongsp = $req->tendongsp;
        $dsp->slug_dongsp = $slug_dongsp;
        $dsp->trangthai_dongsp = $req->trangthai;
        if($dsp->trangthai_dongsp == 0){
            $dsp->save(['trangthai_dongsp' => 0]);
        }else{
            $dsp->save(['trangthai_dongsp' => 1]);
        }
        $dsp->save();
        return redirect('/admin/brand/brand-list')->with(['flag' => 'success', 'message' => 'Thêm dòng sản phẩm thành công']);
    }

    public function getListBrand(){
        $show_dsp = Dongsanpham::select('ma_dongsp', 'ten_dongsp', 'trangthai_dongsp', 'slug_dongsp')->get();
        return view('admin.dongsp.danhsach_dongsp')->with('show_dsp', $show_dsp);
    }

    public function getEditBrand($id){
        $edit_dsp = Dongsanpham::findOrFail($id);
        return view('/admin/dongsp.sua_dongsp')->with('edit_dsp', $edit_dsp);
    }

    public function postEditBrand(Request $req, $id){

        $this->validate($req, [
            'tendongsp' => 'required',
            'slug_dongsp' => 'required',
        ], [
            'tendongsp.required' => 'Vui lòng điền tên dòng sản phẩm',
            'slug_dongsp.required' => 'Vui lòng điền tên dòng bi danh sản phẩm',
        ]);

        $slug_dongsp = str_replace(' ', '-', $req->slug_dongsp);

        $edit = Dongsanpham::find($id);
        $edit->ten_dongsp = $req->tendongsp;
        $edit->slug_dongsp = $slug_dongsp;
        $edit->trangthai_dongsp = $req->trangthai;
        if($edit->trangthai_dongsp == 0){
            $edit->save(['trangthai_dongsp' => 0]);
        }else{
            $edit->save(['trangthai_dongsp' => 1]);
        }
        $edit->save();
        return redirect('/admin/brand/brand-list')->with(['flag' => 'success', 'message' => 'Sửa dòng sản phẩm thành công']);
    }

    public function getDelBrand($id){
        $del_brand = Dongsanpham::find($id);
        $del_brand->delete();
        return redirect('/admin/brand/brand-list')->with(['flag' => 'success', 'message' => 'Xóa dòng sản phẩm thành công']);
    }
        //end function admin
    public function show_dongsp_home($id){
        $danhmuc = Danhmuc::select('ma_danhmuc', 'ten_danhmuc', 'trangthai_danhmuc', 'slug_danhmuc')->get();
        $dongsanpham = Dongsanpham::select('ma_dongsp', 'ten_dongsp', 'trangthai_dongsp', 'slug_dongsp')->get();
        $sanpham_id = Sanpham::join('dongsanpham as dsp', 'sanpham.ma_dongsp', '=', 'dsp.ma_dongsp')
                                ->where('sanpham.ma_dongsp', $id)
                                ->get();
        return view('pages.dongsanpham.show_dongsp') 
        ->with('danhmuc', $danhmuc)
        ->with('dongsanpham', $dongsanpham)
        ->with('sanpham_id', $sanpham_id);

    }

}
