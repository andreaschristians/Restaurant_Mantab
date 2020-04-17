<?php

namespace App\Http\Controllers\Employee;

use App\Table;
use App\Category;
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
        $tables = Table::all();
        $categories = Category::all();
        return view('employee.waiter.ordermenu' ,compact('categories'));
    }
    public function reserve()
    {
        $tables = Table::all();
        return view('employee.waiter.reserve', compact('tables'));
    }

}