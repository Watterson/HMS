<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User as User;
use App\Models\Patient as Patient;
use App\Models\Doctor as Doctor;



class PatientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        // $this->middleware('auth:admin');

    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::all();

        return View('doctor.patient.index', [
            'patients' => $patients,
        ]);
    }
    public function getAdd()
    {
        return View('doctor.patient.add');
    }

    public function postAdd()
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


          

            return Redirect('doctor/patients');
    }


    public function getEdit()
    {
        $userId = Request()->input('user');

        $user = $this->findId($userId);

        $name = $user->name;
        $email = $user->email;
      //  $mobile = $user->mobile;
      //  $address = $user->address;
      //  $gender = $user->gender;
        $role = $user->role;
        // $alergies;
        // $perscriptions;
        // $appointments;
        return View('doctor.patient.edit', [
            'user' => $user,
            'name' => $name,
            'email' => $email,
          //  'mobile' => $mobile,
          //  'address' => $address,
            'role' => $role,
          //  'gender' => $gender,
        ]);
    }

    public function findId($id){

      $user = User::findorFail($id);

      return $user;
    }
}
