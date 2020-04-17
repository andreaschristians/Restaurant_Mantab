<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function table()
    {
        return $this->belongsTo('App\Table');
    }

    protected $fillable = [
        'name', 'dateandtime'
    ];
}
