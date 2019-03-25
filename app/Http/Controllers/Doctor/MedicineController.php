<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User as User;
use App\Models\Patient as Patient;
use App\Models\Doctor as Doctor;



class MedicineController extends Controller
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
        //$patients = Patient::all();

        return View('doctor.medicine.index', [
            //'patients' => $patients,
        ]);
    }



    public function findId($id){

      $user = User::findorFail($id);

      return $user;
    }
}
