<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// header('Access-Control-Allow-Origin: *');
// header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE');
// // add any additional headers you need to support here
// header('Access-Control-Allow-Headers: Origin, Content-Type,X-Requested-With,Authorization');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('user')->namespace('API')->group(function () {
    // Login
    Route::post('/login','AuthController@postLogin');
    // Register
    Route::post('/register','AuthController@postRegister');
    // Protected with APIToken Middleware
    Route::post('/logout','AuthController@postLogout');
    Route::delete('/delete/{id}','AuthController@deleteUser');
    Route::get('/list-user','AuthController@listUser');
    Route::post('/edit/{id}','AuthController@editUser');
    Route::get('profile','AuthController@profile');
    Route::get('/search','AuthController@search');
    // Route::middleware('APIToken')->group(function () {
    //   // Logout
    // });
    
  });
  Route::prefix('admin')->namespace('Admin')->group(function () {    
    Route::get('/trangthai2','TrangThaiController@getTrangthai');   
    Route::resource('/danhmuc','DanhMucController');   
    Route::resource('/quyen', 'QuyenController');
    Route::resource('/danhmuchinh', 'DanhMucHinhAnhController');    
    Route::resource('/sanpham', 'SanphamController'); 
    Route::resource('/pttt', 'PhuongThucTTController');  
    Route::resource('/khuyenmai', 'KhuyenMaiController');  
    Route::resource('/chitietkhuyenmai', 'ChitietkhuyenmaiController');
    Route::resource('/nhacungcap', 'NhacungcapController'); 
    Route::put('duyetnhacungcap/{id}','NhacungcapController@changeQuyenncc');
    Route::resource('/taikhoan', 'TaiKhoancontroller');
    Route::resource('data','DataController');
    Route::resource('home', 'HomePageController');    
    //Product
    Route::resource('product-detail', 'ProductDetailController');
    Route::post('get-image', 'ProductDetailController@getImage');
    Route::post('check-bill', 'ProductDetailController@checkBill');
    Route::post('create-rating', 'ProductDetailController@createRating');
    Route::post('delete-rating', 'ProductDetailController@deleteRating');
    // Route::post('khuyenmai-refer-detail', 'Api\KhuyenMaiController@referDetail');
    Route::post('submit-order','OderController@submitOrder');
    //Danhgia
    Route::resource('danhgia', 'DanhGiaController');
    //Edit profile
    Route::post('profile/doimatkhau','TaiKhoancontroller@doimatkhau');
    Route::put('taikhoan/{id}/changehinh','TaiKhoancontroller@changehinh');
    Route::put('nhacungcap/{id}/changehinh','NhacungcapController@changehinh');
    Route::post('reset_password','ResetPasswordController@sendMail');
    Route::get('password_reset','ResetPasswordController@index');
    Route::post('password_reset/reset','ResetPasswordController@reset_pass');
    //Donhang
    Route::resource('trangthai', 'TrangThaiController');  
    Route::get('get_array_top','BaoCaoController@get_array_top');
    Route::post('baocao_donhang','BaoCaoController@baocao_donhang');
    Route::post('donhang-refer-detail', 'ChiTietDonHangController@referDetail');
    Route::post('donhang-filter','DonHangController@filterByIdTrangThai');
    Route::resource('donhang', 'DonHangController');
    //Taikhoan
    Route::post('/signup', 'AuthController@register'); 
    Route::post('/login', 'AuthController@login');
    Route::post('authenticate','LoginController@authenticate');
    Route::post('register','LoginController@register');
    Route::group(['middleware' => 'jwt.auth'], function () { 
      Route::get('/auth', 'AuthController@user');
      Route::post('/logout', 'AuthController@logout');
      Route::post('/fetch-export-order','ProfileController@fetchExportOrder');     
    });
    Route::middleware('jwt.refresh')->get('/token/refresh', 'AuthController@refresh');
  });
  