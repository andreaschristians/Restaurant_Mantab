<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SigninController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Signin Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after signin.
     *
     * @var string
     */
    protected $redirectTo = '/employee/waiter/mainwaiter';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function guard()
    {
        return Auth::guard('employee');
    }
    
    public function showLoginForm()
    {
        return view('auth.signin');
    }
    
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
}
