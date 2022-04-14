<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Admin\QLloaibanh;
use App\Http\Controllers\Admin\QLkhuyenmai;
use App\Http\Controllers\Admin\QLbanh;



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

//trang chu
Route::get('/',[Home::class,'index'])->name('index');
Route::prefix('home')->controller(Home::class)->name('home.')->group(function (){
    Route::get('/','index');
    Route::get('index','index')->name('trangchu');

    Route::get('chi-tiet-san-pham/{id?}','chitietsp')->name('chitietsp');

    Route::get('dang-nhap','dangnhap')->middleware('checklogin')->name('dangnhap');

    Route::post('dang-nhap','handle_dangnhap')->middleware('checklogin');

    Route::get('dang-ky','dangky')->middleware('checklogin')->name('dangky');

    Route::post('dang-ky','handle_dangky')->middleware('checklogin');
    Route::get('dang-xuat','dangxuat')->middleware('check_home')->name('dangxuat');
});

//admin-loại bánh
Route::prefix('admin')->controller(QLloaibanh::class)->name('admin.')->group(function (){ 
    // Route::get('index','index')->name('trangchu_admin');
    Route::get('loai-banh','getloaibanh')->name('getloaibanh');
    Route::post('postloaibanh','postloaibanh');
    Route::get('edit-loaibanh/{id}','get_edit_loaibanh');
    Route::post('edit-loaibanh/{id}','post_edit_loaibanh');
    Route::get('delete-loaibanh/{id}','get_delete_loaibanh');
    
});
//admin-khuyến mãi
Route::prefix('admin')->controller(QLkhuyenmai::class)->name('admin.')->group(function (){
   Route::get('khuyen-mai','Showkhuyenmai')->name('getkhuyenmai');
   Route::post('khuyen-mai','Post_add_khuyenmai');
   Route::get('edit-khuyen-mai/{id}','get_edit_khuyen_mai');
   Route::post('edit-khuyen-mai/{id}','post_edit_khuyen_mai');
   Route::get('delete-khuyen-mai/{id}','get_delete_khuyen_mai');
});
//admin-bánh
Route::prefix('admin')->controller(QLbanh::class)->name('admin.')->group(function (){
    Route::get('banh','Showbanh')->name('getbanh');
    Route::post('addCake','PostAddCake')->name('postAddCake');
    Route::get('editCake/{id}','getEditCake');
    // Route::post('khuyen-mai','Post_add_khuyenmai');
    // Route::get('edit-khuyen-mai/{id}','get_edit_khuyen_mai');
    // Route::post('edit-khuyen-mai/{id}','post_edit_khuyen_mai');
    // Route::get('delete-khuyen-mai/{id}','get_delete_khuyen_mai');
 });

Route::get('new',function(){});
Route::get('test',[Home::class,'sayhi']);
Route::post('new',[Home::class,'form']);
