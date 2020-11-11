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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', 'AdminController@index');
Route::get('trang-chu', 'HomeController@index');

Route::group(['prefix' => 'admin'], function () {
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
});
