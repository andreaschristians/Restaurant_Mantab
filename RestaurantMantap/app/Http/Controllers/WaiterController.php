<?php

namespace App\Http\Controllers;

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
        return view('waiter.mainwaiter');
    }

    public function order()
    {
        return view('waiter.ordermenu');
    }
    public function reserve()
    {
        return view('waiter.reserve');
    }
}

