<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = ['user_id', 'driver_id', 'circuit_id', 'car_id', 'slug', 'record_date', 'total', 'min', 'seg', 'miliseg', 'description', 'youtube', 'url'];

    public function car() {
        return $this->belongsTo('App\Car');
    }

}
