<?php
namespace App\Http\Controllers\Employee;

use App\Payment;
use App\Order;
use App\Table;
use App\Bill;
use App\Http\Controllers\Controller;

class CashierService extends Controller
{
    public function paymentStoreFacade($amount, $total, $bill_id, $order_id){

        $payment = new Payment();
        $payment->amount = $amount;
        $payment->change = ($amount - $total);
        $payment->bill_id = $bill_id;
        $payment->save();
        if($amount >= $total){
            $tablenumber = Order::where('id', $order_id)->first()->table_number;
            
            $table = Table::find($tablenumber);
            $table->status = "Empty";
            $table->save();
            
            $order = Order::find($order_id);
            $order->status = "Paid";
            $order->save();
        }
    }

    public function billStoreFacade($order_id, $total){
        $order = Order::find($order_id);
        $order->status = "Close";
        $order->save();
        
        $bill = new Bill();
        $bill->charge = $total;
        $bill->order_id = $order_id;
        $bill->save();
        
        $table = Table::find($order->table_number);
        $table->status = "Closed";
        $table->save();
    }
}

?>