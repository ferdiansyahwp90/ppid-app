<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */ 

     public function redirectTo()
     {
         $role = Auth::user()->role;
         switch ($role) {
             case 'admin':
                 return '/admin/index';
                 break;
             default:
                 return '/user';
                 break;
         }
     } 

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function name()
    {
        return 'name';
    }
}
