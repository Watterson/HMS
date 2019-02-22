<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Models\User as User;


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
        $users = User::where('role', 'patient')->get();

        return view('doctor.index', [
            'users' => $users,
        ]);
    }

    public function postAdd()
    {
        $this->validate(Request(), [
            'name'     => 'required|min:3',
            'email'    => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);


            try {
              $user = new User;
              // create login first
              $user->name     = Request()->input('name');
              $user->email    = Request()->input('email');
              $user->password = Hash::make(Request()->input('password'));
              $user->role     = 'patient';

              $user->save();
            } catch (Exception $e) {
                report($e);

                return $e;
            }


            return Redirect('admin/user');
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
        // $role = $user->role;
        // $alergies;
        // $perscriptions;
        // $appointments;
        return View('admin.accountManager.edit', [
            'user' => $user,
            'name' => $name,
            'email' => $email,
          //  'mobile' => $mobile,
          //  'address' => $address,
          //  'role' => $role,
          //  'gender' => $gender,
        ]);
    }

    public function findId($id){
      $users = User::all();

      $user = $users->find($id);

      return $user;
    }
}
