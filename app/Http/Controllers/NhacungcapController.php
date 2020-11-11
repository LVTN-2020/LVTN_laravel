<?php

namespace App\Http\Controllers;

use App\Models\Nhacungcap;
use Illuminate\Http\Request;

class NhacungcapController extends Controller
{
    public function getAddSupplier(){
        return view('admin.nhacungcap.them_nhacungcap');
    }
    public function postAddSupplier(Request $req){

        $this->validate($req, [
            'ten_ncc' => 'required|unique:nhacungcap,ten_ncc',
            'diachi_ncc' => 'required',
            'phone_ncc' => 'required',
        ], [
            'ten_ncc.required' => 'Vui lòng điền tên nhà cung cấp',
            'ten_ncc.unique' => 'Không được trùng tên nhà cung cấp',
            'diachi_ncc.required' => 'Vui lòng điền địa chỉ',
            'phone_ncc.required' => 'Vui lòng điền số điện thoại',
        ]);

        $add_ncc = new Nhacungcap;
        $add_ncc->ten_ncc = $req->ten_ncc;
        $add_ncc->diachi = $req->diachi_ncc;
        $add_ncc->sdt = $req->phone_ncc;

        $add_ncc->save();
        return redirect('/admin/supplier/supplier-list')->with(['flag' => 'success', 'message' => 'Thêm nhà cung cấp thành công']);
    }
    public function getListSupplier(){
        $show_ncc = Nhacungcap::select('ma_ncc', 'ten_ncc', 'diachi', 'sdt')->get();
        return view('admin.nhacungcap.danhsach_nhacungcap')->with('show_ncc', $show_ncc);
    }
    public function getEditSupplier($id){
        $edit_ncc = Nhacungcap::find($id);
        return view('admin.nhacungcap.sua_nhacungcap')->with('edit_ncc', $edit_ncc);
    }
    public function postEditSupplier(Request $req, $id){

        $this->validate($req, [
            'ten_ncc' => 'required',
            'diachi' => 'required',
            'phone' => 'required',
        ], [
            'ten_ncc.required' => 'Vui lòng điền tên nhà cung cấp',
            'diachi.required' => 'Vui lòng điền địa chỉ',
            'phone.required' => 'Vui lòng điền số điện thoại',
        ]);

        $edit = Nhacungcap::find($id);
        $edit->ten_ncc = $req->ten_ncc;
        $edit->diachi = $req->diachi;
        $edit->sdt = $req->phone;

        $edit->save();
        return redirect('/admin/supplier/supplier-list')->with(['flag' => 'success', 'message' => 'Sửa nhà cung cấp thành công']);
    }
    public function getDelSupplier($id){
        $del_ncc = Nhacungcap::find($id);
        $del_ncc->delete();
        return redirect('/admin/supplier/supplier-list')->with(['flag' => 'success', 'message' => 'Xóa nhà cung cấp thành công']);
    }
}
