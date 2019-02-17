<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User as User;


class UserController extends Controller
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
        $users = User::all();

        return View('admin.accountManager.index', [
            'users' => $users,
        ]);
    }
    public function getAdd()
    {
        return View('admin.accountManager.add');
    }

    public function postAdd()
    {
        $this->validate(Request(), [
            'name'     => 'required|min:3',
            'email'    => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'role'     => 'required',
        ]);


            try {
              $user = new User;
              // create login first
              $user->name     = Request()->input('name');
              $user->email    = Request()->input('email');
              $user->password = Hash::make(Request()->input('password'));
              $user->role     = Request()->input('role');

              $user->save();
            } catch (Exception $e) {
                report($e);

                return $e;
            }


            return Redirect('admin/user');
    }
}
