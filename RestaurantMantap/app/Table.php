<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    public $primaryKey = 'number';
    
    public function reservations()
    {
        return $this->hasMany('App\Reservation');
    }
}

