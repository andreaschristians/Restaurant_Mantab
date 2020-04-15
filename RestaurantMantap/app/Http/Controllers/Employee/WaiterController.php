<?php

namespace App\Http\Controllers\Employee;
use App\Http\Controllers\Controller;

class WaiterController extends Controller
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
        return view('employee.waiter.mainwaiter');
    }

    public function order()
    {
        return view('employee.waiter.ordermenu');
    }
    public function reserve()
    {
        return view('employee.waiter.reserve');
    }
}

