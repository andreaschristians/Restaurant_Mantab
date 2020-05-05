<?php
namespace App\Http\Controllers\Employee;

use App\Table;
use App\Menu;
use App\Order;
use App\Ordermenu;
use App\Reservation;
use App\Http\Controllers\Controller;

class WaiterService extends Controller
{
    public function reserveStoreFacade($name, $date_and_time, $table_number){
        $reservation = new Reservation();
        $reservation->name = $name;
        $reservation->date_and_time = $date_and_time;
        $reservation->table_number = $table_number;
        $reservation->status = 1;
        $reservation->save();

        $table = Table::find($table_number);
        $table->status = "Reserved";
        $table->save();
    }

    public function orderFacade($tableNumber, $tableStatus, $employeeId){

        if ($tableStatus == "Empty") {
            $order = new Order();
            $table = Table::find($tableNumber);
            
            $order->status = "Open";
            $order->employee_id = $employeeId;
            $order->table_number = $tableNumber;
            $order->save();
            
            $table->status = "Occupied";
            $table->save();
        } else if ($tableStatus == "Reserved") {
            $order = new Order();
            $table = Table::find($tableNumber);
            $reservation = Reservation::where('table_number', $tableNumber)->where('status', 1)->first();
            
            $order->status = "Open";
            $order->employee_id = $employeeId;
            $order->table_number = $tableNumber;
            $order->save();
            
            $table->status = "Occupied";
            $table->save();
            
            $reservation->status = 0;
            $reservation->save();
        }
    }

    public function orderMenuFacade($order_id, $qty){

        $menus = Menu::all();
        foreach($menus as $key=>$menu) {
            $ordermenucheck = Ordermenu::where('menu_id', $menu->id)->where('order_id', $order_id)->first();
            if ($ordermenucheck != null) {
                if ($qty[$key] == 0) {
                    Ordermenu::find($ordermenucheck->id)->delete();
                } else {
                    $ordermenu = Ordermenu::find($ordermenucheck->id);
                    $ordermenu->quantity = $qty[$key];
                    $ordermenu->menu_id = $menu->id;
                    $ordermenu->order_id = $order_id;
                    $ordermenu->save();
                }
            } else if ($qty[$key] == 0) {
                
            } else if ($ordermenucheck == null){
                $ordermenu = new Ordermenu();
                $ordermenu->quantity = $qty[$key];
                $ordermenu->menu_id = $menu->id;
                $ordermenu->order_id = $order_id;
                $ordermenu->save();
            } 
        }
    }
}
?>