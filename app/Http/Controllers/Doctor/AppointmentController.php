<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User as User;
use App\Models\Patient as Patient;
use App\Models\Doctor as Doctor;
use App\Models\Appointment as Appointment;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Allergy as Allergy;
use App\Models\PatientAllergy as PatientAllergy;
use App\Models\Medicine as Medicine;
use App\Models\FamilyHistory as FamHistory;
use App\Models\Vital as Vital;
use App\Models\Disease as Disease;
use App\Models\LabResult as LabResult;
use App\Models\Perscription as Perscription;



class AppointmentController extends Controller
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
        $now = Carbon::today()->toDateString();
        $aptsPrevious = DB::table('appointments')
                           ->join('patients', 'appointments.patient_id', '=', 'patients.id')
                           ->select('appointments.id', 'appointments.patient_id',  'appointments.doctor_id', 'appointments.appointment_time', 'appointments.appointment_date', 'appointments.reason', 'appointments.confirmed', 'appointments.waiting_room', 'appointments.completed', 'patients.first_name', 'patients.last_name')
                           ->where('doctor_id', Auth::id())
                           ->where('appointment_date', '<', date($now))
                           ->where('completed' , false)
                           ->get();
        $aptsToday = DB::table('appointments')
                           ->join('patients', 'appointments.patient_id', '=', 'patients.id')
                           ->select('appointments.id', 'appointments.patient_id', 'appointments.doctor_id', 'appointments.appointment_time', 'appointments.appointment_date', 'appointments.reason', 'appointments.confirmed', 'appointments.waiting_room', 'appointments.completed', 'patients.first_name', 'patients.last_name')
                           ->where('doctor_id', Auth::id())
                           ->where('appointment_date', '=', date($now))
                           ->where('completed' , false)
                           ->get();
       $aptsFuture = DB::table('appointments')
                          ->join('patients', 'appointments.patient_id', '=', 'patients.id')
                          ->select('appointments.id', 'appointments.patient_id', 'appointments.doctor_id', 'appointments.appointment_time', 'appointments.appointment_date', 'appointments.reason', 'appointments.confirmed', 'appointments.waiting_room', 'appointments.completed', 'patients.first_name', 'patients.last_name')
                          ->where('doctor_id', Auth::id())
                          ->where('appointment_date', '>', date($now))
                          ->where('completed' , false)
                          ->get();
        // dd($aptsFuture);

        return View('doctor.appointments.index', [
            'aptsPreviou' => $aptsPrevious,
            'aptsToday' => $aptsToday,
            'aptsFuture' => $aptsFuture,
        ]);
    }
    public function getView()
    {
      $now = Carbon::today()->toDateString();
      $aptId = Request()->input('aptId');
      $apt = Appointment::find($aptId);
      $patient = Patient::find($apt->patient_id);
      $allergies = Allergy::all();
      $vitalsCurrent = Vital::where('patient_id', $apt->patient_id)
                            ->first();
      $medicines = Medicine::all();
      $vitalsAll = Vital::where('patient_id', $apt->patient_id)
                            ->get();
      $doctor = Doctor::find(Auth::id());
      $famhisDesease = Disease::where('type', 'hereditary')
                              ->get();
      $family_history = DB::table('family_history')
                         ->join('diseases', 'family_history.disease_id', '=', 'diseases.id')
                         ->select('family_history.id', 'family_history.patient_id',  'diseases.id', 'diseases.name', 'diseases.description')
                         ->where('family_history.patient_id', $apt->patient_id)
                         ->get();
      $aptPrevious = DB::table('appointments')
                         ->join('doctors', 'appointments.doctor_id', '=', 'doctors.id')
                         ->select('appointments.id', 'appointments.patient_id',  'appointments.doctor_id', 'appointments.appointment_time', 'appointments.appointment_date', 'appointments.reason', 'appointments.confirmed', 'appointments.waiting_room', 'appointments.completed', 'doctors.first_name', 'doctors.last_name' )
                         ->where('appointments.patient_id', $apt->patient_id)
                         ->where('appointments.appointment_date', '<', date($now))
                         ->where('appointments.completed' , false)
                         ->get();
      $patientAllergies = DB::table('patient_allergies')
                         ->join('allergies', 'patient_allergies.allergy_id', '=', 'allergies.id')
                         ->select('patient_allergies.id', 'patient_allergies.doctor_id', 'patient_allergies.perscription_id', 'patient_allergies.severity', 'allergies.type')
                         ->where('patient_allergies.patient_id', $apt->patient_id)
                         ->get();
      $presCurrent = DB::table('prescriptions')
                         ->join('medicines', 'prescriptions.patient_id', '=', 'medicines.id')
                         ->select('prescriptions.id', 'prescriptions.doctor_id', 'prescriptions.start_date', 'prescriptions.end_date', 'prescriptions.reason', 'prescriptions.dose', 'prescriptions.dose_duration', 'prescriptions.quantity', 'prescriptions.medicine_id', 'medicines.name')
                         ->where('prescriptions.patient_id', $apt->patient_id)
                         ->where('prescriptions.start_date', '<=', date($now))
                         ->where('prescriptions.end_date', '>=', date($now))
                         ->get();
      $presPrevious = DB::table('prescriptions')
                         ->join('medicines', 'prescriptions.patient_id', '=', 'medicines.id')
                         ->select('prescriptions.id', 'prescriptions.doctor_id', 'prescriptions.start_date', 'prescriptions.end_date', 'prescriptions.reason', 'prescriptions.dose', 'prescriptions.dose_duration', 'prescriptions.quantity', 'prescriptions.medicine_id', 'medicines.name')
                         ->where('prescriptions.patient_id', $apt->patient_id)
                         ->where('prescriptions.end_date', '<', date($now))
                         ->get();
      $labType = LabResult::distinct()
                          ->get(['type']);
      $labResults = LabResult::where('patient_id', $apt->patient_id)
                            ->get();


      return View('doctor.appointments.view', [
          'apt' => $apt,
          'aptPrevious' => $aptPrevious,
          'patient' => $patient,
          'doctor' => $doctor,
          'allergies' => $allergies,
          'presPrevious' => $presPrevious,
          'presCurrent' => $presCurrent,
          'family' => $family_history,
          'vitalsAll' => $vitalsAll,
          'vitalsCurrent' => $vitalsCurrent,
          'patientAllergies' => $patientAllergies,
          'medicines' => $medicines,
          'famhisDesease' => $famhisDesease,
          'labType' => $labType,
          'labResults' => $labResults,
      ]);
    }
    public function postSubmit(){
      $appointmentArray = Request()->input('appointment');

      $vitals = $appointmentArray[0];
      $perscription = $appointmentArray[1];
      $allergy = $appointmentArray[2];
      $lab = $appointmentArray[3];
      $family_history = $appointmentArray[4];
      $db_array = [];
      // if ($vitals->empty != true) {
      //   $db_vitals = new Vital;
      //   $db_vitals->patient_id = ;
      //   $db_vitals->doctor_id = ;
      //   $db_vitals->height = $appointmentArray[0]->height;
      //   $db_vitals->weight = $appointmentArray[0]->weight;
      //   $db_vitals->body_temp = $appointmentArray[0]->body_temp;
      //   $db_vitals->pulse = $appointmentArray[0]->pulse;
      //   $db_vitals->resp_rate = $appointmentArray[0]->resp_rate;
      //   $db_vitals->blood_pressure = $appointmentArray[0]->blood_pressure;
      //   $db_vitals->notes = $appointmentArray[0]->notes;
      //   $db_vitals->save();
      //   $db_array[0] = true
      // }else {
      //
      // }
      // if ($perscription->empty != true) {
      //   $db_perscription = new Perscription;
      //   $db_perscription->patient_id = ;
      //   $db_perscription->doctor_id = ;
      //   $db_perscription->medicine_id = ;
      //   $db_perscription->problem = ;
      //   $db_perscription->reason = ;
      //   $db_perscription->dose = ;
      //   $db_perscription->dose_duration = ;
      //   $db_perscription->quantity = ;
      //   $db_perscription->start_date = ;
      //   $db_perscription->end_date = ;
      //   $db_perscription->save();
      // }
      // if ($allergy->empty != true) {
      //   $db_allergy = new PatientAllergy;
      //   $db_allergy->patient_id = ;
      //   $db_allergy->doctor_id = ;
      //   $db_allergy->allergy_id = ;
      //   $db_allergy->severity = ;
      //   $db_allergy->notes = ;
      //   $db_allergy->save();
      // }
      // if ($lab->empty != true) {
      //   $db_lab = new Lab;
      //   $db_lab->type = ;
      //   $db_lab->patient_id = ;
      //   $db_lab->doctor_id = ;
      //   $db_lab->notes = ;
      //   $db_lab->completed = ;
      //   $db_lab->save();
      // }
      // if ($family_history->empty != true) {
      //   $db_famhis = new FamilyHistory;
      //   $db_famhis->patient_id = ;
      //   $db_famhis->disease_id = ;
      //   $db_famhis->contracted = ;
      //   $db_famhis->severity = ;
      //   $db_famhis->treatment_available = ;
      //   $db_famhis->treatment_perscribed = ;
      //   $db_famhis->save();
      // }

      $response = array(
          'appointment' => $appointment,
      );
      return response()->json($response);
    }


    public function findId($id){

      $user = User::findorFail($id);

      return $user;
    }
}
