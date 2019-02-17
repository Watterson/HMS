<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use App\Models\User as User;


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


        return view('patient.index', [

        ]);
    }
}