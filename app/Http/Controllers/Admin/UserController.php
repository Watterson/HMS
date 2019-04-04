<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth as Auth;
use App\Models\User as User;
use App\Models\Patient as Patient;
use App\Models\Doctor as Doctor;
use App\Models\Role as Role;



class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function __construct()
     {
         $this->middleware('auth:admin');
     }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::all();

        foreach ($users as $user) {
          $user_role =  Role::select('role')->where('id', $user->role_id)->get();
        //  dd($user_role);
          $user->role = $user_role[0]->role;
        }

        return View('admin.accountManager.index', [
            'users' => $users,
            'roles' => $roles,
        ]);
    }
    public function getPatientAdd()
    {
        $roles = Role::all();
        return View('admin.accountManager.addPatient');
    }

    public function postPatientAdd()
    {
        $this->validate(Request(), [
            'first_name'     => 'required|min:3',
            'last_name'     => 'required|min:3',
            'email'    => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $first_name = Request()->input('first_name');
        $last_name = Request()->input('last_name');
        $email = Request()->input('email');
        $password = Hash::make(Request()->input('password'));
        $mobile = Request()->input('mobile');
        //$address = Request()->input('address');
        //$dob = Request()->input('dob');
        //$gender = Request()->input('gender');
        //$blood_type = Request()->input('blood_type');
        //$family_history = Request()->input('family_history');
        //$medical_history = Request()->input('medical_history');
        //$post_surgical_history = Request()->input('post_surgical_history');
        //$created_by = Request()->input('doctor_id');

        $user = new User;

        $user->email     = $email;
        $user->password  = $password;
        $user->role_id   = 2;

        $user->save();

        $user_id =  User::select('id')->where('email', $email)->get();

        $patient = new Patient;

        $patient->id = $user_id[0]->id;
        $patient->first_name = $first_name;
        $patient->last_name = $last_name;
      //  $patient->mobile = $mobile;
        $patient->save();


        return Redirect('admin/user');
    }

    public function getDoctorAdd()
    {

        return View('admin.accountManager.addDoctor');
    }

    public function postDoctorAdd()
    {
        $this->validate(Request(), [
            'first_name'     => 'required|min:3',
            'last_name'     => 'required|min:3',
            'email'    => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $first_name = Request()->input('first_name');
        $last_name = Request()->input('last_name');
        $email = Request()->input('email');
        $password = Hash::make(Request()->input('password'));
        $mobile = Request()->input('mobile');
        $centre = Request()->input('centre');
        //$address = Request()->input('address');
        //$dob = Request()->input('dob');
        //$gender = Request()->input('gender');
        //$blood_type = Request()->input('blood_type');
        //$family_history = Request()->input('family_history');
        //$medical_history = Request()->input('medical_history');
        //$post_surgical_history = Request()->input('post_surgical_history');
        //$created_by = Request()->input('doctor_id');

        $user = new User;

        $user->email     = $email;
        $user->password  = $password;
        $user->role_id   = 1;

        $user->save();

      //  $user_id =  User::select('id')->where('email', $email)->get();

        $doctor = new Doctor;

        $doctor->id = $user->id;
        $doctor->first_name = $first_name;
        $doctor->last_name = $last_name;
      //  $patient->mobile = $mobile;
        $doctor->save();


        return Redirect('admin/user');
    }

    public function postAdd()
    {
        $this->validate(Request(), [
            'first_name'     => 'required|min:3',
            'last_name'     => 'required|min:3',
            'email'    => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'role'     => 'required',
        ]);

        $first_name = Request()->input('first_name');
        $last_name = Request()->input('last_name');
        $role = Request()->input('role');
        $email = Request()->input('email');
        $password = Hash::make(Request()->input('password'));
        $centre = Request()->input('centre');


            try {
              $user = new User;
              // create login first
              $user->email         = $email;
              $user->password      = $password;
              $user->role_id          = $role;

              $user->save();

              $user_id = User::select('id')->where('email', $email)->get();

              switch ($role) {
                case '1':
                  // add doctor
                  $doctor = new Doctor;

                  $doctor->id = $user_id;
                  $doctor->first_name = $first_name;
                  $doctor->last_name = $last_name;
                  $doctor->centre_id = $centre;
                  $doctor->save();
                  break;

                case '2':
                  // add patient
                  $patient = new Patient;

                  $patient->id = $user_id;
                  $patient->first_name = $first_name;
                  $patient->last_name = $last_name;
                  $patient->created_by = Auth::guest()->id();

                  $patient->save();
                  break;
              }
            } catch (Exception $e) {
                report($e);

                return $e;
            }


            return Redirect('admin/user');
    }

    public function getEdit()
    {
        $user_id = Request()->input('user');

        $user = $this->findId($user_id);

        if ($user->role_id == 1) {

          $doctor = Doctor::findorFail($user_id);
          return View('admin.accountManager.editDoctor', [
            'doctor' => $doctor,
          ]);
        }elseif ($user->role_id == 2) {

          $patient = Patient::findorFail($user_id);
          return View('admin.accountManager.editPatient', [
            'patient' => $patient,
          ]);
        }
    }

    public function postDoctorEdit(){

      $this->validate(Request(), [
          'name'     => 'required|min:3',
          'email'    => 'email|unique:users',
          'password' => 'confirmed|min:6',
      ]);

      $doctor = Doctor::findorFail(Request()->input('id'));

      $doctor->first_name = Request()->input('first_name');
      $doctor->last_name = Request()->input('last_name');
      $doctor->email = Request()->input('email');
      $doctor->password = Hash::make(Request()->input('password'));
      $doctor->mobile = Request()->input('mobile');
      $doctor->centre_id = Request()->input('centre');

      $doctor->save();

      return Redirect('admin/user');

    }

    public function postPatientEdit(){

      $this->validate(Request(), [
          'name'     => 'required|min:3',
          'email'    => 'required|email|unique:users',
          'password' => 'confirmed|min:6',
      ]);

      $patient = Patient::findorFail(Request()->input('id'));

      $patient->first_name = Request()->input('first_name');
      $patient->last_name = Request()->input('last_name');
      $patient->email = Request()->input('email');
      $patient->password = Hash::make(Request()->input('password'));
      $patient->mobile = Request()->input('mobile');

      $patient->save();

      return Redirect('admin/user');

    }

    public function findId($id){
      $users = User::all();

      $user = $users->find($id);

      return $user;
    }
}
