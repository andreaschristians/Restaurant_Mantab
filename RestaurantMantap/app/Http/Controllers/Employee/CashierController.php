<?php

namespace App\Http\Controllers\Employee;

use App\Menu;
use App\Table;
use App\Order;
use App\Ordermenu;
use App\Category;
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
        $tables = Table::all();
        $orders = Order::where('status', 1);
        return view('employee.cashier.billing', compact('tables', 'orders'));
    }
    public function closebill()
    {
        return view('employee.cashier.closebill');
    }
    //payment
    public function paytable()
    {
        $orders = Order::all()->where('status', 0);
        return view('employee.cashier.paytable', compact('orders'));
    }
    public function payment()
    {
        return view('employee.cashier.payment');
    }
}

