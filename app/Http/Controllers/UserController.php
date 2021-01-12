<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getAdduser(){
        return view('admin.user.them_user');
    }
    public function postAdduser(Request $req){
        $this->validate($req, [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:3|max:32',
            'repassword' => 'required|same:password',
        ], [
            'name.required' => 'Vui lòng nhập tên người dùng',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'email.required' => 'Vui lòng nhập Email',
            'email.unique' => 'Email này đã tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải nhiều hơn 3 ký tự',
            'password.max' => 'Mật khẩu phải ít hơn 32 ký tự',
            'repassword.required' => 'Vui lòng nhập xác thực mật khẩu',
            'repassword.same' => 'Xác thực mật khẩu chưa đúng',
        ]);

        $user           = new User();
        $user->name     = $req->name;
        $user->phone    = $req->phone;
        $user->address  = $req->address;
        $user->email    = $req->email;
        $user->password = Hash::make($req->password);
        $user->level    = $req->level;

        $user->save();
        return redirect('/admin/user/user-list')->with(['flag' => 'success', 'message' => 'Thêm thành công']);
    }

    public function getListuser(){
        $get_user = User::where('level', '<', 3)->get();
        
        return view('admin.user.danhsach_user')->with('get_user', $get_user);
    }

    public function getEdituser($id){
        $get_id = User::findOrFail($id);
        return view('admin.user.sua_user')->with('get_id', $get_id);
    }
    public function postEdituser(Request $req, $id){
        $edit_user = User::findOrFail($id);
        $this->validate($req, [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required',
            'password' => 'required|min:3|max:32',
            'repassword' => 'required|same:password',
        ], [
            'name.required' => 'Vui lòng nhập tên người dùng',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'email.required' => 'Vui lòng nhập Email',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải nhiều hơn 3 ký tự',
            'password.max' => 'Mật khẩu phải ít hơn 32 ký tự',
            'repassword.required' => 'Vui lòng nhập xác thực mật khẩu',
            'repassword.same' => 'Xác thực mật khẩu chưa đúng',
        ]);

        $edit_user->name     = $req->name;
        $edit_user->phone    = $req->phone;
        $edit_user->address  = $req->address;
        $edit_user->email    = $req->email;
        $edit_user->password = Hash::make($req->password);
        $edit_user->level    = $req->level;

        $edit_user->save();
        return redirect('/admin/user/user-list')->with(['flag' => 'success', 'message' => 'Cập nhật thành công']);
    }

    public function getDeleteuser($id){
        $del_id = User::find($id);
        $del_id->delete();
        return redirect('/admin/user/user-list')->with(['flag' => 'success', 'message' => 'Xoa thành công']);
    }
}
