<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if (Auth::guard('employee')->user()->job == "Waiter/Waitress") {
            return view('employee.waiter.mainwaiter');
        } else {
            return view('employee.cashier.maincashier');
        }
    }
}


