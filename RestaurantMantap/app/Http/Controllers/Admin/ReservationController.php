<?php

namespace App\Http\Controllers\Admin;

use App\Notifications\ReservationConfirmed;
use App\Reservation;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservation.index',compact('reservations'));
    }

    public function reserve(Request $request){
        $this->validate($request,[
            'name' => 'required',
            // 'phone' => 'required',
            // 'email' => 'required|email',
            'dateandtime' => 'required'
        ]);
        $reservation = new Reservation();
        $reservation->name = $request->name;
        // $reservation->phone = $request->phone;
        // $reservation->email = $request->email;
        $reservation->date_and_time = $request->dateandtime;
        // $reservation->message = $request->message;
        $reservation->table_number = $request->table_number;
        $reservation->status = false;
        $reservation->created_at = Carbon::now();
        $reservation->updated_at = now();
        $reservation->save();
        Toastr::success('Reservation request sent successfully. we will confirm to you shortly','Success',["positionClass" => "toast-top-right"]);
        return redirect()->route('employee.waiter.mainwaiter');
    }

    public function status($id){
        $reservation = Reservation::find($id);
        $reservation->status = true;
        $reservation->save();
//        Notification::route('mail',$reservation->email )
//            ->notify(new ReservationConfirmed());
        Toastr::success('Reservation successfully confirmed.','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
    4 
    public function destroy($id){
        Reservation::find($id)->delete();
        Toastr::success('Reservation successfully deleted.','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }

}
