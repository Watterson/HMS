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

    Route::get('/centres', 'Admin\CentreController@index');
    Route::get('/centres/add', 'Admin\CentreController@getAdd');
    Route::post('/centres/add', 'Admin\CentreController@postAdd');
    Route::get('/centres/edit', 'Admin\CentreController@getEdit');
    Route::post('/centres/edit', 'Admin\CentreController@getEdit');
    Route::post('/centres/delete', 'Admin\CentreController@getEdit');

    // User Management
    Route::get('/user', 'Admin\UserController@index');
    Route::post('/user', 'Admin\UserController@postAdd');
 //Route::post('/user/add', 'Admin\UserController@postAdd');
    Route::get('/user/edit', 'Admin\UserController@getEdit');
    Route::post('/user/edit', 'Admin\UserController@postEdit');
    Route::post('/user/search', 'Admin\UserController@searchUsers');
    //add users
    Route::get('/user/add_patient', 'Admin\UserController@getPatientAdd');
    Route::post('/user/add_patient', 'Admin\UserController@postPatientAdd');
    Route::get('/user/add_doctor', 'Admin\UserController@getDoctorAdd');
    Route::post('/user/add_doctor', 'Admin\UserController@postDoctorAdd');
    //edit users
    Route::get('/user/edit_patient', 'Admin\UserController@getPatientEdit');
    Route::post('/user/edit_patient', 'Admin\UserController@postPatientEdit');
    Route::get('/user/edit_doctor', 'Admin\UserController@getDoctorEdit');
    Route::post('/user/edit_doctor', 'Admin\UserController@postDoctorEdit');

});

Route::prefix('doctor')->group(function() {
   Route::get('/', 'Doctor\DoctorController@index');

   Route::get('/edit_details', 'Doctor\DoctorController@getEdit');
   Route::post('/edit_details', 'Doctor\DoctorController@postedit');


   //manage patient
   Route::get('/patients', 'Doctor\PatientController@index');
    Route::get('/patients/view', 'Doctor\PatientController@getVeiw');
   Route::get('/patients/add', 'Doctor\PatientController@getAdd');
   Route::post('/patients/add', 'Doctor\PatientController@postAdd');
   Route::get('/patients/edit', 'Doctor\PatientController@getEdit');
   Route::post('/patients/edit', 'Doctor\PatientController@postEdit');
   //appointments
   Route::get('/patients/appointments', 'Doctor\Patient\AppointmentController@index');
   Route::get('/patients/appointments/add', 'Doctor\Patient\AppointmentsController@getAdd');
   Route::post('/patients/appointments/add', 'Doctor\Patient\AppointmentsController@postAdd');
   Route::get('/patients/appointments/edit', 'Doctor\Patient\AppointmentController@getEdit');
   Route::post('/patients/appointments/edit', 'Doctor\Patient\AppointmentController@postEdit');
   Route::post('/patients/appointments/delete', 'Doctor\Patient\AppointmentController@delete');
   //allergies
   Route::get('/patients/allergies', 'Doctor\Patient\AllergyController@index');
   Route::get('/patients/allergies/add', 'Doctor\Patient\AllergyController@getAdd');
   Route::post('/patients/allergies/add', 'Doctor\Patient\AllergyController@postAdd');
   Route::get('/patients/allergies/edit', 'Doctor\Patient\AllergyController@getEdit');
   Route::post('/patients/allergies/edit', 'Doctor\Patient\AllergyController@postEdit');
   Route::post('/patients/allergies/delete', 'Doctor\Patient\AllergyController@delete');
   //medication
   Route::get('/patients/medication', 'Doctor\Patient\MedicationController@index');
   Route::get('/patients/medication/add', 'Doctor\Patient\MedicationController@getAdd');
   Route::post('/patients/medication/add', 'Doctor\Patient\MedicationController@postAdd');
   Route::get('/patients/medication/edit', 'Doctor\Patient\MedicationController@getEdit');
   Route::post('/patients/medication/edit', 'Doctor\Patient\MedicationController@postEdit');
   Route::post('/patients/medication/delete', 'Doctor\Patient\MedicationController@delete');
   //medicine
   Route::get('/medicine', 'Doctor\MedicineController@index');
   Route::get('/medicine/add', 'Doctor\MedicineController@getAdd');
   Route::post('/medicine/add', 'Doctor\MedicineController@postAdd');
   //Appointments
   Route::get('/appointments', 'Doctor\AppointmentController@index');
   Route::get('/appointments/add', 'Doctor\AppointmentController@getAdd');
   Route::post('/appointments/add', 'Doctor\AppointmentController@postAdd');
   //Labs
   Route::get('/labs', 'Doctor\LabController@index');
   Route::get('/labs/add', 'Doctor\LabController@getAdd');
   Route::post('/labs/add', 'Doctor\LabController@postAdd');
   //Hours
   Route::get('/hours', 'Doctor\HourController@index');
   Route::get('/hours/add', 'Doctor\HourController@getAdd');
   Route::post('/hours/add', 'Doctor\HourController@postAdd');





});

Route::prefix('patient')->group(function() {
   Route::get('/', 'Patient\PatientController@index');

   Route::get('/manage_details', 'Patient\PatientController@getEdit');
   Route::post('/manage_details', 'Patient\PatientController@postEdit');

   Route::get('/appointments', 'Patient\AppointmentsController@index');
   Route::get('/appointments/add', 'Patient\AppointmentsController@getAdd');
   Route::post('/appointments/add', 'Patient\AppointmentsController@postAdd');

   Route::get('/appointments/edit', 'Patient\AppointmentsController@getEdit');
   Route::post('/appointments/edit', 'Patient\AppointmentsController@postAdd');

   Route::post('/appointments/delte', 'Patient\AppointmentsController@postAdd');

   Route::get('/medication', 'Patient\MedicationController@index');

   Route::get('/allergies', 'Patient\AllergyController@index');

   Route::get('/perscriptions', 'Patient\PerscriptionController@index');
   Route::get('/perscriptions/request', 'Patient\PerscriptionController@getRequest');
   Route::post('/perscriptions/request', 'Patient\PerscriptionController@postRequest');


});

Route::prefix('nurse')->group(function() {

});

Route::prefix('reception')->group(function() {

});
//waiting list with priority levels

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
