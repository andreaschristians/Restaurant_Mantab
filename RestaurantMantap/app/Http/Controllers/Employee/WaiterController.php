<?php

namespace App\Http\Controllers\Employee;

use App\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::guard('employee')->user()->job == "Waiter/Waitress") {
            return view('employee.waiter.mainwaiter');
        } else {
//            return view('welcome');
        }
    }

    public function table()
    {   
        $tables = Table::all();
        return view('employee.waiter.choosetable' ,compact('tables'));
    }
    
    public function order($number)
    {
        return view('employee.waiter.ordermenu');
    }
    public function reserve()
    {
        return view('employee.waiter.reserve');
    }
}
