<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User as User;
use App\Models\Patient as Patient;
use App\Models\Doctor as Doctor;
use App\Models\Medicine as Medicine;
use App\Models\Allergy as Allergy;



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
        $medicines = Medicine::all();
        $allergies = Allergy::all();

        return View('doctor.medicine.index', [
            'medicines' => $medicines,
            'allergies' => $allergies,
        ]);
    }

    public function getAdd()
    {
      return View('doctor.medicine.add');
    }
    public function postAdd()
    {
      $medicine = new Medicine;
      $medicine->name = Request()->input('name');
      $medicine->description = Request()->input('description');
      $medicine->dose = Request()->input('dose');
      $medicine->duration = Request()->input('duration');
      $medicine->quantity = Request()->input('quantity');
      $medicine->save();

      return Redirect('doctor/medicine');
    }
    public function getAllergy()
    {
      return View('doctor.medicine.addAllergy');
    }
    public function postAllergy()
    {
      $allergy = new Allergy;
      $allergy->type = Request()->input('type');
      $allergy->agent = Request()->input('agent');
      $allergy->reaction = Request()->input('reaction');
      $allergy->severity = Request()->input('severity');
      $allergy->source = Request()->input('source');
      $allergy->save();

      return Redirect('doctor/medicine');
    }

    public function findId($id){

      $user = User::findorFail($id);

      return $user;
    }
}
