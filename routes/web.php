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

Auth::routes();

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

    // Add Login Users
    Route::get('/', 'AdminController@index'); // ✓
    Route::get('/logins/index', 'Admin\LoginController@getIndex'); // ✓

    Route::get('/logins/add', 'Admin\LoginController@getAdd'); // ✓
    Route::post('/logins/add', 'Admin\LoginController@postAdd'); // ✓

    // Edit Login Users
    Route::get('/login/edit', 'Admin\LoginController@getEdit'); // ✓
    Route::post('/login/edit', 'Admin\LoginController@postEdit'); // ✓
    // Login Change Password
    Route::get('/login/change-password', 'Admin\LoginController@getChangePassword'); // ✓
    Route::post('/login/change-password', 'Admin\LoginController@postChangePassword'); // ✓

    Route::get('/roles', 'Admin\RoleController@getIndex'); // ✓

    Route::get('/roles/add', 'Admin\RoleController@getAdd'); // ✓
    Route::post('/roles/add', 'Admin\RoleController@postAdd'); // ✓

    // User Management
    Route::get('/user', 'Admin\UserController@index');
    Route::post('/user', 'Admin\UserController@postAdd');
    Route::post('/user/add', 'Admin\UserController@postAdd'); // ✓
    Route::get('/user/edit', 'Admin\UserController@getEdit'); // ✓
    Route::post('/user/edit', 'Admin\UserController@postEdit'); // ✓
    Route::post('/user/search', 'Admin\UserController@searchUsers');

});

Route::prefix('doctor')->group(function() {
   Route::get('/', 'Doctor\DoctorController@index');
});

Route::prefix('patient')->group(function() {
   Route::get('/', 'Patient\PatientController@index');
});


// Route::group(['middleware' => ['auth', 'role:doctor'], 'prefix' => '/doctor'], function () {
//    Route::get('/', 'Doctor\DoctorController@index');
//    Route::get('/patients/search', 'Doctor\PatientController@searchPatients');
//    Route::get('/patients', 'Doctor\PatientController@patientsIndex');
//    Route::get('/patients/add', 'Doctor\PatientController@getAdd'); // ✓
//    Route::post('/patients/add', 'Doctor\PatientController@postAdd'); // ✓
//    Route::get('/patients/edit', 'Doctor\PatientController@getEdit'); // ✓
//    Route::post('/patients/edit', 'Doctor\PatientController@postEdit'); // ✓
//
//    Route::get('/test-users', 'Admin\TestUsersController@getIndex');
//    Route::get('/test-users/add', 'Admin\TestUsersController@getAdd');
//    Route::post('/test-users/add', 'Admin\TestUsersController@postAdd');
//
// });
Route::get('/dashboard', 'DashboardController@index')->name('user.dashboard');
//Route::get('/user', 'UserController@index')->name();
