<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Auth;
use App\Models\User as User;
use App\Models\Patient as Patient;
use App\Models\Doctor as Doctor;
use App\Models\Centre as Centre;
use App\Models\Appointment as Appointment;


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
        $id = Auth::id();
        $x = User::select('email')->where('id', $id)->get();
        $user = Patient::find($id);
        $centres = Centre::select('id', 'name')->get();
        $doctors = Doctor::select('id', 'first_name', 'last_name', 'centre_id')->get();

        $user->email = $x[0]->email;
        return view('patient.index', [
            'user' => $user,
            'centres' => $centres,
            'doctors' => $doctors,
        ]);
    }
    public function getAjax(){
      $centres = Centre::select('id', 'name')->get();
      $doctors = Doctor::select('id', 'first_name', 'last_name', 'centre_id')->get();

      $response = array(
          'centres' => $centres,
          'doctors' => $doctors,
      );
      return response()->json($response);
   }

   public function searchAvailability(Request $request){
      $doctor = $request->input('doctor');
      $date = $request->input('date');

     $appointments = Appointment::select('time')
                                ->where('doctor_id', $doctor)
                                ->where('date', $date)
                                ->get();
     $response = array(
         'date' => $date,
         'doctor' => $doctor,
         'appointments' => $appointments,
     );
     return response()->json($response);
  }
}
