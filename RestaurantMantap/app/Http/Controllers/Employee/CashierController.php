<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CashierController extends Controller
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
        return view('employee.cashier.maincashier');
    }
    //billing
    public function billing()
    {
        return view('employee.cashier.billing');
    }
    public function closebill()
    {
        return view('employee.cashier.closebill');
    }
    //payment
    public function paytable()
    {
        return view('employee.cashier.paytable');
    }
    public function payment()
    {
        return view('employee.cashier.payment');
    }
}

