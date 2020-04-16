<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Menu;
use App\Reservation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $categoryCount = Category::count();
        $itemCount = Menu::count();
        $reservations = Reservation::where('status',false)->get();
        return view('admin.dashboard',compact('categoryCount','itemCount','reservations'));
    }
}
