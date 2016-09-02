<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = ['user_id', 'driver_id', 'track_id', 'car_id', 'slug', 'record_date', 'total', 'min', 'seg', 'miliseg', 'en_description', 'es_description', 'ru_description', 'youtube', 'url'];

    public function car()
    {
        return $this->belongsTo('App\Car');
    }

    public function track()
    {
        return $this->belongsTo('App\Track');
    }

    public function driver()
    {
        return $this->belongsTo('App\Driver');
    }

}
