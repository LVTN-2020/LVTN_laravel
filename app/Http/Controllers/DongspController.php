<?php

namespace App\Http\Controllers;

use App\Models\Dongsanpham;
use Illuminate\Http\Request;

class DongspController extends Controller
{
    public function getAddBrand(){
        return view('admin.dongsp.them_dongsp');
    }
    
    public function postAddBrand(Request $req){
        
        $this->validate($req, [
            'tendongsp' => 'required|unique:dongsanpham,ten_dongsp',
        ], [
            'tendongsp.required' => 'Vui lòng điền tên dòng sản phẩm',
            'tendongsp.unique' => 'Không được trùng tên dòng sản phẩm',
        ]);

        $dsp = new Dongsanpham;
        $dsp->ten_dongsp = $req->tendongsp;
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
        $show_dsp = Dongsanpham::select('ma_dongsp', 'ten_dongsp', 'trangthai_dongsp')->get();
        return view('admin.dongsp.danhsach_dongsp')->with('show_dsp', $show_dsp);
    }

    public function getEditBrand($id){
        $edit_dsp = Dongsanpham::findOrFail($id);
        return view('/admin/dongsp.sua_dongsp')->with('edit_dsp', $edit_dsp);
    }

    public function postEditBrand(Request $req, $id){

        $this->validate($req, [
            'tendongsp' => 'required',
        ], [
            'tendongsp.required' => 'Vui lòng điền tên dòng sản phẩm',
        ]);

        $edit = Dongsanpham::find($id);
        $edit->ten_dongsp = $req->tendongsp;
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

}
