<?php

namespace App\Http\Controllers\Admin;

use App\OrderMenu;
use App\Menu;
use App\Category;
use App\Reservation;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        
        $favoritemenuid = 0;
        $favoritecount = 0;
        foreach ($menus as $menu) {
            $count = OrderMenu::whereMonth('created_at', '=', date('m'))->where('menu_id', $menu->id)->sum('quantity');
            if ($count > $favoritecount) {
                $favoritemenuid = $menu->id;
                $favoritecount = $count;
            }
        }
        echo $favoritecount;
        echo $favoritemenuid;
        
        $favoritemenu = Menu::where('id', $favoritemenuid)->get();
        $categoryCount = Category::count();
        $itemCount = Order::count();
        $reservations = Reservation::where('status',false)->get();
        $orders = Order::all();
        return view('admin.dashboard',compact('menu','favoritemenu','favoritecount', 'categoryCount', 'itemCount', 'reservations', 'orders'));
    }
}
