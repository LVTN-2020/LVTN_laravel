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

Route::get('/admin', 'AdminController@index');
Route::get('trang-chu', 'HomeController@index');

Route::group(['prefix' => 'admin', 'middleware' => 'adminLogin'], function () {
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
});
Route::get('/login-admin', 'AdminController@getLogin');
Route::post('/login-admin', 'AdminController@postLogin');
Route::get('/logout-admin', 'AdminController@getLogout');




//frontend
Route::get('/','HomeController@index');
//Dong san pham trang chu
Route::get('/dong-san-pham/{ma_sp}','DongspController@show_dongsp_home');
//chi tiet san pham
Route::get('/chi-tiet-san-pham/{ma_sp}','SanphamController@chitiet_sp');
//gio hang
// Route::get('/giohang','GiohangController@gio');
Route::post('/save-cart','GiohangController@save_cart');
Route::post('/capnhat-giohang','GiohangController@capnhat_giohang');
Route::get('/show-cart','GiohangController@show_giohang');
Route::get('/delete-giohang/{rowId}','GiohangController@delete_giohang');


