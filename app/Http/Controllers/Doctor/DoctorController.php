<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Models\User as User;
use App\Models\Patient as Patient;
use App\Models\Doctor as Doctor;
use Auth;



class DoctorController extends Controller
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
        $patientCount = User::where('role_id', 2)->count();
        $patients = Patient::all();
        return view('doctor.index', [
            'patientCount' => $patientCount,
            'patients' => $patients,
        ]);
    }
    public function index1($patients)
    {
        $patientCount = User::where('role_id', 2)->count();

        return view('doctor.index', [
            'patientCount' => $patientCount,
            'patients' => $patients,
        ]);
    }

    public function postAdd()
    {
        $this->validate(Request(), [
            'name'     => 'required|min:3',
            'email'    => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $firstname = Request()->input('first_name');
        $last_name = Request()->input('last_name');
        $role = Request()->input('role');
        $email = Request()->input('email');
        $password = Hash::make(Request()->input('password'));
        $mobile = Request()->input('mobile');
        $address = Request()->input('address');
        $dob = Request()->input('dob');
        $gender = Request()->input('gender');
        $blood_type = Request()->input('blood_type');
        $family_history = Request()->input('family_history');
        $medical_history = Request()->input('medical_history');
        $post_surgical_history = Request()->input('post_surgical_history');
        $created_by = Request()->input('doctor_id');

            try {
              $user = new User;
              // create login first
              $user->email    = $email;
              $user->password = Hash::make($password);
              $user->role_id  = $role;

              $user->save();

              $user_id = User::where('email', '$email')->get('id');

              $patient = new Patient;

              $patient->id = $user_id;
              $patient->first_name = $first_name;
              $patient->last_name = $last_name;
              $patient->address = $address;
              $patient->mobile = $mobile;
              $patient->dob = $dob;
              $patient->gender = $gender;
              $patient->blood_type = $blood_type;
              $patient->family_history = $family_history;
              $patient->medical_history = $medical_history;
              $patient->post_surgical_history = $post_surgical_history;
              $patient->created_by = $created_by;

              $patient->save();


            } catch (Exception $e) {
                report($e);

                return $e;
            }


            return Redirect('admin/user');
    }

    public function getEdit()
    {
        $patientId = Request()->input('user');

        $patient = $this->findId($patientId);

        $name = $patient->name;
        $email = $patient->email;
      //  $mobile = $patient->mobile;
      //  $address = $patient->address;
      //  $gender = $patient->gender;
        // $role = $patient->role;
        // $alergies;
        // $perscriptions;
        // $appointments;
        return View('admin.accountManager.edit', [
            '$patient' => $patient,
            'name' => $name,
            'email' => $email,
          //  'mobile' => $mobile,
          //  'address' => $address,
          //  'role' => $role,
          //  'gender' => $gender,
        ]);
    }

    public function findPatient($id){

      $user = Patient::findorFail($id);

      return $user;
    }

    public function searchSurname()
    {
      $surname = Request()->input('surname');

      $patients = Patient::where('last_name', 'like', '%' . $surname . '%');
      $patientCount = User::where('role_id', 2)->count();
      return view('doctor.index', [
          'patientCount' => $patientCount,
          'patients' => $patients,
      ]);

      // code...
    }
}
