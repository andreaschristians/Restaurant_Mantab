<?php

namespace App\Http\Controllers\Employee;

use App\Menu;
use App\Table;
use App\Order;
use App\Ordermenu;
use App\Category;
use App\Bill;
use App\Payment;
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
        return view('employee.cashier.billing', compact('tables'));
    }
    public function closebill($table_number)
    {
        $order_id = Order::where('table_number', $table_number)->where('status', 1)->first()->id;
        $ordermenus = Ordermenu::where('order_id', $order_id)->get();
        $total = 0;
        return view('employee.cashier.closebill', compact('ordermenus', 'order_id', 'total'));

    }
    public function billstore($order_id, $total) {
        $order = Order::find($order_id);
        $order->status = 0;
        $order->save();
        
        $bill = new Bill();
        $bill->charge = $total;
        $bill->order_id = $order_id;
        $bill->save();
        
        return redirect()->route('employee.cashier.maincashier'); 
    }
    
    //payment
    public function paytable()
    {
        $orders = Order::all()->where('status', 0);
        return view('employee.cashier.paytable', compact('orders'));
    }
    public function payment($order_id)
    {
        $ordermenus = Ordermenu::where('order_id', $order_id)->get();
        $bill_id = Bill::where('order_id', $order_id)->first()->id;
        $total = 0;
        return view('employee.cashier.payment', compact('ordermenus', 'order_id','bill_id', 'total'));
    }
    public function paymentstore(Request $request)
    {
        $payment = new Payment();
        $payment->amount = $request->amount;
        $payment->change = ($request->amount - $request->total);
        $payment->bill_id = $request->bill_id;
        $payment->save();
        
        $tablenumber = Order::where('id', $request->order_id)->first()->table_number;
        
        $table = Table::find($tablenumber);
        $table->status = "Empty";
        $table->save();
        return redirect()->route('employee.cashier.maincashier'); 
    }
}

