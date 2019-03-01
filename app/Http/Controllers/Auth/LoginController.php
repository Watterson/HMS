<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Show the application's login form.
     *
     * NOTE: Please comment/remove showLoginForm() in vendor\laravel\framework\src\Illuminate\Foundation\Auth\AuthenticatesUsers.php
     *
     * @return \Illuminate\Http\Response
     */

    public function showLoginForm()
    {
        return view('auth.login');
    }

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function authenticated(Request $request, $user)
    {
      // This is how the intended function works
      // Pulling from session completely removes whatever was placed.
      $path = Session()->pull('url.intended');

      // If the intended url was the login or logout, it becomes the home index $redirectTo
      $userIndex = $this->getRouteGroupIndex($user);

      if($path == url('/') || !$path)
      {
        $path = $userIndex;
        return Redirect()->to($path);
      }
      else
      {
        // If intended url begins with the users role, continue to page, else redirect to role index.
        if(strpos($path, $userIndex.'/') !== false)
        {
          return Redirect()->to($path);
        }
        else
        {
          $path = $userIndex;
          return Redirect()->to($path);
        }
      }
    }

    public function getRouteGroupIndex($user)
    {
        $role = strtolower($user->role_id);
        switch ($role)
        {
            case 1:
                return '/doctor';
                break;
            case 2:
                return '/patient';
                break;

        }
    }
}
