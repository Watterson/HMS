<?php

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
    return view('layouts.app');
});

// Route::post('/setpassword',  resetpassword(){
//       $email = "admin@admin.com";
//       $password =  Hash::make("jubilee");
//       $admin = new Admin
//       $admin->email = $email;
//       $admin->password = $password;
//       $admin->save();
//
//       return View('test', [
//         'x' => $admin
//       ]);
//
//   });

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('user.dashboard');
//Route::get('/user', 'UserController@index')->name();
