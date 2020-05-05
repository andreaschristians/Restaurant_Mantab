<?php
namespace App\Http\Controllers\Employee;

use App\Table;
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
}
?>