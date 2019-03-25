<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Auth;
use App\Models\User as User;
use App\Models\Patient as Patient;

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
      
        $user->email = $x[0]->email;

        return view('patient.index', [
            'user' => $user,
        ]);
    }
}
