<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Foundation\Auth as Auth;
use App\Models\Doctor as Doctor;


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
        return view('admin.centres.index');
    }

    public function getAdd()
    {
        return view('admin.centres.add');
    }

    public function postAdd()
    {
        return view('admin.centres.index');
    }

    public function getEdit()
    {
        return view('admin.centres.edit');
    }

    public function postEdit()
    {
        return view('admin.centres.index');
    }
}
