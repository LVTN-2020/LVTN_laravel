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
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Donnhang;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Session,Redirect, Cart;

class ThanhtoanController extends Controller
{
    public function get_Dangnhap(){
        $danhmuc = Danhmuc::select('ma_danhmuc', 'ten_danhmuc', 'trangthai_danhmuc', 'slug_danhmuc')->get();
        $dongsanpham = Dongsanpham::select('ma_dongsp', 'ten_dongsp', 'trangthai_dongsp', 'slug_dongsp')->get();
        return view ('pages.thanhtoan.dangnhap_thanhtoan')
        ->with('danhmuc', $danhmuc)
        ->with('dongsanpham', $dongsanpham);
        

    }
    public function post_Dangnhap(Request $req){
        $this->validate($req, [
            'user_email'=>'required',
            'user_password'=>'required|min:3|max:32',
        
        ], [
            'user_email.required'=>'Bạn chưa nhập Email',
            'user_password.required'=>'Bạn chưa nhập mật khẩu ',
            'user_password.min'=>'Mật khẩu không ít quá 3 ký tự',
            'user_password.max'=>'Mật khẩu không dài quá 32 ký tự',
        ]);

        $email = $req->user_email;
        $password = $req->user_password;

        if(Auth::attempt(['email' => $email, 'password' => $password])){
             return redirect('/show-cart');
            
        }else
        {
             return redirect('pages/thanhtoan/dangnhap_thanhtoan')->with(['flag' => 'danger', 'message' => 'Email hoặc mật khẩu của bạn bị sai']);
            
        }
    }
    public function getLogout(){
        Auth::logout();
        return redirect('/');
    }
    public function add_customer(){
        return view('pages.thanhtoan.dangky_thanhtoan');
    }

    public function post_add_customer(Request $req){
        $this->validate($req, [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:3|max:32',
            
        ], [
            'name.required' => 'Vui lòng nhập tên người dùng',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'email.required' => 'Vui lòng nhập Email',
            'email.unique' => 'Email này đã tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải nhiều hơn 3 ký tự',
            'password.max' => 'Mật khẩu phải ít hơn 32 ký tự',
            
        ]);

        $user           = new User();
        $user->name     = $req->name;
        $user->phone    = $req->phone;
        $user->address  = $req->address;
        $user->email    = $req->email;
        $user->password = Hash::make($req->password);
        $user->level    = $req->level;

        $user->save();
        return redirect('/get-dangnhap')->with(['flag' => 'success', 'message' => 'Thêm thành công']);
    }
    public function thanh_toan(){
        $danhmuc = Danhmuc::select('ma_danhmuc', 'ten_danhmuc', 'trangthai_danhmuc', 'slug_danhmuc')->get();
        $dongsanpham = Dongsanpham::select('ma_dongsp', 'ten_dongsp', 'trangthai_dongsp', 'slug_dongsp')->get();
          return view('pages.thanhtoan.show_thanhtoan')
          ->with('danhmuc', $danhmuc)
          ->with('dongsanpham', $dongsanpham);
    }
    public function save_thanhtoan(Request $req){
        // $this->validate($req, [
        //     'ten_nguoinhan' => 'required',
        //     'sdt' => 'required',
        //     'diachi' => 'required',
          
            
        // ], [
        //     'ten_nguoinhan.required' => 'Vui lòng nhập tên người dùng',
        //     'sdt.required' => 'Vui lòng nhập số điện thoại',
        //     'diachi.required' => 'Vui lòng nhập địa chỉ',
        // ]);

        // $donhang           = new Donnhang();
        // $donhang->ten_nguoinhan     = $req->ten_nguoinhan;
        // $donhang->sdt    = $req->sdt;
        // $donhang->diachi  = $req->diachi;

        // $user->save();

        // $rand_number = Str::random(4);

        //thêm đơn hàng
        $rand_number = rand(100,999);
        $numberToString = (string)$rand_number;
        $string = "mdh-".$numberToString;

        $data = array();
    	$data['ten_nguoinhan'] = $req->ten_nguoinhan;
    	$data['sdt'] = $req->sdt;
    	$data['ngaydathang'] = $req->ngaydathang;
    	$data['ma_dh'] = $req->ma_dh;
    	$data['ma_tt'] = $req->ma_tt;
    	$data['ma_vanchuyen'] = 1;
    	$data['phivanchuyen'] = 0;
    	$data['tongtien'] = $req->tongtien;
        $data['trangthai_dh'] = 'Đang chờ xử lý';
        $data['diachi'] = $req->diachi;
        $data['user_id'] = $req->user_id;
        $data['ma_dh'] = $string;

    	$donhang_id = DB::table('donhang')->insertGetId($data);

        Session::put('donhang_id',$donhang_id);
        
        //thêm chi tiết đơn hàng

        return Redirect::to('/payment');
        
        
    }
    public function payment(Request $req){
        $danhmuc = Danhmuc::select('ma_danhmuc', 'ten_danhmuc', 'trangthai_danhmuc', 'slug_danhmuc')->get();
        $dongsanpham = Dongsanpham::select('ma_dongsp', 'ten_dongsp', 'trangthai_dongsp', 'slug_dongsp')->get();
        $get_dh_id = DB::table('donhang')->get();
          return view('pages.thanhtoan.payment')
          ->with('get_dh_id',$get_dh_id)
          ->with('danhmuc', $danhmuc)
          ->with('dongsanpham', $dongsanpham);

    }
    public function postPayment(Request $req){
        $get_dh_id = DB::table('donhang')->get();

        $data_d = array();
    	$data_d['ten_sp'] = $req->ten_sp;
    	$data_d['so_tien'] = $req->so_tien;
    	$data_d['soluong'] = $req->soluong;
    	$data_d['size'] = $req->size;
    	$data_d['mau'] = $req->mau;
    	$data_d['tongtien'] = $req->tongtien;
        $data_d['donhang_id'] = $req->donhang_id;
        $data_d['ma_sp'] = $req->ma_sp;

    	// Session::put('ma_chitiet',$ma_chitiet);
        $chitiet_dh = DB::table('chitiet_dh')->insert($data_d);
        Cart::destroy();
        return Redirect::to('/');
    }
}
