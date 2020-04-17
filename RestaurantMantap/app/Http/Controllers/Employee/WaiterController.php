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
    
    public function order($tableNumber, $tableStatus, $employeeId)
    {
        $categories = Category::all();
        $menus = Menu::all();
        
        if ($tableStatus == "Empty") {
            $order = new Order();
            $table = Table::find($tableNumber);
            
            $order->status = 1;
            $order->employee_id = $employeeId;
            $order->table_number = $tableNumber;
            $order->save();
            
            $table->status = "Occupied";
            $table->save();
        } else if ($tableStatus == "Reserved") {
            $order = new Order();
            $table = Table::find($tableNumber);
            
            $order->status = 1;
            $order->employee_id = $employeeId;
            $order->table_number = $tableNumber;
            $order->save();
            
            $table->status = "Occupied";
            $table->save;
        }
        
        $order = Order::where('status', 1)->where('table_number', $tableNumber)->first()->id;
        $ordermenus = Ordermenu::where('order_id', $order)->get();
        return view('employee.waiter.ordermenu' ,compact('categories', 'menus', 'order', 'ordermenus'));
    }
    public function reserve()
    {
        $tables = Table::all();
        return view('employee.waiter.reserve', compact('tables'));
    }
    
    public function ordermenu(Request $request) 
    {
        $menus = Menu::all();
        foreach($menus as $key=>$menu) {
            $ordermenucheck = Ordermenu::where('menu_id', $menu->id)->where('order_id', $request->order_id)->first();
            if ($ordermenucheck != null) {
                if ($request->qty[$key] == 0) {
                    Ordermenu::find($ordermenucheck->id)->delete();
                } else {
                    $ordermenu = Ordermenu::find($ordermenucheck->id);
                    $ordermenu->quantity = $request->qty[$key];
                    $ordermenu->menu_id = $menu->id;
                    $ordermenu->order_id = $request->order_id;
                    $ordermenu->save();
                }
            } else if ($request->qty[$key] == 0) {
                
            } else if ($ordermenucheck == null){
                $ordermenu = new Ordermenu();
                $ordermenu->quantity = $request->qty[$key];
                $ordermenu->menu_id = $menu->id;
                $ordermenu->order_id = $request->order_id;
                $ordermenu->save();
            } 
        }
        return redirect()->route('employee.waiter.mainwaiter');    
    }
}

        
