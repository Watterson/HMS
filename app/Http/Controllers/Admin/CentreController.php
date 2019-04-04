<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Foundation\Auth as Auth;
use App\Models\Doctor as Doctor;
use App\Models\Centre as Centre;



class CentreController extends Controller
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
        $centres = Centre::all();
        $doctors = [];

        foreach ($centres as $centre) {
          $doctorCount = Doctor::where('centre_id', $centre->id)->count();
          $centre->doctorCount = $doctorCount;
        }
        return view('admin.centres.index', [
          'centres' => $centres,
        ]);
    }

    public function getAdd()
    {

        return view('admin.centres.add');
    }

    public function postAdd()
    {
        $centre = new Centre;

        $centre->name = Request()->input('name');
        $centre->email = Request()->input('email');
        $centre->address = Request()->input('address');
        $centre->postcode = Request()->input('postcode');
        $centre->county = Request()->input('county');
        $centre->phone = Request()->input('phone');

        $centre->save();


        return Redirect('/admin/centres');
    }

    public function getEdit()
    {
        $id = Request()->input('centre');
        $centre = Centre::find($id);
        return view('admin.centres.edit',[
          'centre' => $centre,
        ]);
    }

    public function postEdit()
    {
        $id = Request()->input('id');

        $centre = Centre::find($id);

        $centre->name = Request()->input('name');
        $centre->email = Request()->input('email');
        $centre->address = Request()->input('address');
        $centre->postcode = Request()->input('postcode');
        $centre->county = Request()->input('county');
        $centre->phone = Request()->input('phone');

        $centre->update();


        return Redirect('/admin/centres');
    }
}
