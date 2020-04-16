<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordermenu extends Model
{
    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }
    
    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}


