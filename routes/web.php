<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/admin', 'AdminController@index')->middleware('adminLogin');
Route::get('trang-chu', 'HomeController@index');

Route::group(['middleware' => 'adminLogin', 'prefix' => 'admin'], function () {
    Route::group(['prefix' => 'cate'], function () {
        //-----Thêm------
        Route::get('/cate-add', 'DanhmucController@getAddCate');
        Route::post('/cate-add', 'DanhmucController@postAddCate');
        //-----Xem-----
        Route::get('/cate-list', 'DanhmucController@getListCate');
        //-----Sửa-----
        Route::get('/cate-edit/{id}', 'DanhmucController@getEditCate');
        Route::post('/cate-update/{id}', 'DanhmucController@postEditCate');
        //-----Xóa-----
        Route::get('/cate-del/{id}', 'DanhmucController@getDelCate');
    });

    Route::group(['prefix' => 'brand'], function () {
        //-----Thêm------
        Route::get('/brand-add', 'DongspController@getAddBrand');
        Route::post('/brand-add', 'DongspController@postAddBrand');
        //-----Xem-----
        Route::get('/brand-list', 'DongspController@getListBrand');
        //-----Sửa-----
        Route::get('/brand-edit/{id}', 'DongspController@getEditBrand');
        Route::post('/brand-update/{id}', 'DongspController@postEditBrand');
        //-----Xóa-----
        Route::get('/brand-del/{id}', 'DongspController@getDelBrand');
    });

    Route::group(['prefix' => 'supplier'], function () {
        //-----Thêm------
        Route::get('/supplier-add', 'NhacungcapController@getAddSupplier');
        Route::post('/supplier-add', 'NhacungcapController@postAddSupplier');
        //-----Xem-----
        Route::get('/supplier-list', 'NhacungcapController@getListSupplier');
        //-----Sửa-----
        Route::get('/supplier-edit/{id}', 'NhacungcapController@getEditSupplier');
        Route::post('/supplier-update/{id}', 'NhacungcapController@postEditSupplier');
        //-----Xóa-----
        Route::get('/supplier-del/{id}', 'NhacungcapController@getDelSupplier');
    });

    Route::group(['prefix' => 'product'], function () {
        //-----Thêm------
        Route::get('/product-add', 'SanphamController@getAddProduct');
        Route::post('/product-add', 'SanphamController@postAddProduct');
        //-----Xem-----
        Route::get('/product-list', 'SanphamController@getListProduct');
        //-----Sửa-----
        Route::get('/product-edit/{id}', 'SanphamController@getEditProduct');
        Route::post('/product-update/{id}', 'SanphamController@postEditProduct');
        //-----Xóa-----
        Route::get('/product-del/{id}', 'SanphamController@getDelProduct');

        Route::get('/product-image-add', 'SanphamController@getAddProductImage');
        Route::post('/product-image-add', 'SanphamController@postAddProductImage');

        Route::get('/product-size-add', 'SanphamController@getAddProductSize');
        Route::post('/product-size-add', 'SanphamController@postAddProductSize');

        Route::get('/product-color-add', 'SanphamController@getAddProductColor');
        Route::post('/product-color-add', 'SanphamController@postAddProductColor');
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('/user-add','UserController@getAdduser');
        Route::post('/user-add','UserController@postAdduser');
        Route::get('/user-list','UserController@getListuser');
        Route::get('/user-edit/{id}','UserController@getEdituser');
        Route::post('/user-update/{id}','UserController@postEdituser');
        Route::get('/user-delete/{id}','UserController@getDeleteuser');
    });

    Route::group(['prefix' => 'order'], function () {
        Route::get('/order-list', 'DonhangController@getListorder');
        Route::get('/order-detail/{id}', 'DonhangController@getListdetail');
        Route::get('/order-edit/{id}', 'DonhangController@getEditorder');
        Route::post('/order-update/{id}', 'DonhangController@postEditorder');
    });
});
Route::get('/login-admin', 'AdminController@getLogin')->middleware('checkUser');
Route::post('/login-admin', 'AdminController@postLogin');
Route::get('/logout-admin', 'AdminController@getLogout');




//frontend
Route::get('/','HomeController@index');
//Dong san pham trang chu
// Route::get('/dong-san-pham/{ma_sp}','HomeController@show_dongsp_home');
Route::get('/dong-san-pham/{slug}.html','HomeController@show_dongsp_home');
//chi tiet san pham
// Route::get('/chi-tiet-san-pham/{ma_sp}','HomeController@chitiet_sp');
Route::get('/chi-tiet-san-pham/{slug_sp}.html','HomeController@chitiet_sp');
//gio hang
// Route::get('/giohang','GiohangController@gio');
Route::post('/save-cart','GiohangController@save_cart');
Route::post('/capnhat-giohang','GiohangController@capnhat_giohang');
// Route::post('/update-giohang','GiohangController@update_giohang');
Route::get('/show-cart','GiohangController@show_giohang');
// Route::get('/gio-hang','GiohangController@gio_hang');
Route::get('/delete-giohang/{rowId}','GiohangController@delete_giohang');

Route::post('/add-cart-ajax','GiohangController@add_cart_ajax');
  

//tim kiem
// Route::post('tim-kiem', 'HomeController@timkiem');

//Dang nhap + thanh toan + dang ky
Route::get('/get-dangnhap','ThanhtoanController@get_Dangnhap');
Route::post('/get-dangnhap','ThanhtoanController@post_Dangnhap');
Route::post('/order-place','ThanhtoanController@order_place');
Route::get('/logout-user','ThanhtoanController@getLogout');
Route::get('/get-dangky','ThanhtoanController@add_customer');
Route::post('/get-dangky','ThanhtoanController@post_add_customer');
Route::get('/thanh-toan','ThanhtoanController@thanh_toan');
Route::post('/save-thanhtoan','ThanhtoanController@save_thanhtoan');
Route::get('/info-order','ThanhtoanController@info_order');



//Tim kiem
Route::post('/tim-kiem', 'HomeController@live_search');
Route::post('/tim-kiem-ajax', 'HomeController@live_search_ajax');

//danhmuc trang chủ
Route::get('/danhmuc-sanpham/{slug_danhmuc}','HomeController@show_danhmuc_home');
