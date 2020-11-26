<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        return view('admin.master');
    }
    public function getLogin(){
        return view('admin.login');
    }
    public function postLogin(Request $req){
        $this->validate($req, [
            'email' => 'required',
            'password' => 'required|min:3|max:32',
        ], [
            'email.required' => 'Vui lòng nhập Email',
            'password.required' => 'Vui lòng nhập Mật khẩu',
            'password.min' => 'Mật khẩu không ít 3 ký tự',
            'password.max' => 'Mật khẩu không quá 32 ký tự',
        ]);
        
        $email = $req->email;
        $password = $req->password;

        if(Auth::attempt(['email' => $email, 'password' => $password])){
            return redirect('/admin')->with(['flag' => 'success', 'message' => 'Đăng nhập thành công']);
        }else{
            return redirect('/login-admin')->with(['flag' => 'danger', 'message' => 'Email hoặc mật khẩu bị sai']);
        }
    }

    public function getLogout(){
        Auth::logout();
        return redirect('/login-admin');
    }
}
