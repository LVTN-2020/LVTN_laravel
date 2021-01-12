<?php

namespace App\Http\Controllers;

use App\Models\ChitietDH;
use App\Models\Danhmuc;
use App\Models\Dongsanpham;
use App\Models\Donhang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Redirect, Cart, Mail;

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
        $ngaydathang = Carbon::now()->format('d-m-Y');
        $user = Auth::user();
        $json_user = json_encode($user);
          return view('pages.thanhtoan.show_thanhtoan')
          ->with('user', $user)
          ->with('json_user', $json_user)
          ->with('danhmuc', $danhmuc)
          ->with('dongsanpham', $dongsanpham)
          ->with('ngaydathang', $ngaydathang);
    }
    public function save_thanhtoan(Request $req){

        //thêm đơn hàng
        $rand_number = rand(100,999);
        $numberToString = (string)$rand_number;
        $string = "mdh-".$numberToString;

        $ngaydathang = Carbon::parse()->format('Y-m-d');

        $donhang = new Donhang;
        $donhang->ten_nguoinhan = $req->ten_nguoinhan;
        $donhang->sdt = $req->sdt;
        $donhang->ngaydathang = $ngaydathang;
        $donhang->ma_dh = $req->ma_dh;
        $donhang->ma_tt = $req->ma_tt;
        $donhang->ma_vanchuyen = 1;
        $donhang->phivanchuyen = 0;
        $donhang->tongtien = $req->tongtien;
        $donhang->trangthai_dh = 'Đang chờ xử lý';
        $donhang->diachi = $req->diachi;
        $donhang->user_id = $req->user_id;
        $donhang->ma_dh = $string;

        $donhang->save();
        $donhang->donhang_id;

        $chitiet_dh = new ChitietDH;
        $chitiet_dh->ten_sp = $req->ten_sp;
        $chitiet_dh->so_tien = $req->so_tien;
        $chitiet_dh->soluong = $req->soluong;
        $chitiet_dh->size = $req->size;
        $chitiet_dh->mau = $req->mau;
        $chitiet_dh->tongtien = $req->tongtien;
        $chitiet_dh->donhang_id = $donhang->donhang_id;
        $chitiet_dh->ma_sp = $req->ma_sp;

        $chitiet_dh->save();

        $cus_email = Auth::user()->email;
        $cus_name = Auth::user()->name;

        $get_detail = DB::table('donhang as dh')
                        ->join('chitiet_dh as ctdh', 'ctdh.donhang_id', '=', 'dh.donhang_id')
                        ->where('ctdh.donhang_id', $donhang->donhang_id)
                        ->select('ctdh.ten_sp', 'ctdh.mau', 'ctdh.size', 'ctdh.soluong', 'ctdh.so_tien', 'ctdh.tongtien')
                        ->get();

        Mail::send('email.order',[
                'cus_name' => $cus_name,
                'order' => $donhang,
                'items' =>  $get_detail,
        ],function($mail) use($cus_email,$cus_name){
            $mail->to($cus_email,$cus_name);
            $mail->from('hp1997tg@gmail.com');
            $mail->subject('Đặt hàng thành công');
            Cart::destroy();
        });

        return Redirect::to('/');
    }

    public function info_order(){
        $danhmuc = Danhmuc::select('ma_danhmuc', 'ten_danhmuc', 'trangthai_danhmuc', 'slug_danhmuc')->get();
        $dongsanpham = Dongsanpham::select('ma_dongsp', 'ten_dongsp', 'trangthai_dongsp', 'slug_dongsp')->get();

        $id_user = Auth::user()->id;
        $info_order = DB::table('donhang as dh')
                    ->join('chitiet_dh as ctdh', 'ctdh.donhang_id', '=', 'dh.donhang_id')
                    ->join('users as user', 'user.id', '=', 'dh.user_id')
                    ->where('dh.user_id', $id_user)
                    ->select('dh.ma_dh', 'dh.ngaydathang', 'ctdh.ten_sp', 'ctdh.so_tien', 'ctdh.soluong', 'ctdh.size', 'ctdh.mau', 'ctdh.tongtien')
                    ->get();
        return view('pages.thanhtoan.info_order')
                ->with('danhmuc', $danhmuc)
                ->with('dongsanpham', $dongsanpham)
                ->with('info_order', $info_order);
    }

}
