<?php

namespace App\Http\Controllers\Admin;

use App\Menu;
use App\Ordermenu;
use App\Order;
use App\Bill;
use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        
        //get favorite menu
        $favoritemenuid = 0;
        $favoritecount = 0;
        foreach ($menus as $menu) {
            $count = OrderMenu::whereMonth('created_at', '=', date('m'))->where('menu_id', $menu->id)->sum('quantity');
            if ($count > $favoritecount) {
                $favoritemenuid = $menu->id;
                $favoritecount = $count;
            }
        }
        $favoritemenu = Menu::where('id', $favoritemenuid)->get();
        
        $orders = Order::all();
        $bills = Bill::all();
        $ordermenus = Ordermenu::all();
        $reservations = Reservation::where('status', true)->get();

        return view('admin.dashboard',compact('favoritemenu', 'favoritecount', 'bills', 'orders', 'reservations', 'ordermenus' ));

    }
}
