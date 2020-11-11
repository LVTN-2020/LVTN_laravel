<?php

namespace App\Http\Controllers;

use App\Models\Danhmuc;
use Illuminate\Http\Request;

class DanhmucController extends Controller
{
    public function getAddCate(){
        return view('admin.danhmuc.them_danhmuc');
    }

    public function postAddCate(Request $req){
        
        $this->validate($req, [
            'tendanhmuc' => 'required|unique:danhmuc,ten_danhmuc',
        ], [
            'tendanhmuc.required' => 'Vui lòng điền tên danh mục',
            'tendanhmuc.unique' => 'Không được trùng tên danh mục',
        ]);

        $danhmuc = new Danhmuc;
        $danhmuc->ten_danhmuc = $req->tendanhmuc;
        $danhmuc->trangthai_danhmuc = $req->trangthai;
        if($danhmuc->trangthai_danhmuc == 0){
            $danhmuc->save(['trangthai_danhmuc' => 0]);
        }else{
            $danhmuc->save(['trangthai_danhmuc' => 1]);
        }

        $danhmuc->save();

        return redirect('/admin/cate/cate-list')->with(['flag' => 'success', 'message' => 'Thêm danh mục thành công']);
    }

    public function getListCate(){
        $show_dm = Danhmuc::select('ma_danhmuc', 'ten_danhmuc', 'trangthai_danhmuc')->get();

        return view('admin.danhmuc.danhsach_danhmuc')->with('show_dm', $show_dm);
    }

    public function getEditCate($id){
        $edit_dm = Danhmuc::find($id);

        return view('admin.danhmuc.sua_danhmuc')->with('edit_dm', $edit_dm);
    }

    public function postEditCate(Request $req, $id){

        $this->validate($req, [
            'tendanhmuc' => 'required|unique:danhmuc,ten_danhmuc',
        ], [
            'tendanhmuc.required' => 'Vui lòng điền tên danh mục',
        ]);

        $dmuc = Danhmuc::findOrFail($id);
        $dmuc->ten_danhmuc = $req->tendanhmuc;
        $dmuc->trangthai_danhmuc = $req->trangthai;
        if($dmuc->trangthai_danhmuc == 0){
            $dmuc->save(['trangthai_danhmuc' => 0]);
        }else{
            $dmuc->save(['trangthai_danhmuc' => 1]);
        }
        $dmuc->save();
        return redirect('/admin/cate/cate-list')->with(['flag' => 'success', 'message' => 'Cập nhật danh mục thành công']);
    }

    public function getDelCate($id){
        $del_dm = Danhmuc::find($id);
        $del_dm->delete();
        return redirect('/admin/cate/cate-list')->with(['flag' => 'success', 'message' => 'Xóa danh mục thành công']);
    }
}
